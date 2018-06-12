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
	<div class="col-lg-12">
		<div class="box box-success">
			{{ Form::model($personaUser, ['route' => ['docentes.update', $personaUser -> id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
			<div class="box-header">
				<h3 class="box-title">
				EDITAR PERFIL DEL DOCENTE
				</h3>	
			</div>
			<div class="box-body">
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('DIRECCIÓN : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::text('direccion', $personaUser->direccion, ['class' => 'form-control', 'placeholder' => 'Ingrese sus nombres']) }}
						
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
							{{ Form::text('celular', $personaUser->celular, ['class' => 'form-control', 'placeholder' => 'Ingrese sus nombres']) }}
						
						</div>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="form-group">
					{{ Form::label('E-MAIL : ') }}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::text('email', $personaUser->email, ['class' => 'form-control', 'placeholder' => 'Ingrese sus nombres']) }}
						
						</div>
					</div>
				</div>

			
				<div class="col-lg-12">
					<div class="form-group">
					{{ Form::label('DEPARTAMENTO ACADÉMICO: ') }}
						<div class="input-group ">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o">                										
								</i>
							</span>
							{{ Form::select('departamentoid', $departamentos, null,['class' => 'form-control']) }}
						
						</div>
					</div>
				</div>

				

			

				<div class="col-lg-12">
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

@endsection