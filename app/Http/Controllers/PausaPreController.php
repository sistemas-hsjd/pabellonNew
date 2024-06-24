<?php

namespace App\Http\Controllers;

use App\Models\SolicitudPabellon;
use App\Models\PausaPre;
use App\Models\Paciente;
use App\Models\UnidadDemandante;
use Illuminate\Http\Request;

class PausaPreController extends Controller
{
    public function getPausaPre(Request $request){
        $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaPre')
        ->where('id', $request->id)
        ->first();
        $unidades = UnidadDemandante::where('bo_pabellon', 1)->orderBy('gl_nombre')->get();

        return [
            "SolicitudPabellon" => $solicitudPabellon,
            "unidades" => $unidades
        ];
    }

    public function store(Request $request)
    {
        if($request->bo_alergia_medio_contraste=='null') {
            $request->bo_alergia_medio_contraste = NULL;
        }
        $pausaPre = PausaPre::updateOrCreate(['id_solicitud'=> $request->id_solicitud], $request->except('_token'));
        if($pausaPre){
            $solicitudPabellon = SolicitudPabellon::with('paciente')->find($pausaPre->id_solicitud);
            return 'ok';
        }else{
            return 'error';
        }
    }

    public function eliminar($id){
        $pausaPre = PausaPre::find($id);
        if($pausaPre->delete()){
            return 'ok';
        }else{
            return 'error';
        }
    }
}
