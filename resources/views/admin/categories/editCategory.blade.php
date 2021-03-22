@extends('admin.adminWelcome')
@section('body')
<style>
    #box1 {
        width: 500px;
        height: auto;
        padding: 20px;
        border: 2px solid black;
        margin-left: 60px;
        margin-top: -630px;
        background-color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4">
            <div id="box1">
                <h1>Edit Category</h1>
                <hr>
                @if ($errors)
                @foreach($errors->all() as $error)
                <span style="color:red">
                    {{ $error }}
                </span>
                @endforeach
                @endif
                <form style="width: 570px;padding: 35px;" action="{{route('update-category', $editData->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Category Code</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input id="id" name="id" type="text" class="form-control" placeholder="Category ID"
                                value="{{$editData->category_code}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Category Name"
                                value="{{$editData->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_image" class="col-md-4 col-form-label text-md-right">Category
                            Image *</label>

                        <div class="col-md-12" style="margin-left: -300px;">
                            <input name="category_image" type="file" placeholder="Category Image"
                                style="margin-left: 300px; height: 30px; width: 220px;">
                        </div>


                    </div>
                    @if ($editData->category_image)

                    <div class="form-group row" style="text-align: center">
                        <img src="{{ asset($editData->image_path.$editData->category_image) }}" alt="category_image"
                            style="height: 50px; width:50px;">
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>


                        <div class="col-md-6" style="margin-left: -300px;">
                            <select name="status" id="status" class="form-control" required>

                                <option value="1" @if ($editData->status == 1)
                                    selected
                                    @endif>Active</option>
                                <option value="0" @if ($editData->status == 0)
                                    selected
                                    @endif>Passive</option>

                            </select>
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