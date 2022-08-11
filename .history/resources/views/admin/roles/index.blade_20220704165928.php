@extends('admin.layouts.index')

@section('title', 'Roles')



@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Role List</h1>
    <div class="col-4 float-end">
        <a href="{{route('roles.create')}}" class="btn btn-primary">Create</a>
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
