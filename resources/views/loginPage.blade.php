@extends('layout.main')


@section('title')
Login Page
@endsection

@section('body')
</br>
<div class="container box">

    <form class="form-signin" method="post" action="{{route('login')}}">
        <h1 align="center">Login</h1>
        @if(session('responseLogout'))
            <div class="form-group alert alert-success">
                {{@session('responseLogout')}}
            </div>
        @endif
        @if(session('responseLog'))
            <div class="form-group alert alert-danger">
                {{@session('responseLog')}}
            </div>
        @endif
            @if(session('responseReg'))
                <div class="form-group alert alert-info">
                    {{@session('responseReg')}}
                </div>
            @endif
            @if(session('responseVerifyErr'))
                <div class="form-group alert alert-danger">
                    {{@session('responseVerifyErr')}}
                </div>
            @endif

            <div class="form-group form-group-lg">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email"  name="email">
            </div>

    </br>

            <div class="form-group form-group-lg">
                <input type="password" class="form-control" id="inputPassword3" placeholder="password" name="password">
            </div>




            <div class="form-group form-group-lg">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Remember Me
                    </label>
                </div>
            </div>


            <div class="form-group form-group-lg">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            </div>
            {{csrf_field()}}

    </form>


</div>


@endsection
