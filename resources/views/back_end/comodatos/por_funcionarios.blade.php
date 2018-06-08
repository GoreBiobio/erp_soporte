@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Comodato
@endsection
@section('contentheader_title')
    Comodato
@endsection
@section('contentheader_description')
    / Comodato por Funcionario
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Equipos en COMODATO a: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>FECHA COMODATO</th>
                        <th>EQUIPO (TIPO, MARCA, MODELO, SERIE, IMEI)</th>
                        <th>ESTADO COMODATO</th>
                        <th>FEC. DEVOL ESTIMADA</th>
                        <th>DOCS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comodatos as $comodatos)
                        <tr>
                            <td>{{ $comodatos -> fechaIngComod }}</td>
                            <td>{{ $comodatos -> tipoHard }} {{ $comodatos -> marca }} {{ $comodatos -> modelo }}
                                - SERIE: {{ $comodatos ->numSerieHard }} - IMEI: {{ $comodatos -> imeiHard }}</td>
                            <td>{{ $comodatos -> estadoComod }}</td>
                            <td>{{ $comodatos -> fechaDevEstComod }}</td>
                            <td>
                                <form action="/Comodatos/GenerarWord" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idCom" value="{{ $comodatos -> idComod }}">
                                    <button type="submit" class="btn btn-primary btn-xs"><i
                                                class="fa fa-file-word-o"></i> Word Comodato</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


