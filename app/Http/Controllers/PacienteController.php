<?php

namespace App\Http\Controllers;
use Freshwork\ChileanBundle\Rut;
use App\Models\Paciente;
use App\Models\GenPais;
use App\Models\SolicitudPabellon;
use App\Http\Controllers\InformeBiopsiaController;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected $informeBiopsia;

    public function __construct(InformeBiopsiaController $informeBiopsia)
    {
        $this->informeBiopsia = $informeBiopsia;
    }

    public function getPaciente(Request $request){
        if ($request->filled('run')) {
            if(Rut::parse($request->run)->validate()){
                $rut = Rut::parse($request->run)->format(Rut::FORMAT_WITH_DASH);
                $rut = explode("-", $rut); 
                $paciente = Paciente::whereRaw('nr_run = ? AND tx_digito_verificador = ?', [$rut[0], $rut[1]])->first();
            }else{
                return "rut incorrecto";
            }
        }
        
        return $run;
    }
    
    public function buscarFicha(Request $request){
        if ($request->filled('ficha')) {
                $paciente = Paciente::whereRaw('nr_ficha = ? ', [$request->ficha])->first();
        }else if($request->filled('run')){
            if(Rut::parse($request->run)->validate()){
                $rut = Rut::parse($request->run)->format(Rut::FORMAT_WITH_DASH);
                $rut = explode("-", $rut); 
                $paciente = Paciente::whereRaw('nr_run = ? AND tx_digito_verificador = ?', [$rut[0], $rut[1]])->first();
            }else{
                return "rut incorrecto";
            }
        }else{
            return "metodo busqueda";
        }

        if($paciente){
            $solicitudes = SolicitudPabellon::with('prestaciones', 'equipoMedico', 'pabellon', 'estado', 'consentimiento', 'asignacion', 'protocolo')->where('id_paciente', $paciente->id)->get();
            $informeBiopsia = $this->informeBiopsia->fetch($paciente->nr_run, $paciente->tx_digito_verificador);
            $rut = $paciente->nr_run.'-'.$paciente->tx_digito_verificador; 
            $url = "http://10.4.237.27/epicrisis-hsjd/api/epicrisis/get-all?token=5b7dbd9cf2d88&rut=$rut";
            $data = file_get_contents($url);
            $search  = array('\n\r', '\n', '\r');
            $data = str_replace($search,'',$data);
            $objson = json_decode($data, true);
            $arr_epicrises = $objson['epicrises'];
            if (!isset($arr_epicrises)){
                $arr_epicrises = array();
            }
            return [
                "solicitudes" => $solicitudes,
                "epicrisis" => $arr_epicrises,
                "paciente" => $paciente,
                "informeBiopsia" => $informeBiopsia
            ];
        }else{
            echo "Paciente no encontrado";
        }
        
        // if(Rut::parse($request->run)->validate()){
        //     $rut = Rut::parse($request->run)->format(Rut::FORMAT_WITH_DASH);
        //     $rut = explode("-", $rut); 
     
        //    
        //       
        // }else{
        //     return "Estaaaaa";
        // }
        //return Paciente::first();
        ////return $paises = GenPais::all();
        //return $users = DB::connection('generales')->select('select * from generales.gen_paciente');
        ////return $users = DB::connection('generales')->select('select * from generales.gen_paciente');
    }

    public function getEpicrisis(Request $request){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://10.4.237.27/epicrisis-hsjd/api/epicrisis/pdf?token=5b7dbd9cf2d88&tipo=nuevo&epicrisis_id=$request->id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic Og=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = base64_encode($response);
        echo $response;
    }
}
