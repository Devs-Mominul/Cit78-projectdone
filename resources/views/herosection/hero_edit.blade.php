@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Hero Section</div>
        <div class="card-body">
            <form action="{{ route('heroedit.edit.store',$details->id) }}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="row bg-light py-5">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="h-text">Head Text:</label>
                        <input type="hiddent" name="h_id" id="h_text" value="" class="form-control" placeholder="head text">
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
