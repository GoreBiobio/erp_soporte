@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Ficha Electrónica de Incidencias
@endsection
@section('contentheader_title')
    Incidencia
@endsection
@section('contentheader_description')
    / Ficha Electrónica de Incidencia
@endsection
@section('main-content')

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h4 class="page-header">
                    <small><i class="fa fa-flag"></i> <strong>ID INCIDENCIA:</strong> {{ $incidencias -> idIncid }}</small>
                    <small class="pull-right">
                        <small><strong>FECHA ACTUAL:</strong> {{ date("d-m-Y") }}</small>
                    </small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>INCIDENCIA</strong><br><br>
                    <strong>FECHA INICIO: </strong>{{ $incidencias -> fecIncid }}<br>
                    <strong>HORA INICIO: </strong>{{ $incidencias -> horaIncid }} <br>
                    <strong>FECHA FIN: </strong>{{ $incidencias -> fechaCierreIncid }}<br>
                    <strong>HORA FIN: </strong>{{ $incidencias -> horaCierreIncid }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>DETALLE</strong><br><br>
                    <strong>TIPO: </strong> {{ $incidencias -> tipoInc }}<br>
                    <strong>SERVICIO AFECTADO: </strong> {{ $incidencias -> servAfectado }}<br>
                </address>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">
                    <small>Detalle de la Incidencia:</small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $incidencias -> detalleIncid }}
                </p>
            </div>

            <div class="col-xs-6">
                <p class="lead">
                    <small>Observaciones de la Solución:</small>
                </p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $incidencias -> obsIncid }}
                </p>
            </div>

            <!-- /.col -->
        </div>

        <div class="row no-print">
            <div class="col-xs-12">
                <a href='javascript:window.print();' target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>
                    Imprimir Ficha</a>
            </div>
        </div>

        <hr>

        Certifica,
        <br><br><br><br><br>
        <center>_____________________________________</center>
        <center>{{ $incidencias -> name }}</center>
        <center><strong>PROFESIONAL UNIDAD INFORMÁTICA</strong></center>
        <center>GOBIERNO REGIONAL DEL BÍOBIO</center>
    </section>
    <!-- /.content -->

    <!-- Modal -->


@endsection
