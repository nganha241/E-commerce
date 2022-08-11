@extends('admin.layouts.index')

@section('title', 'Roles')



@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Role List</h1>
    <div class="ml-auto mr-3">
        <a href="{{route('roles.create')}}" class="btn btn-primary">Create</a>
    </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Name</th>
          <th>Display Name</th>
          <th></th>
        </thead>
        <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->display_name}}</td>
            <td>
                <a href="{{route('roles.edit', $role->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                <i class="material-icons" >edit</i >
            </a>
            <form action="{{route('roles.destroy', $role->id)}}" method="post">
                @csrf
                @method('delete')
                <button rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" >
                    <i class="material-icons" >close</i >
                </button>
            </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{$roles->links('pagination::bootstrap-4')}}
  </div>
@endsection
