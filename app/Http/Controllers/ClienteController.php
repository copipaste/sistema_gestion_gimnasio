<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Membresia;
use App\Models\Periodo;
use App\Models\Disciplina;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        
        $clientes = User::whereHas('roles', function ($query) {
            $query->where('name', 'cliente');
        })->get();

        $periodos = Periodo::all();
        $membresias = Membresia::all();
        

        //asignar la cabecera de nuestro datatable
        $heads = [
            'nro_carnet',
            'nombre',
            'apellido',
            'email',
            'inicio de membresia',
            'fin de membresia',
            'estado',
            'membresia',
             ['label' => 'Actions', 'no-export' => true],
        ];
        return view('cliente.index',compact('clientes','periodos','membresias','heads'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create',['roles' => Role::all(),'membresias' => Membresia::all(),'periodos' => Periodo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'nro_carnet' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono_principal' => 'required',
            'telefono_emergencia' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sexo' => 'required',
            'tipo_sangre' => 'required',
            'peso' => 'required',
            'direccion' => 'required',
            'password' => 'required',
            'id_tarjeta' => 'required',
            'id_rol'    => 'required',

            'descripcion' => 'required',


        ]); //validacion de los campos osea que tienen que tener algun valor 
        
    

        User::create([
            'nro_carnet' => $request->nro_carnet,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono_principal' => $request->telefono_principal,
            'telefono_emergencia' => $request->telefono_emergencia,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'tipo_sangre' => $request->tipo_sangre,
            'peso' => $request->peso,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'id_tarjeta' => $request->id_tarjeta,
            'id_rol'    => $request->id_rol,
            'id_periodo' => $request->id_periodo,
            'id_membresia' => $request->id_membresia,
            'descripcion' => $request->descripcion,
        ]);
        
        $user = User::where('email', $request->email)->first(); 
        $role = Role::find($request->id_rol);
        $user->assignRole($role);
        return redirect()->route('cliente.create')->with('success','Cliente creado con éxito.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = User::findOrFail($id);
        $roles = Role::all();
        $membresias = Membresia::all();
        $periodos = Periodo::all();


        // Pasar los datos del sauna a la vista
        return view('cliente.show', compact('cliente','roles','membresias','periodos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = User::find($id);
        $membresias = Membresia::all();
        $periodos = Periodo::all();
        $disciplinas = Disciplina::all();
        return view('cliente.edit',compact('cliente','membresias','periodos'));
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
        ]);

        $cliente = User::find($id);
        $cliente->nro_carnet = $request->nro_carnet;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono_principal = $request->telefono_principal;
        $cliente->telefono_emergencia = $request->telefono_emergencia;
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        $cliente->tipo_sangre = $request->tipo_sangre;
        $cliente->peso = $request->peso;
        $cliente->direccion = $request->direccion;
        $cliente->password = Hash::make($request->password);
        $cliente->id_tarjeta = $request->id_tarjeta;
        $cliente->descripcion = $request->descripcion;

        $cliente->update();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $cliente = User::find($id);
        $cliente->delete();
        return redirect()->route('cliente.index', $cliente);
    }
}
