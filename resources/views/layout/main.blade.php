<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title> @yield('title')</title>
        <!-- Styles -->
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">JewelPack</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Catagories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Catagory_01</a></li>
                        <li><a href="#">Catagory_02</a></li>
                        <li><a href="#">Catagory_03</a></li>
                    </ul>
                </li>
                <li><a href="#">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::user())
                    <li><a href="{{route('logged')}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->firstname}}</a></li>
                    <li><a href="{{route('loginPage')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                @else
                    <li><a href="{{route('registerPage')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="{{route('loginPage')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{{route('loginPage')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                @endif
            </ul>

        </div>
    </nav>
        @yield('body')

    </body>
</html>
