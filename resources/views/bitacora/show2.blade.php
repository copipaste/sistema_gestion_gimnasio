
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Informacion</h1>
@stop

@section('content')


@if (property_exists($data,'old'))
        <table>
            <thead>
                <tr>
                    <th>Dato</th>
                    <th>Antiguo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->old as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@else
        <table>
            <thead>
                <tr>
                    <th>Dato</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->attributes as $key => $value)
                    <tr>
                        @if ($key == 'created_at')
                        <td>creado en fecha: </td>
                        @elseif ($key == 'updated_at')
                        <td>actualizado en fecha: </td>
                        @else
                        <td>{{ $key }}</td>
                        @endif
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endif

    <div class="form-group mt-2">
        <a href="{{ route('bitacora.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
   


    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }
    </style>

@stop 
@role('admin')
@endrole