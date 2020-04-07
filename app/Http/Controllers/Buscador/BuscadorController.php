<?php

namespace App\Http\Controllers\Buscador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buscador;
use Log;

class BuscadorController extends Controller
{
    
    public function getBuscador(Request $request)
    {
        Log::info($request);

        $documento = $request['documento'];
        $email = $request['email'];
        
        if($documento && $email){
            $buscador = Buscador::where('documento',$documento)
            ->where('email',$email)
            ;
        }
        else if($documento){ 
            $buscador = Buscador::where('documento',$documento);
        }
        else{ 
            $buscador = Buscador::where('email',$email);
        }

        $buscador = $buscador
        ->with('tipoDocumento','prestadorUsuario','resultadosBuscador','resultadosBuscador.perfil')
        ->first()
        ;
        
        $code = 200;
        
        return response()->json(
            [
                'status'=>'success',
                'data' => $buscador
            ],
            $code
        );
    }

}
