<?php

namespace App\Http\Controllers;

use App\Models\PausaAnestesia;
use App\Models\SolicitudPabellon;
use App\Models\Medico;
use Illuminate\Http\Request;

class PausaAnestesiaController extends Controller
{
    public function eliminar($id){
        $pausaAnestesia = PausaAnestesia::find($id);
         if($pausaAnestesia->delete()){
            return 'ok';
         }else{
            return 'error';
         }
    }

    public function getInfo(Request $request){
      $pausaAnestesia = PausaAnestesia::find($request->id);
      $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaPabellon')
                ->findOrFail($request->solicitud_id);
      
      $tecnicosAnestesistas = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->whereIn('cod_car', [4, 30, 31]);
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
         'pausaAnestesia' => $pausaAnestesia,
         'solicitudPabellon' => $solicitudPabellon,
         'tecnicosAnestesistas' => $tecnicosAnestesistas,
         'enfermeras' => $enfermeras,
      ];

    }

    public function store(Request $request)
    {
        if(!$request->gl_bic){
            $request->request->add(['gl_bic' => array()]);
        }
        $pausaAnestesia = PausaAnestesia::updateOrCreate(['id_solicitud'=> $request->id_solicitud], $request->except('_token'));
        if($pausaAnestesia){
            return 'ok';
        }else{
            return 'error';
        }
    }
}
