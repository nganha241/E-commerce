@extends('admin.layouts.index')

@section('title')
    Coupon Edit
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('coupons.update', $coupon->id)}}" method="post" >
                @csrf
                @method('put')

                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control text-uppercase" name="name" value="{{old('name') ?? $coupon->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>


              <div class="form-group">
                <label class="bmd-label-floating">Value</label>
                <input type="number" class="form-control" name="value" value="{{old('value') ?? $coupon->value}}">
                @error('value')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label name="group" class="bmd-label-floating">Type</label>
                    <select name="type" class="form-control h-100">
                        <option>Select Type</option>
                       <option value="money" {{(old('type') ?? $coupon->type) == 'money' ? 'selected' : ''}}>Money</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="">Expiry date</label>
                <input type="date" class="form-control" name="expiry_date" value="{{old('expiry_date')  ?? $coupon->getExpriryDateAttribute()}}">
                @error('value')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary pull-right">Update Coupon</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
