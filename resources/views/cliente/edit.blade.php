@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar datos Cliente</h1>
@stop

@section('content')
<form method="POST" action="{{ route('cliente.update', $cliente) }}">
    @method("PUT")
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="nro_carnet" label="nro_carnet" type="number" placeholder="Número de carnet" label-class="text-lightblue" value="{{ $cliente->nro_carnet }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="nombre" label="nombre" type="text" placeholder="Nombre" label-class="text-lightblue" value="{{ $cliente->nombre }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="apellido" label="apellido" type="text" placeholder="Apellido" label-class="text-lightblue" value="{{ $cliente->apellido }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="fecha_nacimiento" label="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" label-class="text-lightblue" value="{{ $cliente->fecha_nacimiento }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="telefono_principal" label="telefono_principal" type="number" placeholder="Teléfono principal" label-class="text-lightblue" value="{{ $cliente->telefono_principal }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="telefono_emergencia" label="telefono_emergencia" type="number" placeholder="Teléfono de emergencia" label-class="text-lightblue" value="{{ $cliente->telefono_emergencia }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="email" label="email" type="email" placeholder="Email" label-class="text-lightblue" value="{{ $cliente->email }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control" required>
                <option value="MASCULINO" {{ $cliente->sexo == 'MASCULINO' ? 'selected' : '' }}>Masculino</option>
                <option value="FEMENINO" {{ $cliente->sexo == 'FEMENINO' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tipo_sangre">Tipo de sangre</label>
            <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                <option value="A+" {{ $cliente->tipo_sangre == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $cliente->tipo_sangre == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $cliente->tipo_sangre == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $cliente->tipo_sangre == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ $cliente->tipo_sangre == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $cliente->tipo_sangre == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ $cliente->tipo_sangre == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="" {{ $cliente->tipo_sangre == '' ? 'selected' : '' }}>No sabe</option>
            </select>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="peso" label="peso" type="number" placeholder="Peso" label-class="text-lightblue" value="{{ $cliente->peso }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="direccion" label="direccion" type="text" placeholder="Dirección" label-class="text-lightblue" value="{{ $cliente->direccion }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="id_tarjeta" label="id_tarjeta" type="number" placeholder="ID Tarjeta" label-class="text-lightblue" value="{{ $cliente->id_tarjeta }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6" >
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=5 label-class="text-lightblue" 
            igroup-size="sm">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark" >
                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                </div>
            </x-slot>
            {{$cliente->descripcion}}
            </x-adminlte-textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('cliente.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
@stop
