@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Membresías</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($membresias as $membresia)
                <tr>
                    <td>{{ $membresia->nombre }}</td>
                    <td>{{ $membresia->duracion }}</td>
                    <td>{{ $membresia->precio }}</td>
                    <td>{{ $membresia->descripcion }}</td>
                    <td width="15px">
                        <div class="d-flex">
                            <a href="{{ route('membresia.edit', $membresia) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $membresia->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <a href="{{ route('membresia.show', $membresia) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Custom --}}
                <x-adminlte-modal id="modalCustom{{ $membresia->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                    <div style="height: 80px;">¿Está seguro de eliminar?</div>
                    <x-slot name="footerSlot">
                        <form action="{{ route('membresia.destroy', $membresia) }}" method="POST">
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
