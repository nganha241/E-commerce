@extends('admin.layouts.index')

@section('title')
    Product Create
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Products ID: {{$product->id}}</h1>
        <a href="{{route('products.edit', $product->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
            <i class="material-icons w-100" >edit</i >
        </a>

    </div>

    <div class="col-md-12">
        <div class="card card-profile">
          <div class="">
            <a href="javascript:;">
              <img class="img" src="{{$product->images->count() > 0 ?
                asset('/upload/imgs/' . $product->images->first()->url) : '/upload/imgs/default.jpg'}}" />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">{{$product->name}}</h4>
            <p class="card-description"><h6>Description:</h6>
                {!!$product->description!!}
            </p>
            <p>Size: <span>{{$product->size}}</span></p>
            <p>Sale: <span>{{$product->sale}}</span></p>
            <p>Price: <span>{{$product->price}}</span></p>
          </div>
        </div>
      </div>
  </div>
@endsection
