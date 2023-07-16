@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle de empleado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>numero de carnet:</strong> {{ $empleado->nro_carnet }}</p>
            <p><strong>nombre:</strong> {{ $empleado->nombre }}</p>
            <p><strong>apellido:</strong> {{ $empleado->apellido }}</p>
            <p><strong>fecha de nacimiento:</strong> {{ $empleado->fecha_nacimiento }}</p>
            <p><strong>telefono principal:</strong> {{ $empleado->telefono_principal }}</p>
            <p><strong>telefono de emergencia:</strong> {{ $empleado->telefono_emergencia }}</p>
            <p><strong>email:</strong> {{ $empleado->email }}</p>
            <p><strong>sexo:</strong> {{ $empleado->sexo }}</p>
            <p><strong>tipo de sangre:</strong> {{ $empleado->tipo_sangre }}</p>
            <p><strong>peso:</strong> {{ $empleado->peso }}</p>
            <p><strong>direccion:</strong> {{ $empleado->direccion }}</p>
            <p><strong>id de la tarjeta:</strong> {{ $empleado->id_tarjeta }}</p>
            <p><strong>rol:</strong> {{$roles->where('id', $empleado->id_rol)->first()->name}}</p>
            <p><strong>descripcion:</strong> {{ $empleado->descripcion }}</p>

        </div>
    </div>
    <div class="form-group mt-2">
        <a href="{{ route('empleado.edit', $empleado) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('empleado.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
