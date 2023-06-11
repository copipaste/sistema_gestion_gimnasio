@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Disciplinas</h1>
@stop

@section('content')


<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($horario_disciplinas as $horario_disciplina)
                <tr>
                    <td>{{$disciplinas->where('id', $horario_disciplina->id_disciplina)->first()->nombre}}</td>
                    <td>{{$horario_disciplina->dia}}</td>
                    <td>{{$horario_disciplina->hora_inicio}}</td>
                    <td>{{$horario_disciplina->hora_fin}}</td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>

{{-- Custom --}}




@stop