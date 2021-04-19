@extends('layouts.welcome')
@section('body')
<div class="container product-list">
    <h4 style="font-family: Baskerville Old Face; font-size: 26px;">
        {{ strtoupper($category->slug)." >> PRODUCTS" }}
    <br>
        <br>
    </h4>
    <div class="row">
        @forelse ($products as $product)
        <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{ $product->image_path.$product->product_image }}">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="icon-search"></i></a></li>
                        <li><a href="{{ route('add-to-cart', $product) }}" data-tip="Add to Cart"><i
                                    class="icon-shopping-cart"></i></a></li>
                    </ul>
                    {{-- <span class="product-new-label">Sale</span> --}}
                    @if ($product->product_discount)
                    <span class="product-discount-label">{{ $product->product_discount }}%</span>
                    @endif
                </div>

                <div class="product-content">
                    <h3 class="title"><a
                            href="{{ route('frontend-product-detail', $product->id) }}" style="font-family: Baskerville Old Face; font-size: 27px;">
                            {{ $product->product_name }}</a>
                    </h3>
                    {{-- <div class="price">$16.00
                        <span>$20.00</span>
                    </div> --}}
                    <div class="price" style="font-size: 21px;">₹{{ $product->product_price }}
                        @if ($product->product_discount)

                        <span>₹{{ ($product->product_discount/100)*$product->product_price + $product->product_price  }}</span>
                        @endif
                    </div>
                    <a class="add-to-cart" href="#" data-href="{{ route('add-to-cart', $product) }}"
                        id="product{{ $product->id }}" data-id="{{ $product->id }}"
                       style="font-family: Baskerville Old Face; font-size: 14px; ">+
                        Add To
                        Cart</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3 col-sm-6" style="margin-bottom: 10px; font-size: 20px;">
            <p>No Products</p>
        </div>
        @endforelse

    </div>
</div>
@endsection
<style>
    .product-list {
        margin-top: 60px;
    }

    .product-grid {
        text-align: center;
        padding: 0 0 72px;
        border: 1px solid rgba(0, 0, 0, .1);
        overflow: hidden;
        position: relative;
        z-index: 1
    }

    .product-grid .product-image {
        position: relative;
        transition: all .3s ease 0s
    }

    .product-grid .product-image a {
        display: block
    }

    .product-grid .product-image img {
        width: 100%;
        height: auto
    }

    .product-grid .pic-1 {
        opacity: 1;
        transition: all .3s ease-out 0s
    }

    /* .product-grid:hover .pic-1 {
        opacity: 1
    } */

    .product-grid .pic-2 {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        transition: all .3s ease-out 0s
    }

    .product-grid:hover .pic-2 {
        opacity: 1
    }

    .product-grid .social {
        width: 150px;
        padding: 0;
        margin: 0;
        list-style: none;
        opacity: 0;
        transform: translateY(-50%) translateX(-50%);
        position: absolute;
        top: 60%;
        left: 50%;
        z-index: 1;
        transition: all .3s ease 0s
    }

    .product-grid:hover .social {
        opacity: 1;
        top: 50%
    }

    .product-grid .social li {
        display: inline-block
    }

    .product-grid .social li a {
        color: #fff;
        background-color: #333;
        font-size: 19px;
        line-height: 40px;
        text-align: center;
        height: 40px;
        width: 40px;
        margin: 0 2px;
        display: block;
        position: relative;
        transition: all .3s ease-in-out
    }

    .product-grid .social li a:hover {
        color: #fff;
        background-color: rgba(191,177,96,0.78);
    }

    .product-grid .social li a:after,
    .product-grid .social li a:before {
        content: attr(data-tip);
        color: #fff;
        background-color: #000;
        font-size: 16px;
        letter-spacing: 1px;
        line-height: 20px;
        padding: 1px 5px;
        white-space: nowrap;
        opacity: 0;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
        top: -30px
    }

    .product-grid .social li a:after {
        content: '';
        height: 15px;
        width: 15px;
        border-radius: 0;
        transform: translateX(-50%) rotate(45deg);
        top: -20px;
        z-index: -1
    }

    .product-grid .social li a:hover:after,
    .product-grid .social li a:hover:before {
        opacity: 1
    }

    .product-grid .product-discount-label,
    .product-grid .product-new-label {
        color: #fff;
        background-color: black;
        font-size: 12px;
        text-transform: uppercase;
        padding: 2px 7px;
        display: block;
        position: absolute;
        top: 10px;
        left: 0
    }

    .product-grid .product-discount-label {
        background-color: #333;
        left: auto;
        right: 0
    }

    .product-grid .rating {
        color: black;
        font-size: 12px;
        padding: 12px 0 0;
        margin: 0;
        list-style: none;
        position: relative;
        z-index: -1
    }

    .product-grid .rating li.disable {
        color: rgba(0, 0, 0, .2)
    }

    .product-grid .product-content {
        background-color: #fff;
        text-align: center;
        padding: 12px 0;
        margin: 0 auto;
        position: absolute;
        left: 0;
        right: 0;
        bottom: -27px;
        z-index: 1;
        transition: all .3s
    }

    .product-grid:hover .product-content {
        bottom: 0
    }

    .product-grid .title {
        font-size: 13px;
        font-weight: 400;
        letter-spacing: .5px;
        text-transform: capitalize;
        margin: 0 0 10px;
        transition: all .3s ease 0s
    }

    .product-grid .title a {
        color: #828282
    }

    .product-grid .title a:hover,
    .product-grid:hover .title a {
        color: black;
    }

    .product-grid .price {
        color: #333;
        font-size: 17px;
        font-family: Montserrat, sans-serif;
        font-weight: 700;
        letter-spacing: .6px;
        margin-bottom: 8px;
        text-align: center;
        transition: all .3s
    }

    .product-grid .price span {
        color: #999;
        font-size: 13px;
        font-weight: 400;
        text-decoration: line-through;
        margin-left: 3px;
        display: inline-block
    }

    .product-grid .add-to-cart {
        color: #000;
        font-size: 13px;
        font-weight: 600
    }

    @media only screen and (max-width:990px) {
        .product-grid {
            margin-bottom: 30px
        }
    }
</style>
@section('scripts')
<script>
    $(document).ready(function(){
        $(".add-to-cart").on('click', function(e){
            e.preventDefault();
            let url = $(this).attr('data-href');
            console.log(url);
            //Making an ajax request to add item to cart :)
            $.get(url,function(data,status){
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
