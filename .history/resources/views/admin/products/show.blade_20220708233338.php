@extends('admin.layouts.index')

@section('title')
    Product Create
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Products ID: {{$product->id}}</h1>


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
            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-description">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
          </div>
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

        <tr>
            <td>{{$product->id}}</td>
            <td><img src="{{$product->images->count() > 0 ?
                        asset('/upload/imgs/' . $product->images->first()->url) : '/upload/imgs/default.jpg'}}" alt=""
                        style="width: 50px; height:50px; border-radius:50%;"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->sale}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->description}}</td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>
@endsection
