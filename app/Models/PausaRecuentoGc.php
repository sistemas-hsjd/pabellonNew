<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaRecuentoGc extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_recuento_gc';

    public $guarded = [];
    public $timestamps = false;

    // Relaciones
    public function pabellonera()
    {
		return $this->belongsTo(Medico::class, 'id_pabellonera');
    }
    
}
