@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Disciplinas</h1>
@stop

@section('content')


<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->nombre}}</td>
                    <td>{{$disciplina->capacidad}}</td>

                    

                    


                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>

{{-- Custom --}}




@stop