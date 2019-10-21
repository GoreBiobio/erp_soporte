@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Ficha Electrónica de Soporte
@endsection
@section('contentheader_title')
    Soporte de Servicios
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
                    <small><i class="fa fa-user"></i> <strong>ID SOPORTE:</strong>
                        <strong>NÚMERO / {{ $soporte -> idSolServ }}</strong>
                    </small>
                </h4>
                <h4>
                    <small class="pull-right">Fecha de Solicitud: {{ $soporte -> fecCreaSolServ }}</small>
                </h4>
            </div>
        </div>

        <h5><strong>ESTADO ACTUAL: </strong>
            <button class="btn btn-xs btn-success">{{ strtoupper($soporte->nombreEstado) }}</button>
        </h5>

        <br>
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
                    <strong>Forma Solicitud: </strong> {{ $soporte -> tipoSolServA }}<br>
                    <strong>Motivo Solicitud: </strong> {{ $soporte -> tipoSolServB }}<br>
                    <strong>Forma de Soporte: </strong> {{ $soporte -> tipoSolServC }}<br>
                    <strong>Nivel Urgencia: </strong> @if($soporte -> estadoCritSolServ == '1')
                        BAJA
                    @elseif($soporte -> estadoCritSolServ == '2')
                        MEDIA
                    @else
                        ALTA
                    @endif
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>SERVICIO</b><br><br>
                <strong>Servicio: </strong>{{ $soporte -> servicio }}
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small><strong>Detalle solicitud de Soporte:</strong></small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $soporte -> solicitudServ }}
                </p>
            </div>

            <div class="col-xs-6">
                <p class="lead">
                    <small><strong>Observaciones de Soporte:</strong></small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $soporte -> obsSolServ }}
                </p>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small><strong>Observaciones de Cierre:</strong></small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $soporte -> obsCierreSolServ }}
                </p>
            </div>

            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">OBSERVACIONES Y CIERRE</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <th style="width: 50px">
                                    <center>Motivo</center>
                                </th>
                                <th style="width: 50px">
                                    <center>Forma</center>
                                </th>
                                <th style="width: 50px">
                                    <center>Obs. Cierre</center>
                                </th>
                                <th style="width: 50px">
                                    <center>Cierre</center>
                                </th>
                                <th style="width: 50px">
                                    <center>VB Jefatura</center>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <center>@if($soporte -> tipoSolServB == 'Pendiente')
                                            <button type="button" class="btn-xs btn-danger" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-close"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>@if($soporte -> tipoSolServC == 'Pendiente')
                                            <button type="button" class="btn-xs btn-danger" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-close"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>@if($soporte -> obsCierreSolServ == null)
                                            <button type="button" class="btn-xs btn-danger" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-close"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>@if($soporte -> fecCierreSolServ == null)
                                            <button type="button" class="btn-xs btn-danger" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-close"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>@if($soporte -> fecAprobSolServ == null)
                                            <button type="button" class="btn-xs btn-danger" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-close"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                                    data-target="">
                                                <i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

                @if($soporte -> funcRespoSolServ == null)
                    <center>
                        <form action="/Soporte/TomarServicio" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">
                            <button type="submit" class="btn btn-danger btn-xs"><i
                                        class="fa fa-close"></i> BOTONES NO DISPONIBLES HASTA TOMAR SOPORTE
                            </button>
                        </form>
                    </center>

                @elseif($soporte -> funcRespoSolServ == Auth::user()->idFuncUser)

                    @if($soporte -> tipoSolServB == 'Pendiente')
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal" data-target="#ModalMotivo">
                            <i
                                    class="fa fa-pencil"></i> MOTIVO SOPORTE
                        </button>
                    @else
                        <button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="#ModalMotivo"
                                disabled><i
                                    class="fa fa-pencil"></i> MOTIVO SOPORTE
                        </button>
                    @endif
                    @if($soporte -> tipoSolServC == 'Pendiente')
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal"
                                data-target="#ModalSoporte"><i
                                    class="fa fa-pencil"></i> FORMA SOPORTE
                        </button>
                    @else
                        <button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="#ModalSoporte"
                                disabled><i
                                    class="fa fa-pencil"></i> FORMA SOPORTE
                        </button>
                    @endif

                    @if($soporte -> fecCierreSolServ == null)
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal" data-target="#ModalObs"><i
                                    class="fa fa-pencil"></i> OBS AL SOPORTE
                        </button>
                    @else
                        <button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="#" disabled><i
                                    class="fa fa-pencil"></i> OBS AL SOPORTE
                        </button>
                    @endif

                    @if($soporte -> obsCierreSolServ == null)
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal"
                                data-target="#ModalObsCierre"><i
                                    class="fa fa-pencil"></i> OBS DE CIERRE
                        </button>
                    @else
                        <button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="#" disabled><i
                                    class="fa fa-pencil"></i> OBS DE CIERRE
                        </button>
                    @endif

                    @if($soporte -> tipoSolServB == 'Pendiente' or $soporte -> tipoSolServC == 'Pendiente' or $soporte -> obsCierreSolServ == null )
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal" data-target="" DISABLED>
                            <i
                                    class="fa fa-close"></i> CIERRE DE TICKET NO DISPONIBLE
                        </button>
                    @else
                        @if($soporte -> fecCierreSolServ == null)
                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                    data-target="#ModalCierre">
                                <i
                                        class="fa fa-close"></i> CERRAR TICKET SOPORTE
                            </button>
                        @else
                            <button type="button" class="btn-xs btn-success" data-toggle="modal"
                                    data-target="#" DISABLED>
                                <i
                                        class="fa fa-close"></i> TICKET CERRADO
                            </button>
                        @endif

                    @endif
                @else
                    <center>
                        <button type="button" class="btn-xs btn-primary" data-toggle="modal" data-target="">
                            <i
                                    class="fa fa-check"></i> ASIGNADO A OTRO FUNCIONARIO
                        </button>
                    </center>
                @endif
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <br>
            <div class="col-xs-12 table-responsive">
                <p class="lead">
                    <small>Documentos Adjuntos:</small>
                </p>
                <div>
                    @foreach($documentos as $documentos)
                        <a href="http://soporte.gorebiobio.cl/adjuntos/solicitudes/{{$documentos->rutaDoc}}"
                           target="_blank">
                            <button class="btn btn-xs btn-warning"><i class="fa fa-download"></i>
                                {{$documentos->nombreDoc}}
                            </button>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <br>
            <div class="col-xs-12 table-responsive">
                <p class="lead">
                    <small>Logs del Soporte:</small>
                </p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id Log</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <center>1</center>
                        </td>
                        <td>{{ $soporte -> fecCreaSolServ }}</td>
                        <td>Creación del Ticket de Soporte</td>
                    </tr>
                    <tr>
                        <td>
                            <center>2</center>
                        </td>
                        <td></td>
                        <td>Asignación del Ticket a Funcionario Unidad Informática</td>
                    </tr>
                    <tr>
                        <td>
                            <center>3</center>
                        </td>
                        <td></td>
                        <td>Cierre del Ticket por Funcionario Unidad Informática</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>

        <hr>

        Certifica,
        <br><br><br><br><br>
        <center>
            <table>
                <tr>
                    <td>
                        <center>_____________________________________</center>
                        <center></center>
                        <center><strong>{{ strtoupper($soporte->paternoFunc) }} {{ strtoupper($soporte->maternoFunc) }}
                                , {{ strtoupper($soporte->nombresFunc) }}</strong></center>
                        <center>GOBIERNO REGIONAL DEL BÍOBIO</center>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <center>_____________________________________</center>
                        <center></center>
                        <center><strong>PROFESIONAL UNIDAD INFORMÁTICA</strong></center>
                        <center>GOBIERNO REGIONAL DEL BÍOBIO</center>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <center>_____________________________________</center>
                        <center></center>
                        <center><strong>TIMBRE UNIDAD INFORMÁTICA</strong></center>
                        <center>GOBIERNO REGIONAL DEL BÍOBIO</center>
                    </td>
                </tr>
            </table>
        </center>

    </section>

    <div id="ModalMotivo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Motivo de Solicitud</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/MotivoSolicitudServicio" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Motivo Solicitud:</label>
                                <select class="form-control" name="motivo">
                                    @foreach($forma as $forma_sol)
                                        <option value="{{ $forma_sol->nombreTipo }}">{{ $forma_sol -> nombreTipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-primary pull-right">Actualizar Motivo</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="ModalSoporte" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Forma de Entrega de Soporte </h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/SoporteEntregadoServicio" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Tipo de Soporte Entregado:</label>
                                <select class="form-control" name="forma">
                                    @foreach($tipo_soporte as $forma_sol)
                                        <option value="{{ $forma_sol->nombreTipo }}">{{ $forma_sol -> nombreTipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-primary pull-right">Actualizar Forma</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="ModalObs" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Observaciones al Soporte</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/ObservacionesServicio" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Observaciones:</label>
                                <textarea class="form-control" rows="3" name="ObsSopServ"
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

    <div id="ModalObsCierre" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Observaciones de Cierre al Soporte</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Soporte/ObsCierreServicio" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Observaciones:</label>
                                <textarea class="form-control" rows="3" name="ObsSopCierre"
                                          placeholder="Observaciones acerca del Cierre del Soporte ..."
                                          required></textarea>
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
                    <form role="form" action="/Soporte/CierreServicio" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idSolServ" value="{{ $soporte -> idSolServ }}">
                        <div class="box-footer">
                            <center>
                                <button type="submit" class="btn btn-danger">Cerrar Ticket de Soporte</button>
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
