@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Mensajes
@endsection
@section('contentheader_title')
    Mensajes
@endsection
@section('contentheader_description')
    / Ver
@endsection
@section('main-content')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bandeja de Mensajería</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>FECHA / HORA</th>
                        <th>DE</th>
                        <th>MENSAJE</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($msjes as $mensajes)
                        <tr>
                            <td>{{ $mensajes -> fecEnvioMsje }}</td>
                            <td>{{ $mensajes -> funcEnviaMsje }}</td>
                            <td>{{ $mensajes -> mensaje }}</td>
                            <td>{{ $mensajes -> estadoMsje }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection