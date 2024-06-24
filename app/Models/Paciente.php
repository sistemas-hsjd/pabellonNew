<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
    use HasFactory;
    // protected $fillable = ['id_tipo_dentificacion_paciente'];
    protected $connection = 'generales';
    protected $table = 'gen_paciente';
    public $guarded = [];

    // Appends
    protected $appends = ['id_tipo_identificacion', 'identificacion', 'nombre', 'rut', 'rut_sin_puntos', 'fecha_nacimiento', 'edad', 'edad_num'];

    public function getIdTipoIdentificacionAttribute(){ // Esta mal escrito en la base de datos
        return $this->id_tipo_dentificacion_paciente;
    }

    public function getIdentificacionAttribute(){
        if($this->id_tipo_dentificacion_paciente == 1){
            if ($this->nr_run == 0 || $this->nr_run == null): return "Sin Información"; endif;
            $nr_run = $this->formatCLP($this->nr_run);
            return "{$nr_run}-{$this->tx_digito_verificador}";
        }elseif($this->id_tipo_dentificacion_paciente == 2){
            return $this->tx_pasaporte;
        }else{
            if ($this->nr_run == 0 || $this->nr_run == null): return ''; endif;
            $nr_run = $this->formatCLP($this->nr_run);
            return "{$nr_run}-{$this->tx_digito_verificador}";
        }
    }

    public function getNombreAttribute()
    {
        return ucwords(mb_strtolower("{$this->tx_nombre} {$this->tx_apellido_paterno} {$this->tx_apellido_materno}"));
    }

    public function getRutAttribute()
    {
        if ($this->nr_run == 0 || $this->nr_run == null): return "Sin Información"; endif;
        $nr_run = $this->formatCLP($this->nr_run);
        return "{$nr_run}-{$this->tx_digito_verificador}";
    }

    public function getRutSinPuntosAttribute()
    {
        return str_replace(".", "", $this->rut);
    }

    public function getFechaNacimientoAttribute()
    {
        if($this->fc_nacimiento != null && $this->fc_nacimiento != '0000-00-00'){
            $fecha_nacimiento = date('d/m/Y', strtotime(str_replace("/", ".", $this->fc_nacimiento)));
            return "{$fecha_nacimiento}";
        }else{
            return "Sin Información";
        }
    }

    public function getEdadAttribute(){
        if($this->fc_nacimiento != null && $this->fc_nacimiento != '0000-00-00'){
            $f1 = Carbon::createFromFormat('Y-m-d', $this->fc_nacimiento);
            $f2 = Carbon::now();
            $anos = $f2->diff($f1)->format('%y años');
            // solo si es menor de 3 años mostrar años con meses y días
            if ($f2->diff($f1)->y < 3) {
                $dias = $f2->diff($f1)->format('%d días');
                $meses = $f2->diff($f1)->format('%m meses');
                $anos = $f2->diff($f1)->format('%y años');

                if($f2->diff($f1)->format('%d') == '1')
                    $dias = $f2->diff($f1)->format('%d día');
                if($f2->diff($f1)->format('%m') == '1')
                    $meses = $f2->diff($f1)->format('%m mes');
                if($f2->diff($f1)->format('%y') == '1')
                    $anos = $f2->diff($f1)->format('%y año');

                if ($f2->diff($f1)->y == 0) {
                    if ($f2->diff($f1)->format('%m') == '0'){
                        return $dias;
                    } 
                    return "{$meses} y {$dias}";
                }
                
                return "{$anos} con {$meses} y {$dias}";
            }
            return $anos;
        }
        return 'Sin Información';
    }

    public function getEdadNumAttribute(){
        if($this->fc_nacimiento != null && $this->fc_nacimiento != '0000-00-00'){
            $f1 = Carbon::createFromFormat('Y-m-d', $this->fc_nacimiento);
            $f2 = Carbon::now();
            $anos = $f2->diff($f1)->format('%y');
            return $anos;
        }
        return false;
    }

     // Otras funciones
     function formatCLP($n)
    {
         return is_int($n) ? number_format($n, 0, ',', '.') : null;
    }

    public function clasificacionFonasa()
    {
        return $this->hasOne(GenClasificacionFonasa::class, 'id', 'id_clasificacion_fonasa');
    }

   


}