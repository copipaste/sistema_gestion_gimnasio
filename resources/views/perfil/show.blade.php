
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body"> 
            <p><strong>numero de carnet:</strong> {{ $user->nro_carnet }}</p>
            <p><strong>nombre:</strong> {{ $user->nombre }}</p>
            <p><strong>apellido:</strong> {{ $user->apellido }}</p>
            <p><strong>fecha de nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
            <p><strong>telefono principal:</strong> {{ $user->telefono_principal }}</p>
            <p><strong>telefono de emergencia:</strong> {{ $user->telefono_emergencia }}</p>
            <p><strong>email:</strong> {{ $user->email }}</p>
            <p><strong>sexo:</strong> {{ $user->sexo }}</p>
            <p><strong>tipo de sangre:</strong> {{ $user->tipo_sangre }}</p>
            <p><strong>peso:</strong> {{ $user->peso }}</p>
            <p><strong>direccion:</strong> {{ $user->direccion }}</p>
            <p><strong>rol:</strong> {{$roles->where('id', $user->id_rol)->first()->name}}</p>
            @if ($user->id_periodo != null)
                <p><strong>periodo inicio:</strong> {{$periodos->where('id', $user->id_periodo)->first()->desde}}</p>
                <p><strong>periodo fin:</strong> {{$periodos->where('id', $user->id_periodo)->first()->hasta}}</p>
            @endif
            
           
            
            @if ($user->id_membresia != null)
                <p><strong>membresia:</strong> {{$membresias->where('id', $user->id_membresia)->first()->nombre}}</p>
            @endif
            
            
            

        </div>
    </div>
    {{-- <div class="form-group mt-2">
        <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('cliente.index') }}" class="btn btn-danger">Cancelar</a>
    </div> --}}
   


@stop 
@role('admin')
@endrole