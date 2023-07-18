<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Disciplina;
use App\Models\Historial_Transaccion;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $CantidadClientesRegistrados = $this->CantidadClientesRegistrados();
        $cantidadDisciplinas = $this->TotalDisciplinas();
        $todasDisciplinas = $this->TodasDisciplinas();
        $todasInscripciones = $this->todasInscripciones();
        $EspacioDisciplina = $this->EspacioDisciplina();
        $TotalEntrenadores = $this->TotalEntrenadores();
        $IngresosTotales = $this->IngresosTotales();
        $IngresosMesActual = $this->IngresosMesActual();
    
        
        return view(
            'home',
            compact(
                'CantidadClientesRegistrados',
                'cantidadDisciplinas',
                'todasDisciplinas',
                'todasInscripciones',
                'EspacioDisciplina',
                'TotalEntrenadores',
                'IngresosTotales',
                'IngresosMesActual'
            )
        );
    }

    public function CantidadClientesRegistrados()
    { //funcion para contar la cantidad de clientes
        $users = User::all();
        $cantidad = 0;
        foreach ($users as $user) {
            if ($user->hasRole('cliente')) {
                $cantidad++;
            }
        }
        return $cantidad;
    }

    public function TotalDisciplinas()
    { //funcion para contar la cantidad de disciplinas
        $disciplinas = Disciplina::all();
        $cantidad = 0;
        foreach ($disciplinas as $disciplina) {
            $cantidad++;
        }
        return $cantidad;
    }

    public function TodasDisciplinas()
    { //funcion que mandara todas las disciplinas
        $disciplinas = Disciplina::all();
        return $disciplinas;
    }

    public function TodasInscripciones()
    { //
        $users = User::all();
        return $users;
    }

    public function EspacioDisciplina()
    {
        $disciplinas = $this->TodasDisciplinas(); // Lista de disciplinas
        $cantidadUsuarios = [];

        foreach ($disciplinas as $disciplina) {
            $cantidad = User::join('membresias', 'users.id_membresia', '=', 'membresias.id')
                ->join('englobas', 'membresias.id', '=', 'englobas.id_membresia')
                ->join('disciplinas', 'englobas.id_disciplina', '=', 'disciplinas.id')
                ->where('disciplinas.id', $disciplina->id)
                ->count();
            $cantidadUsuarios[$disciplina->nombre] = $cantidad;
        }
        return $cantidadUsuarios;
    }

    public function TotalEntrenadores()
    {
        $users = User::all();
        $cantidad = 0;
        foreach ($users as $user) {
            if ($user->hasRole('entrenador')) {
                $cantidad++;
            }
        }
        return $cantidad;
    }

    public function IngresosTotales()
    {
        $historials = Historial_Transaccion::all();
        $total = 0;

        foreach ($historials as $historial) {
            $total = $total + $historial->monto;
        }
        return $total;
    }

    public function IngresosMesActual()
    {
        $mesActual = Carbon::now()->format('m');

        $ganancias = Historial_Transaccion::whereMonth('fecha_transaccion', $mesActual)
            ->sum('monto');

        return $ganancias;
    }
}
