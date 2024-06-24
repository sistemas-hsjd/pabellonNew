<?php

namespace App\Http\Controllers;
use Freshwork\ChileanBundle\Rut;
use App\Models\Paciente;
use App\Models\GenPais;
use App\Models\SolicitudPabellon;
use App\Models\GenComuna;
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
                $paciente = Paciente::with('clasificacionFonasa')->whereRaw('nr_ficha = ? ', [$request->ficha])->first();
        }else if($request->filled('run')){
            if(Rut::parse($request->run)->validate()){
                $rut = Rut::parse($request->run)->format(Rut::FORMAT_WITH_DASH);
                $rut = explode("-", $rut); 
                $paciente = Paciente::with('clasificacionFonasa')->whereRaw('nr_run = ? AND tx_digito_verificador = ?', [$rut[0], $rut[1]])->first();
            }else{
                return "rut incorrecto";
            }
        }else{
            return "metodo busqueda";
        }

        if($paciente){
            $solicitudes = SolicitudPabellon::with('prestaciones', 'equipoMedico', 'pabellon', 'estado', 'consentimiento', 'asignacion', 'protocolo')->where('id_paciente', $paciente->id)->orderBy('id', 'desc')->get();
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
        
    }

    public function store(Request $request){


        // apellidoM "LIZAMA"
        // apellidoP "BALLESTEROS"
        // comuna_id "345"
        // direccion "PSJE VILLA JARDIN 3050"
        // fecha_nacimiento "1947-08-10"
        // ficha "2509698"
        // fonasaClasif "4"
        // id_comuna "345"
        // nombres "SERGIO"
        // prevision_id "1"
        // rut "5822520-7"
        // sexo_id "1"
        // telefono "null"
        // tipoIdent "rut"

        // return $request;

        switch ($request->tipoIdent) {
            case 'rut':
                $rut = str_replace(".","", $request->rut);
                $rut = explode("-", $rut);
                $id_tipo_ident = 1;
                break;
            case 'ficha':
               // echo "es ficha";
                $ficha = $request->ficha;
                $id_tipo_ident = 5;
                break;
        }

        $pacienteRequest = [
            'id_tipo_dentificacion_paciente'=> $id_tipo_ident,
            'nr_run'=> $rut[0],
            'tx_digito_verificador'=> $rut[1],
            'nr_ficha'=> $request->ficha,
            'tx_apellido_paterno'=> $request->apellidoP,
            'tx_apellido_materno'=> $request->apellidoM,
            'tx_nombre'=> $request->nombres,
            'id_comuna'=> $request->id_comuna,
            'id_sexo'=> $request->sexo_id,
            'fc_nacimiento'=> date("Y-m-d", strtotime(str_replace("/",".", $request->fecha_nacimiento))),
            'tx_direccion'=> $request->direccion,
            'tx_telefono'=> $request->telefono,
            'id_prevision'=> $request->prevision_id,
            'id_clasificacion_fonasa'=> $request->id_clasificacion_fonasa
        ];
    
        $paciente = Paciente::updateOrCreate(['id' => $request->id], $pacienteRequest);
        if($paciente){
            return 'ok';
        }else{
            return 'error';
        }
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

    public function getClasificacionFonasa(){
        $ficha = 2318637;
        return $paciente = Paciente::with('clasificacionFonasa')->whereRaw('nr_ficha = ? ', [$ficha])->first();
    }

}
