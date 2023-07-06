<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial_Transaccion;
use App\Models\Periodo;
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
            'membresia adquirida',
            'tipo de pago',
             ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('pago.index',compact('tipo_pagos','historial_transacciones','heads','users'));
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

    public function destroy(string $id)
    {   

        $historial_transacciones = Historial_Transaccion::find($id);
        if($historial_transacciones->id_cliente != null){
            
            $cliente = User::find($historial_transacciones->id_cliente);
        
            $periodo = Periodo::find($cliente->id_periodo);
            $periodo->desde = null;
            $periodo->hasta = null;
            $periodo->save();
        }
        $historial_transacciones->delete();
        return redirect()->route('pago.index', $historial_transacciones)->with('mensaje','registro eliminado correctamente');
    }
}
