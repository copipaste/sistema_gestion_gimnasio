@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Tipos de pago</h1>
@stop

@section('content')
<div class="form-group align-items-end">

    <button class="btn btn-lg btn-default text-primary" data-toggle="modal" data-target="#modalCreateCategoria">
        <i class="fa fa-lg fa-fw fa-plus"></i>
        Crear Tipo de pago
    </button>
</div>

    <div class="card">

        <div class="card-body">

            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark">

                {{-- ESTO ES EL MODAL PARA CREAR CATEGORIA --}}
                <x-adminlte-modal id="modalCreateCategoria" title="Crear Nueva Categoria" size="lg" theme="dark"
                    icon="" v-centered static-backdrop scrollable>

                    <form action="{{ route('tipo_pago.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del tipo de pago: </label>
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

                @foreach ($tipo_pagos as $tipo_pago)
                    <tr>
                        <td>{{ $tipo_pago->nombre }}</td>


                        <td width="15px"> {{-- esto es como una columna mas  --}}
                            <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}


                                {{-- boton de eliminar --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalCustom{{ $tipo_pago->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                            </div>
                        </td>

                        {{-- Custom Modal Eliminar --}}
                        <x-adminlte-modal id="modalCustom{{ $tipo_pago->id }}" title="Eliminar" size="sm"
                            theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height:80px;">Esta seguro de eliminar la Categoría: {{ $tipo_pago->nombre }} </div>
                            <x-slot name="footerSlot">

                                <form action="{{ route('tipo_pago.destroy', $tipo_pago) }}" method="POST">
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