<?php

namespace App\Http\Controllers;
use Aw\Nusoap\NusoapClient;

use Illuminate\Http\Request;

class InformeBiopsiaController extends Controller
{
    public function fetch($rut, $dv)
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

      // Funcion para traer las biopsias del paciente
      public function getBiopsia(Request $request)
      {
          $rut = str_replace(".","",$request->rut);
          $rut = explode("-", $rut);
          $rut_sd = $rut[0];
          $rut_dv = $rut[1];
          $objSOAP;
          $url = "http://10.6.1.236/pathient/ws/wsnPath.php?wsdl";
          $type = "";
          $proxyhost = "";
          $proxyport = "";
          $proxyusername = "";
          $proxypassword = "";
          $clientError;
          $objSOAP = new NusoapClient($url, $type, $proxyhost, $proxyport, $proxyusername, $proxypassword);
          $clientError = $objSOAP->getError();
          $param = array(
              'rut' => $rut_sd,
              'dv' => $rut_dv
          );
          try{
              $resultado = $objSOAP->call('consultaInforme', $param, '', '', false, true);		
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
        }catch(\Throwable $th){
            $resulto = ( $th->getMessage());
        }
        $xml = simplexml_load_string(utf8_encode($resultado));
        foreach($xml->informe as $informe){
            $arr_pdf[] = $informe->informepdf;	
        }
        for($i = 0; $i < count($arr_pdf); $i++){
            // if($i == $request->fila ){
            $pdf_codificado = $arr_pdf[$i];
            //}
        }
        $decoded = base64_decode($pdf_codificado);
        header('Content-Type: application/pdf');
        echo $decoded;
    }
}
