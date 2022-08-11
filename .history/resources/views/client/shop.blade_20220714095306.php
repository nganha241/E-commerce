@extends('client.layouts.index')

@section('head')

    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/categories_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/categories_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
@endsection

@section('content')
<div class="super_container">
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{route('home')}}"><< Home</a></li>
                    </ul>
                </div>

                <!-- Sidebar -->

                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">
                            <li class="grid_sorting_button button d-flex flex-column active is-checked"
                            data-filter="*" >
                            <a href="javascript:void(0)">All</a>
                        </li>
                            @foreach ($categories as $category)
                            <li  class="grid_sorting_button button d-flex flex-column "
                                data-filter=".{{Str::slug($category->name)}}">
                                <a href="javascript:void(0)">{{$category->name}}</a>
                            </li>
                        @endforeach


                    </div>

                    <!-- Price Range Filtering -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Filter by Price</h5>
                        </div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>
                        <div class="filter_button"><span>filter</span></div>
                    </div>

                    <!-- Sizes -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Sizes</h5>
                        </div>
                        <ul class="checkboxes">
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
                            <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
                        </ul>
                    </div>

                    <!-- Color -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Color</h5>
                        </div>
                        <ul class="checkboxes">
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
                            <li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
                            <li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
                        </ul>
                        <div class="show_more">
                            <span><span>+</span>Show More</span>
                        </div>
                    </div>

                </div>

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->

                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>6</span></li>
                                                <li class="num_sorting_btn"><span>12</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">
                                    @foreach ($products as $product)
                                    <?php $i=0; ?>
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
                                                <h6 class="product_name"><a href="{{route('single', $product->id)}}">{{$product->name}}</a></h6>
                                                <div class="product_price">
                                                    @if ($product->sale!==0)
                                                        {{$product->sale()}}<span>{{number_format($product->price, 0, ',', ', ')}}</span>
                                                    @else
                                                        {{number_format($product->price, 0, ',', ', ')}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                    {{$products->links('pagination::bootstrap-4')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
