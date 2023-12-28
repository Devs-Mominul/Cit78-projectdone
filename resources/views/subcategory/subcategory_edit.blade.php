@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
            <form action="{{ route('subcategory_edit.store') }}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="category_name">Category Name:</label>

                   <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                    @endforeach
                   </select>
                </div>
                <div class="mb-3">
                    <label for="subcategory_img">Subategory Name:</label>
               
                    <input type="text" name="subcategory_name" id="category_name" class="form-control" placeholder="Subcategory">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
