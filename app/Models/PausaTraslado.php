<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaTraslado extends Model
{
    use HasFactory;
    protected $table = 'cb_traslado_solicitud';
    public $guarded = [];

    public function intraSonda()
    {
		return $this->hasMany(\App\Models\PausaTrasladoIntraSonda::class, 'id_solicitud', 'id_solicitud');
    }
}
