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
<div class="container">
      <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="align-items:baseline;">
              <h4 class="modal-title text-left" id="myModalLabel">Editar Usuario</h4>
              <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label>ID</label>
              <input type="text" id="edi_id"  class="form-control input-sm" disabled>
              <label>Nombre</label>
              <input type="text" id="edi_nombre"  class="form-control input-sm">
              <label>Usuario</label>
              <input type="text" id="edi_usuario"  class="form-control input-sm">
              <label>Password</label>
              <input type="password" id="edi_password"  class="form-control input-sm">
              <label for="cargo2">Cargo:</label>
              <select class="form-control input-sm" id="cargo2">
                <option value="3">Cliente</option>
                <option value="2">Secretaria</option>
                <option value="1">Administrador</option>
              </select>
              <label>E-mail</label>
              <input type="text" id="edi_mail"  class="form-control input-sm">
              <label>Teléfono</label>
              <input type="text" id="edi_fono"  class="form-control input-sm">
              <label for="estado">Estado:</label>
              <select class="form-control input-sm" id="estado">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" id="actualizar" data-dismiss="modal">Actualizar</button>
            </div>
          </div>

        </div>
      </div>
</div>
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
									<!-- <a href="{{route('milca',$cursosdocente->idmil)}}" type="button" class="btn btn-outline-warning" >
									<i class="fa fa-eye" aria-hidden="true">
										</i>
									</a> -->
									<button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#editar">
           <span class="fa fa-eye"></span>
         </button>
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
