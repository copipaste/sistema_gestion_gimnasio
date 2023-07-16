@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Entrenadores</h1>
@stop

@section('content')

<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nro_carnet}}</td>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->apellido}}</td>
                    <td>{{ $empleado->telefono_principal}}</td>
                    <td>{{$empleado->direccion}}</td>
                  
                   
                    {{-- <a href="{{route('empleado.edit',$empleado)}}" class="btn btn-primary btn-sm">editar</a>  
                    //este es codigo de un boton normalito--}}
                    
                     <td width="15px">  {{--esto es como una columna mas  --}}
                         <div class="d-flex">  {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                            <a href="{{route('empleado.edit',$empleado)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" ><i class="fa fa-lg fa-fw fa-pen"></i></a>  
                            {{-- boton de eliminar  --}}

                                {{-- <input type="submit" value = "eliminar" class="btn btn-danger btn-sm">  codigo basura pero lo guardo por si me sirve--}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                                <x-adminlte-modal id="modalCustom" title="Eliminar" size="sm" theme="dark"
                                    icon="fas fa-bell" v-centered static-backdrop scrollable>
                                    <div style="height:80px;">Esta seguro de eliminar </div>
                                    <x-slot name="footerSlot">
                                       
                                        <form action="{{route('empleado.destroy',$empleado)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                        </form>
                                        
                                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
                                    </x-slot>
                                </x-adminlte-modal>


                           
                            {{-- boton de show para poder ver los datos de un empleado --}}
                            <a href="{{route('empleado.show',$empleado)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
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

@if (session('success'))
<div id="alert-container">
    <x-adminlte-alert id="success-alert" theme="success" title="Success">
        {{ session('success') }}
    </x-adminlte-alert>

    <script>
        setTimeout(function(){
            document.getElementById('success-alert').style.display = 'none';
        }, 5000); // Cambia 5000 por la duración en milisegundos que deseas (por ejemplo, 5000 para 5 segundos)
    </script>
</div>
@endif

<style>
#alert-container {
position: relative;
height: 0;
}

#success-alert {
position: fixed;
top: 20px;
right: 20px;
width: 20%;
z-index: 9999; /* Asegúrate de que el valor sea mayor que cualquier otro elemento de tu página */
}
</style>


@stop
