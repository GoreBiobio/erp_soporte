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
                <p class="lead"><small>Detalle Equipo:</small></p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $fic_hard -> obsHard }}
                    <br><br>Ubicación: {{ $fic_hard -> nombreBod }} / {{ $fic_hard -> nombreSecc }} - Caja: {{ $fic_hard -> numCaja }}
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead"><small>Opciones Equipo:</small></p>

                <button class="btn btn-success"><i class="fa fa-random"></i> INICIAR COMODATO</button>
                <button class="btn btn-warning"><i class="fa fa-exclamation"></i> SOLICITAR BAJA</button>

                </p>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p class="lead"><small>Log Historico Equipo:</small></p>
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
                        <td><center>1</center></td>
                        <td>{{ $fic_hard -> fecCargaHard }}</td>
                        <td>Equipo es añadido al inventario informático del Gobierno Regional</td>
                    </tr>
                    @foreach($com as $com)
                        <tr>
                            <td></td>
                            <td></td>
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

@endsection
