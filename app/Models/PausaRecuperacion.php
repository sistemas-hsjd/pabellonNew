<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaRecuperacion extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_recuperacion';
    public $guarded = [];

    // public function controles()
    // {
	// 	return $this->hasMany(\App\Models\PausaRecuperacionControl::class, 'id_solicitud', 'id_solicitud');
    // }
}
