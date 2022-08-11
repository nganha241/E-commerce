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
                        <p class="card-category">Categories</p>
                        <h3 class="card-title">
                            {{$category}}
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{route('categories.index')}}">View...</a>
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
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div
                        class="card-header card-header-warning"
                    >
                        <h4 class="card-title">
                            Employees Stats
                        </h4>
                        <p class="card-category">
                            New employees on 15th September,
                            2016
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div
                        class="card-header card-header-warning"
                    >
                        <h4 class="card-title">
                            Orders Stats
                        </h4>
                        <p class="card-category">
                            New employees on {{$date->format('')}}
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
