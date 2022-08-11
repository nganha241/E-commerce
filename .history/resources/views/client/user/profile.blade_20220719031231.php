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
				<ul class="list-inline dashboard-menu text-center">
					<li><a href="dashboard.html">Dashboard</a></li>
					<li><a class="active" href="order.html">Orders</a></li>
					<li><a href="profile-details.html">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                      <div class="pull-left text-center" href="#!">
                        <img class="media-object user-img" src="images/avater.jpg" alt="Image">
                        <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
                      </div>
                      <div class="media-body">
                        <ul class="user-profile-list">
                          <li><span>Full Name:</span>Johanna Doe</li>
                          <li><span>Country:</span>USA</li>
                          <li><span>Email:</span>mail@gmail.com</li>
                          <li><span>Phone:</span>+880123123</li>
                          <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                        </ul>
                      </div>
                    </div>
                  </div>
			</div>
		</div>
	</div>
</section>
@endsection
