
@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Informacion de la actualizacion de datos</h1>
@stop

@section('content')

        <table>
            <thead>
                <tr>
                    <th>Dato</th>
                    <th>Antiguo</th>
                    <th>Nuevo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($combinedData as $data)
                    <tr>
                        @if ($data['dato'] == 'created_at')

                        
                            <td>creado en fecha:</td>
                        @elseif ($data['dato'] == 'updated_at')
                            <td>actualizado en fecha:</td>
                        @else
                            <td>{{ $data['dato'] }}</td>

                            <script>
                                console.log($data['dato']);
                            </script>
                        @endif
                        <td>{{ $data['antiguo'] }}</td>
                        <td>{{ $data['nuevo'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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