@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Editar Categoría</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('categoria.update', $categoria) }}">
        @method('PUT')
        @csrf
        <div>
            <div class="row">
                <x-adminlte-input name="nombre" label="nombre" type="text" placeholder="nombre" label-class="text-lightblue"
                    fgroup-class="col-md-6" value="{{ $categoria->nombre }}">
                </x-adminlte-input>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                    <a href="{{ route('categoria.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>

        </div>
    </form>
@stop