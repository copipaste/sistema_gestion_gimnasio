@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Lista de Productos</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>

                <div class="btn btn-lg btn-default">
                    <a href="{{ route('producto.create') }}" class="text-primary">
                        <i class="fa fa-lg fa-fw fa-plus"></i>
                        Nuevo Producto</a>
                </div>

                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>

                        <td width="15px"> {{-- esto es como una columna mas  --}}
                            <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}

                                {{-- boton de editar --}}
                                <a href="{{ route('producto.edit', $producto) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                {{-- boton de eliminar --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalCustom{{ $producto->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                            </div>
                        </td>
                        {{-- Custom Modal Eliminar --}}
                        <x-adminlte-modal id="modalCustom{{ $producto->id }}" title="Eliminar" size="sm" theme="dark"
                            icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height:80px;">Esta seguro de eliminar: {{ $producto->nombre }} </div>
                            <x-slot name="footerSlot">

                                <form action="{{ route('producto.destroy', $producto) }}" method="POST">
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
