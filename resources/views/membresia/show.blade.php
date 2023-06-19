@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Información de la membresía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nombre membresía:</strong> {{ $membresia->nombre }}</p>
            <p><strong>Duración:</strong> {{ $membresia->duracion }}</p>
            <p><strong>Descripción:</strong> {{ $membresia->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $membresia->precio }}</p>
            
            @foreach ($disciplinas as $disciplina)
                <p><strong>Disciplina:</strong> {{ $disciplina->nombre }}</p>
                
                @foreach($horario_disciplinas as $horario_disciplina)
                    @if ($horario_disciplina->id_disciplina === $disciplina->id)
                        <p>
                            {{ $horario_disciplina->dia }}: {{ $horario_disciplina->hora_inicio }} - {{ $horario_disciplina->hora_fin }}
                        </p>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('disciplina.edit', $disciplina->id) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('disciplina.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
@stop
