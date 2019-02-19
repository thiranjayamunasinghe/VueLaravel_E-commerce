

@extends('layout.main')



@section('title')
Logged Page
@endsection

@section('body')
	<div class="container box">
	@if(session('responseLog'))
		<div class="form-group alert alert-success">
			{{@session('responseLog')}}
		</div>
	@endif

<ul>
	<li>ID : {{Auth::user()->id}}</li>
<li>First Name : {{Auth::user()->firstname}}</li>
<li>Last Name : {{Auth::user()->lastname}}</li>
<li>Email : {{Auth::user()->email}}</li>
<li><a href={{route('logout')}}>Logout</a></li>


</ul>
	</div>
@endsection