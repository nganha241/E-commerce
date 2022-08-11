@extends('admin.layouts.index')

@section('title', 'Roles')



@section('content')
<div class="card">
    <div class="row">
        <h1 class="col-6">Role List</h1>
    <div>
        <a href="{{route('roles.create')}}" class="btn btn-primary col-6">Create</a>
    </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Name</th>
          <th>Display Name</th>
        </thead>
        <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->display_name}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{$roles->links('pagination::bootstrap-4')}}
  </div>
@endsection
