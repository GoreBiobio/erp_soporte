@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Auditar Inventarios
@endsection
@section('contentheader_title')
    Auditar Inventarios
@endsection
@section('contentheader_description')
    / Gestión de Auditoría
@endsection
@section('main-content')
    <div class="col-md-12">

        <div class="col-md-3">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Mostrar Equipos por Caja</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Muestra Hardware almacenado en cajas según solicitud <strong>(Liberado / Para Baja)</strong>
                    </p>
                    <hr>
                    <form action="/Inventarios/porCaja" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label for="tc">Ruta de la Caja:</label>
                            <select class="form-control" name="VerCaja">
                                @foreach($cajas as $cajas)
                                    <option value="{{ $cajas->idCaja }}">{{ $cajas -> nombreBod }}
                                        - {{ $cajas -> nombreSecc }}
                                        - {{ $cajas -> numCaja }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right">Revisar por Caja</button>
                        </div>
                    </form>
                    <br>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-3">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Mostrar Equipos por Tipo</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Muestra Hardware almacenado en cajas según tipo <strong>(Teléfono / Tablet / Etc)</strong>
                    </p>
                    <hr>
                    <form action="/Inventarios/porTipo" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label for="tc">Tipo Hardware:</label>
                            <select class="form-control" name="VerTipo">
                                @foreach($tipos as $tipos)
                                    <option value="{{ $tipos -> nombreTipo }}">{{ $tipos -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right">Revisar por Tipo</button>
                        </div>
                    </form>
                    <br>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection