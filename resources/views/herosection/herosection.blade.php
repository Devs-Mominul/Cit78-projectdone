@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><h3>Hero Section Details</h3></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Head Text</th>
                    <th>Paragraph Text</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($hero_details as $details)
                <td>{{ $details->id }}</td>
                <td>{{ $details->h_text }}</td>
                <td>{{ $details->p_text }}</td>
                <td><img width='80px' src="{{ asset('hero_image/image/') }}/{{ $details->h_image }}" alt=""></td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('heroedit.edit',$details->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('heroedit.remove',$details->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>

                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Hero Section</div>
        <div class="card-body">
            <form action="{{ route('herosection.post') }}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="row bg-light py-5">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="h-text">Head Text:</label>
                        <input type="text" name="h_text" id="h_text" class="form-control" placeholder="head text">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="hero image">Hero Image</label>
                        <input type="file" name="h_image" id="h_image" class="form-control">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="p-text">Hero Paragraph Text:</label>
                       <textarea name="p_text" id="p_text" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
               </div>




            </form>
        </div>
    </div>
</div>

@endsection
