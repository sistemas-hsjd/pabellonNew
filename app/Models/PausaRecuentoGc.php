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


    // cambiar por usurio logueado
    public static function boot()
    {
        parent::boot();

        static::creating(function($pausaRecuento)
        {
            $pausaRecuento->id_responsable = 2590;
        });
        
        static::created(function($pausaRecuento)
        {
            $pausaRecuento->id_responsable = 2590;
        });
    }
    // Relaciones
    public function pabellonera()
    {
		return $this->belongsTo(Medico::class, 'id_pabellonera');
    }
    
}
