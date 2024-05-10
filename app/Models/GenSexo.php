<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenSexo extends Model
{
    use HasFactory;
    protected $connection = 'generales';
    protected $table = 'gen_sexo';
}
