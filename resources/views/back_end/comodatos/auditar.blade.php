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
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Mostrar Equipos según su Uso</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Muestra Hardware según su utilización <strong>(En Comodato / Libre)</strong>
                    </p>
                    <hr>
                    <form action="/Comodatos/porUso" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label for="tc">Uso del Equipo:</label>
                            <select class="form-control" name="VerUso">
                                @foreach($usos as $usos)
                                    <option value="{{ $usos->idEstado }}">{{ $usos -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right">Revisar por Uso</button>
                        </div>
                    </form>
                    <br>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Mostrar Equipos según Funcionario</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Muestra Hardware según comodato en Funcionario <strong>(En Comodato / Historico)</strong>
                    </p>
                    <hr>
                    <form action="/Comodatos/porFuncionario" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label for="tc">Uso del Equipo:</label>
                            <select class="form-control" name="VerFuncionarios">
                                @foreach($funcionarios as $funcionarios)
                                    <option value="{{ $funcionarios->idFunc }}">{{ $funcionarios -> paternoFunc }} {{ $funcionarios -> maternoFunc }}
                                        , {{ $funcionarios -> nombresFunc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right">Revisar por Funcionario</button>
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