@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Comodatos
@endsection
@section('contentheader_title')
    Comodatos
@endsection
@section('contentheader_description')
    / Asignación de Hardware
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Hardware Disponible</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>N° SERIE</th>
                        <th>FOLIO INVENTARIO</th>
                        <th>TIPO</th>
                        <th>MARCA MODELO</th>
                        <th>CAPACIDAD - RAM</th>
                        <th>UBICACIÓN ACTUAL</th>
                        <th>DETALLE</th>
                        <th>ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($h_d as $h_d)
                        <tr>
                            <td>{{ $h_d -> numSerieHard }}</td>
                            <td>{{ $h_d -> fol_invHard }}</td>
                            <td>{{ $h_d -> tipoHard }}</td>
                            <td>{{ $h_d -> marca }} {{ $h_d -> modelo }}</td>
                            <td>{{ $h_d -> capacidadHard }} GB - {{ $h_d->ramHard }} GB</td>
                            <td>{{ $h_d -> nombreBod }} / {{ $h_d -> nombreSecc }} - Caja: {{ $h_d -> numCaja }}</td>
                            <td>{{ $h_d -> obsHard }}</td>
                            <td>{{ $h_d -> estadoHardNA }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection


