@extends('admin.adminWelcome')
@section('page-header')
<div class="col-md-5">
    <div class="row col-md-12">
        <div class="col-md-6">
            <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
            <h1 class="page-header">Products</h1>
        </div>
    </div>
</div>
@endsection
@section('content')
<style>
    #box {
        width: 1170px;
        height: 550px;
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
@if ($errors)
@foreach($errors->all() as $error)
<li style="list-style-type:none; color:red;"> {{ $error }}</li>
@endforeach
@endif
<!-- DataTales -->
<div id="box">
    <h2>Product List</h2>
    <hr>
    <div class="card-body">
        <div class="table-responsive" style="margin-left: 5px;">
            <table class="table table-bordered table-striped" id="productTable" style="width:900px; margin-left: 0;">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Product code</th>
                        <th>Product Name</th>
                        <th>Available</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                        <th>Status</th>
                        <th>Product Color</th>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>Product Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->available}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>
                            @if($product->status==1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>{{$product->product_color}}</td>
                        <td>
                            <img src="{{ asset($product->image_path.$product->product_image) }}" height="130" width="130"
                                alt="Product Image">
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>{{ substr($product->product_description,0,100)}}</td>
                        <td>
                            <a href="{{route('edit-product',$product->id )}}" class="btn btn-primary btn-xm" style="font-size: 14px;color: black">Edit</a>


                            <form action="{{ route('delete-product', $product->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-xm" type="submit"
                                    onclick="return confirm('Are you Sure?')" style="font-size: 14px;color: black">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-block btn-success" data-toggle="modal" data-target="#productModal"
            style="cursor: pointer; margin-left: 956px; width: 200px;">Add Product</a>
    </div>
</div>
@include('admin.products.addProducts')
@endsection
