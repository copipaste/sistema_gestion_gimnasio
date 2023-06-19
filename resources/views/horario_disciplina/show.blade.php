@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Información del horario</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Disciplina a la que pertenece:</strong> {{ $disciplina->nombre }}</p>
            <p><strong>Día:</strong> {{ $horario_disciplina->dia }}</p>
            <p><strong>Hora de inicio:</strong> {{ $horario_disciplina->hora_inicio }}</p>
            <p><strong>Hora de fin:</strong> {{ $horario_disciplina->hora_fin }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('horario_disciplina.edit', $horario_disciplina) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('horario_disciplina.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop 

@role('admin')
@endrole
