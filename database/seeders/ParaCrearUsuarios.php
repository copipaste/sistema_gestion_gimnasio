<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ParaCrearUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::factory()->create();
        $fecha_ini = Carbon::parse($request->desde);
        $membresia = Membresia::find($request->id_membresia);
        $fecha_fin = $fecha_ini->addDays($membresia->duracion);
        $periodo = Periodo::create([
            'desde' => $request->desde,
            'hasta' => $fecha_fin,
        ]);
        $usuario = User::update([
            'id_periodo' => $periodo->id,
            'id_membresia' => $request->id_membresia,
        ]);

        $user = User::where('email', $request->email)->first(); 
        $role = Role::find($request->id_rol);
        $user->assignRole($role);
    }
}
