@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Comodatos
@endsection
@section('contentheader_title')
    Comodatos
@endsection
@section('contentheader_description')
    / Ficha de Asignación de Hardware
@endsection
@section('main-content')

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h4 class="page-header">
                    <i class="fa fa-desktop"></i> NOMBRE: {{ $fic_soft -> nombreSoft }}
                    <small class="pull-right">Fecha de Carga Sistema: {{ $fic_soft -> fecCargaSoft }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>GENERAL</strong><br><br>
                    <strong>Cad. Licencia: </strong>{{ $fic_soft -> fecCadLicSoft }}<br>
                </address>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Detalle Servicio / Software:</small>
                </p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $fic_soft -> obsSoft }}

                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Opciones Equipo:</small>
                </p>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalComodato"><i
                            class="fa fa-random"></i> INICIAR COMODATO
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalBaja"><i
                            class="fa fa-archive"></i> SOLICITAR BAJA
                </button>

                </p>
            </div>
            <!-- /.col -->
        </div>

        <hr>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div id="ModalComodato" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Iniciar Comodato</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Comodatos/GuardarSW" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idHard" value="{{ $fic_soft -> idSoft }}">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="telefono">Funcionario que Recibe:</label>
                                <select class="form-control" name="idFuncRec">
                                    @foreach($func as $func)
                                        <option value="{{ $func->idFunc }}">{{ $func -> paternoFunc }} {{ $func -> maternoFunc }}
                                            , {{ $func -> nombresFunc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="nombres">Funcionario Responsable</label>
                                <input type="hidden" name="idInfo" value="{{ Auth::user()->idFuncUser }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->name  }}"
                                       placeholder="Teléfono Personal" readonly>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-primary pull-right">Guardar Comodato Software</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="ModalBaja" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Solicitar Baja</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Comodatos/Baja" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">Solicitar la Baja de Equipos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
