<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BetterBuy-Kitchen</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('lib/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/dist/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">BetterBuy</div>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <label>
                        <input type="text" class="form-control" placeholder="Search">
                    </label>
                </div>
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('front.home')}}">Home <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="{{route('guide.about')}}">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i>  User <span class="caret"></span></a>
                        <ul class="dropdown-menu">
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
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                        </ul>
                </li>
                <li><a href="#"><i class="icon-shopping-cart"></i> Shopping Cart</a></li>
            </ul>
        </div>

       <!-- <main class="py-4">
        </main>
        -->
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
                <div class="logo" style="width: 150px; height: 30px; margin-left: 50px;">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/baltra.png')}}" alt="Baltra" class="img-responsive">
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
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
