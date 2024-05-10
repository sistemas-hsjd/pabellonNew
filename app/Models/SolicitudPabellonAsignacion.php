<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPabellonAsignacion extends Model
{
    use HasFactory;
    protected $table = 'cb_solicitud_pabellon_asignacion';

    public function pabellon()
    {
		return $this->belongsTo(\App\Models\Pabellon::class, 'id_pabellon');
    }

    public function nrPabellon()
    {
	    return $this->belongsTo(\App\Models\NrPabellon::class, 'id_nr_pabellon');
    }

    public function personal()
    {
	    return $this->hasMany(\App\Models\SolicitudPabellonPersonal::class, 'id_nr_pabellon', 'id_nr_pabellon')->where('fc_solicutud', Carbon::parse($this->fc_inicio)->format('Y-m-d'));
    }

    public function condicional()
    {
	    return $this->belongsTo(\App\Models\SolicitudPabellonAsignacionCondicional::class, 'bo_condicional');
    }

}
