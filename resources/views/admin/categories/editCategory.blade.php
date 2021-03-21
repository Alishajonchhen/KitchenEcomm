@extends('admin.adminWelcome')
@section('body')
    <style>
         #box1{
             width: 500px;
             height: 360px;
             padding: 20px;
             border: 2px solid black;
             margin-left: 60px;
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
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Category ID</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input id="id" name="id" type="text" class="form-control" placeholder="Category ID" value="{{$editData->id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Category Name" value="{{$editData->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-sm-6" style="margin-left: -300px;">
                            <input id="status" name="status" type="text" class="form-control" placeholder="Status" value="{{$editData->status}}">
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
