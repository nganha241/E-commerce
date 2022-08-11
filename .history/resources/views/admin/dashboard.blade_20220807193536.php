@extends('admin.layouts.index')

@section('title', 'Dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div
                        class="card-header card-header-warning card-header-icon"
                    >
                        <div class="card-icon">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <p class="card-category">Total</p>
                        <h3 class="card-title" style="font-size: 16px">
                            {{number_format($total,0,',',',')}}
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            {{-- <a href="{{route('categories.index')}}">View...</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div
                        class="card-header card-header-success card-header-icon"
                    >
                        <div class="card-icon">
                            <i class="fa-brands fa-product-hunt"></i>
                        </div>
                        <p class="card-category">Products</p>
                        <h3 class="card-title">{{$product}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{route('products.index')}}">View...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="card-category">
                            Users
                        </p>
                        <h3 class="card-title">{{$user}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{route('users.index')}}">View...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <p class="card-category">Order</p>
                        <h3 class="card-title">+{{$order}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{route('orders.index')}}">View...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
