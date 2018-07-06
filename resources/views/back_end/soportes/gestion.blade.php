@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Soportes
@endsection
@section('contentheader_title')
    Soportes
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">SOPORTES SIN EJECUTAR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Usuario - Equipo</th>
                        <th>Motivo Solicitud</th>
                        <th>Detalle de la Solicitud</th>
                        <th>Nivel Crítico</th>
                        <th>Estado Actual</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listadoSop as $listadoSop)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $listadoSop -> idSolSop }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-eye"></i> SOP ID - {{ $listadoSop -> idSolSop }}</button>
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
                                <center>{{ $listadoSop -> tipoSopB }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> solicitudSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> tipoSopD }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> estadoSop }}</center>
                            </td>
                            <td>
                                <center>
                                    <form action="/Soporte/Tomar" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $listadoSop -> idSolSop }}">
                                        <button type="submit" class="btn btn-primary btn-xs"><i
                                                    class="fa fa-hand-o-right"></i> TOMAR</button>
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
                <h3 class="box-title">MIS SOPORTES PENDIENTES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Usuario - Equipo</th>
                        <th>Motivo Solicitud</th>
                        <th>Detalle de la Solicitud</th>
                        <th>Nivel Crítico</th>
                        <th>Estado Actual</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sop_pend as $sop_pend)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $sop_pend -> idSolSop }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-eye"></i> SOP ID - {{ $sop_pend -> idSolSop }}</button>
                                    </form>
                                </center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> fecCreaSop }}</center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> paternoFunc }}, {{ $sop_pend -> nombresFunc }} /
                                    Anexo: {{ $sop_pend -> anexoFunc }} -
                                    Equipo: {{ $sop_pend -> hardSop }}</center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> tipoSopB }}</center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> solicitudSop }}</center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> tipoSopD }}</center>
                            </td>
                            <td>
                                <center>{{ $sop_pend -> estadoSop }}</center>
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


