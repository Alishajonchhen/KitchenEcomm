@extends('layout.welcome')
@section('content')
    <div class="container">
        <img class="img-responsive" src="{{asset('http://localhost/KitchenWeb/public/lib/Images/aboutimg.jpg')}}" alt="Banner">
    </div>
<br>
    <div class="box">
        <h1 class="background"><b>Our Background</b></h1>
        <p class="para">
            <span style="font-size: 40px;color: #ff834e">Welcome!</span> to Purna Trading, your number one source for all things required in kitchen.
            We're dedicated to giving you the very best of kitchen appliances, with a focus on quality products, friendly environment and better policies.
            We have been supplying Baltra kitchen appliances for over 20 years and still continuing.
            <br>
        <p class="para">Purna Trading has always believed in delivering quality products to the customers. Till now the products has been selling out from the store itself
            but as people are more interested in technologies and buying stuff online we have decided to develop an ecommerce website for our customers so that
            they can buy and view products staying at their place. The company was established on 1999 A.D. The store is located at Jawalakhel, Lalitpur.
            Better Buy is a family business was thinking of selling the kitchen products online for a while now. We're thrilled that we're able to do business with
            alot of other companies from our store, now we expect the same support from our online buyers.
        </p>
    </div>

    <div class="box2">
        <h1 class="background"><b>Our Promise</b></h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/cost.png')}}" alt="efficiency" class="img-responsive">
                        <p class="text-center">Cost Efficient</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/less.png')}}" alt="electricity" class="img-responsive">
                    <p class="text-center">Consumes Less Electricity</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Quality.png')}}" alt="quality" class="img-responsive">
                    <p class="text-center">Best Quality</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/longlasting.png')}}" alt="lasting" class="img-responsive">
                    <p class="text-center">Products Lasts Long</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/secure.jpg')}}" alt="secure" class="img-responsive">
                    <p class="text-center">Secured Data</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/exchange.jpg')}}" alt="exchange" class="img-responsive">
                    <p class="text-center">Exchange Policy</p>
                </div>
            </div>
        </div>
    </div>
@endsection

