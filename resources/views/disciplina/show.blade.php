@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Información de la disciplina</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Disciplina:</strong> {{ $disciplina->nombre }}</p>
            <p><strong>Día:</strong> {{ $disciplina->capacidad }}</p>
            <p><strong>Horario:</strong></p>
            @foreach($horario_disciplinas as $horario_disciplina)
                <p>
                    {{ $horario_disciplina->dia }}: {{ $horario_disciplina->hora_inicio }} - {{ $horario_disciplina->hora_fin }}
                </p>
            @endforeach

        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('disciplina.edit', $disciplina) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('disciplina.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop 
