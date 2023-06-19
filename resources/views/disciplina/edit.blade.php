@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar disciplina</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('disciplina.update', $disciplina) }}">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue" value="{{ $disciplina->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="capacidad" label="Capacidad" type="number" placeholder="" label-class="text-lightblue" value="{{ $disciplina->capacidad }}" />
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('disciplina.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop