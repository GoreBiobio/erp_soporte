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
                <h3 class="box-title">SOPORTES ARCHIVADOS</h3>
            </div>
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
                    @foreach($sop_arc as $sop_arc)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $sop_arc -> idSolSop }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-eye"></i> SOP ID - {{ $sop_arc -> idSolSop }}</button>
                                    </form>
                                </center>
                            </td>
                            <td>{{ $sop_arc -> fecCreaSop }}</td>
                            <td>{{ $sop_arc->paternoFunc }} {{ $sop_arc->maternoFunc }}
                                , {{ $sop_arc->nombresFunc }}</td>
                            <td>{{ $sop_arc -> tipoSopB }}</td>
                            <td>{{ $sop_arc -> solicitudSop }}</td>
                            <td>{{ $sop_arc -> tipoSopD }}</td>
                            <td>{{ $sop_arc -> estadoSop }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


