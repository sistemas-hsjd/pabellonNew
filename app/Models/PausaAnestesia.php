<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaAnestesia extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_lista_anestesia';

    public $guarded = [];

    // Set
    public function setGlBicAttribute($value) 
	{
		$this->attributes['gl_bic'] = implode(",", $value);
    }
}
