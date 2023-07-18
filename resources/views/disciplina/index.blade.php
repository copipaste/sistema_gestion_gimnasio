@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Disciplinas</h1>
@stop

@section('content')


<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->nombre}}</td>
                    <td>{{$disciplina->capacidad}}</td>

                    @if ($disciplina->entrenadores->pluck('nombre')->first() != null) 
                        
                    <td>{{$disciplina->entrenadores->pluck('nombre')->first()}}</td>
                    @else 
                     <td>sin instructor</td>
                    @endif
                    <td width="15px">  
                        <div class="d-flex">  {{-- esto es lo que hace que los datos esten uno al lado del otro --}}

                            {{-- Custom -- esto es para el de editar membresía --}}
                            <button class="btn btn-xs btn-default text-info mx-1 shadow" title="Actualizar Membresia"
                            data-toggle="modal" data-target="#modalUpdateMembresia{{ $disciplina->id }}">
                            <i class="fas fa-lg fa-fw fa-calendar-day"></i>
                        </button>
{{-- aqui actualizamos el periodo--}}
                        <x-adminlte-modal id="modalUpdateMembresia{{ $disciplina->id }}" title="Asignar Entrenador" size="lg" theme="dark" v-centered static-backdrop scrollable>


                            <form action="{{route('disciplina.asignarEntrenador',$disciplina) }}" method="POST">
                                @method('PUT')
                                @csrf
                                         <div > 
                                          
                                                
                                                {{-- --codigooooo prueba --}}
                                                <label for="entrenador">Entrenador</label>
                                                <select name="id_instructor" id="id_instructor" class="form-control" required>
                                                    <option value="">Seleccione un Entrenador</option>
                                                    @foreach ($entrenadores as $entrenador)
                                                        <option value="{{ $entrenador->id }}"> {{ $entrenador->nombre }}</option>
                                                    @endforeach
                                                        
                                                </select>
                                                {{-- --codigooooo prueba --}}
                                            
                                         </div>
                                         <div class ="text-right">
                                            <x-adminlte-button  class="float-left mt-3" type="submit" label="Aceptar"
                                            theme="success" />
   
                                             <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="danger" label="Cancelar" data-dismiss="modal" />
                                        </div>
                               
                                        <x-slot name="footerSlot" >
                                        </x-slot>
                                    </form>
                                
                    </x-adminlte-modal>
{{-- aqui terminamos de actualizar el periodo  --}}
                        



                             {{-- boton de editar  --}}
                            <a href="{{route('disciplina.edit',$disciplina)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" ><i class="fa fa-lg fa-fw fa-pen"></i></a> 
                           {{-- boton de eliminar  --}}          
                               <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $disciplina->id }}">
                                   <i class="fa fa-lg fa-fw fa-trash"></i>
                               </button>
                           {{-- boton de show para poder ver los datos de un empleado --}}
                           <a href="{{route('disciplina.show',$disciplina)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                               <i class="fa fa-lg fa-fw fa-eye"></i>
                           </a>
                       </div>

                   </td>
                   {{-- Custom --}}
                                <x-adminlte-modal id="modalCustom" title="Eliminar" size="sm" theme="dark"
                                icon="fas fa-bell" v-centered static-backdrop scrollable>
                                <div style="height:80px;">Esta seguro de eliminar </div>
                                <x-slot name="footerSlot">
                                
                                    <form action="{{route('disciplina.destroy',$disciplina->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                    </form>
                                    
                                    <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
                                </x-slot>
                                </x-adminlte-modal>
                    


                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>


@stop