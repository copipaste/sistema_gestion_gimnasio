<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PassController extends Controller
{
    
    public function updatePassword(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
    
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);
    
        // Actualizar la contraseña
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('empleado.index')->with('success', 'Contraseña actualizada correctamente.');
    }


    
}
