@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Disciplina</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
                <form method="POST" action="{{ route('disciplina.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <x-adminlte-input name="nombre" label-class="text-lightblue" />
                    </div>
                    <div class="form-group">
                        <label>Capacidad</label>
                        <x-adminlte-input name="capacidad" type="number" placeholder="Ej: 25" label-class="text-lightblue" />
                    </div>

                    <div class="form-group">
                        <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                        <a href="{{ route('disciplina.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
