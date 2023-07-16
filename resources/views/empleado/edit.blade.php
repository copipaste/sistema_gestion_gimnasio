@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar datos Empleado</h1>
@stop

@section('content')
<form method="POST" action="{{ route('empleado.update', $empleado) }}">
    @method("PUT")
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="nro_carnet" label="nro_carnet" type="number" placeholder="Número de carnet" label-class="text-lightblue" value="{{ $empleado->nro_carnet }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="nombre" label="nombre" type="text" placeholder="Nombre" label-class="text-lightblue" value="{{ $empleado->nombre }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="apellido" label="apellido" type="text" placeholder="Apellido" label-class="text-lightblue" value="{{ $empleado->apellido }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="fecha_nacimiento" label="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" label-class="text-lightblue" value="{{ $empleado->fecha_nacimiento }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="telefono_principal" label="telefono_principal" type="number" placeholder="Teléfono principal" label-class="text-lightblue" value="{{ $empleado->telefono_principal }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="telefono_emergencia" label="telefono_emergencia" type="number" placeholder="Teléfono de emergencia" label-class="text-lightblue" value="{{ $empleado->telefono_emergencia }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="email" label="email" type="email" placeholder="Email" label-class="text-lightblue" value="{{ $empleado->email }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control" required>
                <option value="MASCULINO" {{ $empleado->sexo == 'MASCULINO' ? 'selected' : '' }}>Masculino</option>
                <option value="FEMENINO" {{ $empleado->sexo == 'FEMENINO' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tipo_sangre">Tipo de sangre</label>
            <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                <option value="A+" {{ $empleado->tipo_sangre == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $empleado->tipo_sangre == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $empleado->tipo_sangre == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $empleado->tipo_sangre == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ $empleado->tipo_sangre == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $empleado->tipo_sangre == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ $empleado->tipo_sangre == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="" {{ $empleado->tipo_sangre == '' ? 'selected' : '' }}>No sabe</option>
            </select>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="peso" label="peso" type="number" placeholder="Peso" label-class="text-lightblue" value="{{ $empleado->peso }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="direccion" label="direccion" type="text" placeholder="Dirección" label-class="text-lightblue" value="{{ $empleado->direccion }}">
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="id_tarjeta" label="id_tarjeta" type="number" placeholder="ID Tarjeta" label-class="text-lightblue" value="{{ $empleado->id_tarjeta }}">
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
            {{$empleado->descripcion}}
            </x-adminlte-textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('empleado.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
@stop