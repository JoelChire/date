@extends('adminlte.app')

@section('head_title')
	Docentes
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')

@endsection

@section('header_descripion')

@endsection

@section('header_level')
	<li class="active">
		Docentes
	</li>
@endsection

@section('content')
<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">
                        TABLAS DE ASIGNATURAS
					</h3>
				</div>

                <div class="box-body">
					<table id="docentes" class="table table-bordered table-striped">
						<thead >
							<tr class="bg-primary">
								<th class="col-xs-4">
									<center>
										NOMBRE
									</center>
								</th>
								<th class="col-xs-2">
									<center>
										FACULTAD
									</center>
								</th>
								<th class="col-xs-2">
									<center>
										ESCUELA
									</center>
								</th>
								<th class="col-xs-2">
									<center>
										Nº ALUMNOS
									</center>
								</th>
								<th>
									<center>
										ACCION
									</center>
								</th>
							</tr>
						</thead>
                        <tbody>
						@foreach($cursosdocentes as $cursosdocente)
                        <tr>
                            <td>
							<center>
								{{$cursosdocente -> Nombre }}
                            </center>
							</td>
							<td>
							<center>
                                {{$cursosdocente -> Facultad }}
							</center>
							</td>
							<td>
							<center>
                                {{$cursosdocente -> Escuela }}
							</center>
							</td>
							@foreach($cantidades as $cantidade)
							<td>
							<center>
                                {{$cantidade -> Cantidad }}
							</center>
							</td>
							@endforeach
							<td>
								<center>
									<a href="{{route('milca',$cursosdocente->idmil)}}" type="button" class="btn btn-outline-warning" >
									<i class="fa fa-eye" aria-hidden="true">
										</i>
									</a>
								</center>
							</td>
                        @endforeach
						</tr>
                        </tbody>
					</table>
                </div>

            </div>
        </div>
</div>
@endsection

@section('footer')

@endsection
