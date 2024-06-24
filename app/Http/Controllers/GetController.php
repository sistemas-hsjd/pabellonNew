<?php

namespace App\Http\Controllers;

use App\Models\Cie10;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function getDiagnosticos(Request $request)
    {
        if($request->search !== 'null'){
            $diagnosticos = Cie10::where('bo_uso', 1)->whereRaw("CONCAT(cd_cie10,' ',gl_glosa) LIKE ?", ['%'.$request->search.'%'])->take(10)->get();      
        }else{
            $diagnosticos = Cie10::where('bo_uso', 1)->take(10)->get();
        }

        $data['results'] = array();
        foreach($diagnosticos as $key => $diagnostico){
            $producto = array();
            $producto['id'] = $diagnostico->id;
            $producto['text'] = "{$diagnostico->cd_cie10} {$diagnostico->gl_glosa}"; 
            array_push($data['results'], $producto);
        }
        $data['pagination'] = ["more" => false];
      
        return $data;
    }

    public function getDiag(Request $request){
        $diagnosticos = Cie10::where('id', $request->id)->get();       
        $data['results'] = array();
        foreach($diagnosticos as $key => $diagnostico){
            $producto = array();
            $producto['id'] = $diagnostico->id;
            $producto['text'] = "{$diagnostico->cd_cie10} {$diagnostico->gl_glosa}"; 
            array_push($data['results'], $producto);
        }
        $data['pagination'] = ["more" => false];
        return $data;
    }
}
