@extends('admin.layouts.index')

@section('title', 'Products')

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
        <h1>Products List</h1>

    <div class="ml-auto mr-3">
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
    </div>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Sale</th>
          <th></th>
        </thead>
        <tbody>{{$products}}
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><img src="{{$product->images->count() > 0 ?
                        asset('/upload/imgs/' . $product->images->first()->url) : '/upload/users/default.jpg'}}" alt=""
                        style="width: 50px; height:50px; border-radius:50%;"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->sale}}</td>
            <td>
                <div class="row">
                    <a href="{{route('categories.edit', $product->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                        <i class="material-icons" >edit</i >
                    </a>
                    <form action="{{route('categories.destroy', $product->id)}}" method="post">
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
    {{$products->links('pagination::bootstrap-4')}}
  </div>
@endsection
