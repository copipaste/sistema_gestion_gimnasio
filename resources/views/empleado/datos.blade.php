@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">CLASES</h1>
@stop

@section('content')

    <div class="card ">
        <div class="card-body">             
            
    @foreach ($DisciplinasConEstudiantes as $disciplina => $estudiantes)
            
            <h5><strong> {{ strtoupper($disciplinas->where('id', $disciplina)->first()->nombre) }}</strong></h5>
            <br>
            <p><strong>Horario:</strong></p>

         @foreach ($horario_disciplinas as $horario_disciplina)
                @if ($horario_disciplina->id_disciplina === $disciplinas->where('id', $disciplina)->first()->id)
                <p>
                    {{ $horario_disciplina->dia }}: {{ $horario_disciplina->hora_inicio }} - {{ $horario_disciplina->hora_fin }}
                </p>
                @endif

        @endforeach
        
        <br>
        
        <p><strong>Estudiantes:</strong></p>
        {{-- <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>Nombre Estudiante</th>
                    <th>Telefono</th>
                    <th>Correo</th>
           
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->telefono_principal }}</td>
                    <td>{{ $estudiante->email }}</td>
                
                </tr>
                @endforeach
            </tbody>
        </table> --}}

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th>Nombre Estudiante</th>
                <th>Telefono</th>
                <th>Correo</th>
              </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->telefono_principal }}</td>
                    <td>{{ $estudiante->email }}</td>
                
                </tr>
                @endforeach
            </tbody>
          </table>

        <br>
        <br>
            
    @endforeach

        </div>
    </div>

@stop 










