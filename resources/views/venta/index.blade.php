@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Ventas Realizadas</h1>
@stop

@section('content')

<div class="form-group align-items-end">
    <div class="btn btn-lg btn-default" >
        <a href="{{ route('create/estimate/page') }}" class="text-dark" >
            <i class="fa fa-lg fa-fw fa-plus"></i>
            Nueva Venta</a>
    </div>
</div>

    <div class="card">
        <div class="card-body">

            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>

 

                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->total }}</td>
                    
                        @if($users->where('id', $venta->id_administrador)->first()->nombre != null)
                        <td>{{ $users->where('id', $venta->id_administrador)->first()->nombre }}</td>
                        @else
                        <td>usuario no esta en sistema</td>
                        @endif

                        <td width="15px"> {{-- esto es como una columna mas  --}}
                            <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}





{{-- Custom -- esto es para el de editar membresía --}}
<button class="btn btn-xs btn-default text-info mx-1 shadow" title="Actualizar Membresia"
data-toggle="modal" data-target="#modalUpdateMembresia{{ $venta->id }}">
<i class="fa fa-lg fa-fw fa-eye"></i>
</button>

{{-- aqui actualizamos el periodo--}}
<x-adminlte-modal id="modalUpdateMembresia{{ $venta->id }}" title="Actualizar Membresia" size="lg" theme="dark" v-centered static-backdrop scrollable>

             <div > 

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Venta</th>
                            <th>Producto</th>
                            <th>cantidad</th>
                            <th>precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detalle_ventas as $detalle_venta)
                        <tr>
                            @if($detalle_venta->id_venta == $venta->id)
                            <td>{{$detalle_venta->id_venta}}</td>
                            <td>{{$productos->where('id',$detalle_venta->id_producto)->first()->nombre}}</td>
                            <td>{{$detalle_venta->cantidad}}</td>
                            <td>{{$detalle_venta->precio}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
             </div>
            <div class ="text-right">
                 <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="danger" label="Cancelar" data-dismiss="modal" />
            </div>
   
            <x-slot name="footerSlot" >
            </x-slot>

</x-adminlte-modal>
{{-- aqui terminamos de actualizar el periodo  --}}


                                {{-- boton de eliminar --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalCustom{{$venta->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                            </div>
                        </td>
                        {{-- Custom Modal Eliminar --}}
                        <x-adminlte-modal id="modalCustom{{$venta->id}}" title="Eliminar" size="sm" theme="dark"
                            icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height:80px;">Esta seguro de eliminar: {{ $venta->nombre}} </div>
                            <x-slot name="footerSlot">
                                
                                <form action="{{ route('estimate.destroy', $venta)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                </form>

                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                            </x-slot>
                        </x-adminlte-modal>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
        </div>
    </div>
@stop