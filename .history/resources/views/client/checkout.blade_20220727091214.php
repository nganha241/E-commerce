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
            <form class="checkout-form" action="{{route('carts.process-checkout')}}" method="POST">
                @csrf
                   <div class="block billing-details col-md-8">
                      <h4 class="widget-title">Billing Details</h4>
                         <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="customer_name" value="{{old('customer_name') ?? $user->name}}">
                         </div>
                         <div class="form-group">
                            <label for="full_name">Email</label>
                            <input type="text" class="form-control" name="customer_email" value="{{old('customer_email') ?? $user->email}}">
                         </div>
                         <div class="form-group">
                            <label for="user_address">Address</label>
                            <input type="text" class="form-control" name="customer_address" value="{{old('customer_address') ?? $user->address}}">
                         </div>
                            <div class="form-group">
                               <label for="user_post_code">Phone</label>
                               <input type="text" class="form-control" name="customer_phone" value="{{old('customer_phone') ?? $user->phone}}">
                            </div>
                         <div class="form-group">
                            <label for="user_country">Note</label>
                            <input type="text" class="form-control" name="note" value="{{old('note')}}">
                         </div>
                         <button class="red_button btn-main pull-right border-0">Order</button>
                   </div>



                    <div class="product-checkout-details col-md-4">
                        <div class="block">
                            <h4 class="widget-title">Order Summary</h4>
                            @foreach ($carts->products as $cart)

                            <input type="text" name="product" value="{{$cart->product_id}}" hidden>
                                <div class="media product-card">
                                    <a class="pull-left" href="{{route('single', $cart->product_id)}}">
                                    <img class="media-object" src="{{$cart->product->image()}}" alt="Image" />
                                    </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{route('single', $cart->product_id)}}">{{$cart->product->name}}
                                            </a></h4>
                                            <p class="price">{{$cart->product_quantity}} x {{$cart->product->sale()}}</p>
                                            <input type="text" name="product_quantity" value="{{$cart->product_quantity}}" hidden>
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
                               <span class="price">{{
                                    number_format(round($sum, 3), 0, ',',',')
                                }}</span>
                            </li>
                            <li>
                               <span>Shipping:</span>
                               @if ($sum > 300000)
                                    <span>Free</span>
                               @else
                                    <span>30,000</span>
                               @endif
                            </li>
                            @if (session('discount_amount_price'))
                            <li>
                                <span>Coupon:</span>
                                <span style="color: red">-{{number_format(round($sum - ($sum - (session('discount_amount_price') * $sum)/100), 3), 0, ',', ',')}}</span>
                                <span style="border: 1px solid">{{session('coupon_code')}} </span>
                            </li>
                            @endif
                         </ul>
                         <div class="summary-total">
                            <span>Total</span>
                            @if ($sum > 300000)
                                    <input name="total" value="{{number_format(round($sum - (session('discount_amount_price') * $sum)/100, 3), 0, ',',',')}}" class="float-lg-right text-right border-0 h5" readonly/>
                               @else
                                    <input name="total" value="{{number_format(round(($sum - (session('discount_amount_price') * $sum)/100) + 30000), 0, ',',',')}}" class="float-lg-right text-right border-0 h5"  readonly/>
                               @endif
                         </div>
                      </div>
                   </div>
                </form>
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
               <form action="{{route('carts.applyCoupon')}}" method="POST">
                @csrf
                  <div class="form-group">
                     <input class="form-control" type="text" name="coupon_code" value="{{Session::get('coupon_code')}}" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main">Apply Coupon</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
