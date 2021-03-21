<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BetterBuy-Kitchen</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css"
        rel="stylesheet">
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
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <label>
                                <input type="text" class="form-control" placeholder="Search">
                            </label>
                        </div>
                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{route('front.home')}}">Home <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Oven</a></li>
                        <li><a href="#">Kettle</a></li>
                        <li><a href="#">Vacuum Cleaner </a></li>
                        <li><a href="#">Toaster</a></li>
                        <li><a href="#">Fan</a></li>
                        <li><a href="#">Utensils</a></li>
                    </ul>
                </li>
                <li><a href="{{route('guide.about')}}">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
                <li><a href="#"><i class="icon-shopping-cart"></i> Shopping Cart</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    @yield('body')
    <br>
    <br>
    @yield('content')

    <footer class="footer">
        <div class="ct-footer-post">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 col-md-12">
                        <div class="logo" style="width: 150px; height: 30px; margin-left: 50px;">
                            <img src="{{asset('lib/Images/baltra.png')}}" alt="Baltra" class="img-responsive">
                        </div>
                        <div class="inner-left">
                            <p>Purna Trading. Jawalakhel, Lalitpur</p>
                        </div>
                        <div class="middle" style="margin-left: 300px; padding-bottom: 100px;">
                            <ul>
                                <li><a href="{{route('guide.policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('guide.return')}}">Return</a></li>
                                <li><a href="{{route('guide.terms')}}">Terms and Conditions</a></li>
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('lib/dist/test.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>