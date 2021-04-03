@extends('admin.adminWelcome')
@section('page-header')
<div class="col-md-5">
    <div class="row col-md-12">
        <div class="col-md-6">
            <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
            <h1 class="page-header">Dashboard</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb" style="width: 240px; margin-top: -60px; margin-left: 900px;">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Overview</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<style>
    #box1 {
        width: 1050px;
        height: 500px;
        padding: 20px;
        /* border: 2px solid black; */
        margin-left: -350px;
        background-color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4">
            <div id="box1">
                @if ($errors)
                @foreach($errors->all() as $error)
                <span style="color:red">
                    {{ $error }}
                </span>
                @endforeach
                @endif
                <div class="row col-md-12">
                    <div class="col-md-3">
                        <div class="panel" style="background-color: #d89995">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="icon-comments icon-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="views">
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel" style="background-color: #99d8be">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="icon-tasks icon-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="views">
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel" style="background-color: #d8d397">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="icon-shopping-cart icon-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ $orderCount }}</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="views">
                                <a href="{{ route('admin-order-list') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="icon-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection