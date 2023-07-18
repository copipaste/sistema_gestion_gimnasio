<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\User;
use App\Models\Instructor_Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $disciplinas = Disciplina::all();
        $InstructorDisciplinas = Instructor_Disciplina::all();

        $entrenadores = User::where('id_rol', '3')->get();
        //asignar la cabecera de nuestro datatable
        $heads = [
       
            'nombre',
            'capacidad',
            'Instructor',
            
            ['label' => 'Acciones', 'no-export' => true],
            // ['label' => 'Actions', 'no-export' => true],


        ];
        return view('disciplina.index',compact('heads','disciplinas','entrenadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('disciplina.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'nombre' => 'required',
            'capacidad' => 'required',
        ]);

        Disciplina::create($request->all());

        return redirect()->route('disciplina.index')
            ->with('success', 'Disciplina creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $horario_disciplinas = $disciplina->horario_disciplinas;
     
        return view('disciplina.show',compact('disciplina','horario_disciplinas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                        
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplina.edit',compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            
            'nombre' => 'required',
            'capacidad' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->update($request->all());

       return redirect()->route('disciplina.index', $disciplina)
            ->with('success', 'Disciplina actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->delete();
        return redirect()->route('disciplina.index', $disciplina); 
    }


    public function asignarEntrenador(Request $request, string $id)
    {
        request()->validate([
            'id_instructor' => 'required',
        ]); //validacion de los campos osea que tienen que tener algun valor 
        Instructor_Disciplina::create([
            'id_instructor' => $request->id_instructor,
            'id_disciplina' => $id,
        ]);
    

       return redirect()->route('disciplina.index')
            ->with('success', 'Entrenador asignado exitosamente.');
        }
}
