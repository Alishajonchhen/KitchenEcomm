@extends('admin.adminWelcome')
@section('page-header')
    <div class="col-md-5">
        <div class="row col-md-12">
            <div class="col-md-6">
                <button class="btn" onclick="openNav()" style="position:absolute"> ☰ </button>
                <h1 class="page-header">Category</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
<style>
    #box {
        width: 900px;
        height: 600px;
        padding: 30px;
        margin-left: 500px;
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
                                alt="{{ $category->slug }}" height="130" width="130">
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
                            <a href="{{route('edit-category',$category->id)}}" class="btn btn-info btn-xm" style="font-size: 14px;color: black">Edit </a>
                        </td>
                        <td>
                            <form action="{{ route('delete-category', $category->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-xm" type="submit"
                                    onclick="return confirm('Are you Sure?')" style="font-size: 14px;color: black">Delete</button>
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
