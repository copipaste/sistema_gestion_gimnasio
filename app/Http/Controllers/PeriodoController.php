<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Membresia;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Historial_Transaccion;
use App\Models\Promocion;


class PeriodoController extends Controller
{
    
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_inicio' => 'required',
            'tipo_membresia' => 'required',
        ]);
    
    // Buscamos al usuario por su id 
     $cliente = User::findOrFail($id);

    //buscamos el periodo del cliente 
    $periodo = Periodo::where('id',$cliente->id_periodo)->first();
      
    //capturamos los datos de la fecha de inicio y el tipo de membresia que escogio el administrador al inscribir
     $fecha_ini = Carbon::parse($request->fecha_inicio);
     $membresia = Membresia::find($request->tipo_membresia);
    //  codigo de prueba
    
    //  codigo de prueba
   //  $fecha_fin = $fecha_ini->addDays($membresia->duracion);
    

    $cliente->update([
         'id_membresia' => $request->tipo_membresia,
    ]);
      
    if ($request->id_promocion == null) {
         $monto = $membresia->precio;
         $fecha_fin = $fecha_ini->addDays($membresia->duracion);
    } else {
        $monto = $this->actualizarMonto($request->id_promocion, $request->tipo_membresia);
        $fecha_fin = $this->actualizarFecha($request->id_promocion, $membresia, $fecha_ini);
    }
       
    $periodo->update([
        'desde' => $request->fecha_inicio,
        'hasta' => $fecha_fin,
    ]);


        Historial_Transaccion::create([
            'id_cliente' => $cliente->id,
             'monto' => $monto,//$membresia->precio,  esto cambie ******************
            'fecha_transaccion' => Carbon::now(),
            'descripcion' => 'Renovación de membresía',
            'periodo_inicio' => $request->fecha_inicio,
            'periodo_fin' => $fecha_fin,
            'membresia_adquirida' => $membresia->nombre,
            'cod_pago' => $request->tipo_pago,
            'id_tramitador' => auth()->user()->id,
        ]);
    // Redirigir o devolver una respuesta según corresponda
    
    
         return redirect()->route('cliente.index')->with('success', 'Membresia actualizada correctamente.');
    }


    public function actualizarMonto($idpromocion, $idMembresia)
    {
        // Validar los datos del formulario
        $descuento = Promocion::find($idpromocion);
        $membresia = Membresia::find($idMembresia);
        $monto = $membresia->precio - ($membresia->precio * $descuento->porcentaje_descuento / 100);
        return $monto;
    }

    public function actualizarFecha($idpromocion, $membresia, $fecha)
    {
        // Validar los datos del formulario
        $promocion = Promocion::find($idpromocion);
        $fecha_final = $fecha->addDays($promocion->dias_regalo + $membresia->duracion);
        return $fecha_final;
    }


}
