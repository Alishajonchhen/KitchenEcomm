@extends('layouts.welcome')
@section('body')
<div class="container product-list">
    <h3 style="font-family: Baskerville Old Face; font-size: 28px;">
        My Order Logs
        <br>
        <br>
    </h3>

    <div class="well" style="background-color: rgba(241,247,175,0.78); height: 403px;">
        <table class="table" >
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Order No.</th>
                    <th>Order Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orderItems as $key=>$item)
                <tr>
                    {{-- <td>{{ ++$Key }}</td> --}}
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->order->order_no }}</td>
                    <td>{{ $item->order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        @if ($item->discount)

                        {{ $item->discount }}
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->order->payment->payment_method }}</td>
                    <td>
                        @if ($item->status == 0)
                        <span class="label label-warning">On Progress</span>
                        @elseif($item->status == 1)
                        <span class="label label-success">Success</span>
                        @else
                        <span class="label label-important">Cancelled</span>
                        @endif
                    </td>
                    <td>

                        @if ($item->status == 0)

                        <form action="{{ route('cancel-order-item', $item->id) }}" method="post">
                            @csrf
                            @method("PATCH")
                            <button class="btn btn-danger btn-xs" type="submit"
                                onclick="return confirm('Are you Sure, You want to cancel this order?')"
                                title="Cancel Order" style="background-color: black;width: 60px; height: 30px;">Cancel</button>
                        </form>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No Orders Yet. <span> <a href="{{ route('front.home') }}"> Shop Now</a></span></td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>


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
