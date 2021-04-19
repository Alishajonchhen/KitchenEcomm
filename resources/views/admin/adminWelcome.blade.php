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
    <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/dist/admin.css')}}">

    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <style>
        #main {
            background-color: #f2f2f2;
        }

        .form-control {
            margin-left: 297px;
            top: -60px;

        }

        .input-group .form-control {
            height: 30px;
            margin-top: 29px;
        }

        .navbar-fixed-top {
            height: 80px;
            background-color: #204b68;
        }

        .navbar .nav {
            margin-top: -72px;
        }

        .icon-search {

            color: white;
        }

        ul.nav-sidebar a:hover{
            background-color: #cccccc !important;
        }

        .active {
            color: black !important;
            background: white;
        }

    </style>

</head>

<body>
    <nav class="navbar bg-info navbar-fixed-top" style="background-color:  #669999; height: 60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 col-md-12">
                    <div id="navbar-brand" style="font-size: 25px; color: #d8d397;
    margin-top: 10px; margin-bottom: -20px;">Admin<span style="color: white">Dashboard</span>
                        <div class="input-group custom-search-form">
                            <label style="max-width: 350px;">
                                <input type="text" class="form-control" placeholder="Search">
                            </label>
                            <button id="search" class="btn">
                                <i class="icon-search "></i>
                            </button>
                        </div>
                        <!-- /input-group -->
                    </div>

                    <!--Right Side Of Navbar-->
                    <ul class="nav navbar-top-links navbar-right" style="margin-top: -90px;">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-envelope icon-2x" style="color: black"></i>
                                <i class="icon-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <em>Yesterday</em>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                                            eleifend...</div>
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Read All Messages</strong>
                                        <i class="icon-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>

                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-tasks icon-fw icon-2x" style="color: black"></i> <i class="icon-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p><strong>Task 4</strong><span class="pull-right text-muted">80%
                                                    Complete</span></p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#"><strong>See All Tasks</strong>
                                        <i class="icon-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-tasks -->
                        </li>

                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-bell-alt icon-2x" style="color: black"></i> <i class="icon-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="icon-upload-alt"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Alerts</strong>
                                        <i class="icon-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-alerts -->
                        </li>

                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user icon-2x" style="color: black"></i> <i class="icon-caret-down"></i>
                                {{ \Auth::guard('admin')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="icon-user"></i>  User Profile</a>
                                </li>
                                <li><a href="#"><i class="icon-gear"></i>  Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="icon-signout"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>

                    <!-- /.navbar-top-links -->
                </div>
            </div>
        </div>

    </nav>
    <br>
    <br>
    <br>

    <div id="mySidebar" class="col-sm-3 col-md-2 sidebar"
        style="background-color:   #a3c2c2; height: 950px; color: black; width: 300px;">
        <ul class="nav nav-sidebar">
            <br>
            <br>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: black">×</a>
            <br><br>
            <li><a href="{{route('admin.dashboard')}}"
                    class="{{ Request::is('admin/welcome') ? "active" : '' }}" style="font-size: 18px; color: black;"> Overview </a></li>
            <li><a href="{{route('admin.categories.category')}}"
                    class="{{ Request::is('admin/categories') || Request::is('admin/category/edit/*') ? "active" : '' }}"
                   style="font-size: 18px;color: black;"> Category</a>
            </li>
            <li><a href="{{route('admin.products.product')}}"
                    class="{{ Request::is('admin/products') || Request::is('admin/product/edit/*') ? "active" : '' }}"
                   style="font-size: 18px;color: black;">Products</a>
            </li>
            <li><a href="{{route('admin-order-list')}}"
                    class="{{ Request::is('admin/orders') ? "active" : '' }}"
                   style="font-size: 18px;color: black;">Orders</a></li>
        </ul>


    </div>
    <div id="main">
        <div class="row">
            @yield('page-header')
            <br>
            <br><br><br><br><br><br>
            <!-- /.col-lg-12 -->
            @yield('content')

        </div>

    </div>

    <!-- /.row -->


    <!-- Scripts -->
    <script src="{{ asset('lib/dist/adminJs.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script>
        //appearance of scroll in the table
    $(function() {
        $('#dataTable').DataTable({
            "sScrollY":"250px",
            "bScrollCollapse":true,
        });
        $('#productTable').DataTable({
            "sScrollY":"250px",
            "bScrollCollapse":true,
        });
    });
    </script>

    @yield('scripts')
</body>
<script>
    //fade time out to remove/hide the alert
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function() {
    $(this).remove();
    });
    }, 4000);
</script>

</html>
