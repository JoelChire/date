@extends('adminlte.app')

@section('header_title')
	CAMBIAR CONTRASEÑA
@endsection


@section('content')
  @if (Session::has('message'))
  <div class="text-danger">
    {{Session::get('message')}}
  </div>
@endif
  <form method="post" action="{{url('user/updatepassword')}}">
    {{csrf_field()}}
    <div class="form-group">
      <label for="mypassword">Introduce tu actual contraseña:</label>
      <input type="password" name="mypassword" class="form-control">
      <div class="text-danger">{{$errors->first('mypassword')}}</div>
    </div>
    <div class="form-group">
      <label for="password">Introduce tu nueva contraseña:</label>
      <input type="password" name="password" class="form-control">
      <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
    <div class="form-group">
      <label for="mypassword">Confirma tu nueva contraseña:</label>
      <input type="password" name="password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cambiar mi password</button>
  </form>
@stop
