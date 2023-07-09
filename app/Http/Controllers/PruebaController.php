<?php

namespace App\Http\Controllers;

use App\Models\Producto;


use Illuminate\Http\Request;

class PruebaController extends Controller
{
    
    public function retornarProductos(string $id)
    {
        
         $producto = Producto::findOrFail($id);
         return response()->json($producto);
    }
}
