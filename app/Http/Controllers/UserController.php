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
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index(Request $request){
        $users = User::with('Perfiles', 'Bodegas', 'Especialidades', 'EquiposMedicos', 'Pabellones')
        // ->when($request->has('rut') && !is_null($request->rut), function ($collection) use ($request, $rut) {
        //     return $collection->whereRaw("gl_rut LIKE ?", ['%'.$rut.'%']);
        // })
        // ->when($request->has('nombre') && !is_null($request->nombre), function ($collection) use ($request) {
        //     return $collection->whereRaw("gl_nombre LIKE ?", ['%'.$request->nombre.'%']);
        // })
        ->get();

        return $users;
    }


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

    public function store(UserRequest $request){
        // return $request->bodegas;
        $dataRequest = [
            'gl_nombre' => $request->gl_nombre,
            'gl_rut' => $request->gl_rut,
            'gl_mail' => $request->gl_mail,
        ];

        $user = User::updateOrCreate(['gl_rut'=> $request->gl_rut], $dataRequest);
        if (isset($request->bodegas)) {
            $bodegas = explode(",", $request->bodegas);
            $user->Bodegas()->sync($bodegas);
        }

        if (isset($request->perfiles)) {
            $perfiles = explode(",", $request->perfiles);
            $user->Perfiles()->sync($perfiles);
        }

        if (isset($request->especialidades)) {
            $especialidades = explode(",", $request->especialidades);
            $user->Especialidades()->sync($especialidades);
        }

        if (isset($request->equiposMedicos)) {
            $equipoMedicos = explode(",", $request->equiposMedicos);
            $user->EquiposMedicos()->sync($equipoMedicos);
        }

        if (isset($request->pabellones)) {
            $pabellones = explode(",", $request->pabellones);
            $user->Pabellones()->sync($pabellones);
        }       
            

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

    public function editUserInfo(Request $request){

        $user = User::with( 'Perfiles', 'Perfiles.Opciones', 'Bodegas', 'Especialidades', 'EquiposMedicos', 'Pabellones')->find($request->id);
        $rut = explode("-", $user->gl_rut);
        $medico = Medico::with('Labores')->where('pro_rut', $rut[0])->first();

        return [
            "user" => $user,
            "medico" => $medico
        ];
    }

    public function eliminarUser(Request $request){
        $user = User::find($request->id);
        $user->Perfiles()->detach();
        $user->Bodegas()->detach();
        $user->Especialidades()->detach();
        $user->EquiposMedicos()->detach();
        $user->Pabellones()->detach();
        if($user->forceDelete()){
            return "ok";
            //return "El usuario a sido eliminado correctamente";
        }else{
            return "error";
        }
    }

    public function resetPassword(Request $request) 
    {
        // PARA REINICIAR TODAS LAS CONTRASEÑAS BCRYPT
        // $users = User::get();
        // foreach ($users as $key => $user) {
        //     $password = substr($user->gl_rut, 0, 4);
        //     $user->password = $password;
        //     $user->save();
        // }

        $user = User::find($request->id);
        $password = substr($user->gl_rut, 0, 4);
        $user->gl_clave = $password;
        $user->password = $password;
        $user->save();

        return 'ok';
    }
}
