<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaPre extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_pre';
    public $guarded = [];

     // Set
     public function setFcIngresoServicioAttribute($value) 
     {
         $this->attributes['fc_ingreso_servicio'] = date("Y-m-d H:i:s", strtotime(str_replace("/",".", $value)));
     }
 
     public function setGlAislamientoAttribute($value) 
     {
         $this->attributes['gl_aislamiento'] = $value;
     }
     
     public function setGlProtesisDentalAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_protesis_dental'] = 'NO';
         }else{
             $this->attributes['gl_protesis_dental'] = $value;
         }
     }
 
     public function setGlPielSanaAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_piel_sana'] = 'SI';
         }else{
             $this->attributes['gl_piel_sana'] = $value;
         }
     }

       // Relaciones
    public function cie10()
    {
		return $this->belongsTo(Cie10::class, 'id_diagnostico_pre');
    }
}
