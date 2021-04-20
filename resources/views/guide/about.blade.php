@extends('layouts.welcome')
@section('content')
    <style>
        .overlay {
            position: absolute;
            bottom: 0;
            left: 100%;
            right: 0;
            background-color: black;
            overflow: hidden;
            width: 0;
            height: 100%;
            transition: .5s ease;
        }

        .col-md-4:hover .overlay {
            width: 100%;
            left: 0;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            white-space: nowrap;
        }
    </style>

<div class="container">
    <img class="img-responsive" src="{{asset('/lib/Images/About/aboutimg.jpg')}}" alt="Banner">
</div>
<br>
<hr>

<div>
    <h1 class="background"><b>Our Background</b></h1>
    <p class="para">
        <span style="font-size: 40px;color: #ff834e">Welcome!</span> to Purna Trading, your number one source for all
        things required in kitchen.
        We're dedicated to giving you the very best of kitchen appliances, with a focus on quality products, friendly
        environment and better policies.
        We have been supplying Baltra kitchen appliances for over 20 years and still continuing.
        <br>
        <p class="para">Purna Trading has always believed in delivering quality products to the customers. Till now the
            products has been selling out from the store itself
            but as people are more interested in technologies and buying stuff online we have decided to develop an
            ecommerce website for our customers so that
            they can buy and view products staying at their place. The company was established on 1999 A.D. The store is
            located at Jawalakhel, Lalitpur.
            Better Buy is a family business was thinking of selling the kitchen products online for a while now. We're
            thrilled that we're able to do business with
            alot of other companies from our store, now we expect the same support from our online buyers.
        </p>
</div>
<br>

<hr>
<div class="box2">
    <h1 class="background"><b>Our Promise</b></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/cost.png')}}" alt="efficiency" class="img-responsive">
                <div class="overlay">
                    <div class="text">Cost Efficient</div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/less.png')}}" alt="electricity" class="img-responsive">
                <div class="overlay">
                    <div class="text">Consumes Less Electricity</div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/Quality.png')}}" alt="quality" class="img-responsive">
                <div class="overlay">
                    <div class="text">Best Quality</div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/longlasting.png')}}" alt="lasting" class="img-responsive">
                <div class="overlay">
                    <div class="text">Products Lasts Long</div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/secure.jpg')}}" alt="secure" class="img-responsive">
                <div class="overlay">
                    <div class="text">Secured Data</div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('/lib/Images/About/exchange.jpg')}}" alt="exchange" class="img-responsive">
                <div class="overlay">
                    <div class="text">Exchange Policy</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
