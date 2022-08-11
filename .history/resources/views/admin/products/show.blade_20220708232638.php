@extends('admin.layouts.index')

@section('title')
    Product Create
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
          <th>Size</th>
          <th>Description</th>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><img src="{{$product->images->count() > 0 ?
                        asset('/upload/imgs/' . $product->images->first()->url) : '/upload/users/default.jpg'}}" alt=""
                        style="width: 50px; height:50px; border-radius:50%;"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->sale}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->description}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{$products->links('pagination::bootstrap-4')}}
  </div>
@endsection
