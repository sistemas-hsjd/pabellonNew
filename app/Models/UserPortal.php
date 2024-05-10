<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortal extends Model
{
    use HasFactory;
    protected $connection = 'generales';
    protected $table = 'users';
}
