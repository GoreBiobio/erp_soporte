@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Incidencias
@endsection
@section('contentheader_title')
    Incidencias
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')
    <div class="col-md-8">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nueva Incidencia</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="/Incidencia/Guardar" method="POST" class="form-horizontal">
                    <!-- text input -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="rut">Inicio Incidencia</label>
                            <input class="form-control" type="date" name="fec_inc" required>
                        </div>

                        <div class="col-md-2">
                            <label for="nombres">Inicio Incidencia</label>
                            <input class="form-control" type="time" name="hora_inc" required>
                        </div>

                        <div class="col-md-4">
                        </div>

                        <div class="col-md-2">
                            <label for="rut">Fin Incidencia</label>
                            <input class="form-control" type="date" name="fec_f_inc" required>
                        </div>

                        <div class="col-md-2">
                            <label for="nombres">Fin Incidencia</label>
                            <input class="form-control" type="time" name="hora_f_inc" required>
                        </div>
                    </div>

                    <form role="form" class="form-horizontal">
                        <!-- text input -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="rut">Tipo de Incidencia</label>
                                <select class="form-control" name="tipo_inc">
                                    @foreach($tipos as $tipos)
                                        <option value="{{ $tipos->nombreTipo }}">{{ $tipos -> nombreTipo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="rut">Servicio Afectado</label>
                                <select class="form-control" name="serv_afec">
                                    @foreach($servicios as $servicios)
                                        <option value="{{ $servicios->nombreTipo }}">{{ $servicios -> nombreTipo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="nombres">Informático que reporta la Incidencia</label>
                                <input type="hidden" name="idInfo" value="{{ Auth::user()->idFuncUser }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->name  }}"
                                       placeholder="Teléfono Personal" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="telefono">Detalle de Incidencia:</label>
                                <textarea class="form-control" name="det_inc" rows="3"
                                          placeholder="Ingrese el detalle de la incidencia." required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="telefono">Observaciones de Incidencia:</label>
                                <textarea class="form-control" name="obs_inc" rows="3"
                                          placeholder="Observaciones internas unidad de informática acerca de la incidencia"></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button id="btn" class="btn btn-primary pull-right">Ingresar Nueva Incidencia</button>
                        </div>
                    </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Mis Incidencias Reportadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID Incidencia</th>
                        <th>Fecha/Hora Inicio Incidencia</th>
                        <th>Fecha/Hora Fin Incidencia</th>
                        <th>Obs Incidencia</th>
                        <th>Servicio Afectado</th>
                        <th>Estado Actual</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incidencias as $incidencias)
                        <tr>
                            <td>
                                <center>
                                    <form action="/Incidencia/Ficha" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idInc" value="{{ $incidencias -> idIncid }}">
                                        <button type="submit" class="btn btn-warning btn-xs"><i
                                                    class="fa fa-flag"></i> ID - {{ $incidencias -> idIncid }}</button>
                                    </form>
                                </center>
                            </td>

                            <td>{{ $incidencias -> fecIncid }} - {{ $incidencias -> horaIncid }}</td>
                            <td>{{ $incidencias -> fechaCierreIncid }} - {{ $incidencias -> horaCierreIncid }}</td>
                            <td>{{ $incidencias -> obsIncid }}</td>
                            <td>
                                <center>{{ $incidencias -> servAfectado }}</center>
                            </td>
                            <td>
                                <center>
                                    @if($incidencias -> estadoIncid == 'Superada')
                                        <i class="fa fa-flag text-green"></i>
                                    @elseif($incidencias -> estadoIncid == 'Activa')
                                        <i class="fa fa-flag text-red"></i>
                                    @else
                                        <i class="fa fa-flag text-yellow"></i>
                                    @endif
                                    {{ $incidencias -> estadoIncid}}
                                </center>
                            </td>
                            <td>
                                <center>
                                    @if($incidencias -> estadoIncid == 'Superada')
                                        <center>
                                            <form action="/Incidencia/Cerrar" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="idInc" value="{{ $incidencias -> idIncid }}">
                                                <button type="submit" class="btn btn-danger btn-xs" title="Cerrar Incidencia" disabled><i
                                                            class="fa fa-close"></i></button>
                                            </form>
                                        </center>
                                    @elseif($incidencias -> estadoIncid == 'Activa')
                                        <center>
                                            <form action="/Incidencia/Cerrar" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="idInc" value="{{ $incidencias -> idIncid }}">
                                                <button type="submit" class="btn btn-danger btn-xs" title="Cerrar Incidencia"><i
                                                            class="fa fa-close"></i></button>
                                            </form>
                                        </center>
                                    @else
                                        <i class="fa fa-flag text-yellow"></i>
                                    @endif
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


