<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario_disciplina;
use App\Models\Disciplina;
use App\Models\Horario_Membresia;

class Horario_disciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horario_disciplinas = Horario_disciplina::all();
        $disciplinas = Disciplina::all();
        //asignar la cabecera de nuestro datatable
        $heads = [

            'nombre de disciplina',
            'dia',
            'hora de inicio',
            'hora de fin',
            
            ['label' => 'Actions', 'no-export' => true],
            // ['label' => 'Actions', 'no-export' => true],


        ];
        return view('horario_disciplina.index',compact('heads','horario_disciplinas','disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disciplinas = Disciplina::all();  
        return view('horario_disciplina.create',compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

 
        request()->validate([
            
            'id_disciplina' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $horario_disciplina = Horario_disciplina::create($request->all());
        return redirect()->route('horario_disciplina.index', $horario_disciplina); 
       
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horario_disciplina = Horario_disciplina::findOrFail($id);
        $disciplina = Disciplina::findOrFail($horario_disciplina->id_disciplina);
        


        // Pasar los datos del sauna a la vista
        return view('horario_disciplina.show', compact('horario_disciplina','disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                //esto esta bien    
                $horario_disciplina = Horario_disciplina::findOrFail($id);
                $lista_disciplinas = Disciplina::all();
        
                // $disciplinas = $membresia->disciplinas; ESTO SIRVE PARA MOSTRAR LAS DISCIPLINAS QUE TIENE UNA MEMBRESIA
                $disciplina = Disciplina::findOrFail($horario_disciplina->id_disciplina);
                $valorPorDefecto = $disciplina->id;  
                
                //   return view('empleado.edit',compact('empleado'));
                   return view('horario_disciplina.edit',compact('horario_disciplina','disciplina','lista_disciplinas','valorPorDefecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        request()->validate([
            
            'id_disciplina' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $horario_disciplina = Horario_disciplina::findOrFail($id);
       
        $horario_disciplina->update($request->all());

       return redirect()->route('horario_disciplina.index', $horario_disciplina);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horario_disciplina = Horario_disciplina::findOrFail($id);
        $horario_disciplina->delete();
        return redirect()->route('horario_disciplina.index', $horario_disciplina); 
    }
}
