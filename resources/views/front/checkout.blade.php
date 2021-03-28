@extends('layouts.welcome')
@section('body')
<div class="container product-list">
    Checkout Page
    <hr>
    <form action="{{ route('store-order') }}" method="POST">
        @csrf
        <div class="row col-md-12">
            {{-- Delivery Details --}}
            <div class="col-md-6">
                <div class="well well-large">
                    Delivery Details
                    <hr>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Full Name *</label>
                                <input type="text" class="form-control" value="{{ old('full_name',$user->name) }}"
                                    placeholder="full name" name="full_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Contact Number *</label>
                                <input type="text" class="form-control" value="{{ old('contact_number') }}"
                                    placeholder="Phone number" name="contact_number" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email *</label>
                                <input type="text" class="form-control" value="{{ old('email', $user->email) }}"
                                    placeholder="xyz@email.com" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Available Delivery Location</label>
                                <select name="delivery_location" id="">
                                    <option value="">Select Location</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address *</label>
                                <input type="text" class="form-control" value="{{ old('address') }}"
                                    placeholder="Address" name="address" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Message</label>
                                <textarea name="message" id="message" cols="80" rows="5"
                                    class="form-control">{{ old('message') }}</textarea>
                            </div>

                        </div>
                </div>
            </div>
            {{-- cart summary --}}
            <div class="col-md-6">
                <div class="well well-large">
                    Cart Summary <a href="{{ route('all-carts') }}">Edit</a>
                    <hr>
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Amount</th>
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
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    {{ $item->discount }}
                                </td>
                                <td>{{ $item->total }}</td>
                            </tr>
                            @empty

                            @endforelse
                            <tr></tr>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ $total }}</td>
                            </tr>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6">
                <div class="well well-large">
                    Payment Option
                    <hr>
                    <div class="row">
                        <div class="col-md-6">

                            <input type="radio" name="cash" id="cash" value="cash">Cash on Delivery
                        </div>
                        <div class="col-md-6">

                            {{-- <button type="submit" href="{{ route('esewa-pay') }}">Pay With Esewa</button> --}}
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <input type="submit" value="Place Order" class="btn btn-success">
    </form>
</div>
@endsection
<style>
    .product-list {
        margin-top: 60px;
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