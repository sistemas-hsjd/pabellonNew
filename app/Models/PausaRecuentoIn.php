<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaRecuentoIn extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_recuento_in';

    public $guarded = [];
    public $timestamps = false;
     
    // Relaciones
    public function pabellonera()
    {
        return $this->belongsTo(Medico::class, 'id_pabellonera');
    }
}
