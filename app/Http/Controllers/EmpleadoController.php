<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Especialidad;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        $especialidades = Especialidad::all(); // Suponiendo que tienes un modelo "Especialidad" asociado a la tabla de especialidades

        //asignar la cabecera de nuestro datatable
        $heads = [
            'id',
            'nombre',
            'apellido',
            'cedula',
            'telefono',
            'especialidad',
            ['label' => 'Actions', 'no-export' => true],
            ['label' => 'Actions', 'no-export' => true],


        ];
        return view('empleado.index',compact('empleados','especialidades','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create',['especialidades' => Especialidad::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'especialidad_id' => 'required',
            'fecha_ingreso' => 'required'

        ]); //validacion de los campos osea que tienen que tener algun valor 
      
      
         $empleado = Empleado::create($request->all());
       
     
        return redirect()->route('empleado.index', $empleado); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::find($id);
     //   return view('empleado.edit',compact('empleado'));
        return view('empleado.edit',compact('empleado'),['especialidades' => Especialidad::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate([
            
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'especialidad_id' => 'required',
            'fecha_ingreso' => 'required'

        ]); //validacion de los campos osea que tienen que tener algun valor 

        $empleado -> update($request->all());
        
    
       return redirect()->route('empleado.index', $empleado)->with('mensaje','registro editado correctamente');
       //aqui puse que redirija al index pero al hacer eso no muestra el mensaje de que se edito correctamente   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleado.index', $empleado)->with('mensaje','registro eliminado correctamente');  
    }
}
