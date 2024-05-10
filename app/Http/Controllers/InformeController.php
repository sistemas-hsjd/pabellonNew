<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aw\Nusoap\NusoapClient;

class InformeController extends Controller
{
    public function fetch(String $rut, String $dv)
    {
        $informes = [];
        $objSOAP = "";
        $url = "http://10.6.1.236/pathient/ws/wsnPath.php?wsdl";
        $type = "";
        $proxyhost = "";
        $proxyport = "";
        $proxyusername = "";
        $proxypassword = "";
        $clientError = "";

        $objSOAP = new NusoapClient($url, $type, $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $clientError = $objSOAP->getError();

        try {
            $resultado = $objSOAP->call('consultaInforme', [ "rut" => $rut, "dv" => $dv ], '', '', false, true);         
                if ($objSOAP->fault) {
                    $resulto = $resultado;
                } else {
                    $error = $objSOAP->getError();
                    if ($error) {
                        $resulto = $error;
                    } else {
                        $resulto = $resultado;
                    }
                }

                $xml = simplexml_load_string(utf8_encode($resultado));
                if(isset($xml->informe)){

                    foreach ($xml->informe as $informe) {
                        $informes[] = $informe;
                    }

                    $cuenta_biopsia = count($xml->xpath('//informe'));
                    $resultado_consulta = $xml->resultado;
                }
        } catch(\Throwable $th) {
            $resulto = ($th->getMessage());
        }
        
        return [
            "informes" => $informes,
            "resultado_consulta" => $resultado_consulta,
            "cuenta_biopsia" => $cuenta_biopsia
        ];
    }
}
