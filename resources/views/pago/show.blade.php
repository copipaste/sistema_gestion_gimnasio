
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Informacion del cliente</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">  
            <p><strong>numero de carnet:</strong> {{ $clientes->where('id', $historial_transacciones->id_cliente)->first()->nro_carnet }}</p>
             {{-- <p><strong>nombre cliente:</strong> {{$cliente->where('nro_carnet', $historial_transacciones->ci_cliente)->first()->nombre}}</p> --}}
            <p><strong>monto:</strong> {{ $historial_transacciones->monto }}</p>
            <p><strong>fecha de transaccion:</strong> {{ $historial_transacciones->fecha_transaccion }}</p>
            <p><strong>descripcion:</strong> {{ $historial_transacciones->descripcion }}</p>
            <p><strong>periodo inicio:</strong> {{ $historial_transacciones->periodo_inicio }}</p>
            <p><strong>periodo fin:</strong> {{ $historial_transacciones->periodo_fin }}</p>
            <p><strong>membresia adquirida:</strong> {{ $historial_transacciones->membresia_adquirida }}</p>
            <p><strong>tipo de pago:</strong> {{ $historial_transacciones->cod_pago }}</p>


            {{-- @if ($cliente->id_membresia != null)
            <p><strong>membresia:</strong> {{$membresias->where('id', $cliente->id_membresia)->first()->nombre}}</p>
            @else
            <p><strong>membresia:</strong></p>
            @endif --}}



        </div>
    </div>
    <div class="form-group mt-2">
    <a href="{{ route('pago.index') }}" class="btn btn-danger">Atras</a>
    </div>
   


@stop 
@role('admin')
@endrole