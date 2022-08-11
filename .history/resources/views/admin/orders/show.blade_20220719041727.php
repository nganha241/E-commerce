@extends('admin.layouts.index')

@section('title')
    order show
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Orders ID: {{$order->id}}</h1>
    </div>

    <div class="col-md-12">

          <div class="">
            <p >Customer name: <span class="text-info">{{$order->customer_name}}</span></p>
            <p >Customer phone: <span class="text-info">{{$order->customer_phone}}</span></p>
            <p >Customer address: <span class="text-info">{{$order->customer_address}}</span></p>
            <p>Product name: <span class="text-info">{{$order->product_name}}</span></p>
            <p>Product quantity: <span class="text-info">{{$order->product_quantity}}</span></p>
            <p>Total: <span class="text-info">{{$order->total}}</span></p>
            <p>Time: <span class="text-info">{{$order->created_at}}</span></p>
            <p>Status: <span class="text-info">
                <form action="{{route('orders.update', $order->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="col-3 text-center">
                        <select name="status" class="form-control h-100">
                            <option value="pending" {{$order->status == "pending" ? 'selected' : ''}}>Pending</option>
                            <option value="Processing" {{$order->status == "processing" ? 'selected' : ''}}>Confirm</option>
                            <option value="On Hold" {{$order->status == "On Hold" ? 'selected' : ''}}>Delivery</option>
                            <option value="Completed" {{$order->status == "Completed" ? 'selected' : ''}}>Success</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </span></p>

        </div>
      </div>
  </div>
@endsection
