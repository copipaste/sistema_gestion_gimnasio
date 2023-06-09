
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle de Sauna</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body"> 
            <p><strong>monto:</strong> {{ $sauna->monto }}</p>
            <p><strong>fecha:</strong> {{ $sauna->date }}</p>
        </div>
    </div>
    <div class="form-group mt-2">
        <a href="{{ route('sauna.edit', $sauna) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('sauna.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
   


@stop 
@role('admin')
@endrole