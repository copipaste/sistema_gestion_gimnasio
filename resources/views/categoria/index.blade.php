@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Lista de Categorías</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>

                <button class="btn btn-lg btn-default text-primary" data-toggle="modal" data-target="#modalCreateCategoria">
                    <i class="fa fa-lg fa-fw fa-plus"></i>
                    Crear Categoría
                </button>
                {{-- ESTO ES EL MODAL PARA CREAR CATEGORIA --}}
                <x-adminlte-modal id="modalCreateCategoria" title="Crear Nueva Categoria" size="lg" theme="dark"
                    icon="" v-centered static-backdrop scrollable>

                    <form action="{{ route('categoria.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la Categoría: </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <x-slot name="footerSlot">
                            <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" />
                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                        </x-slot>
                        <div class="text-right">
                            <x-adminlte-button class="float-left mt-3" type="submit" label="Aceptar" theme="success" />
                            <x-adminlte-button class="btn btn-primary float-right mt-3" theme="danger" label="Cancelar"
                                data-dismiss="modal" />
                        </div>

                        <x-slot name="footerSlot">
                        </x-slot>
                    </form>

                </x-adminlte-modal>

                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>

                        <td width="15px"> {{-- esto es como una columna mas  --}}
                            <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}

                                {{-- boton de editar --}}
                                <a href="{{ route('categoria.edit', $categoria) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                {{-- boton de eliminar --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalCustom{{ $categoria->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                            </div>
                        </td>

                        {{-- Custom Modal Eliminar --}}
                        <x-adminlte-modal id="modalCustom{{ $categoria->id }}" title="Eliminar" size="sm"
                            theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height:80px;">Esta seguro de eliminar la Categoría: {{ $categoria->nombre }} </div>
                            <x-slot name="footerSlot">

                                <form action="{{ route('categoria.destroy', $categoria) }}" method="POST">
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