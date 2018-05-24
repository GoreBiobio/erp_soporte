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
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Soporte</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="/Soporte/Guardar" method="POST" class="form-horizontal">
                    <!-- text input -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="rut">Usuario Solicitante</label>
                            <select class="form-control" name="idUsuario">
                                <option value=""> -- Seleccionar --</option>
                                @foreach($funcionarios as $funcionarios)
                                    <option value="{{ $funcionarios->idFunc }}">{{ $funcionarios -> paternoFunc }} {{ $funcionarios -> maternoFunc }}
                                        , {{ $funcionarios -> nombresFunc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nombres">Equipo a realizar Mantención</label>
                            <select class="form-control" name="idEquipo">
                                <option value=""> -- Seleccionar --</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="telefono">Forma de Solicitud Soporte:</label>
                            <select class="form-control" name="TSA">
                                @foreach($tipo_sop_a as $tipo_sop_a)
                                    <option value="{{ $tipo_sop_a->nombreTipo }}">{{ $tipo_sop_a -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-md-3">
                            <label for="nombres">Motivo del Soporte:</label>
                            <select class="form-control" name="TSB">
                                @foreach($tipo_sop_b as $tipo_sop_b)
                                    <option value="{{ $tipo_sop_b->nombreTipo }}">{{ $tipo_sop_b -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-md-3">
                            <label for="nombres">Forma de Soporte:</label>
                            <select class="form-control" name="TSC">
                                @foreach($tipo_sop_c as $tipo_sop_c)
                                    <option value="{{ $tipo_sop_c->nombreTipo }}">{{ $tipo_sop_c -> nombreTipo }}</option>
                                @endforeach
                            </select></div>

                        <div class="col-md-3">
                            <label for="nombres">Nivel Crítico de Soporte:</label>
                            <select class="form-control" name="TSD">
                                @foreach($tipo_sop_d as $tipo_sop_d)
                                    <option value="{{ $tipo_sop_d->nombreTipo }}">{{ $tipo_sop_d -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                    </div>

                    <form role="form" class="form-horizontal">
                        <!-- text input -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="rut">Estado Actual</label>
                                <select class="form-control" name="ESB" readonly="">
                                    @foreach($estado_sop as $estado_sop)
                                        <option value="{{ $estado_sop->nombreEstado }}">{{ $estado_sop -> nombreEstado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="nombres">Informático que realiza la Mantención</label>
                                <input type="hidden" name="idInfo" value="{{ Auth::user()->idFuncUser }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->name  }}" placeholder="Teléfono Personal" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="telefono">Detalle Solicitud:</label>
                                <textarea class="form-control" name="DetSol" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="telefono">Observaciones Solicitud:</label>
                                <textarea class="form-control" name="ObsSol" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button id="btn" class="btn btn-success pull-right">Ingresar Nueva Solicitud</button>
                        </div>
                    </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Gestión Avanzada Inventario</h3>
            </div>
            <div class="box-body">
                <a class="btn btn-app">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-play"></i> Play
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-repeat"></i> Repeat
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-pause"></i> Pause
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-save"></i> Save
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Mis Soportes</h3>
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
                    @foreach($m_sop as $listadoSop)
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection


