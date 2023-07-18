@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PERFIL</h1>
@stop

@section('content')

    <div class="card ">
        <div class="card-body">
            <h5><strong>INFORMACION DEL {{ strtoupper($roles->where('id', $user->id_rol)->first()->name) }}</strong></h5>
            <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
            <p><strong>Apellido:</strong> {{ $user->apellido }}</p>
            <p><strong>Numero de Carnet:</strong> {{ $user->nro_carnet }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
            <p><strong>Teléfono Principal:</strong> {{ $user->telefono_principal }}</p>
            @if ($user->telefono_emergencia != null)
                <p><strong>Telefono Emergencia:</strong> {{ $user->telefono_emergencia }}</p>
            @else
                <p><strong>Telefono Emergencia:</strong> SIN DATOS</p>
            @endif
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Sexo:</strong> {{ $user->sexo }}</p>
            @if ($user->tipo_sangre != null)
                <p><strong>Tipo de Sangre:</strong> {{ $user->tipo_sangre }}</p>
            @else
                <p><strong>tipo de sangre:</strong> SIN DATOS</p>
            @endif
            @if ($user->peso != null)
                <p><strong>Peso:</strong> {{ $user->peso }}</p>
            @else
                <p><strong>Peso:</strong> SIN DATOS</p>
            @endif

            @if ($user->direccion != null)
                <p><strong>Dirección:</strong> {{ $user->direccion }}</p>
            @else
                <p><strong>Dirección:</strong> SIN DATOS</p>
            @endif
            @role('admin')
                <p><strong>Rol:</strong> {{ $roles->where('id', $user->id_rol)->first()->name }}</p>
            @endrole
        </div>
    </div>

    @role('cliente')
        <div class="card ">
            <div class="card-body">
                {{-- INFORMACION DE LA MEMBRESÍA --}}
                <div>
                    <h5><strong>INFORMACION DE LA MEMBRESÍA: </strong></h5>
                    @if ($user->id_membresia != null)
                        <p><strong>Adquirida:</strong>
                            {{ $membresias->where('id', $user->id_membresia)->first()->nombre }} </p>
                    @else
                        <p><strong>Membresia:</strong></p>
                    @endif

                    <p><strong>Disciplinas:</strong></p>
                    @foreach ($datos as $dato)
                        <ul>
                            <li>
                                {{ $dato->nombre }}
                                <ul>

                                    @foreach ($horario_disciplinas as $horario_disciplina)
                                        @if ($horario_disciplina->id_disciplina == $disciplinas[0]->id)
                                            <li>
                                                {{ $horario_disciplina->dia }}: {{ $horario_disciplina->hora_inicio }} -
                                                {{ $horario_disciplina->hora_fin }}
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    @endforeach

                    <p><strong>Duración:</strong>
                        @if ($user->id_membresia != null)
                            {{ $membresias->where('id', $user->id_membresia)->first()->duracion }} días
                        @endif
                    </p>

                    <p><strong>Fecha Inicio:</strong>
                        @if ($user->id_periodo != null)
                            {{ $periodos->where('id', $user->id_periodo)->last()->desde }}
                        @endif
                    </p>
                    <p><strong>Fecha Fin:</strong>
                        @if ($user->id_periodo != null)
                            {{ $periodos->where('id', $user->id_periodo)->last()->hasta }}
                        @endif
                    </p>
                </div>

            </div>
        </div>
    @endrole

@stop
