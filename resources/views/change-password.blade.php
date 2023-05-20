@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Cambiar contraseña</h1>
@stop
@section('content')


    <form action="{{ route('usuarios.update-password', $user) }}" method="POST">
        @csrf  
        @method('PUT')
        <div class="row" >
            <x-adminlte-input name="password" label="Nueva contraseña"  type="password" placeholder="" label-class="text-lightblue"  fgroup-class="col-md-6" required>

            </x-adminlte-input>
        </div>
        <div class="row" >
            <x-adminlte-input name="password_confirmation" label="Confirmar contraseña nueva"  type="password" placeholder="" label-class="text-lightblue"  fgroup-class="col-md-6" required>

            </x-adminlte-input>
        </div>
        <div class="form-group col-md-6">
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
@stop