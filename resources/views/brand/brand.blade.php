@extends('layouts.admin')
@section('content')
<div class="col-lg-8"></div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
            <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_name">Category Name:</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="brand name">
                </div>
                <div class="mb-3">
                    <label for="category_img">Brand Image:</label>
                    <input type="file" name="brand_img" id="brand_img" class="form-control" placeholder="category  img">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
