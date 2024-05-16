<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Bodega;
use App\Models\Especialidad;
use App\Models\EquipoMedico;
use App\Models\Pabellon;
use App\Models\Labor;
use App\Models\TipoProfesional;
use App\Models\Medico;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getFonasa(Request $request){
        if (Rut::parse($request->rut)->isValid()){
            $arrayRut = Rut::parse($request->rut)->toArray();
            $url = 'mantiza='.$arrayRut[0].'&dv='.$arrayRut[1];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://10.4.237.125/fonasa/get_fonasa.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $url,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }else{
            return 'rut invalido';
        }
    }

    public function getInfoCreateUser(Request $request){
        $tiposProfesionales = TipoProfesional::all();
        $datosFormateados = [];
        foreach ($tiposProfesionales as $dato) {
            $datosFormateados[] = [
                'id' => $dato->gl_codigo,
                'text' => $dato->gl_nombre
            ];
        }

        return[
            "perfiles" => $perfiles = Perfil::get(),
            "bodegas" => $bodegas = Bodega::get(),
            "especialidades" => $especialidades = Especialidad::get(),
            "equiposMedicos" => $equiposMedicos = EquipoMedico::get(),
            "pabellones" => $pabellones = Pabellon::get(),
            "labores" => $labores = Labor::get(),
            "tiposProfesionales" => $datosFormateados
        ];
    }

    public function store(Request $request){
        // return $request->bodegas;
        $dataRequest = [
            'gl_nombre' => $request->gl_nombre,
            'gl_rut' => $request->gl_rut,
            'gl_mail' => $request->gl_mail,
        ];

        $user = User::updateOrCreate(['gl_rut'=> $request->gl_rut], $dataRequest);
        $bodegas = explode(",", $request->bodegas);
        $perfiles = explode(",", $request->perfiles);
        $especialidades = explode(",", $request->especialidades);
        $equipoMedicos = explode(",", $request->equiposMedicos);
        $pabellones = explode(",", $request->pabellones);
            
        $user->Perfiles()->sync($perfiles);
        $user->Bodegas()->sync($bodegas);
        $user->Especialidades()->sync($especialidades);
        $user->EquiposMedicos()->sync($equipoMedicos);
        $user->Pabellones()->sync($pabellones);

        if($request->equipoClinico=='on'){
            $rut = explode("-", $request->gl_rut);
            $dataMedico = [
                'pro_rut' => $rut[0],
                'pro_digito' => $rut[1],
                'pro_tipo' => $request->tipoProfesional,
                'pro_apepat' => $request->pro_apepat,
                'pro_apemat' => $request->pro_apemat,
                'pro_nombres' => $request->pro_nombres
            ];
            $medico = Medico::updateOrCreate(['pro_rut'=> $rut[0]], $dataMedico);
            $labores = explode(",", $request->labores);
            $medico->labores()->sync($labores);
        }

        if (!$user) {
            return 'error al guardar';
        }else{
            return 'Usuario guardado correctamente';
        }
    }

}
