@extends('layouts.welcome')
@section('body')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="Title">
                    <h1 id="banner"><b>Kitchen and Appliances</b></h1>
                    <p id="subtitle"><b>Lower Prices and Best Products</b></p>
                    <a class="btn btn-lg" href="#" role="button">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bgimg">
        <div class="mid">
            <h1 id="soon"><b>COMING SOON</b></h1>
            <hr id="horizontal">
            <p id="demo" style="font-size:30px"></p>
        </div>
    </div>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="{{route('category.oven')}}">
                        <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Oven.jpg')}}" alt="Oven">
                    </a>
                        <br>
                </div>
                <p class="center">Oven</p>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Kettle.jpg')}}" alt="Oven">
                <br>
                </div>
                <p class="center">Kettle</p>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Vacuum.jpg')}}" alt="Oven">
                <br>
                </div>
                <p class="center">Vacuum Cleaner</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Fan.jpg')}}" alt="Oven">
                    <br>
                </div>
                <p class="center">Fan</p>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Toaster.jpg')}}" alt="Oven">
                    <br>
                </div>
                <p class="center">Toaster</p>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Utensils.jpg')}}" alt="Oven">
                    <br>
                </div>
                <p class="center">Utensils</p>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <br>
    <div class="jumbotron jumbotron2">
        <div class="container">
            <div class="row">
                <div class="about">
                    <h1 id="heading">About Us</h1>
                    <p id="heading-para"><b>Lorem ipsum, or lipsum as it is sometimes known, is dummy text
                        used in laying out print, graphic or web designs. The passage is attributed
                        to an unknown typesetter in the 15th century who is thought to have
                        scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type
                            specimen book.</b></p>
                    <a class="btn btn-lg" href="#" role="button" style="margin-left: 10px; color: white;
                    background-color: black">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
