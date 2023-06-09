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
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nro_carnet}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->email}}</td>

                    <td>{{$periodos->where('id', $cliente->id_periodo)->first()->desde}}</td>
                    <td>{{$periodos->where('id', $cliente->id_periodo)->first()->hasta}}</td>

                    <td>
                        
                        @php
                        $fechaActual = date('Y-m-d');
                        $claseBoton = $periodos->where('id', $cliente->id_periodo)->first()->hasta < $fechaActual ? 'btn-danger' : 'btn-success';
                        $texto = $periodos->where('id', $cliente->id_periodo)->first()->hasta < $fechaActual ? 'Vencido' : 'Vigente';
                        @endphp
            
                    <button class="btn {{ $claseBoton }} btn-rounded">{{$texto}}</button>
                    </td>
                    <td>{{$membresias->where('id', $cliente->id_membresia)->first()->nombre}}</td>

                    {{-- --aqui vienen los botones --}}

                    <td width="15px">  {{--esto es como una columna mas  --}}
                        <div class="d-flex">  {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                           
                           {{-- boton de editar --}}
                            <a href="{{route('cliente.edit',$cliente)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" ><i class="fa fa-lg fa-fw fa-pen"></i></a>  
                           
                           
                            {{-- boton de eliminar  --}}
                               <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom">
                                   <i class="fa fa-lg fa-fw fa-trash"></i>
                               </button>
                               <x-adminlte-modal id="modalCustom" title="Eliminar" size="sm" theme="dark"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">Esta seguro de eliminar </div>
                                   <x-slot name="footerSlot">
                                      
                                       <form action="{{route('cliente.destroy',$cliente)}}" method="POST">
                                           @method('DELETE')
                                           @csrf
                                           <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                       </form>
                                       
                                       <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
                                   </x-slot>
                               </x-adminlte-modal>


                           {{-- boton de show para poder ver los datos de un cliente --}}
                           <a href="{{route('cliente.show',$cliente)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                               <i class="fa fa-lg fa-fw fa-eye"></i>
                           </a>
                       </div>

                   </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>

{{-- Custom --}}




@stop