@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">registrar Usuario</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ route('cliente.store') }}" >
            @csrf
            <div class="form-group">
                <label for="nro_carnet">nro_carnet</label>
                <input type="number" name="nro_carnet" id="nro_carnet" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono_principal">Teléfono principal</label>
                <input type="number" name="telefono_principal" id="telefono_principal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono_emergencia">Teléfono Emergencia</label>
                <input type="number" name="telefono_emergencia" id="telefono_emergencia" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="form-control" required>
                    <option value="MASCULINO">Masculino</option>
                    <option value="FEMENINO">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_sangre">tipo de sangre</label>
                <select name="tipo_sangre" id="tipo_sangre" class="form-control" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input type="number" name="peso" id="peso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_tarjeta">ID de Tarjeta</label>
                <input type="text" name="id_tarjeta" id="id_tarjeta" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_rol">ID rol</label>
                <select name="id_rol" id="id_rol" class="form-control" required>
                    @foreach ($roles as $role)
                    <option value = "{{$role->id}}">{{ $role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_periodo">id periodo</label>
                <select name="id_periodo" id="id_periodo" class="form-control" required>
                    @foreach ($periodos as $periodo)
                    <option value = "{{$periodo->id}}">{{ $periodo->id}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_membresia">id membresia</label>
                <select name="id_membresia" id="id_membresia" class="form-control" required>
                    @foreach ($membresias as $membresia)
                    <option value = "{{$membresia->id}}">{{ $membresia->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="row" >
        
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Crear Cliente</button>
            </div>
        </form>
    </div>
</div>

@stop