
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Informacion del cliente</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body"> 
            <p><strong>numero de carnet:</strong> {{ $cliente->nro_carnet }}</p>
            <p><strong>nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>apellido:</strong> {{ $cliente->apellido }}</p>
            <p><strong>fecha de nacimiento:</strong> {{ $cliente->fecha_nacimiento }}</p>
            <p><strong>telefono principal:</strong> {{ $cliente->telefono_principal }}</p>
            <p><strong>telefono de emergencia:</strong> {{ $cliente->telefono_emergencia }}</p>
            <p><strong>email:</strong> {{ $cliente->email }}</p>
            <p><strong>sexo:</strong> {{ $cliente->sexo }}</p>
            <p><strong>tipo de sangre:</strong> {{ $cliente->tipo_sangre }}</p>
            <p><strong>peso:</strong> {{ $cliente->peso }}</p>
            <p><strong>direccion:</strong> {{ $cliente->direccion }}</p>
            <p><strong>id de la tarjeta:</strong> {{ $cliente->id_tarjeta }}</p>
            <p><strong>rol:</strong> {{$roles->where('id', $cliente->id_rol)->first()->name}}</p>
            <p><strong>periodo inicio:</strong> {{$periodos->where('id', $cliente->id_periodo)->first()->desde}}</p>
            <p><strong>periodo fin:</strong> {{$periodos->where('id', $cliente->id_periodo)->first()->hasta}}</p>
            <p><strong>membresia:</strong> {{$membresias->where('id', $cliente->id_membresia)->first()->nombre}}</p>
            <p><strong>descripcion:</strong> {{ $cliente->descripcion }}</p>

        </div>
    </div>
    <div class="form-group mt-2">
        <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('cliente.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
   


@stop 
@role('admin')
@endrole