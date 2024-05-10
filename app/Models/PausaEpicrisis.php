<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaEpicrisis extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_epicrisis_enfermeria';
    public $guarded = [];

    // Set
    public function setIdDocumentoAttribute($value) 
	{
		$this->attributes['id_documento'] = implode(",", $value);
    }
}
