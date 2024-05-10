<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use App\Models\GenPais;
use App\Models\User;
use App\Models\GenSexo;
use App\Models\GenPrevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Freshwork\ChileanBundle\Rut;
use nusoap_client;

use Aw\Nusoap\NusoapClient;

class AplicationController extends Controller
{
    public function __invoke(){
        return view('contenidos.contenido');
    }

    public function buscarFicha(Request $request){
        if(Rut::parse($request->run)->validate()){
            $rut = Rut::parse($request->run)->format(Rut::FORMAT_WITH_DASH);
            $rut = explode("-", $rut);
            echo $this->getBiopsia($rut);
            $paciente = Paciente::whereRaw('nr_run = ? AND tx_digito_verificador = ?', [$rut[0], $rut[1]])->first();

            //echo $paciente;
        }else{
            echo 'es falso';
        }

        //return Paciente::first();
        ////return $paises = GenPais::all();
        //return $users = DB::connection('generales')->select('select * from generales.gen_paciente');
        ////return $users = DB::connection('generales')->select('select * from generales.gen_paciente');
    }

    public function verPacientes(Request $request){
       return $request;
    }

    public function getSexo(Request $request){
        return GenSexo::whereRaw('id = ?', [$request->id])->first();
    }

    public function getPrevision(Request $request){
        return GenPrevision::whereRaw('id = ?', [$request->id])->first();
    }
}
