@extends('admin.adminWelcome')
@section('page-header')
    <div class="col-md-5">
        <div class="row col-md-12">
            <div class="col-md-6">
                <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
                <h1 class="page-header">Orders</h1>
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
        margin-left: 330px;
        box-sizing: border-box;
        background-color: white;
    }

    .page-header{
        margin-top: 50px;
    }
</style>

<div class="card-body" style="width: 900px; margin-left:500px; ">
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

<!-- DataTales -->
<div id="box">
    <hr>
    <div class="card-body">
        <div class="table-responsive" style="margin-left: 5px;">
            <table class="table table-bordered table-striped" id="productTable" style="width:900px; margin-left: 0;">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Order No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>Payment</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key=>$order)
                    @php
                    $iTotal = 0;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $order->order_no }}</td>
                        <td>{{  $order->orderDeliveryAddress->full_name }}</td>
                        <td>{{ $order->orderDeliveryAddress->email }}</td>
                        <td>{{ $order->orderDeliveryAddress->contact_number }}</td>
                        <td>{{ $order->orderDeliveryAddress->address }}</td>
                        <td>{{ $order->payment->payment_method }}</td>
                        <td>
                            @foreach ($order->items as $it)
                            @if ($it->status != 2)
                            @php
                            $iTotal = $iTotal+$it->total
                            @endphp
                            @endif
                            @endforeach
                            {{ $iTotal }}
                        </td>
                        <td>
                            @if ($order->status == 0)
                            <a data-toggle="modal" data-target="#orderStatusModal{{ $key }}">
                                <span class="label label-warning">Running </span>
                            </a>


                            @elseif($order->status == 1)
                            <span class="label label-success">Completed</span>
                            @else
                            <span class="label label-important">Canceled</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin-order-view', $order->id) }}">View</a>
                                                    </td>
                    </tr>
                    @include('admin.orders.orderStatusModal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
