@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Inventarios
@endsection
@section('contentheader_title')
    Inventarios
@endsection
@section('contentheader_description')
    / Gestión
@endsection
@section('main-content')
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Inventario Hardware</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="/Inventarios/GuardarHardware" method="POST" class="form-horizontal">
                    <!-- text input -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="folio">Folio Inv: (DAF)</label>
                            <input type="text" name="FolioInv" class="form-control" placeholder="AA00000">
                        </div>
                        <div class="col-md-4">
                            <label for="paterno">Nombre Hardware: (O Folio Interno)</label>
                            <input type="text" name="NomHard" class="form-control" placeholder="Nombre Tipo">
                        </div>
                        <div class="col-md-3">
                            <label for="materno">N° de Serie:</label>
                            <input type="text" name="NumSerie" class="form-control" placeholder="N° Serie Fábrica">
                        </div>
                        <div class="col-md-3">
                            <label for="nombres">IMEI: (Teléfonos / Tablets)</label>
                            <input type="text" name="ImeiHard" class="form-control" placeholder="00000000000">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="telefono">Tipo Hardware:</label>
                            <select class="form-control" name="TipoHard">
                                @foreach($tipos as $tipos)
                                    <option value="{{ $tipos->idTipo }}">{{ $tipos -> nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="telefono">Marca / Modelo:</label>
                            <select class="form-control" name="IdModelo">
                                @foreach($m_m as $m_m)
                                    <option value="{{ $m_m->idModelo }}">{{ $m_m -> marca }}
                                        / {{ $m_m -> modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="capacidad">Capacidad: (GB)</label>
                            <input type="number" name="CapHard" class="form-control" placeholder="1" required min="0"
                                   max="4000">
                        </div>
                        <div class="col-md-2">
                            <label for="ram">RAM: (GB)</label>
                            <input type="number" name="RamHard" class="form-control" placeholder="1">
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Procesador:</label>
                            <input type="text" name="ProcHard" class="form-control" placeholder="Intel / AMD u Otro">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-2">
                            <label for="telefono">N° de Teléfono:</label>
                            <input type="number" name="NumFono" class="form-control" placeholder="900000000" min="0"
                                   maxlength="9">
                        </div>
                        <div class="col-md-2">
                            <label for="nombres">IP: (V4 / V6)</label>
                            <input type="text" name="IpHard" class="form-control" placeholder="192.168.0.1">
                        </div>
                        <div class="col-md-2">
                            <label for="nombres">MAC:</label>
                            <input type="text" name="MacHard" class="form-control" placeholder="000000000000">
                        </div>
                        <div class="col-md-3">
                            <label for="correo">Estado Actual:</label>
                            <select class="form-control" name="EstActHard">
                                @foreach($e_a as $e_a)
                                    <option value="{{ $e_a->idEstado }}">{{ $e_a -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono">Estado Inicial:</label>
                            <select class="form-control" name="EstInihard">
                                @foreach($e_b as $e_b)
                                    <option value="{{ $e_b->idEstado }}">{{ $e_b -> nombreEstado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-5">
                            <label for="telefono">Ubicación:</label>
                            <select class="form-control" name="UbiqHard">
                                @foreach($ubic as $ubic)
                                    <option value="{{ $ubic->idCaja }}">{{$ubic -> nombreBod}}
                                        - {{ $ubic -> nombreSecc }} / Caja: {{ $ubic -> numCaja }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="telefono">Observaciones:</label>
                            <input type="text" name="ObsHard" class="form-control" placeholder="Observaciones"
                                   maxlength="50">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                        <button type="submit" class="btn btn-success pull-right">Ingresar Nuevo Inventario</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Gestión Avanzada Inventario</h3>
            </div>
            <div class="box-body">
                <a class="btn btn-app">
                    <i class="fa fa-apple"></i> Marcas
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-slack"></i> Modelos
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-archive"></i> Ubicaciones
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-archive"></i> Secciones
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-archive"></i> Cajas
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Inventario Disponible en Bodega</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tipo HW</th>
                        <th>Marca - Modelo</th>
                        <th>Capacidad - Ram</th>
                        <th>Ubicación</th>
                        <th>Estado Actual</th>
                        <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hard_d as $h_d)
                        <tr>
                            <td>{{ $h_d -> nombreTipo }}</td>
                            <td>{{ $h_d -> marca }} {{ $h_d -> modelo }}</td>
                            <td>{{ $h_d -> capacidadHard }} GB HDD / {{ $h_d -> ramHard }} GB RAM</td>
                            <td>{{ $h_d -> nombreBod }} - {{ $h_d -> nombreSecc }} / Caja: {{ $h_d -> numCaja }}</td>
                            <td><center>
                                    @if($h_d -> estadoHardNA == '3')
                                        <i class="fa fa-circle-o text-green"></i> Nuevo
                                    @elseif($h_d -> estadoHardNA == '4')
                                        <i class="fa fa-circle-o text-yellow"></i> Usado
                                    @else
                                        <i class="fa fa-circle-o text-red"></i> Desconocido
                                    @endif
                                </center>
                            </td>
                            <td>{{ $h_d -> obsHard }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection