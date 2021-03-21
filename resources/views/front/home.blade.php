@extends('layouts.welcome')
@section('body')

    <style>
        img:hover{
            box-shadow: 0 0 2px 1px rgba(210, 136, 0, 0.5);
        }

        .glow-on-hover {
            width: 220px;
            height: 50px;
            border: none;
            outline: none;
            color: #fff;
            background: #111;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left:-2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-on-hover:active {
            color: #000
        }

        .glow-on-hover:active:after {
            background: transparent;
        }

        .glow-on-hover:hover:before {
            opacity: 1;
        }

        .glow-on-hover:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #111;
            left: 0;
            top: 0;
            border-radius: 10px;
        }

        @keyframes glowing {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }
    </style>

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="Title">
                    <h1 id="banner"><b>Kitchen and Appliances</b></h1>
                    <p id="subtitle"><b>Lower Prices and Best Products</b></p>
                    <a class="btn" href="#" role="button">Shop Now</a>
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
                        <img src="{{asset('http://localhost/KitchenWeb/public/lib/Images/Thumbnail/thumbnail_Oven.jpg')}}" alt="Oven">

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
                    <button class="glow-on-hover" type="button" style="margin-left: 10px;"><a href="{{route('guide.about')}}">Learn More -></a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
