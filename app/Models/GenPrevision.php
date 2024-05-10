<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenPrevision extends Model
{
    use HasFactory;
    protected $connection = 'generales';
    protected $table = 'gen_prevision';
}
