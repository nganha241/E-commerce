@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-50">
                <div class="col-sm-2">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bg-light"><a class="active"  href="{{route('my-orders.index')}}">Orders</a></li>
                        <li class="list-group-item bg-light"><a href="{{route('profile')}}">Profile Details</a></li>
                    </ul>
                </div>
				<div class="dashboard-wrapper user-dashboard">
					<div class="row">
                        <div class="col-md-7">
                            <div class="media-body">
                                <ul class="user-profile-list">
                                  <li><span>Full Name:</span>{{$user->customer_name}}</li>
                                  <li><span>Address:</span>{{$user->customer_address}}</li>
                                  <li><span>Email:</span>{{$user->customer_email}}</li>
                                  <li><span>Phone:</span>{{$user->customer_phone}}</li>
                                </ul>
                              </div>
                        </div>
                        <div class="product-checkout-details col-md-4">
                            <div class="block">
                                <h4 class="widget-title">Order Summary</h4>
                                @foreach ($orders->ProductOrder as $cart)
                                    <div class="media product-card">
                                        <a class="pull-left" href="{{route('single', $order->ProductOrder->product_id)}}">
                                        {{-- <img class="media-object" src="{{$cart->product->image()}}" alt="Image" /> --}}
                                        </a>
                                            {{-- <div class="media-body">
                                                <h4 class="media-heading"><a href="{{route('single', $cart->product_id)}}">{{$cart->product->name}}
                                                </a></h4>
                                                <p class="price">{{$cart->product_quantity}} x {{$cart->product->sale()}}</p>
                                                <input type="text" name="product_quantity" value="{{$cart->product_quantity}}" hidden>
                                                <span class="remove" >Remove</span>
                                            </div> --}}
                                    </div>
                             @endforeach

                             <div class="summary-total">
                                <span>Total</span>

                             </div>
                          </div>
                       </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
