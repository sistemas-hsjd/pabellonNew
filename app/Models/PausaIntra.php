<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaIntra extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_intra';
    public $guarded = [];

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
 

}
