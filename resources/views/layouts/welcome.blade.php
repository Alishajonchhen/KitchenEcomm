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
                                <input type="text" name="search_value" class="form-control" placeholder="Search"
                                    id="searched_value">
                            </label>
                        </div>
                        <ul class="search-list" hidden>
                        </ul>
                        <button id="search_product" class="btn"><i class="icon-search" style="padding: 10px"></i></button>
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
                        @foreach ($categories as $category)
                        <li><a href="{{ route('frontend-category', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li><a href="{{route('guide.about')}}">About</a></li>
                <li><a href="{{route('contact.contact')}}">Contact</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                        style="margin-right: -95px;">
                        <div>
                            <a class="dropdown-item" href="{{ route('user-profile') }}">
                                <i class="icon-user" style="padding: 10px"></i>   My Profile
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-item" href="{{ route('order-track') }}">
                                <i class="icon-book" style="padding: 10px"></i>  Order History
                            </a>
                        </div>
                        <hr>
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="icon-signout" style="padding: 10px"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>
                <li><a href="{{ route('all-carts') }}"> <span style="color:red" id="cart-item-count">{{ $cartCount }}
                        </span> &nbsp;<i class="icon-shopping-cart"></i>
                        Shopping Cart</a></li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @include('sweetalert::alert')
</body>
@yield('scripts')

<style>
    #logout-form {
        margin: 0px !important;
    }

    .search-list {
        margin: 0px !important;
        padding-left: 3px;
        position: absolute;
        z-index: 999;
        color: black;
        background: white;
        width: 170px;
        list-style-type: none;
        border: 1px solid black;
    }

    .search-list li {
        text-decoration: none;
    }
</style>
<script>
    $(document).ready(function(){
        $('#search_product').on('click', function(e){
            e.preventDefault();
            let searched = $('#searched_value').val();
            let url = "{{ route('search-product') }}"
            $('.search-list').empty();
            $.get(url, {'keyword':searched}, function(data,status){
                if(status == 'success'){
                    $('.search-list').attr("hidden", false);
                    $('.search-list').append(`
                    <li style="margin-left:132px;cursor:pointer;">
                    <div>
                    <span class="badge badge-important" id="close_search">X</span
                    </div>
                    </li> `);
                    if(data.data.length == 0){
                        $('.search-list').append(`
                        <li>No Records Found</li>
                        `);
                    }else{
                        data.data.forEach(item => {
                        if(item.hasOwnProperty('category_id')){

                        $('.search-list').append(`
                        <li>
                        <a href="/product/${item.id}">${item.product_name}</a>
                        </li>
                        `);
                        }else{
                        $('.search-list').append(`
                        <li>
                        <a href="/category/${item.slug}">${item.name}</a>

                        </li>
                        `);
                        }
                        });
                    }

                }
            }).fail(function(data){
                console.log(data);
            })
        });
        $(document).on('click','#close_search', function(e){
            e.preventDefault();
            $('.search-list').empty();
            $('.search-list').attr("hidden", true);
        })
    })

</script>

</html>
