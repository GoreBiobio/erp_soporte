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
                    <i class="fa fa-desktop"></i> NOMBRE: {{ $fic_hard -> nombreHard }} - FOLIO
                    INVENTARIO: {{ $fic_hard -> fol_invHard }}
                    <small class="pull-right">Fecha de Carga Sistema: {{ $fic_hard -> fecCargaHard }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>GENERAL</strong><br><br>
                    <strong>Marca: </strong>{{ $fic_hard -> marca }}<br>
                    <strong>Modelo: </strong>{{ $fic_hard -> modelo }}<br>
                    <strong>N° Serie: </strong>{{ $fic_hard -> numSerieHard }}<br>
                    <strong>Comodato: </strong>{{ $fic_hard -> comodatoHard }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>HARDWARE</strong><br><br>
                    <strong>Capacidad: </strong>{{ $fic_hard -> capacidadHard }} GB<br>
                    <strong>RAM: </strong>{{ $fic_hard -> ramHard }} GB<br>
                    <strong>IMEI: </strong>{{ $fic_hard -> imeiHard }}<br>
                    <strong>S.O.: </strong> -
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>REDES</b><br><br>
                <strong>N° FONO: </strong>{{ $fic_hard -> numTelHard }}<br>
                <strong>IP: </strong>{{ $fic_hard -> ipHard }}<br>
                <strong>MAC: </strong>{{ $fic_hard -> macHard }}<br>
                <strong>TIPO: </strong>{{ $fic_hard -> tipoHard }}<br>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Detalle Equipo:</small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $fic_hard -> obsHard }}
                    <br><br>Ubicación: {{ $fic_hard -> nombreBod }} / {{ $fic_hard -> nombreSecc }} -
                    Caja: {{ $fic_hard -> numCaja }}
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

        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p class="lead">
                    <small>Log Historico Equipo:</small>
                </p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID LOG</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Documentos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <center>1</center>
                        </td>
                        <td>{{ $fic_hard -> fecCargaHard }}</td>
                        <td>EQUIPO AÑADIDO AL INVENTARIO INFORMÁTICO DEL GOBIERNO REGIONAL</td>
                        <td><i class="fa fa-archive"></i> Descargar</td>
                    </tr>
                    @foreach($com as $com)
                        <tr>
                            <td>
                                <center>-</center>
                            </td>
                            <td>{{ $com -> fechaIngComod }}</td>
                            <td>ENTREGA DE EQUIPO EN COMODATO A:
                                <strong>{{$com -> paternoFunc .' '. $com->maternoFunc .', '. $com->nombresFunc}}</strong>
                                EN ESTADO: <strong>{{$com -> estadoEqComod}}</strong> - ENTREGADO POR:
                                <strong>{{ $com -> name }}</strong>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
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
    <div id="ModalComodato" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Iniciar Comodato</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="/Comodatos/Guardar" method="POST" class="form-horizontal">
                        <!-- text input -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idHard" value="{{ $fic_hard -> idHard }}">
                        <input type="hidden" name="estadoAntEq" value="{{ $fic_hard -> estadoHardNA }}">
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
                            <div class="col-md-6">
                                <label for="correo">Fecha Devolución Aproximada:</label>
                                <input type="date" name="FecDevol" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="correo">Ubicación del Equipo:</label>
                                <input type="text" name="UbicEqui" class="form-control"
                                       placeholder="Oficina, Pasillo, Sector"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="nombres">Funcionario que entrega</label>
                                <input type="hidden" name="idInfo" value="{{ Auth::user()->idFuncUser }}">
                                <input type="text" class="form-control" value="{{ Auth::user()->name  }}"
                                       placeholder="Teléfono Personal" readonly>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-primary pull-right">Guardar Comodato</button>
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
