<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario_disciplina;
use App\Models\Disciplina;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
