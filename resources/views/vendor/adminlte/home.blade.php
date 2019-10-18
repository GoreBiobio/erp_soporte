@extends('adminlte::layouts.apptwo')
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
    <div class="callout callout-warning">
        <h4><i class="icon fa fa-warning"></i> Incidencias Activas de Informática</h4>
        <p class="text-primary" style="color:#fbffff;">
            <marquee behavior="Slide" direction="left">

            </marquee>
        </p>
    </div>
    <hr>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-support"></i> SOPORTES DE SERVICIOS SIN EJECUTAR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Usuario - Servicio</th>
                        <th>Detalle de la Solicitud</th>
                        <th>Nivel Urgencia</th>
                        <th>Estado Actual</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listadoSop as $listadoSop)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/FichaServicio" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSolServ" value="{{ $listadoSop -> idSolServ }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-check-circle"></i> SOP ID
                                            - {{ $listadoSop -> idSolServ }}</button>
                                    </form>
                                </center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> fecCreaSolServ }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> paternoFunc }}, {{ $listadoSop -> nombresFunc }} /
                                    Anexo: {{ $listadoSop -> anexoFunc }} -
                                    Servicio: {{ $listadoSop -> servicio }}
                                </center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> solicitudServ }}</center>
                            </td>
                            <td>
                                <center>@if($listadoSop -> estadoCritSolServ == '1')
                                        BAJA
                                    @elseif($listadoSop -> estadoCritSolServ == '2')
                                        MEDIA
                                    @else
                                        ALTA
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> nombreEstado }}</center>
                            </td>
                            <td>
                                <center>
                                    <form action="/Soporte/TomarServicio" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSolServ" value="{{ $listadoSop -> idSolServ }}">
                                        <button type="submit" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-hand-o-right"></i> TOMAR
                                        </button>
                                    </form>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <hr>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-support"></i> SOPORTES DE HARDWARE SIN EJECUTAR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Usuario - Equipo</th>
                        <th>Detalle de la Solicitud</th>
                        <th>Nivel Crítico</th>
                        <th>Estado Actual</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listadoSopHard as $listadoSop)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $listadoSop -> idSolSop }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-check-circle"></i> SOP ID
                                            - {{ $listadoSop -> idSolSop }}</button>
                                    </form>
                                </center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> fecCreaSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> paternoFunc }}, {{ $listadoSop -> nombresFunc }} /
                                    Anexo: {{ $listadoSop -> anexoFunc }} -
                                    Equipo: {{ $listadoSop -> hardSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> solicitudSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> nombreTipo }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> nombreEstado }}</center>
                            </td>
                            <td>
                                <center>
                                    <form action="/Soporte/Tomar" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $listadoSop -> idSolSop }}">
                                        <button type="submit" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-hand-o-right"></i> TOMAR
                                        </button>
                                    </form>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
