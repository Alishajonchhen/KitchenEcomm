@extends('layouts.welcome')
@section('body')
    <div class="card-body" style="width: 900px; margin-left:400px; margin-top: 50px; ">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <p>{{session('success')}}</p>
            </div>
        @endif
    </div>
    <div class="card-body" style="width: 900px; margin-left:500px; ">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                <p>{{session('error')}}</p>
            </div>
        @endif
    </div>

    <div class="container product-list">
        <h1 style="font-size: 35px;">Checkout</h1>

        <hr>
        <form action="{{ route('store-order') }}" method="POST">
            @csrf
            <div class="row col-md-12">
                {{-- Delivery Details --}}
                <div class="col-md-6">
                    <div class="well well-large" style="width: 550px;
                    background-color: #a3c2c2; margin-left: -35px;">
                        <h3 style=" font-family: Baskerville Old Face;margin-left: 30px;">Delivery Details</h3>
                        <hr>
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" style="font-size: 18px;">Full Name *</label>
                                    <input type="text" class="form-control" value="{{ old('full_name',$user->name) }}"
                                           placeholder="full name" name="full_name" required
                                           style="height: 40px; font-size: 18px;">
                                </div>
                                <div class="col-md-6">
                                    <label for="" style="font-size: 18px;">Contact Number *</label>
                                    <input type="text" class="form-control" value="{{ old('contact_number') }}"
                                           placeholder="Phone number" name="contact_number" required
                                           style="height: 40px; font-size: 18px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" style="font-size: 18px;">Email *</label>
                                    <input type="text" class="form-control" value="{{ old('email', $user->email) }}"
                                           placeholder="xyz@email.com" name="email" required
                                           style="height: 40px; font-size: 18px;">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: 18px;" for="">Available Delivery Location</label>
                                    <select name="delivery_location" id="" style="height: 40px; font-size: 18px; width: 235px;">
                                        <option value="">Select Location</option>
                                        <option value="Bagbazar">Bagbazar</option>
                                        <option value="Ason">Ason</option>
                                        <option value="Newroad">Newroad</option>
                                        <option value="Mangalbazar">Mangalbazar</option>
                                        <option value="Lagankhel">Lagankhel</option>
                                        <option value="Lagankhel">Baneshwor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" style="font-size: 18px;">Address *</label>
                                    <input type="text" class="form-control" value="{{ old('address') }}"
                                           placeholder="Address" name="address" required
                                           style="height: 40px; font-size: 18px;">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" style="font-size: 18px;">Message</label>
                                    <textarea name="message" id="message" cols="80" rows="5"
                                              class="form-control" style="font-size: 20px; resize: none;">{{ old('message') }}</textarea>
                                </div>

                            </div>
                    </div>
                </div>
                {{-- cart summary --}}
                <div class="col-md-6">
                    <div class="well well-large" style="font-size: 20px; background-color: #a3c2c2;
                    line-height: 30px; margin-left: 10px; width: 580px">
                        Cart Summary <a href="{{ route('all-carts') }}">Edit</a>
                        <hr>
                        <table style="width: 100%; line-height: 35px;">
                            <thead>
                            <tr>
                                <th class="data">Product</th>
                                <th class="data">Qty</th>
                                <th class="data">Discount (%)</th>
                                <th class="data">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @forelse ($carts as $item)
                                @php
                                    $total = $item->total + $total;
                                @endphp
                                <tr>
                                    <td class="output">{{ $item->product->product_name }}</td>
                                    <td class="output">{{ $item->quantity }}</td>
                                    <td class="output">
                                        {{ $item->discount }}
                                    </td>
                                    <td class="output">{{ $item->total }}</td>
                                </tr>
                            @empty

                            @endforelse
                            <tr></tr>
                            <tr>
                                <th><b style="font-size: 20px;">Total</b></th>
                                <td>{{ $total }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="well well-large" style="font-size: 20px; background-color: #bcd5d4; width: 550px;margin-left: -35px;">
                        <h3 style=" font-family: Baskerville Old Face;">Payment Option</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">

                                <input type="radio" name="cash" id="cash" value="cash">  Cash on Delivery
                            </div>
                            <div class="col-md-6">

                                {{-- <button type="submit" href="{{ route('esewa-pay') }}">Pay With Esewa</button> --}}
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <input type="submit" value="Place Order" class="btn btn-success"
                   style="background-color: rgba(65,195,152,0.8); font-size: 20px; margin-left: 85px; color: black">

            <a href="{{ route('front.home') }}" class="btn btn-success "
               style="background-color: rgba(214,99,72,0.8); font-size: 20px; margin-left: 20px; color: black">
                <i class="icon-angle-left">
                </i> Return Back
            </a>
        </form>
    </div>
@endsection
<style>
    .product-list {
        margin-top: 60px;
    }

    .data{
        font-size: 20px;
    }

    .output{
        font-size: 20px;
    }
</style>
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#esewa").on('click', function(){
                console.log('asda')
            })
        })
    </script>
@endsection
