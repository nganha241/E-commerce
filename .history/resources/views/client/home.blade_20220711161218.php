@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/bootstrap4/bootstrap.min.css')}}" />
    <link href="{{asset('client/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/plugins/OwlCarousel2-2.2.1/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/responsive.css')}}" />
@endsection

@section('content')
    <!-- Slider -->

    <div class="main_slider" style="background-image: url(images/slider_1.jpg)" >
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>Spring / Summer Collection 2017</h6>
                    <h1>Get up to 30% Off New Arrivals</h1>
                    <div class="red_button shop_now_button">
                        <a href="#">shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div
                    class="banner_item align-items-center"
                    style="
                        background-image: url(images/banner_1.jpg);
                    "
                >
                    <div class="banner_category">
                        <a href="categories.html">women's</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="banner_item align-items-center"
                    style="
                        background-image: url(images/banner_2.jpg);
                    "
                >
                    <div class="banner_category">
                        <a href="categories.html">accessories's</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="banner_item align-items-center"
                    style="
                        background-image: url(images/banner_3.jpg);
                    "
                >
                    <div class="banner_category">
                        <a href="categories.html">men's</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                            data-filter="*" >
                            all
                        </li>
                        @foreach ($categories as $category)
                            <?php $i=0 ?>
                            <li
                                class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                data-filter=".{{Str::slug($product->categories[$i++]->name)}}">
                                {{-- {{$product->categories[$i++]->name}} --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid"  data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    @foreach ($products as $product)
                    <?php $i=0 ?>
                        <div class="product-item {{Str::slug($product->categories[$i++]->name)}}">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="{{$product->images->count() > 0 ?
                                            asset('/upload/imgs/' . $product->images->first()->url) : '/upload/imgs/default.jpg'}}" alt=""/>
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                        @if ($product->sale!==0)
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                <span>-{{$product->sale}}%</span>
                                            </div>
                                        @endif

                                    <div class="product_info">
                                        <h6 class="product_name">
                                            <a href="{{route('single', $product->id)}}">{{$product->name()}}...</a>
                                        </h6>
                                        <div class="product_price">
                                            @if ($product->sale!==0)
                                                {{$product->sale()}}<span>{{$product->price()}}</span>
                                            @else
                                                {{$product->price()}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button">
                                    <a href="#">add to cart</a>
                                </div>
                        </div>
                    @endforeach

                    {{-- @endforeach --}}


                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deal of the week -->

<div class="deal_ofthe_week">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="deal_ofthe_week_img">
                    <img src="images/deal_ofthe_week.png" alt="" />
                </div>
            </div>
            <div class="col-lg-6 text-right deal_ofthe_week_col">
                <div
                    class="deal_ofthe_week_content d-flex flex-column align-items-center float-right"
                >
                    <div class="section_title">
                        <h2>Deal Of The Week</h2>
                    </div>
                    <ul class="timer">
                        <li
                            class="d-inline-flex flex-column justify-content-center align-items-center"
                        >
                            <div id="day" class="timer_num">03</div>
                            <div class="timer_unit">Day</div>
                        </li>
                        <li
                            class="d-inline-flex flex-column justify-content-center align-items-center"
                        >
                            <div id="hour" class="timer_num">
                                15
                            </div>
                            <div class="timer_unit">Hours</div>
                        </li>
                        <li
                            class="d-inline-flex flex-column justify-content-center align-items-center"
                        >
                            <div id="minute" class="timer_num">
                                45
                            </div>
                            <div class="timer_unit">Mins</div>
                        </li>
                        <li
                            class="d-inline-flex flex-column justify-content-center align-items-center"
                        >
                            <div id="second" class="timer_num">
                                23
                            </div>
                            <div class="timer_unit">Sec</div>
                        </li>
                    </ul>
                    <div class="red_button deal_ofthe_week_button">
                        <a href="#">shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Sale</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider" >
                    @foreach ($sale as $item)
                    <div class="owl-item product_slider_item">
                        <div class="product-item">
                            <div class="product discount">
                                <div class="product_image">
                                    <img src="{{$item->images->count() > 0 ?
                                        asset('/upload/imgs/' . $item->images->first()->url) : '/upload/imgs/default.jpg'}}" alt=""/>
                                </div>
                                <div class="favorite favorite_left" ></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                    <span>-{{$item->sale}}%</span>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_name">
                                        <a href="{{route('single', $product->id)}}">{{$item->name()}}...</a>
                                    </h6>
                                    <div class="product_price">
                                        {{$item->sale()}}<span>{{$item->price()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Slider Navigation -->

                    <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i  class="fa fa-chevron-left" aria-hidden="true" ></i>
                    </div>
                    <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true" ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Benefit -->

<div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div
                    class="benefit_item d-flex flex-row align-items-center"
                >
                    <div class="benefit_icon">
                        <i
                            class="fa fa-truck"
                            aria-hidden="true"
                        ></i>
                    </div>
                    <div class="benefit_content">
                        <h6>free shipping</h6>
                        <p>Suffered Alteration in Some Form</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div
                    class="benefit_item d-flex flex-row align-items-center"
                >
                    <div class="benefit_icon">
                        <i
                            class="fa fa-money"
                            aria-hidden="true"
                        ></i>
                    </div>
                    <div class="benefit_content">
                        <h6>cach on delivery</h6>
                        <p>The Internet Tend To Repeat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div
                    class="benefit_item d-flex flex-row align-items-center"
                >
                    <div class="benefit_icon">
                        <i
                            class="fa fa-undo"
                            aria-hidden="true"
                        ></i>
                    </div>
                    <div class="benefit_content">
                        <h6>45 days return</h6>
                        <p>Making it Look Like Readable</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div
                    class="benefit_item d-flex flex-row align-items-center"
                >
                    <div class="benefit_icon">
                        <i
                            class="fa fa-clock-o"
                            aria-hidden="true"
                        ></i>
                    </div>
                    <div class="benefit_content">
                        <h6>opening all week</h6>
                        <p>8AM - 09PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
