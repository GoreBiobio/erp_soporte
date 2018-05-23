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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Inventario Software</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="/Inventarios/GuardarSoftware" method="POST" class="form-horizontal">
                    <!-- text input -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-5">
                            <label for="paterno">Nombre Software: (O Folio Interno)</label>
                            <input type="text" name="NomSoft" class="form-control" placeholder="Nombre Tipo">
                        </div>
                        <div class="col-md-4">
                            <label for="materno">Fecha Caducidad Licencia:</label>
                            <input type="date" name="fecCadSoft" class="form-control" placeholder="N° Serie Fábrica">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="correo">Licencia Software:</label>
                            <select class="form-control" name="LicSw">
                                @foreach($licSW as $licSW)
                                    <option value="{{ $licSW->idTipo }}">{{ $licSW -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="correo">Uso Software:</label>
                            <select class="form-control" name="UsoSoft">
                                @foreach($usoSW as $usoSW)
                                    <option value="{{ $usoSW->idTipo }}">{{ $usoSW -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Tipo Software:</label>
                            <select class="form-control" name="TipoSoft">
                                @foreach($intSW as $intSW)
                                    <option value="{{ $intSW->idTipo }}">{{ $intSW -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-7">
                            <label for="telefono">Detalle:</label>
                            <input type="text" name="ObsSoft" class="form-control"
                                   placeholder="Detalle Software (Servidor, Rutas, Etc)."
                                   maxlength="50">
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

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Licencias Disponibles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tipo Software</th>
                        <th>Cantidad</th>
                        <th>Fecha Caducidad Licencia</th>
                        <th>Tipo A</th>
                        <th>Tipo B</th>
                        <th>Tipo C</th>
                        <th>Observaciones</th>
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