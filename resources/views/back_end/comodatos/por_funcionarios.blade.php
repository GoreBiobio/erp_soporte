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
                        <th>Terminar</th>
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
                            <td>@if($comodatos -> estadoComod =='Archivo')
                                    <form action="/Comodatos/GenerarWordDevolucion" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idCom" value="{{ $comodatos -> idComod }}">
                                        <button type="submit" class="btn btn-warning btn-xs"><i
                                                    class="fa fa-file-word-o"></i> Word Recepcion
                                        </button>
                                    </form>
                                @else
                                    <form action="/Comodatos/GenerarWord" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idCom" value="{{ $comodatos -> idComod }}">
                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                    class="fa fa-file-word-o"></i> Word Entrega
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>@if($comodatos -> estadoComod =='Archivo')
                                    <form action="/Comodatos/Terminar" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idCom" value="{{ $comodatos -> idComod }}">
                                        <input type="hidden" name="idHard" value="{{ $comodatos -> hardwares_idHard }}">
                                        <button type="submit" class="btn btn-danger btn-xs" disabled><i
                                                    class="fa fa-close"></i> Terminar Comodato
                                        </button>
                                    </form>
                                @else
                                    <form action="/Comodatos/Terminar" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="idCom" value="{{ $comodatos -> idComod }}">
                                        <input type="hidden" name="idHard" value="{{ $comodatos -> hardwares_idHard }}">
                                        <button type="submit" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-close"></i> Terminar Comodato
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


