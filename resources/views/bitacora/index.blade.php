@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Bitacora</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->description }}</td>
          
                 <td>{{ $users->where('id', $activity->causer_id)->first()->nombre }}</td> 
                    <td>{{ $activity->created_at }}</td>
                    @switch($activity->subject_type)
                    @case("App\Models\Categoria")
                    <td>Categoria</td>
                    @break
                    @case("App\Models\Cliente")
                    <td>Cliente</td>
                    @break
                    @case("App\Models\Disciplina")
                    <td>Disciplina</td>
                    @break
                    @case("App\Models\Especialidad")
                    <td>Especialidad</td>
                    @break
                    @case("App\Models\Historial_Transaccion")
                    <td>Historial_Transaccion</td>
                    @break
                    @case("App\Models\Horario_Disciplina")
                    <td>Horario_Disciplina</td>
                    @break    
                    @case("App\Models\Membresia")
                    <td>Membresia</td>
                    @break
                    @case("App\Models\Periodo")
                    <td>Periodo</td>
                    @break
                    @case("App\Models\Producto")
                    <td>Producto</td>
                    @break
                    @case("App\Models\Promocion")
                    <td>Promocion</td>
                    @break                      
                    @case("App\Models\Tipo_Pago")
                    <td>Tipo_Pago</td>
                    @break
                    @case("App\Models\User")
                    <td>Usuario</td>
                    @break
                    @case("App\Models\Venta")
                    <td>Venta</td>
                    @break                                                          
                    @default
                    <td></td>  
                    @endswitch
                    <td width="15px">
                        <div class="d-flex">
                            <a href="{{ route('bitacora.show', $activity) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Custom --}}
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop