@extends('adminlte.app')

@section('head_title')
	Perfil
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
 DOCENTE
@endsection

@section('header_descripion')
	
@endsection

@section('content')


<div class="row">
		<div class="col-sm-12">
			<div class="box box-danger">
				<div class="box-header">
					<h2 class="box-title">
						SEGURIDAD DE INICIO DE SESIÓN
					</h2>
				</div>

				<div class="box-body">
					
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('CONTRASEÑA ACTUAL : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::text('null', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su contraseña']) }}
						</div>
					</div>
				</div>

						
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('NUEVA CONTRASEÑA : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::text('contraseña', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nueva contraseña']) }}

						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('VUELVA A ESCRIBIR SU NUEVA CONTRASEÑA : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::text(null, null, ['class' => 'form-control', 'placeholder' => 'Rectifique el ingreso de su nueva contraseña']) }}

						</div>
					</div>
				</div>

				<div class="box-footer">
				@if(Auth::user()->role==3)
				<div class="row">
					<div class="col-lg-12">
					{{ Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
				@endif
			</div>   
		
				</div>

			</div>
		</div>
	</div>
@endsection