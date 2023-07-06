@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Crear Categoría</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('categoria.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Crear Producto</button>
                </div>
            </form>
        </div>
    </div>

@stop