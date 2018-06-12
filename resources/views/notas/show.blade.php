@extends('adminlte.app')

@section('head_title')
	Estudiantes
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
	NOTAS
@endsection

@section('header_descripion')

@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success">
				<div class="box-body">
					<table id="notas" class="table table-bordered table-striped">
						<thead >
							<tr class="bg-black">
              @foreach($notas as $nota)
								<th class="col-xs-1">
									<center>
										{{$nota -> nombre }}
									</center>
								</th>
              @endforeach
							</tr>
						</thead>
						<tbody>
								<tr>
								@foreach($notas as $nota)
									<td>
										<center>
										{{$nota -> valor }}
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

@section('script')
	<script src="{{ asset('/adminlte/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/datatables.net-bs/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/jquery-slimscroll/jquery.slimscroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/adminlte/fastclick/lib/fastclick.js') }}" type="text/javascript"></script>
    <script>
    	$(function () {
    		$('#productores').DataTable({
    			"lengthMenu": [ 5, 25, 50, 100 ],
    			"language": {
				"paginate": {
					"first": "Primera",
					"last": "Última",
					"next": "Siguiente",
					"previous": "Anterior",
					},
				"emptyTable": "La tabla esta vacía",
				"info": "Mostrando del _START_ al _END_ de _TOTAL_ Productores",
				"infoEmpty": "Mostrando del 0 al 0 de 0 Productores",
				"infoFiltered": "(Filtrado de _MAX_ Productores)",
				"lengthMenu": "Mostrar _MENU_ Productores",
				"loadingRecords": "Cargando...",
				"search": "Filtrar Productores: ",
				"zeroRecords": "Productor no encontrado(a)",
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
