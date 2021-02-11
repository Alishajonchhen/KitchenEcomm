@extends('admin.adminWelcome')
@section('content')
    <style>
        #box{
            width: 900px;
            height: 550px;
            padding: 30px;
            border: 2px solid black;
            margin-left: 500px;
            box-sizing: border-box;
            background-color:white;
        }

    </style>
    <div class="card-body" style="width: 600px; margin-left:500px; ">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <p>{{session('success')}}</p>
            </div>
        @endif
    </div>

        <!-- DataTales -->
        <div id="box">
            <h2>Category List</h2>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" style="overflow-x: hidden">
                        <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Edit Action</th>
                            <th>Delete Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    @if($category->status==1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm">Edit </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <a class="btn btn-block btn-success" data-target="#categoryModal"
               data-toggle="modal" style="cursor: pointer; margin-left: 640px; width: 200px;">Add Category
            </a>
        </div>
    @include('admin.categories.addCategory');
@endsection
