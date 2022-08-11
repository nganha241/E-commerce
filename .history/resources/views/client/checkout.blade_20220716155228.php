@extends('client.layouts.index')
@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="page-wrapper mt-50">
   <div class="shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" value="{{$user->name}}">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" value="{{$user->address}}">
                     </div>
                        <div class="form-group">
                           <label for="user_post_code">Phone</label>
                           <input type="text" class="form-control" id="user_post_code" value="{{$user->phone}}">
                        </div>
                     <div class="form-group">
                        <label for="user_country">Note</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-4">
                <div class="product-checkout-details">
                    <div class="block">
                        <h4 class="widget-title">Order Summary</h4>
                        @foreach ($carts->products as $cart)
                            <div class="media product-card">
                                <a class="pull-left" href="{{route('single', $cart->product_id)}}">
                                <img class="media-object" src="{{$cart->product->image()}}" alt="Image" />
                                </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="{{route('single', $cart->product_id)}}">{{$cart->product->name}}</a></h4>
                                        <p class="price">{{$cart->product_quantity}} x {{$cart->product->sale()}}</p>
                                        <span class="remove" >Remove</span>
                                    </div>
                            </div>
                     @endforeach
                     <div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                     </div>
                     <ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">$190</span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>$250</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
   <!-- Modal -->
   <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <form>
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main">Apply Coupon</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
