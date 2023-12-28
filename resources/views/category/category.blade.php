@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Category List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>sl</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($category as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td><img width="40px" src="{{ asset('uploads/category/') }}/{{ $category->category_img }}" alt=""></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('category.update',$category->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                @endforeach

            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_name">Category Name:</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="category name">
                </div>
                <div class="mb-3">
                    <label for="category_img">Category Name:</label>
                    <input type="file" name="category_img" id="category_img" class="form-control" placeholder="category  img">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
