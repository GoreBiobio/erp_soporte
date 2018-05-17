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
                            <input type="email" class="form-control" placeholder="Correo Electrónico Institucional" required>
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
                                <option>Contrata</option>
                                <option>Honorarios</option>
                                <option>Planta</option>
                                <option>Código del Trabajo</option>
                                <option>Core</option>
                                <option>Externo</option>
                            </select></div>
                        <div class="col-md-3">
                            <label for="telefono">Estado Funcionario:</label>
                            <select class="form-control">
                                <option>En Funciones</option>
                                <option>Congelado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Departamento:</label>
                            <select class="form-control">
                                <option>División de Admin y Finanzas - Departamento de Personas</option>
                                <option>División de Admin y Finanzas - Departamento de Informática</option>
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
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Presto</td>
                        <td>Opera 7.0</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td>-</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Presto</td>
                        <td>Opera 7.5</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td>-</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Misc</td>
                        <td>Links</td>
                        <td>Text only</td>
                        <td>-</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Misc</td>
                        <td>PSP browser</td>
                        <td>PSP</td>
                        <td>-</td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td>Other browsers</td>
                        <td>All others</td>
                        <td>-</td>
                        <td>-</td>
                        <td>U</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection