@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">editar Empleado</h1>
@stop

@section('content')


<form method="POST" action = "{{route('empleado.update',$empleado)}}">
    @method("PUT")
    @csrf
    <div>
        <div class="row" >
            <x-adminlte-input name="nombre" label="nombre"  type="text" placeholder="nombre" label-class="text-lightblue"  fgroup-class="col-md-6" value="{{$empleado->nombre}}">

            </x-adminlte-input>
        </div>
        <div class="row" >
                <x-adminlte-input name="apellido" label="apellido"  type="text" placeholder="apellido" label-class="text-lightblue"  fgroup-class="col-md-6" value="{{$empleado->apellido}}">

                </x-adminlte-input>
        </div>
        <div class="row" >
            <x-adminlte-input name="cedula" label="cedula"  type="text" placeholder="cedula" label-class="text-lightblue"  fgroup-class="col-md-6" value="{{$empleado->cedula}}">

            </x-adminlte-input>
        </div>
        <div class="row" >
                <x-adminlte-input name="telefono" label="telefono" type="text" placeholder="telefono" label-class="text-lightblue" fgroup-class="col-md-6" value="{{$empleado->telefono}}"/>
        </div>
        <div class="row" >
            <x-adminlte-input name="direccion" label="direccion"  type="text" placeholder="direccion" label-class="text-lightblue"  fgroup-class="col-md-6" value="{{$empleado->direccion}}">

            </x-adminlte-input>
        </div>
        <div class="row" >
            <x-adminlte-input name="email" label="email" type="email" placeholder="email" label-class="text-lightblue" fgroup-class="col-md-6" value="{{$empleado->email}}"/>
        </div>

        <div class="row">
            @php
            $config = ['format' => 'YYYY-MM-DD'];
            @endphp
            <x-adminlte-input-date name="fecha_ingreso" :config="$config" placeholder="fecha"
            label="fecha ingreso" label-class="text-lightblue"
            
            fgroup-class="col-md-6" value="{{$empleado->fecha_ingreso}}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-clock"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>

        </div>
        <div class="row">
            <div class="form-group col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('empleado.index') }}" class="btn btn-danger">Cancelar</a>
            </div>     
        </div>

</div>
</form>
@stop