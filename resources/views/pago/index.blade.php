@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Historial de pagos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($historial_transacciones as $historial_transaccion)
                <tr>
                        <td>{{ $users->where('id', $historial_transaccion->id_cliente)->first()->nro_carnet }}</td>
                        <td>{{ $users->where('id', $historial_transaccion->id_cliente)->first()->nombre }}</td>
                    <td>{{ $historial_transaccion->monto }}</td>
                    <td>{{ $historial_transaccion->fecha_transaccion }}</td>
                    <td>{{ $users->where('id', $historial_transaccion->id_tramitador)->first()->nombre }}</td>
                    
                    <td>{{ $historial_transaccion->membresia_adquirida }}</td>
                    <td>{{ $tipo_pagos->where('id', $historial_transaccion->cod_pago)->first()->nombre }}</td>
                    <td width="15px">
                        <div class="d-flex">
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $historial_transaccion->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <a href="{{ route('pago.show', $historial_transaccion) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Custom --}}
                <x-adminlte-modal id="modalCustom{{ $historial_transaccion->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                    <div style="height: 80px;">¿Está seguro de eliminar?</div>
                    <x-slot name="footerSlot">
                        <form action="{{ route('pago.destroy', $historial_transaccion) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                        </form>
                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                    </x-slot>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop
