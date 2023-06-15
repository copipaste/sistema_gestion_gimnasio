@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Registrar Membresia</h1>
@stop

@section('content')


   

    @if ($errors->any())
    <div class="alert alert-warning alert-dissmissible fade show" role = "alert">
        <ul>
            @foreach ($errors->all as $error )
            <li>{{ $error}}</li>
            @endforeach
        </ul>

    </div>
    @endif


<form method="POST" action = "{{route('membresia.store')}}">
    @csrf
            <div>
                        <div class="row" >
                            <x-adminlte-input name="nombre" label="nombre"  type="text" placeholder="nombre" label-class="text-lightblue"  fgroup-class="col-md-6">
                
                            </x-adminlte-input>
                        </div>
                        <div class="row" >
                            <x-adminlte-input name="duracion" label="duracion"  type="number" placeholder="duracion" label-class="text-lightblue"  fgroup-class="col-md-6">
            
                            </x-adminlte-input>
                        </div>
                        <div class="row" >
                            <x-adminlte-textarea name="descripcion" label="Description" rows=5 label-class="text-lightblue" fgroup-class="col-md-6"
                            igroup-size="sm" placeholder="Insert description...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                        </div>
                        <div class="row" >
                            <x-adminlte-input name="precio" label="precio"  type="number" placeholder="precio" label-class="text-lightblue"  fgroup-class="col-md-6">
                
                            </x-adminlte-input>
                        </div>

                    <div class="row" >
                        {{-- With multiple slots, and plugin config parameter --}}
                        @php
                        $config = [
                            "placeholder" => "Seleccionar disciplinas",
                            "allowClear" => true,
                        ];
                        @endphp
                        <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Disciplinas"
                        label-class="text-lightblue" fgroup-class="col-md-6" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-black">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        @foreach ($disciplinas as $disciplina)
                        <option value = "{{$disciplina->id}}">{{ $disciplina->nombre}}</option>
                        @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-2">
                            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                            <a href="{{ route('membresia.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>     
                    </div>

                </div>
</form>




@stop