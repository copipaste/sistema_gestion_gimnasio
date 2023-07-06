

@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Añadir Producto</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            {{-- FORMULARIO PARA AGREGAR CADA PRODUCTO --}}
            <form method="POST" action="{{ route('venta.store') }}">
                @csrf
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select name="producto" id="producto" class="form-control" required>
                        <option value="">---Seleccione un Producto---</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                                {{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="precio" id="precio" class="form-control" type="number"
                        placeholder="Precio" readonly>
                </div>
                {{-- ESTE SCRIPT SIRVE PARA QUE CADA VEZ QUE SE SELECCIONES OTRO PRODUCTO, CAMBIE EL PRECIO --}}
                <script>
                    // Obtener el elemento select y el campo de texto de precio
                    const productoSelect = document.getElementById('producto');
                    const precioInput = document.getElementById('precio');

                    // Escuchar el evento de cambio en el select
                    productoSelect.addEventListener('change', function() {
                        // Obtener el precio seleccionado para el producto seleccionado
                        const selectedOption = productoSelect.options[productoSelect.selectedIndex];
                        const precio = selectedOption.getAttribute('data-precio');

                        // Actualizar el valor del campo de texto de precio
                        precioInput.value = precio;
                    });
                </script>

                <div class="form-group">
                    <label class="label">Cantidad</label>
                    <input required autocomplete="off" name="cantidad" class="form-control" type="number"
                        placeholder="Cantidad">
                </div>

                <div class="form-group">
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                </div>
                
            </form>

            {{-- FORMULARIO PARA MOSTRAR TODOS LOS PRODUCTOS --}}
            <form method="POST" action="{{ route('venta.store') }}">
                @csrf
                <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark">

                    @foreach ($prods as $prod)
                        <tr>
                            <td>{{ $prod['nombre'] }}</td>
                            <td>{{ $prod['precio'] }}</td>
                            <td>{{ $prod['cantidad'] }}</td>

                            <td width="15px"> {{-- esto es como una columna mas  --}}
                                <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}

                                    {{-- boton de editar --}}
                                    <a href="{{ route('producto.edit', $producto) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>

                                    {{-- boton de eliminar --}}
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                        data-toggle="modal" data-target="#modalCustom{{ $producto->id }}">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>

                                </div>
                            </td>
                            
                        </tr>
                    @endforeach

                </x-adminlte-datatable>
                <div class="form-group">
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                    <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                </div>
            </form>
        </div>
    </div>



    {{-- <div class="form-group">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" class="form-control" required>
            <option value="">---Seleccione una categoria---</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div> --}}



@stop







