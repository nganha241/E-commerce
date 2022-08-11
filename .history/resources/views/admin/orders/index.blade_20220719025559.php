@extends('admin.layouts.index')

@section('title', 'Orders')

@section('search')
<form class="navbar-form">
    <div class="input-group no-border">
      <input type="search" name="search" class="form-control" placeholder="Search...">
      <button type="submit" class="btn btn-white btn-round btn-just-icon">
        <i class="material-icons">search</i>
        <div class="ripple-container"></div>
      </button>
    </div>
  </form>
@endsection

@section('content')
<div class="card">
    <div class="row ml-1">
        <h1>Orders List</h1>


    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Customer Name</th>
          <th>Total</th>
          <th>Status</th>
        </thead>
        <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td><a href="{{route('orders.show', $order->id)}}">{{$order->customer_name}}</a></td>
            <td>{{$order->total}}</td>
            <td>{{$order->status}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{$orders->links('pagination::bootstrap-4')}}
  </div>
@endsection
