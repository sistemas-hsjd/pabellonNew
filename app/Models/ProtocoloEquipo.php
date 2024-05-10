<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocoloEquipo extends Model
{
    use HasFactory;
    protected $table = 'cb_protocolo_medico';
    public $guarded = [];
    public $timestamps = false;

    public function labor()
    {
		return $this->belongsTo(\App\Models\Labor::class, 'cd_labor', 'cod_car');
    }

    public function medico()
    {
		return $this->belongsTo(\App\Models\Medico::class, 'id_medico', 'pro_cod');
    }

}
