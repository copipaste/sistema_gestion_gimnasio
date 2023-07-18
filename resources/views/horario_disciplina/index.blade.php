@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Horario Disciplinas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($horario_disciplinas as $horario_disciplina)
                <tr>
                    <td>{{ $disciplinas->where('id', $horario_disciplina->id_disciplina)->first()->nombre }}</td>
                    <td>{{ $horario_disciplina->dia }}</td>
                    <td>{{ $horario_disciplina->hora_inicio }}</td>
                    <td>{{ $horario_disciplina->hora_fin }}</td>
                    <td width="15px">
                        <div class="d-flex">
                            <a href="{{ route('horario_disciplina.edit', $horario_disciplina) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $horario_disciplina->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <a href="{{ route('horario_disciplina.show', $horario_disciplina) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </td>
                    {{-- Custom --}}
                    <x-adminlte-modal id="modalCustom{{ $horario_disciplina->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <div style="height: 80px;">¿Está seguro de eliminar?</div>
                        <x-slot name="footerSlot">
                            <form action="{{ route('horario_disciplina.destroy', $horario_disciplina) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                            </form>
                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                        </x-slot>
                    </x-adminlte-modal>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop
