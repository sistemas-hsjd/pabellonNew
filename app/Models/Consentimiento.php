<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consentimiento extends Model
{
    use HasFactory;
    protected $table = 'cb_solicitud_pabellon_consentimiento';

    public $guarded = [];
    public $timestamps = false;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($consentimiento)
    //     {
    //         $consentimiento->id_medico = Auth::id();
    //     });
          
    //     static::created(function($consentimiento)
    //     {
    //         $consentimiento->id_medico = Auth::id();
    //     });
    // }

    // relaciones
    public function medico()
    {
		return $this->belongsTo(User::class, 'id_medico');
    }
}
