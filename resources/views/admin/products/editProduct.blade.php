@extends('admin.adminWelcome')
@section('page-header')
    <div class="col-md-5">
        <div class="row col-md-12">
            <div class="col-md-6">
                <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
                <h1 class="page-header">Edit Product</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
<style>
    #box1 {
        width: 1050px;
        height: 500px;
        padding: 20px;
        border: 2px solid black;
        margin-left: -350px;
        background-color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4">
            <div id="box1">
                @if ($errors)
                @foreach($errors->all() as $error)
                <span style="color:red">
                    {{ $error }}
                </span>
                @endforeach
                @endif
                <form style="width: 570px;height: 170px;padding: 35px;"
                    action="{{route('update-product', $editData->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="product_id" class="col-md-10 col-form-label text-md-right">Product Code</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_code" type="text" class="form-control" placeholder="Product Code"
                                    style="height: 25px;" value="{{$editData->product_code}}">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-10 col-form-label text-md-right">Product
                                Name *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_name" type="text" class="form-control" placeholder="Product Name"
                                    required style="height: 25px;" value="{{$editData->product_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-10 col-form-label text-md-right">Product
                                Price *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_price" type="text" class="form-control" placeholder="Product Price"
                                    required style="height: 25px;" value="{{$editData->product_price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-10 col-form-label text-md-right">Product
                                Quantity *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="quantity" type="number" class="form-control" min="1" required
                                    style="height: 25px;" value="{{$editData->quantity}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_discount" class="col-md-10 col-form-label text-md-right">Product
                                Discount (%)</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_discount" type="text" class="form-control"
                                    placeholder="Product Discount" style="height: 25px;"
                                    value="{{$editData->product_discount}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_description" class="col-md-10 col-form-label text-md-right">Product
                                Description *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <textarea name="product_description" type="text" class="form-control"
                                    placeholder="Product Description" required style="height: 100px; resize: none;">
                                    {{$editData->product_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6" style="margin-left: 500px; margin-top: -365px;">
                        <div class="form-group row">
                            <label for="product_voltage" class="col-md-10 col-form-label text-md-right">Product
                                Voltage (W)</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_voltage" type="text" class="form-control"
                                    placeholder="Product Voltage" style="height: 25px;"
                                    value="{{$editData->product_voltage}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_color" class="col-md-10 col-form-label text-md-right">Product
                                Color *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_color" type="text" class="form-control" placeholder="Product Color"
                                    required style="height: 25px;" value="{{$editData->product_color}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-10 col-form-label text-md-right">Product
                                Image *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <input name="product_image" type="file" class="btn btn-primary"
                                    placeholder="Product Image" style="margin-left: 300px; height: 30px; width: 220px;">
                            </div>


                        </div>
                        <div class="form-group row" style="text-align: center">
                            <img src="{{ asset($editData->image_path.$editData->product_image) }}" alt="product_image"
                                style="height: 50px; width:50px;">
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-md-10 col-form-label text-md-right">Category *</label>

                            <div class="col-md-12" style="margin-left: -300px;">

                                <select name="category_id" id="category" class="form-control" required>
                                    @foreach ($categories as $category)
                                    <option @if ($category->id == $editData->category_id)
                                        selected
                                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-10 col-form-label text-md-right">Status *</label>

                            <div class="col-md-12" style="margin-left: -300px;">
                                <select name="status" id="status" class="form-control" required>

                                    <option value="1" @if ($editData->status == 1)
                                        selected
                                        @endif>Active</option>
                                    <option value="0" @if ($editData->status == 0)
                                        selected
                                        @endif>Inactive</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success"
                                    style=" margin-left: 750px; width: 190px;">
                                Update Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
