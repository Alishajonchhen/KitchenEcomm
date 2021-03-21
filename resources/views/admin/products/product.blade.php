@extends('admin.adminWelcome')
@section('content')
    <style>

        #box{
            width: 1170px;
            height: 500px;
            padding: 5px;
            border: 2px solid black;
            margin-left: 360px;
            box-sizing: border-box;
            background-color:white;
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
        <h2>Product List</h2>
        <hr>
        <div class="card-body">
            <div class="table-responsive" style="margin-left: 5px;">
                <table class="table table-bordered table-striped" id="productTable" style="width:900px; margin-left: 0;">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Discount</th>
                        <th>Product Description</th>
                        <th>Product Voltage</th>
                        <th>Product Color</th>
                        <th>Product Image</th>
                        <th>Category ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_discount}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>{{$product->product_voltage}}</td>
                            <td>{{$product->product_color}}</td>
                            <td><img src="{{url('lib/Images/'.$product->product_image)}}" height="20" width="30" alt="Product Image"></td>
                            <td>{{$product->category_id}}</td>
                            <td>
                                @if($product->status==1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit').'/'.$product->id}}" class="btn btn-primary btn-xs">Edit</a>
                                <a onclick="alert('Are you sure you want to delete it?')" href="{{route('delete').'/'.$product->id}}" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a class="btn btn-block btn-success"
               data-toggle="modal"
               data-target="#productModal" style="cursor: pointer; margin-left: 956px; width: 200px;">Add Product</a>
        </div>
    </div>
    @include('admin.products.addProducts')
@endsection


