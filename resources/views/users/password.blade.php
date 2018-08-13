@extends('adminlte.app')

@section('head_title')
	CONTRASEÑA
@endsection

@section('head_link')
	<link href="{{ asset('/adminlte/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header_title')
CAMBIAR DE CONTRASEÑA
@endsection

@section('header_descripion')

@endsection

@section('content')
<div class="row">
	<div class="col-sm-10">
		<div class="box box-danger">
			<div class="box-header">
				<h2 class="box-title">
					EDITAR
				</h2>
			</div>

    
        
      <div class="box-body">
        <form method="post" action="{{url('users/updatepassword')}}">
         	{{csrf_field()}}
			
      	<div class="col-lg-12">     
          <div class="form-group">
					<label for="mypassword">Introduce tu actual contraseña</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-unlock">                										
								</i>
							</span>
            	<input type="password" name="mypassword" class="form-control">
						</div>
						<div class="text-danger">{{$errors->first('mypassword')}}</div>
						@if (Session::has('message'))
      			<div class="text-danger">
       			 {{Session::get('message')}}
     				</div>
        		@endif
					</div>
				</div>
        	 			
        <div class="col-lg-12">     
          <div class="form-group">
					  <label for="password">Introduce tu nuevo contraseña</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock">                										
								</i>
							</span>
              <input type="password" name="password" class="form-control">
						</div>
						<div class="text-danger">{{$errors->first('password')}}</div>
				  </div>
				</div>
                 			
				<div class="col-lg-12">     
         <div class="form-group">
					<label for="mypassword">Confirma tu nueva contraseña</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock">                										
								</i>
							</span>
              <input type="password" name="password_confirmation" class="form-control">
						</div>
						<div class="text-danger">{{$errors->first('password')}}</div>
						<br>
						@if (Session::has('status'))
							<div class="text-danger">
   							 {{Session::get('status')}}
 							</div>
						@endif
				</div>
							

        <div class="box-footer">
			
					<div class="row">
						<div class="col-lg-4">
						{{ Form::submit('Cambiar mi Contraseña', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				
			  </div>   
		
        </form>
			</div>
	</div>
</div>
 
  
  
@stop