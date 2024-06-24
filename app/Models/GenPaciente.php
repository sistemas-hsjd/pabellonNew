<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenPaciente extends Model
{
    use HasFactory;
    // protected $connection = 'generales';
    // protected $table = 'gen_paciente';


    // public function clasificacionFonasa()
    // {
	// 	return $this->belongsTo(GenClasificacionFonasa::class, 'id_clasificacion_fonasa');

        
    // }

    public function clasificacionFonasa()
    {
        return $this->hasOne(GenClasificacionFonasa::class);
    }

}
