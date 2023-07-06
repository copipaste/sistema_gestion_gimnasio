<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $ventas = Venta::all();
        $heads = [
            'fecha',
            'total',
            'id_administrador',
            ['label' => 'Actions', 'no-export' => true],
        ];

        return view('venta.index', compact('heads', 'ventas', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $heads = [
            'Nombre',
            'Precio',
            'Cantidad',
            ['label' => 'Actions', 'no-export' => true],
        ];
        $prods = Session::get('prods', []);
    
        return view('venta.create', compact('productos', 'heads', 'prods'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //preguntar si existe el mismo producto en la sesion
        $prods = Session::get('prods', []);
        foreach ($prods as $prod) {
            if ($prod['nombre'] == $request->producto) {
                $prod['cantidad'] += $request->cantidad;
                $prod['precio'] = $request->precio;
                Session::put('prods', $prods);
                return redirect()->route('venta.create');
            }
            
        }

        $prod = [
            'nombre' => $request->producto,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
        ];
    
        $prods = Session::get('prods', []);
        $prods[] = $prod;
        Session::put('prods', $prods);
    
        return redirect()->route('venta.create');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Session::forget('id');
        return redirect()->route('venta.create');
    }
}