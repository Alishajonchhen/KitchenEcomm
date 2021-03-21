@extends('admin.adminWelcome')
@section('body')
    <style>
        #box1{
            width: 1050px;
            height: 500px;
            padding: 20px;
            border: 2px solid black;
            margin-left: -210px;
            margin-top: -630px;
            background-color: white;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-offset-4" >
                <div id="box1">
                    <h1>Edit Data</h1>
                    <hr>
                    <form style="width: 570px;height: 170px;padding: 35px;" action="{{route('editAction')}}" method="POST">
                        @csrf
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="product_id" class="col-md-10 col-form-label text-md-right">Product ID</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_id" type="text" class="form-control" placeholder="Product ID" required style="height: 25px;" value="{{$editData->id}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_name" class="col-md-10 col-form-label text-md-right">Product Name</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_name" type="text" class="form-control" placeholder="Product Name" required style="height: 25px;" value="{{$editData->product_name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_price" class="col-md-10 col-form-label text-md-right">Product Price</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_price" type="text" class="form-control" placeholder="Product Price" required style="height: 25px;" value="{{$editData->product_price}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_discount" class="col-md-10 col-form-label text-md-right">Product Discount</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_discount" type="text" class="form-control" placeholder="Product Discount" required style="height: 25px;" value="{{$editData->product_discount}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_description" class="col-md-10 col-form-label text-md-right">Product Description</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_description" type="text" class="form-control" placeholder="Product Description" required style="height: 25px;" value="{{$editData->product_description}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" style="margin-left: 500px; margin-top: -258px;">
                            <div class="form-group row">
                                <label for="product_voltage" class="col-md-10 col-form-label text-md-right">Product Voltage</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_voltage" type="text" class="form-control" placeholder="Product Voltage" required style="height: 25px;" value="{{$editData->product_voltage}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_color" class="col-md-10 col-form-label text-md-right">Product Color</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_color" type="text" class="form-control" placeholder="Product Color" required style="height: 25px;" value="{{$editData->product_color}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_image" class="col-md-10 col-form-label text-md-right">Product Image</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="product_image" type="file" class="btn btn-primary" placeholder="Product Image" required style="margin-left: 300px; height: 30px; width: 220px;" value="{{$editData->product_image}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-10 col-form-label text-md-right">Category ID</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="category_id" type="text" class="form-control" placeholder="Category ID" required style="height: 25px;" value="{{$editData->category_id}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-10 col-form-label text-md-right">Status</label>

                                <div class="col-md-12" style="margin-left: -300px;">
                                    <input name="status" type="text" class="form-control" placeholder="Status" required style="height: 25px;" value="{{$editData->status}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success" style=" margin-left: 100px; width: 190px;">
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
