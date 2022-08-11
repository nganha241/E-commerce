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

                            <div class="media col-md-7">
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
                                @foreach ($orders->ProductOrder as $order)
                                    <div class="media product-card">
                                        {{-- <a class="pull-left" href="{{route('single', $order->ProductOrder->product_id)}}"> --}}
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

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
            <div class="card-body p-5">

              <p class="lead fw-bold mb-5" style="color: #f37a27;">Purchase Reciept</p>

              <div class="row">
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Date</p>
                  <p>10 April 2021</p>
                </div>
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Order No.</p>
                  <p>012j1gvs356c</p>
                </div>
              </div>

              <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                <div class="row">
                  <div class="col-md-8 col-lg-9">
                    <p>BEATS Solo 3 Wireless Headphones</p>
                  </div>
                  <div class="col-md-4 col-lg-3">
                    <p>£299.99</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 col-lg-9">
                    <p class="mb-0">Shipping</p>
                  </div>
                  <div class="col-md-4 col-lg-3">
                    <p class="mb-0">£33.00</p>
                  </div>
                </div>
              </div>

              <div class="row my-4">
                <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                  <p class="lead fw-bold mb-0" style="color: #f37a27;">£262.99</p>
                </div>
              </div>

              <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

              <div class="row">
                <div class="col-lg-12">

                  <div class="horizontal-timeline">

                    <ul class="list-inline items d-flex justify-content-between">
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                      </li>
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped</p
                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                      </li>
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">On the way
                        </p>
                      </li>
                      <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                        <p style="margin-right: -8px;">Delivered</p>
                      </li>
                    </ul>

                  </div>

                </div>
              </div>

              <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                  us</a></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
