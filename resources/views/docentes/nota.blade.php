@extends('adminlte.app')

@section('head_title')
	Notas
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
 <div class="row">
 	<div class="col-md-10">
 		NOTAS
 	</div>
	<div class="col-md-2 ml-auto">
		<button type='submit' class='btn btn-primary' data-toggle="modal" data-target="#agregar">
				<span class='glyphicon glyphicon-plus'></span> Agregar Nota
		</button>
	</div>
 </div>

@endsection

@section('header_descripion')

@endsection

@section('content')
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="align-items:baseline;">
						<h4 class="modal-title text-left" id="myModalLabel">Nueva Nota</h4>
						<button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label>Nombre</label>
						<input type="text" id="ag_nombre"  class="form-control input-sm">
						<label>Poderacion</label>
						<input type="text" id="ag_ponderacion"  class="form-control input-sm">
						<label>Nota Maxima</label>
						<input type="text" id="ag_notamaxima"  class="form-control input-sm">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="agregarbtn" data-dismiss="modal">Guardar</button>
					</div>
				</div>

			</div>
		</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success">
				<div class="box-body">
					<table id="notas" class="table table-bordered table-striped">
						<thead >
							<tr class="bg-black" id="nomnota">

                                <th class="col-xs-4">
									<center>
										CODIGO
									</center>
								</th>
                                <th class="col-xs-4">
									<center>
										NOMBRE
									</center>
								</th>
								@foreach($Eedcs as $Eedc)
								@if ($loop->first)
									@foreach($notas as $nota)
											@if ($nota->codigonotaa ===  $Eedc->codigoestudiante)
												<th class="col-xs-1">
														<center>
															{{ $nota->nombre }}
														</center>
													</th>
											@endif
										</th>
									@endforeach
									@endif
								@endforeach
							</tr>
						</thead>
						<tbody>

                                @foreach($Eedcs as $Eedc)
                                <tr>
                                    <td>
							            <center>
								            {{$Eedc -> Codigo}}
                                        </center>
							        </td>
							        <td>
							            <center>
                                            {{ $Eedc->Nombre }}
							            </center>
							        </td>
                                    @foreach($notas as $nota)

											@if ($nota->codigonotaa ===  $Eedc->codigoestudiante)
												<td>
													<center>
													{{$nota -> valor}}
													</center>
												</td>
											@endif

                                    @endforeach

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
		<script type="text/javascript">
	$(document).ready(function(){
		$('#agregarbtn').click(function(){
			notanomb=$('#ag_nombre').val();
			notaponde=$('#ag_ponderacion').val();
			notamax=$('#ag_notamaxima').val();
			agregardatos(notanomb,notaponde,notamax);
		});
});
</script>
@endsection
