@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Subcategory List</div>
        <div class="card-body">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-6">
                    <div class="card bg-light">
                        <div class="card-header"><h4>{{ $category->category_name }}</h4></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Subcategory</th>
                                    <th>Action</th>
                                </tr>
                                @foreach (App\Models\Subcategory::where('category_id',$category->id)->get() as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('sub.remove',$subcategory->id) }}"><i class="fa fa-trash btn-xs btn  shadow sharp  btn-danger"></i></a>
                                             <a href="{{ route('sub.edit',$subcategory->id) }}"><i class="fa fa-pencil shadow btn-xs  btn sharp btn-info "></i></a
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
            <form action="{{ route('subcategory.store') }}" method="post" >
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
