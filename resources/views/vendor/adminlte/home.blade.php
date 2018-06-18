@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Inicio
@endsection
@section('contentheader_title')
	Hola :)
@endsection
@section('contentheader_description')
	/ Sesión de: {{ Auth::user()->name}}
@endsection

@section('main-content')
	<br>
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{ $num_sop }}</h3>

					<p>Soportes Pendientes</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{ $num_mant }}<sup style="font-size: 20px"></sup></h3>

					<p>Mantenciones Pendientes</p>
				</div>
				<div class="icon">
					<i class="fa fa-wrench"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>XX</h3>

					<p>Mensajes sin Leer</p>
				</div>
				<div class="icon">
					<i class="fa fa-send"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-gray">
				<div class="inner">
					<h3>XX</h3>

					<p>Historicos Cerrados</p>
				</div>
				<div class="icon">
					<i class="fa fa-archive"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
	</div>

	<hr>


	<div class="col-md-6">
		<div class="box box-warning">
			<div class="box-header with-border">
				<i class="fa fa-warning"></i>

				<h3 class="box-title">ÚLTIMOS INCIDENTES</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Alert!</h4>
					Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
					soul, like these sweet mornings of spring which I enjoy with my whole heart.
				</div>
				<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-info"></i> Alert!</h4>
					Info alert preview. This alert is dismissable.
				</div>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Alert!</h4>
					Warning alert preview. This alert is dismissable.
				</div>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Alert!</h4>
					Success alert preview. This alert is dismissable.
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>

@endsection
