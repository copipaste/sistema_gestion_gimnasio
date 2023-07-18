<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $promociones = Promocion::all();
        $heads = [
       
            'nombre',
            'dias de regalo',
            'porcentaje de descuento',
            'descripcion',
            ['label' => 'Acciones', 'no-export' => true],

        ];
        return view('promocion.index',compact('heads','promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promocion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        request()->validate([
            
            'nombre' => 'required',
            'dias_regalo' => 'required',
            'porcentaje_descuento' => 'required',
            'descripcion' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $promocion = Promocion::create([
            'nombre' => $request->nombre,
            'dias_regalo' => $request->dias_regalo,
            'porcentaje_descuento' => $request->porcentaje_descuento,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('promocion.index', $promocion);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('promocion.show',compact('promocion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('promocion.edit',compact('promocion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            
            'nombre' => 'required',
            'dias_regalo' => 'required',
            'porcentaje_descuento' => 'required',
            'descripcion' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $promocion = Promocion::findOrFail($id);
       
        $promocion->update($request->all());

       return redirect()->route('promocion.index', $promocion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promocion = Promocion::find($id);
        $promocion->delete();
        return redirect()->route('promocion.index', $promocion)->with('mensaje','registro eliminado correctamente');
    }
}
