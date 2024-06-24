<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SolicitudPabellon extends Model
{
    use HasFactory;
    protected $table = 'cb_solicitud_pabellon';
    public $guarded = [];
    protected $appends = ['c_int', 'nombre', 'fecha_ingreso', 'fecha_solicitud', 'fecha_intervencion', 'fecha_salida_espera', 're_intervencion', 'lista_espera', 'auge', 'cancer', 'cama_critica', 'latex', 'sangre', 'radiologia'];
    
    // set
    public function setGlTipoIdentificacionAttribute($value) 
	  {
        switch($value){
            case '1':
                $this->attributes['gl_tipo_identificacion'] = 'Rut';
                break;
            case '2':
                $this->attributes['gl_tipo_identificacion'] = 'Pasaporte';
                break;
            case '3':
                $this->attributes['gl_tipo_identificacion'] = 'VACIO';
                break;	
        }
    }

    public function setNrFichaAttribute($value) 
	  {
        if($value == null){
            $this->attributes['nr_ficha'] = 0;
        }else{
            $this->attributes['nr_ficha'] = $value;
        }
    }

    public function setGlGeneroAttribute($value) 
	  {
        switch($value){
            case '1':
                $this->attributes['gl_genero'] = 'M';
                break;
            case '2':
                $this->attributes['gl_genero'] = 'F';
                break;	
        }
    }

    public function setGlPrevisionAttribute($value) 
	  {
        switch($value){
            case 'A':
                $this->attributes['gl_prevision'] = 'BA';
                break;
            case 'B':
                $this->attributes['gl_prevision'] = 'BB';
                break;
            case 'C':
                $this->attributes['gl_prevision'] = 'BC';
                break;
            case 'D':
                $this->attributes['gl_prevision'] = 'BD';
                break;
            case '2':
                $this->attributes['gl_prevision'] = 'I';
                break;
            case '3':
                $this->attributes['gl_prevision'] = 'CC';
                break;
            case '4':
                $this->attributes['gl_prevision'] = 'CD';
                break;	
            case '5':
                $this->attributes['gl_prevision'] = 'SI';
                break;
            case '6':
                $this->attributes['gl_prevision'] = ''; //
                break;
            case '7':
                $this->attributes['gl_prevision'] = ''; //
                break;
            case '8':
                $this->attributes['gl_prevision'] = 'P';
                break;	
        }
    }

    public function setGlNeonatoGeneroAttribute($value) 
    {
        switch($value){
            case '1':
              $this->attributes['gl_neonato_genero'] = $this->gl_genero;
              break;
            case '0':
              $this->attributes['gl_neonato_genero'] = '';
              break;	
        }
    }

    public function setGlTelefonoAttribute($value) 
	  {
        if(!isset($value) && $value == null){
            $this->attributes['gl_telefono'] = '';
        }else{
            $this->attributes['gl_telefono'] = $value;
        }
    }

    public function setGlObservacionAttribute($value) 
    {
      if(!isset($value) && $value == null){
            $this->attributes['gl_observacion'] = '';
      }else{
            $this->attributes['gl_observacion'] = $value;
      }
    }

    public function setGlSalaAttribute($value) 
	{
        if(!isset($value) && $value == null){
            $this->attributes['gl_sala'] = '';
        }else{
            $this->attributes['gl_sala'] = $value;
        }
    }

    public function setGlCamaAttribute($value) 
	{
        if(!isset($value) && $value == null){
            $this->attributes['gl_cama'] = '';
        }else{
            $this->attributes['gl_cama'] = $value;
        }
    }

    public function setNrOrdenAttribute($value) 
	{
        if(!isset($value) && $value == null){
            $this->attributes['nr_orden'] = '';
        }else{
            $this->attributes['nr_orden'] = $value;
        }
    }

    public function setGlDiagnostico2Attribute($value) 
	{
        if(!isset($value) && $value == null){
            $this->attributes['gl_diagnostico_2'] = '';
        }else{
            $this->attributes['gl_diagnostico_2'] = $value;
        }
    }

    public function setGlIntervencionAttribute($value) 
	{
        if(!isset($value) && $value == null){
            $this->attributes['gl_intevension'] = '';
        }else{
            $this->attributes['gl_intevension'] = $value;
        }
    }

    public function setFcIntervencionAttribute($value) 
	{
        if($value == null){
            $this->attributes['fc_intervencion'] = '0000-00-00';
        }else{
            $this->attributes['fc_intervencion'] = $value;
        }
    }

    public function setTmEstimadoAttribute($value) 
	{
        if($value == null){
            $this->attributes['tm_estimado'] = '00:00:00';
        }else{
            $this->attributes['tm_estimado'] = $value;
        }
    }

    public function getNombreAttribute()
    {
        return ucwords(mb_strtolower("{$this->gl_nombre} {$this->gl_paterno} {$this->gl_materno}"));
    }

    public function getFechaIngresoAttribute()
    {
        $fecha_ingreso = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_ingreso)));
        return "{$fecha_ingreso}";
    }

    public function getFechaSolicitudAttribute() //Fecha en la que se asigna una fecha para la intervencion
    {
        if($this->bo_lista_espera == 1 && $this->fc_salida_espera != '0000-00-00 00:00:00'){
            $fecha_solicitud = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_salida_espera)));
            return "{$fecha_solicitud}";
        }elseif($this->bo_lista_espera == 1 && $this->fc_salida_espera == '0000-00-00 00:00:00' && $this->id_estado == 1){
            return "Pendiente";
        }elseif($this->bo_lista_espera == 1 && $this->fc_salida_espera == '0000-00-00 00:00:00' && $this->id_estado != 1){
            return "No Registrada";
        }else{
            $fecha_solicitud = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_ingreso)));
            return "{$fecha_solicitud}";
        }
    }

    public function getFechaIntervencionAttribute()
    {
        if($this->fc_intervencion != null && $this->fc_intervencion != '0000-00-00'){
            $fecha_intervencion = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_intervencion)));
            return "{$fecha_intervencion}";
        }else{
            return "Sin Información";
        }
    }

    public function getFechaSalidaEsperaAttribute()
    {
        if($this->fc_salida_espera != null && $this->fc_salida_espera != '0000-00-00 00:00:00'){
            $fecha_salida_espera = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_salida_espera)));
            return "{$fecha_salida_espera}";
        }else{
            return null;
        }
    }

    public function getReIntervencionAttribute()
    {
        if($this->bo_re_intervencion == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getListaEsperaAttribute()
    {
        if($this->bo_lista_espera == 1 && $this->id_estado == 1 && $this->id_jefe_equipo == 0): return 'Lista Espera'; endif;
    }

    public function getAugeAttribute()
    {
        if($this->bo_auge == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getCancerAttribute()
    {
        if($this->bo_cancer == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getCamaCriticaAttribute()
    {
        if($this->bo_cama_critica == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getLatexAttribute()
    {
        if($this->bo_latex == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getSangreAttribute()
    {
        if($this->bo_sangre == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getRadiologiaAttribute()
    {
        if($this->bo_radiologia == 1){
            return 'Si';
        }else{
            return 'No';
        }
    }

    public function getCIntAttribute()
    {
        if($this->gl_tipo_intervencion == 'Programada' || $this->gl_tipo_intervencion == 'Agregada'): return "E";else: return "U"; endif;
    }

    // relaciones
    public function equipoMedico()
    {
		return $this->belongsTo(EquipoMedico::class, 'id_equipo')->withDefault(["gl_descripcion" => "Sin Información"]);
    }

    public function pabellon()
    {
		return $this->belongsTo(Pabellon::class, 'id_pabellon')->withDefault(["gl_nombre" => "Sin Información"]);
    }

    public function unidad()
    {
		return $this->belongsTo(UnidadDemandante::class, 'id_unidad')->withDefault(["gl_nombre" => "Sin Información"]);
    }

    public function paciente()
    {
		return $this->belongsTo(Paciente::class, 'id_paciente')->withDefault(["gl_nombre" => "Sin ID de Paciente"]); 
    }

    public function usuario()
    {
		return $this->belongsTo(User::class, 'id_usuario');
    }

    public function medico()
    {
		return $this->belongsTo(Medico::class, 'id_medico');
    }

    public function cie10()
    {
	    return $this->belongsTo(Cie10::class, 'id_diagnostico_1');
    }
    
    public function prestaciones()
    {
        return $this->belongsToMany(Prestacion::class, 'cb_solicitud_pabellon_prestacion', 'id_solicitud', 'id_prestacion', 'id', 'prs_corr');
    }

    public function estado()
    {
		return $this->belongsTo(SolicitudPabellonEstado::class, 'id_estado')->withDefault();
    }
    
    public function consentimiento()
    {
		return $this->hasOne(Consentimiento::class, 'id_solicitud');
    }
    
    public function asignacion()
    {
		return $this->hasOne(SolicitudPabellonAsignacion::class, 'id_solicitud');
    }

    public function protocolo()
    {
		return $this->hasOne(Protocolo::class, 'id_solicitud_pabellon');
    }
    
    public function equipo()
    {
		return $this->hasMany(SolicitudPabellonEquipo::class, 'id_solicitud');
    }

    public function pausaPre()
    {
		return $this->hasOne(PausaPre::class, 'id_solicitud');
    }
    
    public function pausaPabellon()
    {
		return $this->hasOne(PausaPabellon::class, 'id_solicitud');
    }
    
    public function pausaAnestesia()
    {
		return $this->hasOne(PausaAnestesia::class, 'id_solicitud');
    }

    public function pausaSeguridad()
    {
		return $this->hasOne(PausaSeguridad::class, 'id_solicitud');
    }

    public function pausaIntra()
    {
		return $this->hasOne(PausaIntra::class, 'id_solicitud');
    }

    public function pausaRecuento()
    {
		return $this->hasOne(PausaRecuento::class, 'id_solicitud');
    }

    public function pausaEpicrisis()
    {
		return $this->hasOne(PausaEpicrisis::class, 'id_solicitud');
    }

    public function pausaRecuperacion()
    {
		return $this->hasOne(PausaRecuperacion::class, 'id_solicitud')->where('id_destino_pabellon', '!=', 18)->where('id_destino_detalle', '!=', 99);
    }

    public function pausaRecuperacionTransitoria()
    {
		return $this->hasOne(PausaRecuperacion::class, 'id_solicitud')->where('id_destino_pabellon', 18)->where('bo_uca', 2);
    }

    public function pausaTraslado()
    {
		return $this->hasOne(PausaTraslado::class, 'id_solicitud');
    }

    public function solicitudesInsumos()
    {
		return $this->hasMany(SolicitudInsumo::class, 'id_solicitud_pabellon');
    }

    public function solicitudesInsumosBodega()
    {
		return $this->hasMany(SolicitudInsumoBodega::class, 'id_solicitud_pabellon');
    }
}
