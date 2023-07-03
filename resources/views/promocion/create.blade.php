@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Registrar Promocion</h1>
@stop

@section('content')


   

    @if ($errors->any())
    <div class="alert alert-warning alert-dissmissible fade show" role = "alert">
        <ul>
            @foreach ($errors->all as $error )
            <li>{{ $error}}</li>
            @endforeach
        </ul>

    </div>
    @endif


<form method="POST" action = "{{route('promocion.store')}}">
    @csrf
            <div>
                        <div class="row" >
                            <x-adminlte-input name="nombre" label="nombre"  type="text" placeholder="nombre" label-class="text-lightblue"  fgroup-class="col-md-6">
                
                            </x-adminlte-input>
                        </div>
                        <div class="row" >
                            <x-adminlte-input name="dias_regalo" label="dias de regalo"  type="number" placeholder="ej:20" label-class="text-lightblue"  fgroup-class="col-md-6">
            
                            </x-adminlte-input>
                        </div>
                        <div class="row" >
                            <x-adminlte-input name="porcentaje_descuento" label="porcentaje de descuento"  type="number" placeholder="ej:20" label-class="text-lightblue"  fgroup-class="col-md-6">
            
                            </x-adminlte-input>
                        </div>
                        <div class="row" >
                            <x-adminlte-textarea name="descripcion" label="Description" rows=5 label-class="text-lightblue" fgroup-class="col-md-6"
                            igroup-size="sm" placeholder="Inserte descripcion...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                        </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-2">
                            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                            <a href="{{ route('promocion.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>     
                    </div>
                </div>
</form>




@stop