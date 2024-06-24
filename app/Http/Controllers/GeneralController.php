<?php

namespace App\Http\Controllers;

use App\Models\GenComuna;
use App\Models\GenPrevision;
use App\Models\Sexo;
use App\Models\GenClasificacionFonasa;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getComunas(){
        $comunas = GenComuna::all();
        $datosFormateados = [];
        foreach ($comunas as $dato) {
            $datosFormateados[] = [
                'id' => $dato->id,
                'text' => $dato->tx_descripcion, 
            ];
        }
        return response()->json($datosFormateados);
    }

    public function getPrevision(){
        $previsiones = GenPrevision::all();
        $datosFormateados = [];
        foreach ($previsiones as $dato) {
            $datosFormateados[] = [
                'id' => $dato->id,
                'text' => $dato->tx_descripcion, 
            ];
        }
        return response()->json($datosFormateados);
    }


    public function getClasificacionFonasa(){
        $clasificaciones = GenClasificacionFonasa::all();
        $datosFormateados = [];
        foreach ($clasificaciones as $dato) {
            $datosFormateados[] = [
                'id' => $dato->id,
                'text' => $dato->tx_descripcion, 
            ];
        }
        return response()->json($datosFormateados);
    }

    public function getSexos(){
        $sexos = Sexo::all();
        $datosFormateados = [];
        foreach ($sexos as $dato) {
            $datosFormateados[] = [
                'id' => $dato->id,
                'text' => $dato->tx_descripcion, 
            ];
        }
        return response()->json($datosFormateados);
    }

}
