@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<section class="" style="background-color: #eee;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 20px">
        <div class="col-lg-8 col-xl-6">
          <div class="card border-top border-bottom border-3 mt-50" style="border-color: #fe4c50 !important;">
            <div class="card-body p-5">

              <p class="lead fw-bold mb-5" style="color: #fe4c50;">Purchase Reciept</p>

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
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                      <p class="mb-0">Shipping</p>
                    </div>
                    <div class="col-md-4 col-lg-3">
                      <p class="mb-0">£33.00</p>
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
                  <p class="lead fw-bold mb-0" style="color: #fe4c50;">£262.99</p>
                </div>
              </div>

              <p class="lead fw-bold mb-4 pb-2" style="color: #fe4c50;">Tracking Order</p>

              <div class="row">
                <div class="col-lg-12">

                  <div class="horizontal-timeline">

                    <ul class="list-inline items d-flex justify-content-between">
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">Ordered</p
                          class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">
                      </li>
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">Shipped</p
                          class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">
                      </li>
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">On the way
                        </p>
                      </li>
                      <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                        <p style="margin-right: -8px;">Delivered</p>
                      </li>
                    </ul>

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
