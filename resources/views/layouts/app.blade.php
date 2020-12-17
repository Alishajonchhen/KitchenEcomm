<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BetterBuy-Kitchen</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('lib/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/dist/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 col-md-12">
                    <div class="navbar-brand">Better<span style="color:white;">Buy</span></div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    @yield('content')

    <footer class="footer">
        <div class="ct-footer-post">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-md-12">
                        <div class="logo" style="width: 150px; height: 30px; margin-left: 50px;">
                            <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/baltra.png')}}" alt="Baltra" class="img-responsive">
                        </div>
                        <div class="inner-left">
                            <p>Purna Trading. Jawalakhel, Lalitpur</p>
                        </div>
                        <div class="middle" style="margin-left: 300px; padding-bottom: 100px;">
                            <ul>
                                <li><a>9843265432</a></li>
                                <li><a>01-5534328</a></li>
                                <li><a>01-5554324</a></li>
                            </ul>
                        </div>
                        <div class="inner-right">
                            <p>Copyright © 2020 BetterBuy.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
