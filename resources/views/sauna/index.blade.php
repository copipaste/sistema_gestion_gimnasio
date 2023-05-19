@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">pagos</h1>
@stop

@section('content')
@if (session('mensaje'))
    <div class="alert alert-success">
        <strong>{{session('mensaje')}}</strong>
    </div>
@endif
<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons beautify>
            @foreach($saunas as $sauna)
                <tr>
                    <td>{{ $sauna->id}}</td>
                    <td>{{$sauna->monto}}</td>
                    <td>{{$sauna->date}}</td>
                    <td width="15px"><a href="{{route('sauna.edit',$sauna)}}" class="btn btn-primary btn-sm">editar</a></td>
                    <td width="15px">
                        <form action="{{route('sauna.destroy',$sauna)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value = "eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop
