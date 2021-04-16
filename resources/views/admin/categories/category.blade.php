@extends('admin.adminWelcome')
@section('page-header')
<div class="col-md-5">
    <h1 class="page-header">Category</h1>
    <div class="row">
        <div class="col-sm-6">
            <ol class="breadcrumb" style="width: 240px; margin-top: -60px; margin-left: 900px;">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Overview</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<style>
    #box {
        width: 900px;
        height: 550px;
        padding: 30px;
        border: 2px solid black;
        margin-left: 500px;
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
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        <p>{{session('error')}}</p>
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
                        <th>S.N.</th>
                        <th>Category Code</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit Action</th>
                        <th>Delete Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            @if ($category->category_code)

                            {{$category->category_code}}
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->category_image)

                            <img src="{{ $category->image_path.$category->category_image }}"
                                alt="{{ $category->slug }}" height="40" width="40">
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($category->status==1)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{route('edit-category',$category->id)}}" class="btn btn-info btn-sm">Edit </a>
                        </td>
                        <td>
                            <form action="{{ route('delete-category', $category->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Are you Sure?')">Delete</button>
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a class="btn btn-block btn-success" data-target="#categoryModal" data-toggle="modal"
        style="cursor: pointer; margin-left: 640px; width: 200px;">Add Category
    </a>
</div>
@include('admin.categories.addCategory');
@endsection
