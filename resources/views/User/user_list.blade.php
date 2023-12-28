@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">User List</div>
        <div class="carb-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                       @if($user->photo!=null)
                       <img width="40px" height="40px" style="border-radius: 50%;" src="{{ asset('image_profile') }}/{{ $user->photo }}" alt="">


                       @else
                       <img width="40" src="{{Avatar::create($user->name)->toBase64() }}" alt="img">

                       @endif
                    </td>
                    <td>
                      <a href="{{ route('user.remove',$user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>

                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
{{--  @push('backend_sript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.del-btn').click(function(){
        link=$(this).attr('data-link')
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
             window.location.href=link
            }
          });
    })
</script>

    @if('delete')
    <script>
        Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
    </script>
    @endif



@endpush  --}}
