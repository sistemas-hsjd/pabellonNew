<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Protocolo extends Model
{
    use HasFactory;
    protected $table = 'cb_protocolo';
    public $guarded = [];
    protected $appends = ['ges', 'ges_sn', 'lista_espera', 'fecha_intervencion', 'duracion'];

    public function solicitudPabellon()
    {
		  return $this->hasOne(\App\Models\SolicitudPabellon::class, 'id', 'id_solicitud_pabellon');
    }

    public function medico()
    {
		return $this->belongsTo(\App\Models\User::class, 'id_medico');
    }

    public function prestacionesOriginales()
    {
      return $this->belongsToMany(\App\Models\Prestacion::class, 'cb_protocolo_presta', 'id_protocolo', 'id_presta', 'id', 'prs_corr');
    }

    public function prestaciones()
    {
      return $this->belongsToMany(\App\Models\Prestacion::class, 'cb_protocolo_presta_estadistica', 'id_protocolo', 'id_presta', 'id', 'prs_corr');
    }

    public function equipo()
    {
		  return $this->hasMany(\App\Models\ProtocoloEquipo::class, 'id_protocolo');
    }

    public function addendum()
    {
		  return $this->hasMany(\App\Models\ProtocoloAddendum::class, 'id_protocolo');
    }

    public function cie10pre()
    {
		return $this->belongsTo(\App\Models\Cie10::class, 'id_diagnostico_pre');
    }

    public function cie10post()
    {
		  return $this->belongsTo(\App\Models\Cie10::class, 'id_diagnostico_pos');
    }

    public function pabellon()
    {
		  return $this->belongsTo(\App\Models\Pabellon::Class, 'id_pabellon')->withDefault(["gl_nombre" => "Sin Información"]);
    }
    
    // Set
    public function setFcEntradaPabellonAttribute($value) 
    {
        $this->attributes['fc_entrada_pabellon'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }
    
    public function setFcSalidaPabellonAttribute($value) 
    {
        $this->attributes['fc_salida_pabellon'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }
    
    public function setFcInicioAnesteciaAttribute($value) 
    {
        $this->attributes['fc_inicio_anestecia'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }
    
    public function setFcFinAnesteciaAttribute($value) 
    {
        $this->attributes['fc_fin_anestecia'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }
    
    public function setFcInicioIntervencionAttribute($value) 
	  {
		    $this->attributes['fc_inicio_intervencion'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }
    
    public function setFcFinIntervencionAttribute($value) 
    {
        $this->attributes['fc_fin_intervencion'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
    }

    public function getGesAttribute()
    {
        if($this->bo_auge == 1): return "GES";else: return "No GES"; endif;
    }

    public function getGesSnAttribute()
    {
        if($this->bo_auge == 1): return "S";else: return "N"; endif;
    }

    public function getListaEsperaAttribute()
    {
        if($this->bo_lista_espera == 1): return "SI";else: return "NO"; endif;
    }
  
    public function getFechaIntervencionAttribute()
    {
        $fecha_intervencion = date('d/m/Y', strtotime(str_replace("/",".",$this->fc_entrada_pabellon)));
        return "{$fecha_intervencion}";
    }

    public function getDuracionAttribute()
    {
        $inicioInt = new DateTime($this->fc_inicio_intervencion);
        $terminoInt = new DateTime($this->fc_fin_intervencion);
        $interval = $inicioInt->diff($terminoInt);
        return $interval->format("%H:%i");
    }

}
