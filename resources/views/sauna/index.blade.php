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
                    <td width="15px">
                        <div class="d-flex">
                            {{-- boton de editar --}}
                            <a href="{{route('sauna.edit',$sauna)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" >
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            {{-- boton de eliminar --}}
                            <form action="{{route('sauna.destroy',$sauna)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                            {{-- boton de mostrar --}}
                            <a href="{{route('sauna.show',$sauna)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>

                        </div>
 
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop
