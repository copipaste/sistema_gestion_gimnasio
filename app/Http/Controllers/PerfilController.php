<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periodo;
use App\Models\Membresia;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Historial_Transaccion;
use App\Models\Disciplina;
use App\Models\Horario_Disciplina;

class PerfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $periodos = Periodo::all();
        $membresias = Membresia::all();
        $roles = Role::all();
        $disciplinas = Disciplina::all();

        $datos = Membresia::join('englobas', 'membresias.id', '=', 'englobas.id_membresia')
            ->join('disciplinas', 'englobas.id_disciplina', '=', 'disciplinas.id')
            ->where('membresias.id', '=', $user->id_membresia)
            ->select('membresias.*', 'englobas.*', 'disciplinas.*')
            ->get();

        $horario_disciplinas = Horario_disciplina::all();
        return view('perfil.show', compact('user', 'periodos', 'membresias', 'roles', 'datos', 'disciplinas', 'horario_disciplinas'));
    }

    // Esta funcion es para mostrar la vista del cliente
    public function perfilCliente()
    {
        $user = Auth::user(); //Obtenemos el usuario actual
        $membresias = Membresia::all();

        $periodos = Periodo::all();
        return view('perfil.show', compact('user', 'membresias', 'datos', 'periodos'));
    }
}
