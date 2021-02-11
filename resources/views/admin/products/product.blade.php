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

    <!-- DataTales -->
    <div id="box">
        <h2>Product List</h2>
        <hr>
        <div class="card-body">
            <div class="table-responsive" style="margin-left: 5px;">
                <table class="table table-bordered table-striped" id="dataTable" style="width:900px; margin-left: 0;">
                    <thead>
                    <tr>
                        <th> Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Discount</th>
                        <th>Product Description</th>
                        <th>Product Voltage</th>
                        <th>Product Color</th>
                        <th>Product Image</th>
                        <th>Category ID</th>
                        <th>Status</th>
                        <th>Edit Action</th>
                        <th>Delete Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_discount}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>{{$product->product_voltage}}</td>
                            <td>{{$product->product_color}}</td>
                            <td>{{$product->product_image}}</td>
                            <td>{{$product->category_id}}</td>
                            <td>
                                @if($product->status==1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-xs">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a class="btn btn-block btn-success"
               data-toggle="modal"
               data-target="#categoryModal" style="cursor: pointer; margin-left: 956px; width: 200px;">Add Product</a>
        </div>
    </div>
    @include('admin.products.addProduct');
@endsection
