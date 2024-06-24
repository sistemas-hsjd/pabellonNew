<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausaIntraDrenaje extends Model
{
    use HasFactory;
    protected $table = 'cb_pausa_intra_drenaje';

    public $guarded = [];
    public $timestamps = false;
}
