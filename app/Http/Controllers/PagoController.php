<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial_Transaccion;
use App\Models\Tipo_Pago;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tipo_pagos = Tipo_Pago::all();
        $historial_transacciones = Historial_Transaccion::all();
        $users = User::all();
       


        //asignar la cabecera de nuestro datatable
        $heads = [
            'numero de carnet',
            'nombre',
            'monto',
            'fecha de pago',
            'tramitador',
            'memebresia adquirida',
            'tipo de pago',
             ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('pago.index',compact('tipo_pagos','historial_transacciones','heads','users'));
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
        $cliente = User::all();

       
        $historial_transacciones = Historial_Transaccion::findOrFail($id);
       
         return view('pago.show', compact('cliente','historial_transacciones'));
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
        $historial_transacciones = Historial_Transaccion::find($id);
        $historial_transacciones->delete();
        return redirect()->route('pago.index', $historial_transacciones)->with('mensaje','registro eliminado correctamente');
    }
}
