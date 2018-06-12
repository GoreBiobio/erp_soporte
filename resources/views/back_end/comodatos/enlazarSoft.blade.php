@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Comodatos
@endsection
@section('contentheader_title')
    Comodatos
@endsection
@section('contentheader_description')
    / Asignación de Software
@endsection
@section('main-content')

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Software Disponible</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SERVICIO / SOFTWARE</th>
                        <th>FEC. CAD SOFTWARE</th>
                        <th>OBS. SOFTWARE</th>
                        <th>TIPO USUARIOS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($s_w as $s_w)
                        <tr>
                            <td>
                                <form action="/Comodatos/EnlazarSoftPasoUno" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idSoft" value="{{ $s_w -> idSoft }}">
                                    <button type="submit" class="btn btn-success btn-xs"><i
                                                class="fa fa-cubes"></i> {{ $s_w -> nombreSoft }}</button>
                                </form>
                            </td>
                            <td>{{ $s_w->fecCadLicSoft }}</td>
                            <td>{{ $s_w->obsSoft }}</td>
                            <td>{{ $s_w->nombreTipo }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


