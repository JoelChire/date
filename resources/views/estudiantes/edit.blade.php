@extends('adminlte.app')

@section('head_title')
	Perfil
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
PERFIL
@endsection

@section('header_descripion')

@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="box box-success">
			{{ Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante -> id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
			<div class="box-header">
				<h3 class="box-title">
				EDITAR
				</h3>
			</div>
			<div class="box-body">
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('USUARIO : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('usuario', $estudiante->user, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) }}

						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('CELULAR : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('contacto', $estudiante->contacto, ['class' => 'form-control', 'placeholder' => 'Ingrese su numero telefónico']) }}
						</div>
					</div>
				</div>
					<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('E-MAIL : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('email', $estudiante->email, ['class' => 'form-control', 'placeholder' => 'Ingrese su e-mail']) }}

						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('FACEBOOK : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('facebook', $estudiante->facebook, ['class' => 'form-control', 'placeholder' => 'Ingrese el link de su perfil de facebook']) }}

						</div>
					</div>
				</div>
        <div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('DIRECCIÓN : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('direccion', $estudiante->direccion, ['class' => 'form-control', 'placeholder' => 'Ingrese su numero telefónico']) }}

						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('NUMERO DE CONTACTO : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::text('numero', $estudiante->numero, ['class' => 'form-control', 'placeholder' => 'Ingrese un numero telefónico auxiliar para contactarlo']) }}
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
					{{ Form::label('FOTO DE PERFIL: ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">
								</i>
							</span>
							{{ Form::file('foto',  ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

			</div>

			<div class="box-footer">
				<div class="row">
					<div class="col-lg-12">
					{{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
   	</div>
</div>


@endsection
