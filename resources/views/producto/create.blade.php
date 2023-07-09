@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Añadir Producto</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('producto.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-control" required>
                        <option value="">---Seleccione una categoria---</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                </div>
            </form>
        </div>
    </div>

@stop
