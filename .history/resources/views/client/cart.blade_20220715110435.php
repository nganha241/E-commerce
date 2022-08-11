@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
@endsection

@section('content')

<div class="card-body table-responsive">
    <table class="table table-hover">
      <thead class="text-warning">
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Value</th>
        <th>Expiry date</th>
        <th></th>
      </thead>
      <tbody>
      @foreach ($coupons as $coupon)
      <tr>
          <td>{{$coupon->id}}</td>
          <td>{{$coupon->name}}</td>
          <td>{{$coupon->type}}</td>
          <td>{{$coupon->value}}</td>
          <td>{{$coupon->expiry_date}}</td>
          <td>
              <div class="row">
                  <a href="{{route('coupons.edit', $coupon->id)}}" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm" >
                      <i class="material-icons" >edit</i >
                  </a>
                  <form action="{{route('coupons.destroy', $coupon->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm" >
                          <i class="material-icons" >close</i >
                      </button>
                  </form>
              </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection


