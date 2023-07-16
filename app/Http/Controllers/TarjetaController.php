<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TarjetaController extends Controller
{
    public function verify(string $id){
       $dato =  DB::table('users')->where('id_tarjeta', $id)->first();
         
    //    falta verificar si su membresia esta vencida

         if($dato != null){
            // return response()->json(['message' => 'Success'], 200)->header('Content-Type', 'text/plain');
             return response('permitido', 200)->header('Content-Type', 'text/plain');

        }else{
            // return response()->json(['message' => 'Error'], 401);
            return response('denegado', 404)->header('Content-Type', 'text/plain');

        }
}
}
