@extends('admin.layouts.index')

@section('title', 'Roles')



@section('content')
<div class="card">
    <h1>Role List</h1>

    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Name</th>
          <th>Display Name</th>
        </thead>
        <tbody>
        @foreach ($roles as $role)

        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
