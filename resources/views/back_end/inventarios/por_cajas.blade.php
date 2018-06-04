@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Inventario
@endsection
@section('contentheader_title')
    Inventario
@endsection
@section('contentheader_description')
    / Inventario por Unidad (Caja)
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Equipos en Caja: {{ $caja[0]->numCaja }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>FECHA CARGA</th>
                        <th>N° SERIE</th>
                        <th>FOLIO INV / IMEI</th>
                        <th>TIPO</th>
                        <th>MARCA MODELO</th>
                        <th>CAPACIDAD - RAM</th>
                        <th>ESTADO HARDWARE</th>
                        <th>DETALLE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($equipos as $equipos)
                        <tr>
                            <td>{{ $equipos -> fecCargaHard }}</td>
                            <td>{{ $equipos -> numSerieHard }}</td>
                            <td>{{ $equipos -> fol_invHard }} / {{ $equipos -> imeiHard }}</td>
                            <td>{{ $equipos -> tipoHard }}</td>
                            <td>{{ $equipos -> marca }} {{ $equipos -> modelo }}</td>
                            <td>{{ $equipos -> capacidadHard }} GB - {{ $equipos -> ramHard }} GB</td>
                            <td>{{ $equipos -> estadoHardNA }}</td>
                            <td>{{ $equipos -> obsHard }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


