<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'cb_usuario';
    protected $guarded = [];
    protected $appends = ['nombre', 'opciones'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($user)
        {
            $password = substr($user->gl_rut, 0, 4);
            $user->gl_clave = $password;
            $user->password = $password;
        });
          
        static::created(function($user)
        {
            $password = substr($user->gl_rut, 0, 4);
            $user->gl_clave = $password;
            $user->password = $password;
        });
    }

    //set
    public function setGlClaveAttribute($value){
        $this->attributes['gl_clave'] = sha1(intval($value));
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt(intval($value));
    }

    //Trae el nombre solo con la primera letra en mayuscula
    public function getNombreAttribute()
    {
        return ucwords(mb_strtolower("{$this->gl_nombre}"));
    }

    //Trae todas las opciones a las que tiene acceso el usuario
    public function getOpcionesAttribute()
    {
        return array_unique(array_merge($this->Perfiles->pluck('Opciones')->collapse()->pluck('id')->toArray(), $this->Perfiles->pluck('Opciones')->collapse()->pluck('id_padre')->toArray()));
    }

    //relaciones
    public function TokenPortal()
    {
		return $this->hasOne(UserPortal::class, 'rut', 'gl_rut');
    }

    public function Perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'cb_labor', 'id_usuario', 'id_perfil');
    }

    public function Bodegas(): BelongsToMany
    {
        return $this->belongsToMany(Bodega::class, 'cb_usuario_bodega', 'id_usuario', 'id_bodega');
    }

    public function Especialidades()
    {
        return $this->belongsToMany(Especialidad::class, 'cb_usuario_especialidad', 'id_usuario', 'id_especialidad');
    }

    public function EquiposMedicos()
    {
        return $this->belongsToMany(EquipoMedico::class, 'cb_usuario_equipo', 'id_usuario', 'id_equipo_medico');
    }

    public function Pabellones()
    {
        return $this->belongsToMany(Pabellon::class, 'cb_usuario_pabellon', 'id_usuario', 'id_pabellon');
    }

}
