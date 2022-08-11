@extends('admin.layouts.index')

@section('title', 'categories')

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
        <h1>categories List</h1>

    <div class="ml-auto mr-3">
        <a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
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
          <th>Address</th>
          <th></th>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td><img src="{{$category->images->count()>0 ? asset('/upload/categories/' . $category->images->first()->url) : '/upload/categories/default.jpg'}}" alt="" style="width: 50px; height:50px; border-radius:50%;"></td>
            <td>{{$category->name}}</td>
            <td>{{$category->email}}</td>
            <td>{{$category->phone}}</td>
            <td>{{$categorie->address}}</td>
            <td>
                <div class="row">
                    <a href="{{route('categories.edit', $categorie->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                        <i class="material-icons" >edit</i >
                    </a>
                    <form action="{{route('categories.destroy', $categorie->id)}}" method="post">
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
    {{$categories->links('pagination::bootstrap-4')}}
  </div>
@endsection
