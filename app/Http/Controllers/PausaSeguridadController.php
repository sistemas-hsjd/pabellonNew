<?php

namespace App\Http\Controllers;

use App\Models\PausaSeguridad;
use App\Models\SolicitudPabellon;
use App\Models\PrevencionCaida;
use App\Models\PrevencionUPP;
use Illuminate\Http\Request;

class PausaSeguridadController extends Controller
{
    public function eliminar($id){
        $pausaSeguridad = PausaSeguridad::find($id);
        if($pausaSeguridad->delete()){
            return 'ok';
        }else{
            return 'error';
        }
    }

    public function getInfo(Request $request){
        $pausaSeguridad = PausaSeguridad::find($request->id);
        $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaSeguridad')
        ->where('id', $pausaSeguridad->id_solicitud)
        ->first();
        $prevencionesCaida = PrevencionCaida::get();
        $prevencionesUPP = PrevencionUPP::get();

        return [
            'solicitudPabellon' => $solicitudPabellon,
            'prevencionesCaida' => $prevencionesCaida,
            'prevencionesUPP' => $prevencionesUPP
        ];
    }

    public function store(Request $request){
        $pausaSeguridad = PausaSeguridad::updateOrCreate(['id_solicitud'=> $request->id_solicitud], $request->except('_token'));
        if($pausaSeguridad){
            return 'ok';
        }else{
            return 'error';
        }
    }
}
