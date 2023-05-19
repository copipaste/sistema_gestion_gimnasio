@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Empleados</h1>
@stop

@section('content')

@if (session('mensaje'))
    <div class="alert alert-success">
        <strong>{{session('mensaje')}}</strong>
    </div>
@endif
<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->apellido}}</td>
                    <td>{{ $empleado->cedula}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$especialidades->where('id', $empleado->especialidad_id)->first()->nombre}}</td>
                    <td width="15px"><a href="{{route('empleado.edit',$empleado)}}" class="btn btn-primary btn-sm">editar</a></td>
                    <td width="15px">
                        <form action="{{route('empleado.destroy',$empleado)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value = "eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop
