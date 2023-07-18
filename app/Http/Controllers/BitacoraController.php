<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\User;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $activities = Bitacora::all();
        $users = User::all();
    
        $heads = [
            'descripcion',
            'administrador',
            'fecha',
            'Cambio realizado',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('bitacora.index', compact('heads', 'activities', 'users'));
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
        $activity = Bitacora::findOrFail($id);
        $data = json_decode($activity->properties);

        if(property_exists($data,'old') && property_exists($data,'attributes')){
    
        // Pasar los datos del sauna a la vista
        $data2 = json_decode($activity->properties,true);
            $combinedData = [];

            foreach ($data2['old'] as $key => $value) {
                $combinedData[] = [
                    'dato' => $key,
                    'antiguo' => $value,
                    'nuevo' => $data2['attributes'][$key]
                ];
            }

        return view('bitacora.show', compact('combinedData'));

        }else{
            return view('bitacora.show2', compact('data'));
        }
   
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
