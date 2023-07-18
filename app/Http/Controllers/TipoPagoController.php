<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Pago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_pagos = Tipo_Pago::all();
        $heads = [
            'nombre',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('tipo_pago.index', compact('heads', 'tipo_pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_pago.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
        ]);

        Tipo_Pago::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('tipo_pago.index')->with('success', 'tipo de pago creada exitosamente.');
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
        $tipo_pago = Tipo_pago::findOrFail($id);
        $tipo_pago->delete();

        return redirect()->route('tipo_pago.index')->with('success', 'tipo de pago eliminada exitosamente.');
    }
}
