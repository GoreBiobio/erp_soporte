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

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Funcionario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="/Funcionarios/Guardar" name="form1" method="POST" class="form-horizontal">
                    <!-- text input -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="rut">RUT:</label>
                            <input type="text" name="RutFunc" class="form-control" placeholder="00.000.000-0" required>
                        </div>
                        <div class="col-md-3">
                            <label for="paterno">Paterno:</label>
                            <input type="text" name="PaternoFunc" class="form-control" placeholder="Apellido Paterno"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label for="materno">Materno:</label>
                            <input type="text" name="MaternoFunc" class="form-control" placeholder="Apellido Materno"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label for="nombres">Nombres:</label>
                            <input type="text" name="NombreFunc" class="form-control" placeholder="Nombres" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" name="EmailFunc" class="form-control"
                                   placeholder="Correo Electrónico Institucional"
                                   required>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="TelefonoFunc" class="form-control" placeholder="Teléfono Personal"
                                   required>
                        </div>
                        <div class="col-md-2">
                            <label for="anexo">Anexo Interno:</label>
                            <input type="number" name="AnexoFunc" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="anexo">Jefatura:</label>
                            <div>
                                <label>
                                    <input type="checkbox" name="jefatura" value="jefatura">
                                    CLIC JEFATURA
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="tc">Tipo de Contrato:</label>
                            <select class="form-control" name="TipoContratoFunc">
                                @foreach($tipos as $tipos)
                                    <option value="{{ $tipos->idTipo }}">{{ $tipos -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Estado Funcionario:</label>
                            <select class="form-control" name="EstadoFunc">
                                @foreach($estados as $estados)
                                    <option value="{{ $estados->idEstado }}">{{ $estados -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Departamento:</label>
                            <select class="form-control" name="IdDepto">
                                @foreach($deptos as $deptos)
                                    <option value="{{ $deptos->idDepto }}">{{ $deptos -> division }}
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
                <a class="btn btn-app" href="/Proximamente">
                    <i class="fa fa-circle-o text-green"></i> Divisiones
                </a>
                <a class="btn btn-app" href="/Proximamente">
                    <i class="fa fa-circle-o text-green"></i> Departamentos
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($funcionarios as $funcionarios)
                        <tr>
                            <td>
                                <form action="/Funcionario/Ficha" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idFuncionario" value="{{ $funcionarios -> idFunc }}">
                                    <button type="submit" class="btn btn-primary btn-xs"><i
                                                class="fa fa-eye"></i> RUT - {{ $funcionarios -> rutFunc }}</button>
                                </form>
                            </td>
                            <td>{{ $funcionarios -> paternoFunc }} {{ $funcionarios -> maternoFunc }}
                                , {{ $funcionarios -> nombresFunc }}</td>
                            <td><a href="mailto:{{ $funcionarios -> correoFunc }}">{{ $funcionarios -> correoFunc}} </a>
                                / {{ $funcionarios -> anexoFunc  }}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection