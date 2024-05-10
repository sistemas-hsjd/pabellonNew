<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function viewAny(User $user)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function view(User $user, User $model)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function create(User $user)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function update(User $user, User $model)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function delete(User $user, User $model)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function restore(User $user, User $model)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

    public function forceDelete(User $user, User $model)
    {
        return in_array(900, Session::get('opciones')) ? true : false;
    }

     // Insumos
     public function insumos(User $user)
     {
         return (in_array(100, Session::get('opciones')));
     }
 
     public function solicitudInsumo(User $user)
     {
         return (in_array(101, Session::get('opciones')));
     }
 
     public function misSolicitudes(User $user)
     {
         return (in_array(102, Session::get('opciones')));
     }
 
     public function solicitudRecibida(User $user)
     {
         return (in_array(103, Session::get('opciones')));
     }
 
     public function confirmacionInsumosUtilizados(User $user)
     {
         return (in_array(104, Session::get('opciones')));
     }
 
     public function stockCritico(User $user)
     {
         return (in_array(105, Session::get('opciones')));
     }
 
     public function listaPedidos(User $user)
     {
         return (in_array(106, Session::get('opciones')));
     }
 
     public function stock(User $user)
     {
         return (in_array(107, Session::get('opciones')));
     }
 
     public function visarInsumos(User $user)
     {
         return (in_array(108, Session::get('opciones')));
     }
 
     public function visarDevolucion(User $user)
     {
         return (in_array(109, Session::get('opciones')));
     }
 
     public function usoInsumoSinSolicitud(User $user)
     {
         return (in_array(110, Session::get('opciones')));
     }
 
     public function salidas(User $user)
     {
         return (in_array(111, Session::get('opciones')));
     }
 
     public function solicitudExterna(User $user)
     {
         return (in_array(112, Session::get('opciones')));
     }
 
     public function cargaHermes(User $user)
     {
         return (in_array(113, Session::get('opciones')));
     }
 
     public function vaciadoStockExcel(User $user)
     {
         return (in_array(114, Session::get('opciones')));
     }
 
     public function solicitudTranslado(User $user)
     {
         return (in_array(908, Session::get('opciones')));
     }
 
     public function solicitudPostOperacion(User $user)
     {
         return (in_array(917, Session::get('opciones')));
     }
 
     // Solicitud Pabellon
     public function solicitudDePabellon(User $user)
     {
         return (in_array(300, Session::get('opciones')));
     }
 
     public function ingresoSolicitud(User $user)
     {
         return (in_array(301, Session::get('opciones')));
     }
 
     public function misSolicitudesQuirurgicas(User $user)
     {
         return (in_array(302, Session::get('opciones')));
     }
 
     public function asignacion(User $user)
     {
         return (in_array(303, Session::get('opciones')));
     }
 
     public function agendaPabellones(User $user)
     {
         return (in_array(304, Session::get('opciones')));
     }
 
     public function ingresoSolicitudAntigua(User $user)
     {
         return (in_array(306, Session::get('opciones')));
     }
 
     public function estadoSolicitud(User $user)
     {
         return (in_array(307, Session::get('opciones')));
     }
 
     public function suspenderIQ(User $user)
     {
         return (in_array(309, Session::get('opciones')));
     }
 
     // Lista Espera
     public function listaEspera(User $user)
     {
         return (in_array(325, Session::get('opciones')));
     }
 
     public function gestionListaEspera(User $user)
     {
         return (in_array(305, Session::get('opciones')));
     }
 
     public function rnle(User $user)
     {
         return (in_array(308, Session::get('opciones')));
     }
 
     public function bajaListaEspera(User $user)
     {
         return (in_array(326, Session::get('opciones')));
     }
 
     public function desvinculacion(User $user)
     {
         return (in_array(327, Session::get('opciones')));
     }
 
     public function intervencionesEditadas(User $user)
     {
         return (in_array(916, Session::get('opciones')));
 
     }
 
     // Enfermeria
     public function enfermeria(User $user)
     {
         return (in_array(350, Session::get('opciones')));
     }
 
     public function procesoEnfermeria(User $user)
     {
         return (in_array(351, Session::get('opciones')));
     }
 
     public function visarPausa(User $user)
     {
         return (in_array(352, Session::get('opciones')));
     }
 
     public function historialEnfermeria(User $user)
     {
         return (in_array(353, Session::get('opciones')));
     }
 
     public function recuperacion(User $user)
     {
         return (in_array(354, Session::get('opciones')));
     }
 
     public function hojaDeTraslado(User $user)
     {
         return (in_array(355, Session::get('opciones')));
     }
 
     public function trasladosRealizados(User $user)
     {
         return (in_array(356, Session::get('opciones')));
     }
 
     // Pre-Operatorio sin Solicitud
     public function preOperatorioSinSolicitud(User $user)
     {
         return (in_array(360, Session::get('opciones')));
     }
 
     public function ingresarPreOperatorio(User $user)
     {
         return (in_array(361, Session::get('opciones')));
     }
 
     public function gestionPreOperatorio(User $user)
     {
         return (in_array(362, Session::get('opciones')));
     }
 
     //Protocolo
     public function protocolo(User $user)
     {
         return (in_array(400, Session::get('opciones')));
     }
 
     public function ingresarProtocolo(User $user)
     {
         return (in_array(401, Session::get('opciones')));
     }
 
     public function listaProtocolo(User $user)
     {
         return (in_array(402, Session::get('opciones')));
     }
 
     public function historial(User $user)
     {
         return (in_array(403, Session::get('opciones')));
     }
 
     public function historialVer(User $user)
     {
         return (in_array(404, Session::get('opciones')));
     }
 
     public function misProtocolos(User $user)
     {
         return (in_array(405, Session::get('opciones')));
     }
 
     public function estadisticas(User $user)
     {
         return (in_array(406, Session::get('opciones')));
     }
 
     public function misParticipaciones(User $user)
     {
         return (in_array(407, Session::get('opciones')));
     }
 
     public function protocoloProcuramiento(User $user)
     {
         return (in_array(912, Session::get('opciones')));
     }
 
     public function listaDeAnalisisReoperaciones(User $user)
     {
         return (in_array(918, Session::get('opciones')));
     }
 
     // Pabellon
     public function pabellon(User $user)
     {
         return (in_array(500, Session::get('opciones')));
     }
 
     public function quintoPiso(User $user)
     {
         return (in_array(501, Session::get('opciones')));
     }
 
     public function estadisticasIngreso(User $user)
     {
         return (in_array(502, Session::get('opciones')));
     }
 
     //Informes
     public function informes(User $user)
     {
         return (in_array(600, Session::get('opciones')));
     }
 
     public function vaciadoIntervenciones(User $user)
     {
         return (in_array(601, Session::get('opciones')));
     }
 
     public function revisarDiagnostico(User $user)
     {
         return (in_array(603, Session::get('opciones')));
     }
 
     public function produccionPabellon(User $user)
     {
         return (in_array(604, Session::get('opciones')));
     }
 
     public function ugsqMinsal(User $user)
     {
         return (in_array(605, Session::get('opciones')));
     }
 
     public function informePrestaciones(User $user)
     {
         return (in_array(606, Session::get('opciones')));
     }
 
     public function informeCardioCirugia(User $user)
     {
         return (in_array(607, Session::get('opciones')));
     }
 
     public function solicitudIntervencionSinProtocolo(User $user)
     {
         return (in_array(608, Session::get('opciones')));
     }
 
     public function estadoListaEsperaHistorica(User $user)
     {
         return (in_array(609, Session::get('opciones')));
     }
 
     public function estadoInsumos(User $user)
     {
         return (in_array(610, Session::get('opciones')));
     }
 
     public function usoDePabellon(User $user)
     {
         return (in_array(611, Session::get('opciones')));
     }
 
     public function tiempoOperatorio(User $user)
     {
         return (in_array(612, Session::get('opciones')));
     }
 
     public function informePrestacionesSIGGES(User $user)
     {
         return (in_array(613, Session::get('opciones')));
     }
 
     public function vaciadoCompleto(User $user)
     {
         return (in_array(614, Session::get('opciones')));
     }
 
     public function medidaMinisterial(User $user)
     {
         return (in_array(615, Session::get('opciones')));
     }
 
     public function cmdbUGCQsegundaEtapa(User $user)
     {
         return (in_array(616, Session::get('opciones')));
     }
 
     public function estudioDeEficiencia(User $user)
     {
         return (in_array(617, Session::get('opciones')));
     }
 
     public function indicadoresCalidad(User $user)
     {
         return (in_array(909, Session::get('opciones')));
     }
 
     public function produccionEquipoQuirurgico(User $user)
     {
         return (in_array(910, Session::get('opciones')));
     }
 
     public function produccionCirujanos(User $user)
     {
         return (in_array(911, Session::get('opciones')));
     }
 
     public function pausaSeguridadProtocolo(User $user)
     {
         return (in_array(913, Session::get('opciones')));
     }
 
     public function gastosInsumos(User $user)
     {
         return (in_array(914, Session::get('opciones')));
     }
 
     public function cantidadPacientesIntervenidos(User $user)
     {
         return (in_array(915, Session::get('opciones')));
     }
 
     public function informeOncologia(User $user)
     {
         return (in_array(919, Session::get('opciones')));
     }
 
     public function pacientesIngresadosConAnticipacion(User $user)
     {
         return (in_array(920, Session::get('opciones')));
     }
 
     //Mantenedor
     public function mantenedor(User $user)
     {
         return (in_array(800, Session::get('opciones')));
     }
 
     public function equipoClinico(User $user)
     {
         return (in_array(801, Session::get('opciones')));
     }
 
     public function equipoMedico(User $user)
     {
         return (in_array(802, Session::get('opciones')));
     }
 
     public function packInsumos(User $user)
     {
         return (in_array(803, Session::get('opciones')));
     }
 
     public function jerarquiaEquipoMedico(User $user)
     {
         return (in_array(804, Session::get('opciones')));
     }
 
     public function causaDesvincular(User $user)
     {
         return (in_array(805, Session::get('opciones')));
     }
 
     public function pabellonMantenedor(User $user)
     {
         return (in_array(806, Session::get('opciones')));
     }
 
     public function salaRecuperacion(User $user)
     {
         return (in_array(807, Session::get('opciones')));
     }
 
     public function camaRecuperacion(User $user)
     {
         return (in_array(808, Session::get('opciones')));
     }
 
     public function estadoCamaSala(User $user)
     {
         return (in_array(809, Session::get('opciones')));
     }
 
     //Administracion
     public function administracion(User $user)
     {
         return (in_array(900, Session::get('opciones')));
     }

}
