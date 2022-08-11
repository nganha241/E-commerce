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
			<div class="col-md-12">
				<div class="row align-items-center">
                    <div class="col text-center">
                        <div class="new_arrivals_sorting">
                            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"><a class="active" href="{{route('my_dashboard')}}">Dashboard</a></li>
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"><a  href="{{route('my_orders')}}">Orders</a></li>
                                    <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"><a href="profile-details.html">Profile Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

				<div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                      <div class="pull-left text-center" href="#!">
                        <img class="media-object user-img" src="{{$user->image()}}" alt="Image">
                        <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
                      </div>
                      <div class="media-body">
                        <ul class="user-profile-list">
                          <li><span>Full Name:</span>{{$user->name}}</li>
                          <li><span>Address:</span>{{$user->address}}</li>
                          <li><span>Email:</span>{{$user->email}}</li>
                          <li><span>Phone:</span>{{$user->phone}}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
			</div>
		</div>
	</div>
</section>
@endsection
