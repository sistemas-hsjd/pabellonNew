<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EquipoMedico extends Model
{
    use HasFactory;
    protected $table = 'cb_equipo_medico';

    public function Solicitudes(): HasMany
    {
        return $this->hasMany(SolicitudPabellon::class, 'id_equipo', 'id');
    }

}
