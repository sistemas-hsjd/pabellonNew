<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaIntra extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_intra';
    public $guarded = [];

     // Boot
     public static function boot()
     {
         parent::boot();
 
         static::creating(function($pausaIntra)
         {
             $pausaIntra->id_responsable = Auth::id();
         });
         
         static::created(function($pausaIntra)
         {
             $pausaIntra->id_responsable = Auth::id();
         });
     }

     // Set
     public function setGlFolleyAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_folley'] = '';
         }else{
             $this->attributes['gl_folley'] = $value;
         }
     }
 
     public function setGlFolleyBalonAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_folley_balon'] = '';
         }else{
             $this->attributes['gl_folley_balon'] = $value;
         }
     }
 
     public function setIdFolleyInstaladaAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_folley_instalada'] = 0;
         }else{
             $this->attributes['id_folley_instalada'] = $value;
         }
     }
 
     public function setGlAntisepticoAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_antiseptico'] = '';
         }else{
             $this->attributes['gl_antiseptico'] = $value;
         }
     }
 
     public function setIdResponsableAseoAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_responsable_aseo'] = 0;
         }else{
             $this->attributes['id_responsable_aseo'] = $value;
         }
     }
 
     public function setGlObservacionHorarioAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_observacion_horario'] = '';
         }else{
             $this->attributes['gl_observacion_horario'] = $value;
         }
     }

     // relaciones
     public function accesoVascular()
     {
        return $this->hasMany(PausaIntraAccesoVascular::class, 'id_solicitud', 'id_solicitud');
     }
   
     public function drenaje()
     {
        return $this->hasMany(PausaIntraDrenaje::class, 'id_solicitud', 'id_solicitud');
     }
}
