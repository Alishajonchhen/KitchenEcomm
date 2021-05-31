@extends('layouts.welcome')
@section('body')
    <style>
        @media only screen and (max-width:990px){
            .product-list {margin-bottom:30px
            }
        }
    </style>
<div class="container product-list">
    <h4 style="font-family: Baskerville Old Face; font-size: 26px;">
        {{ $product->category->name }} >> {{ strtoupper($product->product_name) }}</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="img-zoom-container">
                <img id="myimage" class="pic-1" src="{{ $product->image_path.$product->product_image }}"
                     style="height: 500px; width: 450px;">
                <div id="myresult" class="img-zoom-result"></div>
            </div>
        </div>

        <div class="col-md-6" id="boxes">
            <h4 style="font-family: Baskerville Old Face; font-size: 25px; margin-left: 10px;">
                {{ strtoupper($product->product_name) }}</h4>
            <div class="price">₹{{ $product->product_price }}
                @if ($product->product_discount)

                <span style="font-size: 20px;">₹{{ ($product->product_discount/100)*$product->product_price + $product->product_price  }}</span>
                @endif
            </div>
            <div class="row">
                <label for="qty" style="font-size: 20px;">Quantity :</label>
                <input type="number" value="1" min="1" name="quantity" id="quantity" style="font-size: 20px; margin-left: 28px; line-height: 50px;">
            </div>
            <div class="row">
                <label for="color" style="font-size: 20px;">Color :</label>
                <span style="font-size: 20px; margin-left: 56px; line-height: 50px">{{ $product->product_color }}</span>
            </div>
            @if ($product->product_voltage)
            <div class="row">
                <label for="voltage" style="font-size: 20px;">Voltage :</label>
                <span style="font-size: 20px; margin-left: 35px; line-height: 65px;">{{ $product->product_voltage }}</span>
            </div>
            @endif

            <div class="row">
                <label for="desc" style="font-size: 20px;">Description:</label>
                <p style="font-size: 20px; line-height: 50px;">
                    {{ $product->product_description }}
                </p>
            </div>
            <div class="row">
                {{-- <button type="button" class="btn btn-primary">Buy Now</button> --}}
                <button type="button" class="btn btn-success add-to-cart"
                    data-href="{{ route('add-to-cart', $product->id) }}" style="background-color: black">Add to
                    Cart</button>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    #boxes{
        background-color: rgba(247,236,252,0.78);
        padding-left: 50px;
        margin-left: 540px;
        margin-top: -670px;
        height: 550px;
    }

    .product-list {
        margin-top: 60px;
    }

    .price {
        color: #333;
        font-family: Montserrat, sans-serif;
        font-weight: 700;
        letter-spacing: .6px;
        margin-bottom: 8px;
        transition: all .3s;
        font-size: xxx-large;
    }

    .price span {
        color: #999;
        font-size: 13px;
        font-weight: 400;
        text-decoration: line-through;
        margin-left: 3px;
        display: inline-block
    }

    .img-zoom-container {
        position: relative;
    }

    .img-zoom-lens {
        position: absolute;
        border: 1px solid #d4d4d4;
        /*set the size of the lens:*/
        width: 40px;
        height: 40px;
    }

    .img-zoom-result {
        border: 1px solid #d4d4d4;
        /*set the size of the result div:*/
        width: 300px;
        height: 300px;
    }
</style>
@section('scripts')
<script>
    $(document).ready(function(){
        $(".add-to-cart").on('click', function(e){
            e.preventDefault();
            let url = $(this).attr('data-href');
            let qty = $("#quantity").val();
            //Making an ajax request to add item to cart :)
            $.get(url,{'qty': qty,'singlePage': true},function(data,status){
                console.log(data);
            }).done(function(data){
             $("#cart-item-count").html(parseInt(data.data));
                alert('Product added to cart successfully.');
                //updatin the cart count;
            }).fail(function(){
                alert('Error occurred duing adding item to cart.');
            })
        });
    })

    // Initiate zoom effect:
    imageZoom("myimage", "myresult");

    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
</script>
@endsection
