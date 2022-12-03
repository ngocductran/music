@extends('layouts.admin')



@section('content')


@if(Session::has('warning'))
    <div class='alert alert-danger'>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('warning') }}
    </div>
@endif

<div class="card">
  <table class="table table-striped table-bordered table-hover">
      <thead class="thead-dark">
          <tr>
              <th>ID</th>
              <th width="30%">Tên</th>
              <th>Email</th>
              <th width="15%">Tạo Lúc</th>
              <th>Hành Động</th>
          </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        @if ($user->id == \Auth::user()->id)
            @break
        @endif           
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td class="text-center"><a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-danger btn-sm">Xóa</a></td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>


<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modaltitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <input type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                    <input type="text" id="email" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

@push('script')
<script>
function edituser(user){
    $('#modaltitle').text("Edit " +user.name)
    $('#name').val(user.name)
    $('#email').val(user.email)
    $('#editmodal').modal('show')

}

</script>


@endpush

@endsection
