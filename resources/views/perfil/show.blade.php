
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil</h1>
@stop

@section('content')

    <div class="card ">
        <div class="card-body"> 
            <p><strong>numero de carnet:</strong> {{ $user->nro_carnet }}</p>
            <p><strong>nombre:</strong> {{ $user->nombre }}</p>
            <p><strong>apellido:</strong> {{ $user->apellido }}</p>
            <p><strong>fecha de nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
            <p><strong>telefono principal:</strong> {{ $user->telefono_principal }}</p>
            @if ($user->telefono_emergencia != null)
                <p><strong>telefono emergencia:</strong> {{ $user->telefono_emergencia }}</p>
            @else
                <p><strong>telefono emergencia:</strong>  SIN DATOS</p>
            @endif
            <p><strong>email:</strong> {{ $user->email }}</p>
            <p><strong>sexo:</strong> {{ $user->sexo }}</p>
            @if($user->tipo_sangre != null )
                <p><strong>tipo de sangre:</strong> {{ $user->tipo_sangre }}</p>
            @else
                <p><strong>tipo de sangre:</strong>  SIN DATOS</p>
            @endif
            @if ($user->peso != null)
                <p><strong>peso:</strong> {{ $user->peso }}</p>
            @else
                <p><strong>peso:</strong>  SIN DATOS</p>
            @endif

            @if ($user->direccion != null)
            <p><strong>direccion:</strong> {{ $user->direccion }}</p>
                
            @else
                <p><strong>direccion:</strong>  SIN DATOS</p>
            @endif
            
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

@stop 
@role('admin')
@endrole