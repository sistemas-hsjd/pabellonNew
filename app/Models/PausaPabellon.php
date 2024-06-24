<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaPabellon extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_lista_pabellon';
    
    public $guarded = [];

    // Set
    public function setGlEnergiaAttribute($value) 
	{
		$this->attributes['gl_energia'] = $value;
    }

}
