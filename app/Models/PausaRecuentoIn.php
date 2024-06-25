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

    public static function boot()
    {
        parent::boot();

        static::creating(function($pausaRecuentoIn)
        {
            $pausaRecuentoIn->id_responsable = 2590;
        });
        
        static::created(function($pausaRecuentoIn)
        {
            $pausaRecuentoIn->id_responsable = 2590;
        });
    }
     
    // Relaciones
    public function pabellonera()
    {
        return $this->belongsTo(Medico::class, 'id_pabellonera');
    }
}
