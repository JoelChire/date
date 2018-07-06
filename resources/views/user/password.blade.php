@extends('adminlte.app')

@section('head_title')
	Contraseña
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
	CAMBIAR CONTRASEÑA
@endsection


@section('content')
<form method="post" action="{{url('user/updatepassword')}}">
	{{csrf_field()}}
<div class="row">
	<div class="col-lg-10">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">
				EDITAR
				</h3>
			</div>
			<div class="box-body">
				<div class="col-lg-12">
					<div class="form-group">
						<label for="mypassword">Introduce tu actual contraseña:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-unlock">
								</i>
							</span>
							<input type="password" name="mypassword" class="form-control">
						</div>
						<div class="text-danger">{{$errors->first('mypassword')}}</div>
						@if (Session::has('message'))
								<font color="maroon">{{Session::get('message')}}</font>
						@endif
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="password">Introduce tu nueva contraseña:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock">
								</i>
							</span>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="text-danger">{{$errors->first('password')}}</div>
					</div>
				</div>
					<div class="col-lg-12">
					<div class="form-group">
					<label for="mypassword">Confirma tu nueva contraseña:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock">
								</i>
							</span>
							<input type="password" name="password_confirmation" class="form-control">
						</div>
					</div>
				</div>
			<div class="col-lg-4">
				<div class="form-group">
						<br><button type="submit" class="btn btn-success btn-block">Cambiar mi contraseña</button>
				</div>
			</div>


</div>


@endsection
