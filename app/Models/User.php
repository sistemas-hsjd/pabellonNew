<?php

namespace App\Models;

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
		return $this->hasOne(\App\Models\UserPortal::class, 'rut', 'gl_rut');
    }

    public function Perfiles()
    {
        return $this->belongsToMany(\App\Models\Perfil::class, 'cb_labor', 'id_usuario', 'id_perfil');
    }

    public function Bodegas()
    {
        return $this->belongsToMany(\App\Models\Bodega::class, 'cb_usuario_bodega', 'id_usuario', 'id_bodega');
    }

    public function Especialidades()
    {
        return $this->belongsToMany(\App\Models\Especialidad::class, 'cb_usuario_especialidad', 'id_usuario', 'id_especialidad');
    }

    public function EquiposMedicos()
    {
        return $this->belongsToMany(\App\Models\EquipoMedico::class, 'cb_usuario_equipo', 'id_usuario', 'id_equipo_medico');
    }

    public function Pabellones()
    {
        return $this->belongsToMany(\App\Models\Pabellon::class, 'cb_usuario_pabellon', 'id_usuario', 'id_pabellon');
    }

}
