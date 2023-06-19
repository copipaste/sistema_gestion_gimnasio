@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar el Horario de la disciplina</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('horario_disciplina.update',$horario_disciplina) }}">
        @method("PUT")
        @csrf

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-select name="id_disciplina" label="Disciplina" label-class="text-lightblue">
                    @foreach ($lista_disciplinas as $una_disciplina)
                        <option value="{{ $una_disciplina->id }}" @if ($una_disciplina->id == $valorPorDefecto) selected @endif>
                            {{ $una_disciplina->nombre }}
                        </option>
                    @endforeach
                </x-adminlte-select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="dia">Día</label>
                <select name="dia" id="dia" class="form-control">
                    <option value="Lunes" @if ( $horario_disciplina->dia  == "Lunes") selected @endif>Lunes</option>
                    <option value="Martes" @if ( $horario_disciplina->dia == "Martes") selected @endif>Martes</option>
                    <option value="Miércoles" @if ( $horario_disciplina->dia  == "Miércoles") selected @endif>Miércoles</option>
                    <option value="Jueves" @if ( $horario_disciplina->dia  == "Jueves") selected @endif>Jueves</option>
                    <option value="Viernes" @if ( $horario_disciplina->dia == "Viernes") selected @endif>Viernes</option>
                    <option value="Sábado" @if ( $horario_disciplina->dia  == "Sábado") selected @endif>Sábado</option>
                    <option value="Domingo" @if ( $horario_disciplina->dia  == "Domingo") selected @endif>Domingo</option>
                </select>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="hora_inicio" label="Hora de inicio" type="time" placeholder="" label-class="text-lightblue" value="{{ $horario_disciplina->hora_inicio }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="hora_fin" label="Hora de fin" type="time" placeholder="" label-class="text-lightblue" value="{{ $horario_disciplina->hora_fin }}" />
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-6">
                @php
                $config = ['format' => 'HH:mm:ss'];
                @endphp
                <x-adminlte-input-date name="hora_inicio" label="Hora de inicio" :config="$config" placeholder="selecciona la hora de inicio" value="{{ $horario_disciplina->hora_inicio }}" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>

                @php
                $config = ['format' => 'HH:mm:ss'];
                @endphp
                <x-adminlte-input-date name="hora_fin" label="Hora de fin" :config="$config" placeholder="selecciona la hora de fin" value="{{ $horario_disciplina->hora_fin }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
        </div>
        
    
        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('horario_disciplina.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
