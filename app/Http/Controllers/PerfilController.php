<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periodo;
use App\Models\Membresia;
use Spatie\Permission\Models\Role;  


class PerfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $periodos = Periodo::all();
        $membresias = Membresia::all();
        $roles = Role::all();
        // Pasar los datos del empleado a la vista
        return view('perfil.show', compact('user','periodos','membresias','roles'));

        
    }
}
