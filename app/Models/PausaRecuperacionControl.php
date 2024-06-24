<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaRecuperacionControl extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_recuperacion_control';
    public $guarded = [];
}
