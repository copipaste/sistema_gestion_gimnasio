@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar promocion</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('promocion.update', $promocion) }}">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue" value="{{ $promocion->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="dias_regalo" label="dias de regalo" type="number" placeholder="" label-class="text-lightblue" value="{{ $promocion->dias_regalo }}" />
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="porcentaje_descuento" label="porcentaje de descuento" type="number" placeholder="" label-class="text-lightblue" value="{{ $promocion->porcentaje_descuento }}" />
            </div> 
        </div>
        <div class="col-md-6" >
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=5 label-class="text-lightblue" 
                igroup-size="sm">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark" >
                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                    </div>
                </x-slot>
                {{$promocion->descripcion}}
            </x-adminlte-textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('disciplina.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop