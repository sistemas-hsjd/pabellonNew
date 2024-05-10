<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'cb_perfil';
    public $guarded = [];

    public function Opciones()
    {
        return $this->belongsToMany(\App\Models\Opcion::class, 'cb_permiso', 'id_perfil', 'id_opcion');
    }
}
