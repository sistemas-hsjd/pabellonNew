<?php

namespace App\Http\Controllers;
use App\Models\PausaRecuperacion;
use App\Models\PausaRecuperacionControl;

use Illuminate\Http\Request;

class PausaRecuperacionController extends Controller
{
    public function revertirAlta(Request $request)
    {

        $pausaRecuperacion = PausaRecuperacion::where('id_solicitud', $request->id)->latest()->first();
        $pausaRecuperacion->bo_borrador = 1;
        $pausaRecuperacion->save();
        return 'ok';
    }

    public function eliminar($id){
        $pausaRecuperacion = PausaRecuperacion::with('controles')->find($id);
        foreach ($pausaRecuperacion->controles as $key => $value) {
            $value->delete();
        }

        if($pausaRecuperacion->delete()){
            return 'ok';
        }else{
           return 'error';
        }
    }

}
