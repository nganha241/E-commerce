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
                    <li><a href="{{route('my_dashboard')}}">Dashboard</a></li>
                    <li><a class="active"  href="{{route('my_orders')}}">Orders</a></li>
                    <li><a href="{{route('profile')}}">Profile Details</a></li>
                </ul>

				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Total Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $order)
                                <tr>
									<td>{{$order->id}}</td>
									<td>{{$order->created_at}}</td>
									<td>{{$order->product_quantity}}</td>
									<td>{{$order->total()}}</td>
									<td><span class="label label-primary">Processing</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
