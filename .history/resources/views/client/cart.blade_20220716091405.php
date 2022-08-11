@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="container" style="margin-top: 200px">
    <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
          </thead>
          <tbody>
          @foreach ($carts->products as $cart)
          <tr>
            <td><img src="{{$cart->product->image()}}" alt="" style="width: 100px"/></td>
            <td style="width: 400px"><a href="{{route('single', $cart->product_id)}}">{{$cart->product->name}}</a></td>
            <td>{{$cart->product->price()}}</td>
            <td>
                    @if ($cart->product->sale != 0)
                        <span style="font-size: 10px">-{{$cart->product->sale}}%</span>
                        <p style="color: red">{{$cart->product->sale()}}</p>
                    @else
                        {{0}}
                    @endif
            </td>
            <td>x {{$cart->product_quantity}}</td>
            <td>{{$cart->total()}}</td>
              <td>
                  <div class="row">

                      <form action="{{route('carts.destroy', $cart->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" >
                            <i class="fas fa-times"></i>
                          </button>
                          <a href="checkout.html" class="btn btn-main pull-right">Checkout</a>
                      </form>
                  </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
</div>

@endsection


