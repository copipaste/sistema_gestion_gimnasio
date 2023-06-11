<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $disciplinas = Disciplina::all();
        //asignar la cabecera de nuestro datatable
        $heads = [
       
            'nombre',
            'capacidad',
            
            ['label' => 'Actions', 'no-export' => true],
            // ['label' => 'Actions', 'no-export' => true],


        ];
        return view('disciplina.index',compact('heads','disciplinas'));
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
        //
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
        //
    }
}
