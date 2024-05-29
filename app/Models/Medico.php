<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'cb_medico_ncr';
    protected $appends = ['id', 'nombre', 'rut'];
    protected $guarded = [];

    protected $primaryKey = 'pro_cod';

    public function getIdAttribute()
    {
        return "{$this->pro_cod}";
    }
    public function getNombreAttribute()
    {
        return ucwords(mb_strtolower("{$this->pro_nombres} {$this->pro_apepat} {$this->pro_apemat}"));
    }

    public function getRutAttribute()
    {
        return "{$this->pro_rut}-{$this->pro_digito}";
    }

    public function labores()
    {
        return $this->belongsToMany(Labor::class, 'cb_medico_cod_ncr', 'pro_cod', 'tla_cod', 'pro_cod', 'cod_car');
    }
}
