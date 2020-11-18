<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        BetterBuy-Kitchen
    </title>
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
            <li class="active"><a href="{{route('layout.welcome')}}">Home <span class="sr-only">(current)</span></a></li>
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

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-user"></i>  User <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('users.signup')}}">Sign Up</a></li>
                    <li><a href="{{route('users.login')}}">LogIn</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">LogOut</a></li>
                </ul>
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
