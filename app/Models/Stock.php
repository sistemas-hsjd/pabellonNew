<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'cb_stock';
    
    public function insumo()
    {
		return $this->belongsTo(\App\Models\Insumo::class, 'id_insumo');
    }
}
