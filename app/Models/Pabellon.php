<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabellon extends Model
{
    use HasFactory;
    protected $table = 'cb_pabellon';
    public $guarded = [];
    
    protected $appends = ['nombre'];

    public function getNombreAttribute()
    {
        if($this->gl_seudonimo): return "{$this->gl_nombre} ({$this->gl_seudonimo})"; endif;
        return "$this->gl_nombre";
    }
}
