<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaSeguridad extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_seguridad';
    public $guarded = [];
    
    // Set
    public function setGlPrevencionUppAttribute($value) 
	{
        if($value == NULL){
            $this->attributes['gl_prevencion_upp'] = '0';
        }else{
            $this->attributes['gl_prevencion_upp'] = implode(",", $value);
        }
    }

    public function setTmProfilaxisAntibioticaAttribute($value) 
	{
        if($value == NULL){
            $this->attributes['tm_profilaxis_antibiotica'] = '00:00';
        }else{
            $this->attributes['tm_profilaxis_antibiotica'] = $value;
        }
    }

}
