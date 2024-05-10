<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    use HasFactory;
    protected $table = 'cb_cod_cirugia_ncr';
    protected $appends = ['id', 'gl_nombre'];
    
    public function getIdAttribute()
    {
        return "{$this->cod_car}";
    }

    public function getGlNombreAttribute()
    {
        return "{$this->cod_des}";
    }
}
