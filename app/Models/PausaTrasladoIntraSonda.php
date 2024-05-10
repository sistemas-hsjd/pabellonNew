<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaTrasladoIntraSonda extends Model
{
    use HasFactory;
    protected $table = 'cb_traslado_intra_sonda';
    public $guarded = [];
}
