@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            <form action="{{ route('category_update.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_name">Category Name:</label>
                    <input type="hidden" name="category_id" value="{{ $categories->id }}">
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
