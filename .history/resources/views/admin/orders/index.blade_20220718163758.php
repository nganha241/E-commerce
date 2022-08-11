@extends('admin.layouts.index')

@section('title', 'Orders')

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


    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Customer Name</th>
          <th></th>
          <th>Price</th>
          <th>Sale</th>
          <th></th>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><a href="{{route('products.edit', $product->id)}}"><img src="{{$product->images->count() > 0 ?
                asset('/upload/imgs/' . $product->images->first()->url) : '/upload/imgs/default.jpg'}}" alt=""
                style="width: 50px; height:50px; border-radius:50%;"></a></td>
            <td><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></td>
            <td>{{$product->price}}</td>
            <td>{{$product->sale}}</td>
            <td>
                <div class="row">
                    <a href="{{route('products.edit', $product->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                        <i class="material-icons" >edit</i >
                    </a>
                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" >
                            <i class="material-icons" >close</i>
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
