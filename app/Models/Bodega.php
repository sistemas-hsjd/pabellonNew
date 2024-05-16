<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Bodega extends Model
{
    use HasFactory;
    protected $table = 'cb_bodega';
    public $guarded = [];

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cb_usuario_bodega', 'id_usuario', 'id_bodega');
    }
}
