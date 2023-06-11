@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Membresias</h1>
@stop

@section('content')

<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($membresias as $membresia)
                <tr>
                    <td>{{ $membresia->nombre}}</td>
                    <td>{{$membresia->duracion}}</td>
                    <td>{{$membresia->precio}}</td>
                    <td>{{$membresia->descripcion}}</td>

                    <td width="15px">  {{--esto es como una columna mas  --}}
                        <div class="d-flex">  {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                           <a href="{{route('membresia.edit',$membresia)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" ><i class="fa fa-lg fa-fw fa-pen"></i></a>  
                           {{-- boton de eliminar  --}}

                               {{-- <input type="submit" value = "eliminar" class="btn btn-danger btn-sm">  codigo basura pero lo guardo por si me sirve--}}
                               <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom">
                                   <i class="fa fa-lg fa-fw fa-trash"></i>
                               </button>

                               <x-adminlte-modal id="modalCustom" title="Eliminar" size="sm" theme="dark"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">Esta seguro de eliminar </div>
                                   <x-slot name="footerSlot">
                                      
                                       <form action="{{route('membresia.destroy',$membresia)}}" method="POST">
                                           @method('DELETE')
                                           @csrf
                                           <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                       </form>
                                       
                                       <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
                                   </x-slot>
                               </x-adminlte-modal>


                           {{-- boton de show para poder ver los datos de un empleado --}}
                           <a href="{{route('membresia.show',$membresia)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
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