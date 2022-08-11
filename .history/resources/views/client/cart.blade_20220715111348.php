@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
@endsection

@section('content')

<div class="container" style="margin-top: 200px">
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
          @foreach ($carts->products as $cart)
          <tr>
              <td>{{$cart->name}}</td>

              <td>
                  <div class="row">

                      <form action="{{route('carts.destroy', $cart->id)}}" method="post">
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
</div>

@endsection


