@extends('admin.layouts.index')

@section('title')
    order show
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Orders ID: {{$order->id}}</h1>
    </div>

    <div class="col-md-12">
        <div class="card card-profile">
          <div class="">
            <a href="javascript:;">
              <img class="img" src="{{$order->images->count() > 0 ?
                asset('/upload/imgs/' . $order->images->first()->url) : '/upload/imgs/default.jpg'}}" />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">{{$order->name}}</h4>
            <p class="card-description"><h6>Description:</h6>
                {!!$order->description!!}
            </p>
            <p>Size: <span>{{$order->size}}</span></p>
            <p>Sale: <span>{{$order->sale}}</span></p>
            <p>Price: <span>{{$order->price}}</span></p>
          </div>
        </div>
      </div>
  </div>
@endsection
