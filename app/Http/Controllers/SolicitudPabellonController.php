<?php

namespace App\Http\Controllers;

use App\Models\SolicitudPabellon;
use App\Models\SolicitudPabellonPersonal;
use App\Models\Paciente;
use Illuminate\Http\Request;

class SolicitudPabellonController extends Controller
{
    public function detalle($id){
        $solicitudPabellon = SolicitudPabellon::with(
        'paciente', 
        'usuario',
        'equipoMedico',
        'unidad',
        'cie10',
        'medico',
        'prestaciones',
        'equipo',
        'equipo.labor',
        'equipo.medico',
        'asignacion',
        'asignacion.nrPabellon',
        'asignacion.pabellon',
        'consentimiento',
        'protocolo',
        'protocolo.medico',
        'protocolo.pabellon',
        'protocolo.cie10pre',
        'protocolo.cie10post',
        'estado',
        'pausaPre',
        'pausaPabellon',
        'pausaAnestesia',
        'pausaSeguridad',
        'pausaIntra',
        'pausaRecuento',
        'pausaEpicrisis',
        'pausaRecuperacion',
        'pausaRecuperacionTransitoria',
        'pausaTraslado',
        'solicitudesInsumos',
        'solicitudesInsumos.solicitante',
        'solicitudesInsumos.estado',
        'solicitudesInsumosBodega'
        )->find($id);
    
        if(isset($solicitudPabellon->asignacion)){
            $personal = SolicitudPabellonPersonal::with('labor', 'medico')->where('id_nr_pabellon', $solicitudPabellon->asignacion->id_nr_pabellon)->where('fc_solicutud', date('Y-m-d', strtotime(str_replace("/",".",$solicitudPabellon->asignacion->fc_inicio))))->get();
        }else{
            $personal = null;
        }
        return [
            "solicitudPabellon" => $solicitudPabellon,
            "personal" => $personal
        ];
    }

    public function index()
    {
        return 'holaaaaa controllleerr';
    }
    
}
