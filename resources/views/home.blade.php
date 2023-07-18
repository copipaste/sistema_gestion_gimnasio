@extends('adminlte::page')

@section('title', 'GYM')

@section('content_header')
    <h1 class="m-0 text-dark">INICIO</h1>
@stop
@role('admin')

    @section('content')


        <p>INFORMACION</p>
        <div class="row">
            {{-- TOTAL CLIENTES INSCRITOS --}}
            <div class="col-md-4">
                <div class="m-1">
                    <div class="small-box bg-gradient-primary">
                        <div class="inner">
                            <h3>{{ $CantidadClientesRegistrados }}</h3>
                            <p>Total Clientes Inscritos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('cliente.index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- TOTAL ENTRENADORES --}}
            <div class="col-md-4">
                <div class="m-1">
                    <div class="small-box bg-gradient-secondary">
                        <div class="inner">
                            <h3>{{ $TotalEntrenadores }}</h3>
                            <p>Total Entrenadores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <a href="{{ route('empleado.index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- EXTRA --}}
            {{-- <div class="col-md-4">
            <div class="m-1">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div> --}}
        </div>

        <p>DISCIPLINAS</p>
        <div class="row">
            {{-- MUESTRA TODAS LAS DISCIPLINAS --}}
            @for ($i = 0; $i < $cantidadDisciplinas; $i++)
                <div class="col-md-4">
                    <div class="m-1">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $todasDisciplinas[$i]->nombre }}</span>
                                <span class="info-box-number">
                                    {{ $EspacioDisciplina[$todasDisciplinas[$i]->nombre] }}
                                    / {{ $todasDisciplinas[$i]->capacidad }}
                                </span>
                                <div class="progress">
                                    @php
                                        $porcentaje = ($EspacioDisciplina[$todasDisciplinas[$i]->nombre] / $todasDisciplinas[$i]->capacidad) * 100;
                                    @endphp
                                    <div class="progress-bar {{ $porcentaje >= 100 ? 'bg-danger' : 'bg-info' }}"
                                        style="width: {{ $porcentaje }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        {{-- --------------------- PAGOS ------------------------ --}}
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">PAGOS</h3>
                <div class="card-tools">
                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    {{-- INGRESOS TOTALES --}}
                    <div class="col-md-4">
                        <div class="m-1">
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    <h3>{{ $IngresosTotales }} Bs.</h3>
                                    <p>Ingresos Totales</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <a href="{{ route('pago.index') }}" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- INGRESOS MENSUALES --}}
                    <div class="col-md-4">
                        <div class="m-1">
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    <h3>{{ $IngresosMesActual }} Bs.</h3>
                                    @php
                                        $mesActual = \Carbon\Carbon::now()
                                            ->locale('es')
                                            ->format('F');
                                    @endphp
                                    <p>Ingresos Mes {{ $mesActual }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <a href="{{ route('pago.index') }}" class="small-box-footer">
                                    Más información <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- EXTRA --}}
                    {{-- <div class="col-md-4">
                    <div class="m-1">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    @stop

@endrole
{{-- ESTA VISTA ES SOLAMENTE PARA EL CLIENTE --}}
