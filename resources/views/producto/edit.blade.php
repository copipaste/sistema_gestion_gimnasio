@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Editar Producto</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('producto.update', $producto) }}">
        @method('PUT')
        @csrf
        <div>
            <div class="row">
                <x-adminlte-input name="nombre" label="nombre" type="text" placeholder="nombre" label-class="text-lightblue"
                    fgroup-class="col-md-6" value="{{ $producto->nombre }}">

                </x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input name="precio" label="precio" type="number" placeholder="precio"
                    label-class="text-lightblue" fgroup-class="col-md-6" value="{{ $producto->precio }}">

                </x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input name="stock" label="stock" type="number" placeholder="stock"
                    label-class="text-lightblue" fgroup-class="col-md-6" value="{{ $producto->stock }}">

                </x-adminlte-input>
            </div>
            <div class="row">
                <div class="col-md-6"> <!-- Añadida la clase col-md-6 -->
                    <label for="id_categoria">Categoría</label>
                    <select name="id_categoria" id="id_categoria" class="form-control" required>
                        <option value="">---Seleccione una categoría---</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 mt-2">
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                    <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>

        </div>
    </form>
@stop
