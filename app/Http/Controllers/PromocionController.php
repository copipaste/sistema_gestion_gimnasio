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
            ['label' => 'Actions', 'no-export' => true],

        ];
        return view('promocion.index',compact('heads','promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $promocion = Promocion::find($id);
        $promocion->delete();
        return redirect()->route('promocion.index', $promocion)->with('mensaje','registro eliminado correctamente');
    }
}
