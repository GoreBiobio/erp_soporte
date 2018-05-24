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
                <h3 class="box-title">Listado de Soportes NO Asignados</h3>
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
                                <center><a class="btn btn-success btn-xs"><i class="fa fa-eye"></i> SOP - {{ $listadoSop -> idSolSop }}</a></center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> fecCreaSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> paternoFunc }}, {{ $listadoSop -> nombresFunc }} / Anexo: {{ $listadoSop -> anexoFunc }} - Equipo: {{ $listadoSop -> hardSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> tipoSopB }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> obsSoftSop }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> tipoSopD }}</center>
                            </td>
                            <td>
                                <center>{{ $listadoSop -> estadoSop }}</center>
                            </td>
                            <td>
                                <center><a class="btn btn-primary btn-xs"><i class="fa fa-coffee"></i> TOMAR</a></center>
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


