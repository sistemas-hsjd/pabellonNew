<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudInsumoProducto extends Model
{
    use HasFactory;
    protected $table = 'cb_salida';
    protected $appends = ['costo_total', 'costo_total_post'];

    public function stock()
    {
		return $this->belongsTo(\App\Models\Stock::class, 'id_stock');
    }
}
