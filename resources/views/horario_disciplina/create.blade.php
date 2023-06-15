@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">registrar Horario de Disciplina</h1>
@stop

@section('content')

<form method="POST" action = "{{route('horario_disciplina.store')}}">
    @csrf
            <div class="col-md-6">
                <div class="form-group">
                        <label for="id_disciplina">disciplina</label>
                        <select name="id_disciplina" id="id_disciplina" class="form-control">
                            @foreach ($disciplinas as $disciplina)
                            <option value = "{{$disciplina->id}}">{{ $disciplina->nombre}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label for="dia">dia</label>
                    <select name="dia" id="dia" class="form-control">
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <div class="form-group">
                        @php
                        $config = ['format' => 'HH:mm:ss'];
                        @endphp
                        <x-adminlte-input-date name="hora_inicio" :config="$config" placeholder="selecciona la hora de inicio" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        @php
                        $config = ['format' => 'HH:mm:ss'];
                        @endphp
                        <x-adminlte-input-date name="hora_fin" :config="$config" placeholder="selecciona la hora de fin" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                </div>

                <div class="form-group">
                        <div class="form-group col-md-6">
                            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
                            <a href="{{ route('sauna.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                        
                    </div>
            </div>
</form>




@stop