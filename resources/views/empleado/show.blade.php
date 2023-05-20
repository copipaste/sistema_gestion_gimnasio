@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle de empleado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            <p><strong>nombre:</strong> {{ $empleado->nombre }}</p>
            <p><strong>apellido:</strong> {{ $empleado->apellido }}</p>
            <p><strong>cedula:</strong> {{ $empleado->cedula }}</p>
            <p><strong>telefono:</strong> {{ $empleado->telefono }}</p>
            <p><strong>direccion:</strong> {{ $empleado->direccion }}</p>
            <p><strong>email:</strong> {{ $empleado->email }}</p>
            <p><strong>especialidad:</strong> {{$especialidades->where('id', $empleado->especialidad_id)->first()->nombre}}</p>
            <p><strong>fecha_ingreso:</strong> {{ $empleado->fecha_ingreso }}</p>

        </div>
    </div>
    <div class="form-group mt-2">
        <a href="{{ route('sauna.edit', $empleado) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('empleado.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
@stop
