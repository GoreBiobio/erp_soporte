@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Recursos Humanos
@endsection
@section('contentheader_title')
    Recursos Humanos
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Funcionario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" class="form-horizontal">
                    <!-- text input -->
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="rut">RUT:</label>
                            <input type="text" class="form-control" placeholder="00.000.000-0">
                        </div>
                        <div class="col-md-3">
                            <label for="paterno">Paterno:</label>
                            <input type="text" class="form-control" placeholder="Apellido Paterno">
                        </div>
                        <div class="col-md-3">
                            <label for="materno">Materno:</label>
                            <input type="text" class="form-control" placeholder="Apellido Materno">
                        </div>
                        <div class="col-md-3">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" placeholder="Nombres">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="Correo Electrónico Institucional"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" placeholder="Teléfono Personal">
                        </div>
                        <div class="col-md-2">
                            <label for="telefono">Anexo Interno:</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="correo">Tipo de Contrato:</label>
                            <select class="form-control">
                                @foreach($tipos as $tipos)
                                    <option name="idTipos"
                                            value="{{ $tipos->idTipo }}">{{ $tipos -> nombreTipo }}</option>
                                @endforeach
                            </select></div>
                        <div class="col-md-3">
                            <label for="telefono">Estado Funcionario:</label>
                            <select class="form-control">
                                @foreach($estados as $estados)
                                    <option name="idEstados"
                                            value="{{ $estados->idEstado }}">{{ $estados -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Departamento:</label>
                            <select class="form-control">
                                @foreach($deptos as $deptos)
                                    <option name="idDepto" value="{{ $deptos->idDepto }}">{{ $deptos -> division }}
                                        / {{ $deptos -> departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                        <button type="submit" class="btn btn-success pull-right">Ingresar Nuevo Funcionario</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Gestión Avanzada Funcionario</h3>
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
                <h3 class="box-title">Listado de Funcionarios Activos</h3>
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
                    @foreach($funcionarios as $funcionarios)
                        <tr>
                            <td>{{ $funcionarios -> rutFunc }}</td>
                            <td>{{ $funcionarios -> paternoFunc }} {{ $funcionarios -> maternoFunc }}
                                , {{ $funcionarios -> nombresFunc }}</td>
                            <td><a href="mailto:{{ $funcionarios -> correoFunc }}">{{ $funcionarios -> correoFunc}} </a> / {{ $funcionarios -> anexoFunc  }}</td>
                            <td>{{ $funcionarios -> division }} - {{ $funcionarios -> departamento }}</td>
                            <td>
                                <center>
                                    @if($funcionarios -> nombreEstado == 'En Funciones')
                                        <i class="fa fa-circle-o text-green"></i>
                                    @elseif($funcionarios -> nombreEstado == 'Congelado')
                                        <i class="fa fa-circle-o text-yellow"></i>
                                    @else
                                        <i class="fa fa-circle-o text-red"></i>
                                    @endif
                                    {{ $funcionarios -> nombreEstado}}
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
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