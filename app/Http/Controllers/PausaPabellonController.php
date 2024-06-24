<?php

namespace App\Http\Controllers;

use App\Models\SolicitudPabellon;
use App\Models\PausaPabellon;
use App\Models\Medico;
use Illuminate\Http\Request;

class PausaPabellonController extends Controller
{
    public function eliminar($id){
        $pausaPabellon = PausaPabellon::find($id);
        if($pausaPabellon->delete()){
            return 'ok';
        }else{
            return 'error';
        }
    }

    public function getInfo(Request $request){
        $pausaPabellon = PausaPabellon::find($request->id);
        $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaPabellon')
        ->whereHas('pausaPabellon', function ($query) use ($pausaPabellon){
            $query->where('id', $pausaPabellon->id);
        })
        ->first();

        $pabelloneras = Medico::with('labores')
        ->whereHas('labores',
            function ($query){
                $query->where('cod_car', 2);
            }
        )
        ->orderBy('pro_nombres')
        ->get();

        $enfermeras = Medico::with('labores')
        ->whereHas('labores',
            function ($query){
                $query->whereIn('cod_car', [17,5,21,7]);
            }
        )
        ->orderBy('pro_nombres')
        ->get();

        return [
            'enfermeras' => $enfermeras,
            'pabelloneras' => $pabelloneras,
            'solicitudPabellon' => $solicitudPabellon
        ];
    }

    public function store(Request $request){
        $pausaPabellon = PausaPabellon::updateOrCreate(['id_solicitud'=> $request->id_solicitud], $request->except('_token'));
        if($pausaPabellon){
            return 'ok';
        }else{
            return 'error';
        }
    }
}
