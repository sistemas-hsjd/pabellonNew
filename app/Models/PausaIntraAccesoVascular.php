<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaIntraAccesoVascular extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_intra_acceso_vascular';

    public $guarded = [];
    public $timestamps = false;

    // Boot
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($accesoVascular)
    //     {
    //         $accesoVascular->id_usuario = Auth::id();
    //     });
          
    //     static::created(function($accesoVascular)
    //     {
    //         $accesoVascular->id_usuario = Auth::id();
    //     });
    // }

    // Relaciones
    public function responsable()
    {
		return $this->belongsTo(Medico::class, 'id_responsable');
    }
}
