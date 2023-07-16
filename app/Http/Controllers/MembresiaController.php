<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;
use App\Models\Disciplina;
use App\Models\Horario_Disciplina;
class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //esto esta bien  
        $membresias = Membresia::all();
        $disciplinas = Disciplina::all();

    
        //asignar la cabecera de nuestro datatable
        $heads = [

            'Nombre de Membresia',
            'duracion',
            'precio',
            'descripcion',
            ['label' => 'Actions', 'no-export' => true],
            // ['label' => 'Actions', 'no-export' => true],


        ];
        return view('membresia.index',compact('heads','membresias','disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disciplinas = Disciplina::all();  
        return view('membresia.create',compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'nombre' => 'required',
            'duracion' => 'required',
            
            'descripcion' => 'required',
            'precio' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $membresia = Membresia::create($request->all());
       
        
       $selectedDisciplinas = $request->input('sel2Category');

  
        $membresia->disciplinas()->attach($selectedDisciplinas);
        
        

        
       return redirect()->route('membresia.index', $membresia);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //esto esta bien    
        $membresia = Membresia::findOrFail($id);
        
        // $disciplinas = $membresia->disciplinas; ESTO SIRVE PARA MOSTRAR LAS DISCIPLINAS QUE TIENE UNA MEMBRESIA
        $disciplinas = $membresia->disciplinas;
        $horario_disciplinas = Horario_Disciplina::all();

        
        //   return view('empleado.edit',compact('empleado'));
           return view('membresia.show',compact('membresia','disciplinas','horario_disciplinas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //esto esta bien    
        $membresia = Membresia::findOrFail($id);
        
        // $disciplinas = $membresia->disciplinas; ESTO SIRVE PARA MOSTRAR LAS DISCIPLINAS QUE TIENE UNA MEMBRESIA
        $disciplinas = Disciplina::all();  
        
        //   return view('empleado.edit',compact('empleado'));
           return view('membresia.edit',compact('membresia','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) //el puto id me jodio por 3 horas raro rarete
    {                                       
        request()->validate([
            
            'nombre' => 'required',
            'duracion' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $membresia = Membresia::findOrFail($id);
        $membresia->update($request->all());

       
        
       $selectedDisciplinas = $request->input('sel2Category');
   
        $membresia->disciplinas()->attach($selectedDisciplinas);
    
       return redirect()->route('membresia.index', $membresia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        
        $membresia = Membresia::findOrFail($id);
        $membresia->delete();
        return redirect()->route('membresia.index', $membresia); 
    }
}
