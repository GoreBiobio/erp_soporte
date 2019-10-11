@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Soportes de Servicios
@endsection
@section('contentheader_title')
    Soportes de Servicios
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-support"></i> SOPORTES DE SERVICIOS SIN EJECUTAR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
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

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-dashboard"></i> MIS SOPORTES DE SERVICIOS PENDIENTES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Usuario - Servicio</th>
                        <th>Motivo Solicitud</th>
                        <th>Nivel Urgencia</th>
                        <th>Estado Actual</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sop_pend as $listadoSop)
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection


