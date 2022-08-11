@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/item/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<section class="" style="background-color: #eee;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 100px">
        <div class="col-lg-8 col-xl-6">
          <div class="card border-top border-bottom border-3 mt-50" style="border-color: #fe4c50 !important;">
            <div class="card-body p-5">

              <div class="row">
                <p class="lead fw-bold mb-5" style="color: #fe4c50;">Purchase Reciept</p>
                @if ($order->status == 'Pending')
                <form action="{{route('cancel', $order->id)}}" method="post" class=" pull-right">
                    @csrf
                    @method('put')
                    <input type="text" name="status" value="Cancelled" hidden>
                    <button class="btn btn-danger">Cancel</button>
                </form>
          @endif
              </div>
              <div class="row">
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Date</p>
                  <p>{{$order->created_at->format('d-m-Y H:m:i')}}</p>
                </div>
                <div class="col mb-3">
                  <p class="small text-muted mb-1">Order No.</p>
                  <p>{{$order->id}}</p>
                </div>
              </div>

              <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                    @foreach ($proOrder as $item)
                    <div class="row">
                        <div class="col-md-3">
                            <img class="media-object" src="{{$item->products->image()}}" alt="Image" style="width: 50px"/>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0"><a href="{{route('single', $item->products->id)}}">{{$item->products->name}}</a></p>
                        </div>
                        <div class="col-md-3">
                          <p class="mb-0">{{$item->products->sale()}}</p>
                        </div>
                      </div>
                    @endforeach

              <div class="row my-4">
                <div class="col-md-4 offset-md-8 offset-lg-9">
                  <p class="mb-0" style="color: #fe4c50;">Ship: <span>{{$order->ship}}</span></p>
                  @if ($order->discount!=0)
                  <p class="mb-0" style="color: #fe4c50;">Coupon: <span>{{$order->discount}}</span></p>
                  @endif

                </div>
              </div>

              <p class="lead fw-bold mb-4 pb-2" style="color: #fe4c50;">Tracking Order</p>

              <div class="row">
                <div class="col-lg-12">

                  <div class="horizontal-timeline">

                    <ul class="list-inline items d-flex justify-content-between">
                      <li class="list-inline-item items-list">
                        <p class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">{{$order->status}}</p
                          class="py-1 px-2 rounded text-white" style="background-color: #fe4c50;">
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
