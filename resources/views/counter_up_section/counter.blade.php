@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><h3>Hero Section Details</h3></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Counter Head</th>
                    <th>Counter Number</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($counter_details as $details)
                <td>{{ $details->id }}</td>
                <td>{{ $details->counter_head }}</td>
                <td>{{ $details->counter_number }}</td>
                <td><img width='40px'  src="{{ asset('counterUp/image/') }}/{{ $details->counter_image }}" alt=""></td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('counter.edit',$details->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('counter.remove',$details->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>

                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Counter Up Section</div>
        <div class="card-body">
            <form action="{{ route('counterup.store') }}" method="post" enctype="multipart/form-data">
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
