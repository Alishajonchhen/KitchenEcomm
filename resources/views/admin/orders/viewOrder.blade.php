@extends('admin.adminWelcome')
@section('page-header')
    <div class="col-md-5">
        <div class="row col-md-12">
            <div class="col-md-6">
                <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
                <h1 class="page-header">View Order</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
<style>
    #box {
        width: 1170px;
        height: 500px;
        padding: 5px;
        border: 2px solid black;
        margin-left: 330px;
        box-sizing: border-box;
        background-color: white;
    }
</style>

<div class="card-body" style="width: 900px; margin-left:500px; ">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        <p>{{session('success')}}</p>
    </div>
    @endif
</div>

<!-- DataTales -->
<div id="box">
    <div class="card-body">
        <span>Order No. = {{ $order->order_no }}</span>
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Remarks</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $key=> $item)

                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->product->product_code }}</td>
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
                    <td>
                        @if ($item->remarks)
                        {{ $item->remarks }}
                        @else
                        -
                        @endif

                    </td>
                    <td>

                        {{ $item->total }}
                    </td>
                    <td>
                        @if ($item->status == 0)
                        {{-- <a data-toggle="modal" data-target="#orderItemStatusModal{{ $key }}"> --}}
                        <span class="label label-warning">Running </span>
                        {{-- </a> --}}


                        @elseif($item->status == 1)
                        <span class="label label-success">Completed</span>
                        @else
                        <span class="label label-important">Canceled</span>
                        @endif
                    </td>

                </tr>
                 @include('admin.orders.orderItemStatusModal')
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endsection
