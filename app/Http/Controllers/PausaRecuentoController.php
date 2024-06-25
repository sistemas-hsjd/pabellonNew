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
    public function getInfo(Request $request){
        $pausaRecuento = PausaRecuento::find($request->id);
        $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaRecuento')
                ->where('id', $pausaRecuento->id_solicitud)
                ->first();
        $anestesiologos = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->where('cod_car', [3,20]);
                    }
                )
                ->orderBy('pro_nombres')
                ->get();
        $arsenaleras = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->where('cod_car', 1);
                    }
                )
                ->orderBy('pro_nombres')
                ->get();
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
        $cirujanos = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->whereIn('cod_car', [10,11,14,15,16,6]);
                    }
                )
                ->orderBy('pro_nombres')
                ->get();

        return [
            'solicitudPabellon' => $solicitudPabellon,  
            'anestesiologos' => $anestesiologos,
            'arsenaleras' => $arsenaleras, 
            'pabelloneras' => $pabelloneras,
            'enfermeras' => $enfermeras,
            'cirujanos' => $cirujanos
        ];
    }

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
    public function getGasasCompresas(Request $request){
        $gasasCompresas = PausaRecuentoGc::with('pabellonera')->where('id_solicitud', $request->id_solicitud)->get();
        return $gasasCompresas;
    }

    public function eliminarRecuentoGasa(Request $request){
        $recuento = PausaRecuentoGc::find($request->id);
        if( $recuento ){
            $recuento->delete();
            return 'ok';
        }else{
            return 'error';
        }
    }
    public function agregarGasasCompresas(Request $request)
    {
        $gasasCompresas = PausaRecuentoGc::create($request->all());
        $gasasCompresas = PausaRecuentoGc::with('pabellonera')->where('id_solicitud', $request->id_solicitud)->first();
        return $gasasCompresas;
    }

    public function agregarInstrumental(Request $request)
    {   
        $instrumental = PausaRecuentoIn::create($request->all());
      
        return $instrumental;
    }

    public function getInstrumentales(Request $request){
        return $instrumental = PausaRecuentoIn::with('pabellonera')->where('id_solicitud', $request->id_solicitud)->get();
    }

    public function eliminarRecuentoInstrumental(Request $request){
       $recuentoIstrumental = PausaRecuentoIn::find($request->id);
       if( $recuentoIstrumental ){
            $recuentoIstrumental->delete();
            return 'ok';
       }else{
            return 'error';
       }
    }

}
