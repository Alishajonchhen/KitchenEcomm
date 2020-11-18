@extends('layout.welcome')
@section('body')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="Title">
                    <h1 class="banner">Kitchen and Appliances</h1>
                    <p id="subtitle">Lower Prices and Best Products </p>
                    <a class="btn btn-lg" href="#" role="button">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div id="banner1">
        <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/sale1.png')}}" alt="Banner">
    </div>
    <h2 style="text-align: center;font-size: 45px; padding: 30px; background-color: #c0ffc3; height: 115px;">Deal of the Day!!!</h2>
    <div id="banner2">
        <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/sale2.png')}}" alt="Banner">
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-4 col-md-offset-1">
            <div class="thumbnail" style="margin-left: 100px;">
                <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/B_Oven.jpg')}}" alt="Oven">
                <div class="caption">
                    <h3> Baltra Foster OTG Oven </h3>
                    <p id="price">Rs.6000</p>
                    <del>Rs.6800</del>
                    <div class="clear-fix">
                        <a href="#" class="btn pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-md-offset-1">
            <div class="thumbnail" style="margin-left: 100px;">
                <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/B_kettle.jpg')}}" alt="Kettle" style="height: 230px;">
                <div class="caption">
                    <h3> Baltra Cordless Kettle </h3>
                    <p id="price">Rs.1300</p>
                    <del>Rs.1800</del>
                    <div class="clear-fix">
                        <a href="#" class="btn pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-md-offset-1">
            <div class="thumbnail" style="margin-left: 100px;">
                <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/B_fan.jpg')}}" alt="Fan">
                <div class="caption">
                    <h3> Baltra Electric Fan </h3>
                    <p id="price">Rs.1900</p>
                    <del>Rs.2500</del>
                    <div class="clear-fix">
                        <a href="#" class="btn pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-md-offset-1">
            <div class="thumbnail" style="margin-left: 100px;">
                <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/B_SliceToaster.jpg')}}" alt="ToasterS">
                <div class="caption">
                    <h3> Baltra Foster OTG Toaster </h3>
                    <p id="price">Rs.4200</p>
                    <del>Rs.4800</del>
                    <div class="clear-fix">
                        <a href="#" class="btn pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
