<?php

namespace App\Http\Controllers;

use App\Models\PausaRecuento;
use App\Models\PausaRecuentoGc;
use App\Models\PausaRecuentoIn;
use App\Models\SolicitudPabellon;
use App\Models\Medico;

use Illuminate\Http\Request;

class PausaRecuentoController extends Controller
{
    public function eliminar($id){
        $pausaRecuento = PausaRecuento::with('gc', 'in')->find($id);
        foreach ($pausaRecuento->gc as $key => $value) {
            $value->delete();
        }
        foreach ($pausaRecuento->in as $key => $value) {
            $value->delete();
        }
        if($pausaRecuento->delete()){
            return 'ok';
        }else{
           'error';
        }
        
    }
    
}
