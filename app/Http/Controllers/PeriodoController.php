<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Membresia;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Historial_Transaccion;


class PeriodoController extends Controller
{
    
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_inicio' => 'required',
            'tipo_membresia' => 'required',
        ]);
    
        // Obtener el usuario por su ID
     $cliente = User::findOrFail($id);
    $periodo = Periodo::where('id',$cliente->id_periodo)->first();
      
     $fecha_ini = Carbon::parse($request->fecha_inicio);
     $membresia = Membresia::find($request->tipo_membresia);
     $fecha_fin = $fecha_ini->addDays($membresia->duracion);
    
     $periodo->update([
         'desde' => $request->fecha_inicio,
         'hasta' => $fecha_fin,
     ]);
        $cliente->update([
            'id_membresia' => $request->tipo_membresia,
        ]);
    
        Historial_Transaccion::create([
            'ci_cliente' => $cliente->id,
            'monto' => $membresia->precio,
            'fecha_transaccion' => Carbon::now(),
            'descripcion' => 'Renovación de membresía',
            'periodo_inicio' => $request->fecha_inicio,
            'periodo_fin' => $fecha_fin,
            'membresia_adquirida' => $membresia->nombre,
            'cod_pago' => $request->tipo_pago,
        ]);
    // Redirigir o devolver una respuesta según corresponda
    
    
         return redirect()->route('cliente.index')->with('success', 'Periodo actualizado correctamente.');
    }


}
