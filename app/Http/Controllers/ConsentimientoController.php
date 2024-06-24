<?php

namespace App\Http\Controllers;
use App\Models\Consentimiento;
use App\Models\SolicitudPabellon;
use Illuminate\Http\Request;

class ConsentimientoController extends Controller
{
    public function store(Request $request){

        $consentimiento = Consentimiento::updateOrCreate([
            'id_solicitud' => $request->id_solicitud
        ], $request->except('_token'));

        if($consentimiento){
            return "ok";
        }else{
           return "error";
        }
    }
}
