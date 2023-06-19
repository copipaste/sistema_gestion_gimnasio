@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
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

<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nro_carnet }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $periodos->where('id', $cliente->id_periodo)->first()->desde }}</td>
                    <td>{{ $periodos->where('id', $cliente->id_periodo)->first()->hasta }}</td>
                    <td>
                        @php
                            $fechaActual = date('Y-m-d');
                            $claseBoton = $periodos->where('id', $cliente->id_periodo)->first()->hasta < $fechaActual ? 'btn-danger' : 'btn-success';
                            $texto = $periodos->where('id', $cliente->id_periodo)->first()->hasta < $fechaActual ? 'Vencido' : 'Vigente';
                        @endphp
                        <button class="btn {{ $claseBoton }} btn-rounded">{{ $texto }}</button>
                    </td>
                    <td>{{ $membresias->where('id', $cliente->id_membresia)->first()->nombre }}</td>
                    <td width="15px">
                        <div class="d-flex">


{{-- Custom -- esto es para el de editar membresía --}}
                                <button class="btn btn-xs btn-default text-info mx-1 shadow" title="Actualizar Membresia"
                                    data-toggle="modal" data-target="#modalUpdateMembresia{{ $cliente->id }}">
                                    <i class="fas fa-lg fa-fw fa-calendar-day"></i>
                                </button>

                                <x-adminlte-modal id="modalUpdateMembresia{{ $cliente->id }}" title="Actualizar Membresia" size="sm" theme="dark" v-centered static-backdrop scrollable>

                                
                                    <form action="{{ route('periodo.update',$cliente) }}" method="POST">
                                        @method('PUT') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                                        @csrf
                                                 <div > 
                                                  
                                                    <label for="tipo_membresia">Tipo de Membresia</label>
                                                        <select name="tipo_membresia" id="tipo_membresia" class="form-control" required>
                                                            <option value="">Seleccione una membresia</option>
                                                            @foreach ($membresias as $membresia)
                                                                <option value="{{ $membresia->id }}"> {{ $membresia->nombre }}</option>
                                                            @endforeach
                                                        </select>

                                                        <label for="tipo_pago">Tipo de Pago</label>
                                                        <select name="tipo_pago" id="tipo_pago" class="form-control" required>
                                                            <option value="">Seleccione el tipo de pago</option>
                                                            @foreach ($tipo_pagos as $tipo_pago)
                                                                <option value="{{ $tipo_pago->id }}"> {{ $tipo_pago->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                             
                                                        <label for="fecha_inicio">Fecha de Inicio</label>
                                                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                                                    
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
                                
{{-- Custom -- esto es para el de editar membresía --}}
                            <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $cliente->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <a href="{{ route('cliente.show', $cliente) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </td>
                    {{-- Custom modal de eliminar--}}
                    <x-adminlte-modal id="modalCustom{{ $cliente->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <div style="height: 80px;">¿Está seguro de eliminar?</div>
                        <x-slot name="footerSlot">
                            <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
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