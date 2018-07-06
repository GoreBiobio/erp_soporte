@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Inicio
@endsection
@section('contentheader_title')
    Hola :)
@endsection
@section('contentheader_description')
    / Sesión de: {{ Auth::user()->name}}
@endsection

@section('main-content')
    <br>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $num_sop }}</h3>

                    <p>Soportes Pendientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $num_mant }}<sup style="font-size: 20px"></sup></h3>

                    <p>Mantenciones Pendientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-wrench"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>XX</h3>

                    <p>Mensajes sin Leer</p>
                </div>
                <div class="icon">
                    <i class="fa fa-send"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>XX</h3>

                    <p>Historicos Cerrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-archive"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <hr>


    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">ÚLTIMOS INCIDENTES</h3>
            </div>

            <div class="box box-widget">
                <center>
                    <button type="button" onclick="location.href='/Incidencia/Nuevo';" class="btn btn-danger btn-xs"><i class="fa fa-flag-o"></i> Nueva Incidencia
                    </button>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @foreach($incidencias as $inc)

                    @if($inc -> tipoInc == 'Baja Inesperada')
                        <div class="alert alert-danger alert-dismissible">
                            @elseif($inc -> tipoInc == 'Mant. Correctiva')
                                <div class="alert alert-warning alert-dismissible">
                                    @elseif($inc -> tipoInc == 'Baja Supervisada')
                                        <div class="alert alert-info alert-dismissible">
                                            @elseif($inc -> tipoInc == '')
                                            @else
                                            @endif
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>
                                            <h4><i class="icon fa fa-warning"></i> {{ $inc -> servAfectado }}!
                                                - {{ $inc -> tipoInc }}
                                            </h4>
                                            {{ $inc -> detalleIncid }}

                                            <br><br>
                                            <small>Reportado por: {{ $inc -> name }}</small>
                                        </div>

                                        @endforeach
                                </div>
                                <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
            </div>


@endsection
