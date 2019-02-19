@extends('layout.main')

@section('title')
	Register Page
@endsection
@section('body')
</br>


<div class="container box">

					<form class="form-signup" method="post" action="{{route('signup')}}">
					  @if(count($errors)>0)
					  	@foreach($errors->all() as $error)
					  		<div class="form-group alert alert-danger">{{$error}}</div>
					  	@endforeach
					  @endif

					  @if(session('responseReg'))
					  	<div class="form-group alert alert-success">
					  		{{@session('responseReg')}}
					  	</div>
					  @endif


						  <h1 align="center">Register</h1>
					  <div class="form-group form-group-lg">
					   		<input type="text" class="form-control" id="inputEmail3" placeholder="First Name" name="firstname">
					</div>


					<div class="form-group form-group-lg">
					      <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="lastname">
					</div>


					  <div class="form-group form-group-lg">
					      <input type="email" class="form-control" id="inputPassword3" placeholder="abc@xyz.com" name="email">
					    </div>


					  <div class="form-group form-group-lg">
					      <input type="password" class="form-control" id="inputPassword3" placeholder="password" name="password">
					  </div>



					  <div class="form-group form-group-lg">
							  <input type="password" class="form-control" id="inputPassword3" placeholder="confirm password" name="confirm_password">
						  </div>

					  
					  <div class="form-group form-group-lg">
					      <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
					    {{csrf_field()}}
					  </div>

				</form>
</div>


@endsection
