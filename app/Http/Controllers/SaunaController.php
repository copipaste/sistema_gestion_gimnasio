<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauna;

class SaunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // leer todos los registros
    {
    $saunas = Sauna::all();
    //asignar la cabecera de nuestro datatable
    $heads = [
        'id',
        'Monto',
        'Fecha',
        ['label' => 'Acciones', 'no-export' => true],    //para que esta parte no se exporte en el PDF
      //  ['label' => 'Actions', 'no-export' => true],    //para que esta parte no se exporte en el PDF
        
    ];
    return view('sauna.index',compact('saunas','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //abrir formulario para crear un registro
    {
        return view('sauna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //para guardar en la bd el nuevo registro 
    {
        request()->validate([
            'monto' => 'required',
            'date' => 'required'

        ]); //validacion de los campos osea que tienen que tener algun valor 
        $sauna = sauna::create($request->all());
        return redirect()->route('sauna.index', $sauna);        //estoy invocando la ruta sauna.index
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)    //visualizar un registro a detalle
    {
        $sauna = sauna::findOrFail($id);

        // Pasar los datos del sauna a la vista
        return view('sauna.show', compact('sauna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)  //para abrir un formulario para editar un registro
    {
        $sauna = Sauna::find($id);
        return view('sauna.edit',compact('sauna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sauna $sauna) //para actualizar un registro en la bd
    {
        request()->validate([
            'monto' => 'required',
            'date' => 'required',
        ]); //validacion de los campos osea que tienen que tener algun valor 
        $sauna->update($request->all());
        return redirect()->route('sauna.index', $sauna)->with('mensaje','registro editado correctamente');        //estoy invocando la ruta sauna.index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)   //para eliminar un registro de la bd  
    {
       
        $sauna = Sauna::find($id);
        $sauna->delete();
        return redirect()->route('sauna.index', $sauna)->with('mensaje','registro eliminado correctamente');        //estoy invocando la ruta sauna.index
    }
}
