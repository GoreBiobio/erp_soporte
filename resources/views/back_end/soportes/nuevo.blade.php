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
                <form role="form" class="form-horizontal">
                    <!-- text input -->
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="rut">Usuario Solicitante</label>
                            <select class="form-control">
                                <option name="Id" value=""> -- Seleccionar --</option>
                                @foreach($funcionarios as $funcionarios)
                                    <option name="idEstado"
                                            value="{{ $funcionarios->rutFunc }}">{{ $funcionarios -> paternoFunc }} {{ $funcionarios -> maternoFunc }}
                                        , {{ $funcionarios -> nombresFunc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nombres">Equipo a realizar Mantención</label>
                            <select class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="telefono">Forma de Solicitud Soporte:</label>
                            <select class="form-control">
                                @foreach($tipo_sop_a as $tipo_sop_a)
                                    <option name="idEstado"
                                            value="{{ $tipo_sop_a->idTipo }}">{{ $tipo_sop_a -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-md-3">
                            <label for="nombres">Motivo del Soporte:</label>
                            <select class="form-control">
                                @foreach($tipo_sop_b as $tipo_sop_b)
                                    <option name="idEstado"
                                            value="{{ $tipo_sop_b->idTipo }}">{{ $tipo_sop_b -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-md-3">
                            <label for="nombres">Forma de Soporte:</label>
                            <select class="form-control">
                                @foreach($tipo_sop_c as $tipo_sop_c)
                                    <option name="idEstado"
                                            value="{{ $tipo_sop_c->idTipo }}">{{ $tipo_sop_c -> nombreTipo }}</option>
                                @endforeach
                            </select></div>

                        <div class="col-md-3">
                            <label for="nombres">Nivel Crítico de Soporte:</label>
                            <select class="form-control">
                                @foreach($estado_sop_a as $estado_sop_a)
                                    <option name="idEstado"
                                            value="{{ $estado_sop_a->idEstado }}">{{ $estado_sop_a -> nombreEstado }}</option>
                                @endforeach
                            </select></div>
                    </div>

                    <form role="form" class="form-horizontal">
                        <!-- text input -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="rut">Estado Actual</label>
                                <select class="form-control" readonly="">
                                    @foreach($estado_sop_b as $estado_sop_b)
                                        <option name="idEstado"
                                                value="{{ $estado_sop_b->idEstado }}">{{ $estado_sop_b -> nombreEstado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="nombres">Informático que realiza la Mantención</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name  }}"
                                       placeholder="Teléfono Personal" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="telefono">Detalle Solicitud:</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="telefono">Observaciones Solicitud:</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
                        <th>RUT</th>
                        <th>Paterno - Materno - Nombres</th>
                        <th>Correo Electrónico - Anexo</th>
                        <th>Departamento - Ubicación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection


