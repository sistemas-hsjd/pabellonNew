<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    use HasFactory;
    protected $table = 'cb_presta_ncr';
    protected $appends = ['id', 'nombre', 't_int'];
    
    public function getIdAttribute()
    {
        return "{$this->prs_corr}";
    }

    public function getNombreAttribute()
    {
        return ucwords(mb_strtolower("{$this->prs_cod} - {$this->prs_desc}"));
    }

    public function getTIntAttribute()
    {
        if($this->id_pab > 4): return "MA";else: return "ME"; endif;
    }

    // relaciones
    public function mai()
    {
	    return $this->belongsTo(\App\Models\ArancelMai::class, 'id_mai');
    }

    public function mle()
    {
		return $this->belongsTo(\App\Models\ArancelMle::class, 'id_mai');
    }

    public function particular()
    {
		return $this->belongsTo(\App\Models\ArancelParticular::class, 'id_mai');
    }

    public function protocolo()
    {
        return $this->belongsToMany(\App\Models\Protocolo::class, 'cb_protocolo_presta_estadistica', 'id_presta', 'id_protocolo', 'prs_corr', 'id');
    }

}
