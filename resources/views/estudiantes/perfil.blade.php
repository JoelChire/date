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
@if (Session::has('status'))
<div class='text-success'>
		<font color="maroon">{{Session::get('status')}}</font>
@endif
@endsection

@section('content')
<div class="row">
	<div class="col-lg-3">
		<div class="box box-success">
			<div class="box-body">
				<img width="100%" src="{{ asset('/imagenes/users/'.$estudiante -> foto) }}">
			</div>
		</div>
	</div>

	<div class="col-lg-9">
		<div class="box box-success">

		<div class="box-body">
			<table class="table table-bordered table-striped">
					<tbody>
						<tr>
					    	<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									CÓDIGO:
								</b>
							</td>
							<td class="col-xs-8">
                           	 {{$estudiante->codigo}}
							</td>
                    	</tr>
                    	<tr>
                        	<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									NOMBRES:
								</b>
							</td>
							<td class="col-xs-8" >
                           	 {{$estudiante->nombres}}
							</td>
						</tr>
						<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								APELLIDO PATERNO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->primerapellido}}
							</td>
						</tr>

                   	 	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								APELLIDO MATERNO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->segundoapellido}}
							</td>
						</tr>
						<tr>
								<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									USUARIO:
								</b>
								</td>
								<td class="col-xs-8">
					         {{$estudiante->user}}
								</td>
					  </tr>
						<tr>
								<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									FACULTAD:
								</b>
								</td>
								<td class="col-xs-8" >
									{{$estudiante->facultad}}
								</td>
						</tr>
						<tr>
		<td class="bg-primary" align="right" class="col-xs-4">
			<b>
			ESCUELA:
			</b>
		</td>
		<td class="col-xs-8" >
		{{$estudiante->escuela}}
		</td>
	</tr>
                   	 	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								DNI:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->dni}}
							</td>
						</tr>

                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								CELULAR:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->contacto}}
							</td>
						</tr>

							<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								E-MAIL:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->email}}
							</td>
						</tr>
                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								DIRECCIÓN:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$estudiante->direccion}}
							</td>
							</tr>
            </tbody>
            </table>
        </div>
		<div class="box-footer">
			<div class="row">
				<div class="col-lg-6">
				{{ Form::open(['method' => 'get', 'route' => ['estudiantes.edit', $estudiante -> id]]) }}
				{{ Form::button('Editar Perfil', ['type' => 'submit', 'class' => 'btn btn-success btn-block'] )  }}
				{{ Form::close() }}
				</div>
				<div class="col-lg-6">
				{{ Form::open(['method' => 'get', 'route' => ['password']]) }}
				{{ Form::button('Cambiar contraseña', ['type' => 'submit', 'class' => 'btn btn-success btn-block'] )  }}
				{{ Form::close() }}
				</div>
			</div>
		</div>
		</div>
   	</div>
</div>

@endsection
