@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Ficha de Funcionarios
@endsection
@section('contentheader_title')
    Ficha de Funcionario
@endsection
@section('contentheader_description')
    / Ficha de Registros Históricos
@endsection
@section('main-content')

    <strong>Ficha de:</strong> {{ $funcionario->paternoFunc }} {{ $funcionario->maternoFunc }}, {{ $funcionario->nombresFunc }}
    <br>
    <strong>Actualizada al:</strong> {{ date("d/m/Y") }}
    <hr>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">SOPORTES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Soporte</th>
                        <th>Fecha/Hora Solicitud</th>
                        <th>Equipo</th>
                        <th>Detalle de la Solicitud</th>
                        <th>Nivel Crítico</th>
                        <th>Estado Soporte</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soportes as $sop)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Soporte/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idSoporte" value="{{ $sop -> idSolSop }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-eye"></i> SOP ID - {{ $sop -> idSolSop }}</button>
                                    </form>
                                </center>
                            </td>
                            <td>{{ $sop -> fecCreaSop }}</td>
                            <td>{{ $sop -> marca }} {{ $sop -> modelo }}</td>
                            <td>{{ $sop -> solicitudSop }}</td>
                            <td>{{ $sop -> tipoSopD }}</td>
                            <td>{{ $sop -> estadoSop }}</td>
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
                <h3 class="box-title">COMODATOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Comodato</th>
                        <th>Fecha Comodato</th>
                        <th>Equipo</th>
                        <th>Utilización</th>
                        <th>Funcionario Informático</th>
                        <th>Estado Equipo</th>
                        <th>Fecha Devolución</th>
                        <th>Estado Comodato</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comodatos as $com)
                        <tr>
                            <td>
                                <center>{{ $com -> idComod }}</center>
                            </td>
                            <td>{{ $com -> fechaIngComod }}</td>
                            <td>{{ $com -> marca }} {{ $com->modelo }}</td>
                            <td>{{ $com -> ubicacionEquiposComod }}</td>
                            <td>{{ $com -> name }}</td>
                            <td>{{ $com -> estadoEqComod }}</td>
                            <td>{{ $com -> fechaDevolComod }}</td>
                            <td>
                                @if($com -> estadoComod == 'Activo')
                                    <i class="fa fa-circle-o text-green"></i>
                                @elseif($com -> estadoComod == 'Archivo')
                                    <i class="fa fa-circle-o text-yellow"></i>
                                @else
                                    <i class="fa fa-circle-o text-red"></i>
                                @endif
                                {{ $com -> estadoComod}}
                            </td>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection


