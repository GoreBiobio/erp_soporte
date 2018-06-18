@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Ficha Electrónica de Soporte
@endsection
@section('contentheader_title')
    Soporte
@endsection
@section('contentheader_description')
    / Ficha Electrónica de Soporte
@endsection
@section('main-content')

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h4 class="page-header">
                    <i class="fa fa-user"></i> ID SOPORTE: {{ $soporte -> idSolSop }}
                    <small class="pull-right">Fecha de Solicitud: {{ $soporte -> fecCreaSop }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>GENERAL</strong><br><br>
                    <strong>RUT: </strong>{{ $soporte->rutFunc }}<br>
                    <strong>Usuario: </strong>{{ $soporte->paternoFunc }} {{ $soporte->maternoFunc }}
                    , {{ $soporte->nombresFunc }}<br>
                    <strong>Anexo: </strong>{{ $soporte->anexoFunc }}<br>
                    <strong>Correo: </strong>{{ $soporte->correoFunc }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>SOPORTE</strong><br><br>
                    <strong>Forma Solicitud: </strong> {{ $soporte -> tipoSopA }}<br>
                    <strong>Motivo: </strong> {{ $soporte -> tipoSopB }}<br>
                    <strong>Soporte Entregado: </strong> {{ $soporte -> tipoSopC }}<br>
                    <strong>Nivel Crítico: </strong> {{ $soporte -> tipoSopD }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>EQUIPO / SOFTWARE</b><br><br>
                <strong>Equipo: </strong>{{ $soporte -> hardSop }}<br>
                <strong>Marca: </strong>ZZZ<br>
                <strong>Modelo: </strong>ZZZ<br>
                <strong>Estado: </strong>ZZZ<br>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Detalle solicitud de Soporte:</small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $soporte -> solicitudSop }}
                </p>
            </div>

            <div class="col-xs-6">
                <p class="lead">
                    <small>Observaciones Soporte:</small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $soporte -> obsSoftSop }}
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Opciones de Soporte:</small>
                </p>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalObs"><i
                            class="fa fa-pencil"></i> OBSERVACIONES
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalCierre"><i
                            class="fa fa-close"></i> CERRAR TICKET SOPORTE
                </button>

                </p>
            </div>


            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p class="lead">
                    <small>Log de Soporte:</small>
                </p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID LOG</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <center>1</center>
                        </td>
                        <td>{{ $soporte -> fecCreaSop }}</td>
                        <td>Creación del Ticket de Soporte</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>

        <div class="row no-print">

            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>
                    Imprimir Ficha</a>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->

    <div id="ModalObs" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Observaciones del Soporte</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/Observaciones" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSop" value="">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Observaciones:</label>
                                <textarea class="form-control" rows="3" name="ObsSop"
                                          placeholder="Observaciones Técnicas del Soporte ..." required></textarea>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-primary pull-right">Guardar Observaciones</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="ModalCierre" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cierre del Soporte</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/Cierre" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-footer">
                            <center><button type="submit" class="btn btn-danger">Cerrar Ticket de Soporte</button>
                            </center>
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
