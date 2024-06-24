<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaRecuento extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_recuento';
    public $guarded = [];

     // Set
     public function setIdAnestesiologoAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_anestesiologo'] = 0;
         }else{
             $this->attributes['id_anestesiologo'] = $value;
         }
     }
 
     public function setIdArsenaleraAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_arsenalera'] = 0;
         }else{
             $this->attributes['id_arsenalera'] = $value;
         }
     }
 
     public function setIdPabelloneraAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_pabellonera'] = 0;
         }else{
             $this->attributes['id_pabellonera'] = $value;
         }
     }
 
     public function setIdEnfermeraAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_enfermera'] = 0;
         }else{
             $this->attributes['id_enfermera'] = $value;
         }
     }
 
     public function setIdCirujanoAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_cirujano'] = 0;
         }else{
             $this->attributes['id_cirujano'] = $value;
         }
     }
 
     public function setNrRecuentoSuturaAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['nr_recuento_sutura'] = 0;
         }else{
             $this->attributes['nr_recuento_sutura'] = $value;
         }
     }
 
     public function setNrRecuentoAgujaAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['nr_recuento_aguja'] = 0;
         }else{
             $this->attributes['nr_recuento_aguja'] = $value;
         }
     }
 
     public function setNrRecuentoAgujaTotalAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['nr_recuento_aguja_total'] = 0;
         }else{
             $this->attributes['nr_recuento_aguja_total'] = $value;
         }
     }
 
     public function setIdPabelloneraAgujaAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['id_pabellonera_aguja'] = 0;
         }else{
             $this->attributes['id_pabellonera_aguja'] = $value;
         }
     }
 
     public function setGlObservacionAttribute($value) 
     {
         if($value == NULL){
             $this->attributes['gl_observacion'] = '';
         }else{
             $this->attributes['gl_observacion'] = $value;
         }
     }

    // relaciones
    public function gc()
    {
		return $this->hasMany(PausaRecuentoGc::class, 'id_solicitud', 'id_solicitud');
    }

    public function in()
    {
	    return $this->hasMany(PausaRecuentoIn::class, 'id_solicitud', 'id_solicitud');
    }

}
