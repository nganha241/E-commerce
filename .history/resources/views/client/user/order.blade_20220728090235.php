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
			<div class="col-md-12 mt-50">
                <div class="col-sm-2">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bg-light"><a class="active"  href="{{route('my-orders.index')}}">Orders</a></li>
                        <li class="list-group-item bg-light"><a href="{{route('profile')}}">Profile Details</a></li>
                    </ul>
                </div>
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Total Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $item)
                                <tr>
									<td>{{$item->id}}</td>
									<td>{{$item->created_at}}</td>
                                    {{-- <td>{{$item->product->name}}</td> --}}
									{{-- <td>{{$item->product_quantity}}</td> --}}
                                    <td>{{$item->total()}}</td>
                                    <td><span class="label label-primary">Processing</span></td>
									<td><a href="{{route('my-orders.show', $item->id)}}" class="btn btn-primary">View</a></td>

									<td>
                                        <span class="label label-primary">
                                            @if ($item->status == 'Cancel')
                                                {{$item-->status}} ( {{$order->updated_at}} )
                                            @else
                                            {{$item->status}}
                                            @endif
                                        </span>
                                        @if ($item->status == 'Pending')
                                        <form action="{{route('my-orders.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="text" name="status" value="Cancel" hidden>
                                            <button class="btn btn-danger">Cancel</button>
                                        </form>
                                        @endif
                                    </td>
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
