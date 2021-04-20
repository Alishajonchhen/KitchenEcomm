@extends('layouts.welcome')
@section('body')
<div class="container product-list">
    <h4 style="font-family: Baskerville Old Face; font-size: 26px;">
        {{ $product->category->name }} >> {{ strtoupper($product->product_name) }}</h4>

    <div class="row">
        <div class="col-md-6">
            <a href="#">
                <img class="pic-1" src="{{ $product->image_path.$product->product_image }}"
                     style="background-color: #a3c2c2; height: 100px !important;">
            </a>
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
        margin-top: -230px;
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
</script>
@endsection
