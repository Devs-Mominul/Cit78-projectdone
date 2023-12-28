@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><h4>Edit Counter Up Section</h4></div>
        <div class="card-body">
            <form action="{{ route('counterup.edit.store',$counter_details->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row bg-light py-5">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="counter_head">Counter Head:</label>
                            <input type="text" name="counter_head" id="counter_head" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="counter_head">Counter Number:</label>
                            <input type="number" name="counter_number" id="counter_number" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="counter_head">Counter Image:</label>
                            <input type="file" name="counter_image" id="counter_image" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
