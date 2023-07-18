<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Especialidad;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Horario_disciplina;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        


        $empleados = User::whereHas('roles', function ($query) {
            $query->where('name', 'entrenador');
        })->get();

       // $especialidades = Especialidad::all(); // Suponiendo que tienes un modelo "Especialidad" asociado a la tabla de especialidades

        //asignar la cabecera de nuestro datatable
        $heads = [
            'numero de carnet',
            'nombre',
            'apellido',
            'telefono',
            'direccion',
        //   'especialidad',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('empleado.index',compact('empleados','heads'));

        //tengo que terminar el index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function datos()
    {
        $entrenador = Auth::user();
        
        
        $horario_disciplinas = Horario_disciplina::all();



        $todasLasDisciplinas = $entrenador->disciplinas;
        $disciplinas = Disciplina::all();


        foreach ($todasLasDisciplinas as $disciplina) {
            $estudiantes = User::join('membresias', 'users.id_membresia', '=', 'membresias.id')
            ->join('englobas', 'membresias.id', '=', 'englobas.id_membresia')
            ->join('disciplinas', 'englobas.id_disciplina', '=', 'disciplinas.id')
            ->where('disciplinas.id', '=', $disciplina->id)
            ->select('users.nombre','users.apellido','users.telefono_principal','users.email')
            ->get();
            $DisciplinasConEstudiantes[$disciplina->id] = $estudiantes;
           
        }



        
        return view('empleado.datos',compact('entrenador','horario_disciplinas','DisciplinasConEstudiantes','disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // request()->validate([
            
        //     'nombre' => 'required',
        //     'apellido' => 'required',
        //     'cedula' => 'required',
        //     'telefono' => 'required',
        //     'direccion' => 'required',
        //     'email' => 'required',
        //     'especialidad_id' => 'required',
        //     'fecha_ingreso' => 'required'

        // ]); //validacion de los campos osea que tienen que tener algun valor 
      
      
        //  $empleado = Empleado::create($request->all());
         
     
        // return redirect()->route('empleado.index', $empleado); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = User::findOrFail($id);
        $roles = Role::all();
        
        // Pasar los datos del empleado a la vista
        return view('empleado.show', compact('empleado','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = User::find($id);
     //   return view('empleado.edit',compact('empleado'));
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            
            'nro_carnet' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono_principal' => 'required',
            'telefono_emergencia' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'sexo' => 'required',
            'tipo_sangre' => 'required',
            'peso' => 'required',
            'direccion' => 'required',
            'password' => 'required',
            'id_tarjeta' => 'required',
            'descripcion' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 

        $empleado = User::find($id);
        $empleado->nro_carnet = $request->nro_carnet;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->telefono_principal = $request->telefono_principal;
        $empleado->telefono_emergencia = $request->telefono_emergencia;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->tipo_sangre = $request->tipo_sangre;
        $empleado->peso = $request->peso;
        $empleado->direccion = $request->direccion;
        $empleado->password = Hash::make($request->password);
        $empleado->id_tarjeta = $request->id_tarjeta;
        $empleado->descripcion = $request->descripcion;
        $empleado -> update();
        
    
       return redirect()->route('empleado.index', $empleado)->with('mensaje','registro editado correctamente');


       //aqui puse que redirija al index pero al hacer eso no muestra el mensaje de que se edito correctamente   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = User::find($id);
        $empleado->delete();
        return redirect()->route('empleado.index', $empleado)->with('success','entrenador eliminado correctamente');  
    }
}
