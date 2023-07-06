@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Promociones</h1>
@stop

@section('content')
@if (session('success'))
    <x-adminlte-alert id="success-alert" theme="success" title="Success">
        {{ session('success') }}
    </x-adminlte-alert>
    <script>
        setTimeout(function(){
            document.getElementById('success-alert').style.display = 'none';
        }, 5000); // Cambia 5000 por la duración en milisegundos que deseas (por ejemplo, 5000 para 5 segundos)
    </script>
@endif
@if (session('deleted'))
    <x-adminlte-alert id="success-alert" theme="success" title="Success">
        {{ session('deleted') }}
    </x-adminlte-alert>
    <script>
        setTimeout(function(){
            document.getElementById('success-alert').style.display = 'none';
        }, 5000); // Cambia 5000 por la duración en milisegundos que deseas (por ejemplo, 5000 para 5 segundos)
    </script>
@endif

<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($promociones as $promocion)
                <tr>
                    <td>{{ $promocion->nombre }}</td>
                    <td>{{ $promocion->dias_regalo }}</td>
                    <td>{{ $promocion->porcentaje_descuento }}</td>
                    <td>{{ $promocion->descripcion }}</td>

                    <td width="15px">
                        <div class="d-flex">

                            {{-- Custom -- esto es para el de editar membresía --}}
                            <a href="{{ route('promocion.edit', $promocion) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $promocion->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                           <a href="{{ route('promocion.show', $promocion) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>

                        </div>
                    </td>
                    {{-- Custom modal de eliminar--}}
                    <x-adminlte-modal id="modalCustom{{ $promocion->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <div style="height: 80px;">¿Está seguro de eliminar?</div>
                        <x-slot name="footerSlot">
                            <form action="{{ route('promocion.destroy', $promocion) }}" method="POST">
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