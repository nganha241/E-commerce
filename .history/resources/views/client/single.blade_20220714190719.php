@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('client/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/single_responsive.css')}}">
@endsection

@section('content')
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <form class="single_product_pics" action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="{{$product->id}}">
                <div class="row">
                    <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                        <div class="single_product_thumbnails">
                            <ul>
                                <li><img src="{{$product->images->count() > 0 ?
                                    asset('/upload/imgs/' . $product->images->first()->url) : '/upload/imgs/default.jpg'}}" alt=""/></li>
                                <li class="active"><img src="images/single_2_thumb.jpg" alt="" data-image="images/single_2.jpg"></li>
                                <li><img src="images/single_3_thumb.jpg" alt="" data-image="images/single_3.jpg"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url(images/single_2.jpg)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">
                    <div class="product_details_title">
                        <h2>{{$product->name}}</h2>
                    </div>
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span>free delivery</span>
                    </div>
                    @if ($product->sale!==0)
                        <div class="original_price">{{$product->price()}}</div>
                        <div class="product_price">{{$product->sale()}}</div>
                    @else
                        <div class="product_price">{{$product->price()}}</div>
                    @endif
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        <span>Quantity:</span>
                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                        <button type="submit" class="red_button add_to_cart_button">add to cart</button>
                        <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                    </div>

                </div>

            </div>
            </form>


    </div>
    <div class="product_details_title" >
        <h6 style="color: #e54e5d">Description:</h6>
        <p>{!!$product->description!!}</p>
    </div>
</div>


@endsection
