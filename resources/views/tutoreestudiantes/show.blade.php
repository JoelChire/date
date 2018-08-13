@extends('adminlte.app')

@section('head_title')
	Tutor
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('header_title')
	
<div class="col-lg-3">
	<div class="box box-primary">
				
		<i class="fa fa-plus" >
		</i>
	</div>
</div>

	
@endsection

@section('header_descripion')

@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">
						LISTA DE TUTORADOS
					</h3>			
				</div>
				<div class="box-body">
					<table id="actores" class="table table-bordered table-striped">
						<thead >
							<tr class="bg-black">
								<th class="col-xs-1">
									<center>
										ALUMNOS
									</center>
								</th>
								<th class="col-xs-10">
									<center>
										CELULAR
									</center>
								</th>
								<th>
									<center>
										<i class="fa fa-eye" aria-hidden="true">										
										</i>
									</center>
								</th>								
								<th>
									<center>
										<i class="fa fa-pencil" aria-hidden="true">										
										</i>
									</center>
								</th>
								<th>
									<center>
										<i class="fa fa-trash" aria-hidden="true">										
										</i>
									</center>
								</th>
							</tr>
						</thead>
						<tfoot>
						</tfoot>
						<tbody>
						@foreach tutoreestudiante
								<tr>
									<td class="col-xs-8" >
										{{ $tutoreestudiante -> estudiante_id }}
									</td>
									<td>
									</td>
									
								</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="box-footer">
					
				</div>
			</div>
		</div>
	</div>
	
@endsection

@section('footer')

@endsection

@section('script')
	<script src="{{ asset('/adminlte/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/datatables.net-bs/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/jquery-slimscroll/jquery.slimscroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/fastclick/lib/fastclick.js') }}" type="text/javascript"></script>
    <script>
    	$(function () {
    		$('#actores').DataTable({
    			"lengthMenu": [ 10, 25, 50, 100 ],
    			"language": {
				"paginate": {
					"first": "Primera",
					"last": "Última",
					"next": "Siguiente",
					"previous": "Anterior",
					},
				"emptyTable": "La tabla esta vacía",
				"info": "Mostrando del _START_ al _END_ de _TOTAL_ Actores",
				"infoEmpty": "Mostrando del 0 al 0 de 0 Actores",
				"infoFiltered": "(Filtrado de _MAX_ Actores)",
				"lengthMenu": "Mostrar _MENU_ Actores",
				"loadingRecords": "Cargando...",
				"search": "Filtrar Actores: ",
				"zeroRecords": "Actor/Actriz no encontrado(a)",
				"pagingType": "full_numbers"         
				},				
				"aoColumnDefs": [{
					"orderable": false,
					"targets": [ 2, 3,4 ],
				}]
    		});
   		});
    </script>
@endsection