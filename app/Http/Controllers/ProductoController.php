<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $heads = [
            'nombre',
            'precio',
            'stock',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('producto.index', compact('heads', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //aqui va a guardar los datos que se envian desde el formulario
    {
        request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'id_categoria' => 'required',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'id_categoria' => $request->id_categoria,
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Producto::where('id', $id)->get();

        return response()->json($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'id_categoria' => 'required',
        ]);
        Producto::find($id)->update($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente.');
    }



    
}
