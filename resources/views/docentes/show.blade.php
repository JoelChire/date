@extends('adminlte.app')

@section('head_title')
	Perfil
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
	PERFIL DE DOCENTE
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
			<div class="box-header">
			</div>
			<div class="box-body">
				<img width="100%" src="{{ asset('/imagenes/users/'.$personaUser -> foto) }}">
			</div>
		</div>
	</div>

	<div class="col-lg-9">
		<div class="box box-success">
			<div class="box-header">
					
			</div>
			
		<div class="box-body">
			<table class="table table-bordered table-striped">
					<tbody>
						<tr>
					    	<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									N°: 
								</b>
							</td>
							<td class="col-xs-8" >
                           	 {{$personaUser->id}}
							</td>
                    	</tr>

						<tr>
					    	<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									CÓDIGO: 
								</b>
							</td>
							<td class="col-xs-8">
                           	 {{$personaUser->codigo}}
							</td>
                    	</tr>

                    	<tr>  
                        	<td class="bg-primary" align="right" class="col-xs-4">
								<b>
									NOMBRES: 
								</b>
							</td>
							<td class="col-xs-8" >
                           	 {{$personaUser->nombre}}
							</td>
						</tr>
						<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								APELLIDO PATERNO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->primerapellido}}
							</td>
						</tr>

                   	 	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								APELLIDO MATERNO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->segundoapellido}}
							</td>
						</tr>
                    
                   	 	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								DNI:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->dni}}
							</td>
						</tr>

                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								CELULAR:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->celular}}
							</td>
						</tr>
						<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								NÚMERO DE CONTACTO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->numero}}
							</td>
						</tr>
							<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								E-MAIL:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->email}}
							</td>
						</tr>	

                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								DIRECCIÓN:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->direccion}}
							</td>
						</tr>

                   		 <tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								PROFESION:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->profesion}}
							</td>
						</tr>
						<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								GRADO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->grado}}
							</td>
						</tr>

                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								FACULTAD:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->facultad}}
							</td>
						</tr>

                    	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								DEPARTAMENTO ACADÉMICO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->departamento}}
							</td>
						</tr>

                    
                  	 	 <tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								FECHA DE NACIMIENTO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->nacimiento}}
							</td>
						</tr>
                   	 	<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								SEXO:
								</b>
							</td>
							<td class="col-xs-8" >
							{{$personaUser->Genero}}
							</td>
						</tr>
						
						</tr>
							<tr>
							<td class="bg-primary" align="right" class="col-xs-4">
								<b>
								FACEBOOK:
								</b>
							</td>
							<td class="col-xs-8" >
							<a target="_blank" href="{{$personaUser->facebook}}">{{$personaUser->facebook}}</a>
							</td>
						</tr>	

                    </tbody>
            </table>
        </div>
		<div class="box-footer">
	
			<div class="row">
				<div class="col-lg-6">
				{{ Form::open(['method' => 'get', 'route' => ['docentes.edit', $personaUser -> id]]) }}
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