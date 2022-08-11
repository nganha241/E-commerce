@extends('admin.layouts.index')

@section('title', 'Users')

@section('search')
<form class="navbar-form">
    <div class="input-group no-border">
      <input type="search" name="search" class="form-control" placeholder="Search...">
      <button type="submit" class="btn btn-white btn-round btn-just-icon">
        <i class="material-icons">search</i>
        <div class="ripple-container"></div>
      </button>
    </div>
  </form>
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Users List</h1>

    <div class="ml-auto mr-3">
        <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>
    </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th></th>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img src="{{$user->images ? asset('/upload/users/' . $user->images->url) : '/upload/users/default.jpg'}}" alt="" style="width: 200px; height: 200px; border-radius:50%;"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>
                <div class="row">
                    <a href="{{route('users.edit', $user->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                        <i class="material-icons" >edit</i >
                    </a>
                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" >
                            <i class="material-icons" >close</i >
                        </button>
                    </form>
                </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{$users->links('pagination::bootstrap-4')}}
  </div>
@endsection
