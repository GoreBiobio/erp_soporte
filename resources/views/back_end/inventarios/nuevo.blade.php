@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Inventarios
@endsection
@section('contentheader_title')
    Inventarios
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Inventario Hardware</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" class="form-horizontal">
                    <!-- text input -->
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="rut">Folio Inventario: (DAF)</label>
                            <input type="text" class="form-control" placeholder="00.000.000-0">
                        </div>
                        <div class="col-md-4">
                            <label for="paterno">Nombre Hardware:</label>
                            <input type="text" class="form-control" placeholder="Apellido Paterno">
                        </div>
                        <div class="col-md-3">
                            <label for="materno">N° de Serie:</label>
                            <input type="text" class="form-control" placeholder="Apellido Materno">
                        </div>
                        <div class="col-md-3">
                            <label for="nombres">IMEI: (Teléfonos / Tablets)</label>
                            <input type="text" class="form-control" placeholder="Nombres">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="telefono">Tipo Hardware:</label>
                            <select class="form-control">
                                @foreach($tipos as $tipos)
                                    <option name="idTipos"
                                            value="{{ $tipos->idTipo }}">{{ $tipos -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="telefono">Marca / Modelo:</label>
                            <select class="form-control">
                                @foreach($m_m as $m_m)
                                    <option name="idModelo" value="{{ $m_m->idModelo }}">{{ $m_m -> marca }}
                                        / {{ $m_m -> modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="capacidad">Capacidad: (GB)</label>
                            <input type="number" class="form-control" placeholder="1" required min="0" max="4000">
                        </div>
                        <div class="col-md-2">
                            <label for="ram">RAM: (GB)</label>
                            <input type="number" class="form-control" placeholder="1">
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Procesador:</label>
                            <input type="text" class="form-control" placeholder="Intel / AMD u Otro">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-2">
                            <label for="telefono">N° de Teléfono:</label>
                            <input type="number" class="form-control" placeholder="900000000" min="0" maxlength="9">
                        </div>
                        <div class="col-md-2">
                            <label for="nombres">IP: (V4 / V6)</label>
                            <input type="text" class="form-control" placeholder="192.168.0.1">
                        </div>
                        <div class="col-md-2">
                            <label for="nombres">MAC:</label>
                            <input type="text" class="form-control" placeholder="000000000000">
                        </div>
                        <div class="col-md-3">
                            <label for="correo">Estado Actual:</label>
                            <select class="form-control">
                                @foreach($e_a as $e_a)
                                    <option name="idEstado"
                                            value="{{ $e_a->idEstado }}">{{ $e_a -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Estado Inicial:</label>
                            <select class="form-control">
                                @foreach($e_b as $e_b)
                                    <option name="idEstadoB"
                                            value="{{ $e_b->idEstado }}">{{ $e_b -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-4">
                            <label for="telefono">Ubicación:</label>
                            <select class="form-control">
                                @foreach($ubic as $ubic)
                                    <option name="idEstado"
                                            value="{{ $ubic->idCaja }}">{{$ubic -> nombreBod}} - {{ $ubic -> nombreSecc }} / Caja: {{ $ubic -> numCaja }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-8">
                            <label for="telefono">Detalle:</label>
                            <input type="text" class="form-control" placeholder="Observaciones">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                        <button type="submit" class="btn btn-success pull-right">Ingresar Nuevo Inventario</button>
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
                <h3 class="box-title">Listado de Inventario Disponible en Bodega</h3>
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