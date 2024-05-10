<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudInsumo extends Model
{
    use HasFactory;
    protected $table = 'cb_solicitud';
    protected $appends = ['fecha_solicitud'];

    //SET
    public function getFechaSolicitudAttribute()
    {
        $fecha_solicitud = date('d/m/Y H:i:s', strtotime(str_replace("/", ".", $this->fc_solicitud)));
        return "{$fecha_solicitud}";
    }

    // relaciones
    //arreglar tabla usuarios con la tabla cb_usuario
    public function solicitante()
    {
		  return $this->belongsTo(\App\Models\User::class, 'id_solicitante');
    }
    //arreglar tabla usuarios con la tabla cb_usuario
    public function visaDevolucion()
    {
		return $this->belongsTo(\App\Models\User::class, 'id_visa_devolucion');
    }

    public function solicitudPabellon()
    {
		return $this->belongsTo(\App\Models\SolicitudPabellon::class, 'id_solicitud_pabellon');
    }

    public function estado()
    {
		  return $this->belongsTo(\App\Models\SolicitudInsumoEstado::class, 'id_estado_solicitud')->withDefault();
    }

    public function insumos()
    {
		    return $this->hasMany(\App\Models\SolicitudInsumoProducto::class, 'id_solicitud');
    }


}
