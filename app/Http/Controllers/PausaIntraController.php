<?php

namespace App\Http\Controllers;

use App\Models\PausaIntra;
use App\Models\PausaIntraAccesoVascular;
use App\Models\PausaIntraDrenaje;
use App\Models\SolicitudPabellon;
use App\Models\Medico;

use Illuminate\Http\Request;

class PausaIntraController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $intraRequest = [
            'id_solicitud'=> request()->id_solicitud,
            'id_asignacion'=> request()->id_asignacion,
            'bo_borrador'=> request()->bo_borrador,
            'gl_folley'=> request()->gl_folley,
            'gl_folley_balon'=> request()->gl_folley_balon,
            'id_folley_instalada'=> request()->id_folley_instalada,
            'bo_aseo_realizado'=> request()->bo_aseo_realizado,
            'gl_antiseptico'=> request()->gl_antiseptico,
            'id_responsable_aseo'=> request()->id_responsable_aseo,
            'fc_entrada_servicio'=> request()->fc_entrada_servicio,
            'gl_observacion_horario'=> request()->gl_observacion_horario,
            'fc_entrada_pabellon'=> request()->fc_entrada_pabellon,
            'fc_inicio_anestesia'=> request()->fc_inicio_anestesia,
            'fc_inicio_intervencion'=> request()->fc_inicio_intervencion,
            'fc_salida_pabellon'=> request()->fc_salida_pabellon,
            'fc_fin_anestesia'=> request()->fc_fin_anestesia,
            'fc_fin_intervencion'=> request()->fc_fin_intervencion
        ];
        $pausaIntra = PausaIntra::updateOrCreate(['id_solicitud' => $request->id_solicitud], $intraRequest);
        if($pausaIntra){
          return 'ok';
        }else{
            return 'error';
        }
    }

    public function eliminar($id){
        $pausaIntra = PausaIntra::with('accesoVascular', 'drenaje')->find($id);
        foreach ($pausaIntra->accesoVascular as $key => $value) {
            $value->delete();
        }
        foreach ($pausaIntra->drenaje as $key => $value) {
            $value->delete();
        }
        if($pausaIntra->delete()){
            return 'ok';
        }else{
            return 'error';
        }
    }

    public function getInfo(Request $request){
        // $pausaIntra = PausaIntra::find($id);
        $solicitudPabellon = SolicitudPabellon::with('paciente', 'asignacion', 'pausaIntra')
                ->where('id', $request->solicitud_id)
                ->first();
        $enfermeras = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->whereIn('cod_car', [17,5,21,7]);
                    }
                )
                ->orderBy('pro_nombres')
                ->get();
        $profesionales = Medico::with('labores')
                ->whereHas('labores',
                    function ($query){
                        $query->whereIn('cod_car', [17,5,21,19,4,20,3,7,9]);
                    }
                )
                ->orderBy('pro_nombres')
                ->get();
        return [
            'solicitudPabellon' => $solicitudPabellon,
            'enfermeras' => $enfermeras,
            'profesionales' => $profesionales
        ]; 
    }

    public function agregarAccesoVascular(Request $request){
        // return $request;
        //   return $accesos = PausaIntraAccesoVascular::with('responsable')->where('id_asignacion', $request->id_asignacion)->get();
        if($request->agregar == 1){
            //$accesoVascular = PausaIntraAccesoVascular::create($request->except('agregar', 'eliminar'));
            $accesoVascular = PausaIntraAccesoVascular::updateOrCreate(['id_solicitud'=> $request->id_solicitud], $request->except('agregar', 'eliminar'));
            //$accesoVascular = PausaIntraAccesoVascular::create($request->except('agregar', 'eliminar'));
        }elseif($request->eliminar != 0){
            PausaIntraAccesoVascular::find($request->eliminar)->delete();
        }
        if( $accesoVascular ){
            $accesos = PausaIntraAccesoVascular::with('responsable')->where('id_solicitud', $request->id_solicitud)->get();
            return $accesos;
        }else{
            return 'error';
        }
    }

    public function buscarAccesoVascular(Request $request){
       return  $accesos = PausaIntraAccesoVascular::with('responsable')->where('id_solicitud', $request->id_solicitud)->first();
    }

    public function eliminarAccesoVasc(Request $request){
        if(PausaIntraAccesoVascular::find($request->id)->delete()){
            return 'ok';
        }else{
            return 'error';
        } 
    }

    public function agregarDrenaje(Request $request)
    {
        // return $request;
        if($request->agregar == 1){
            $drenaje = PausaIntraDrenaje::create($request->except('agregar', 'eliminar'));
        }elseif($request->eliminar != 0){
            PausaIntraDrenaje::find($request->eliminar)->delete();
        }
        $drenajes = PausaIntraDrenaje::where('id_solicitud', $request->id_solicitud)->first();
        return $drenajes;
    }

    public function eliminarDrenaje(Request $request){

        $drenaje = PausaIntraDrenaje::find($request->id);
        if($drenaje){
            $drenaje->delete();
            return 'ok';
        }else{
            return 'error';
        } 
    }

    public function getDrenaje(Request $request){
        $drenaje = PausaIntraDrenaje::where('id_solicitud', $request->id_solicitud)->first();
        return $drenaje;
    }

    public function registrar(Request $request){

    }
}
