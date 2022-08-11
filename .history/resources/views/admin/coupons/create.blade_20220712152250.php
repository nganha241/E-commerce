@extends('admin.layouts.index')

@section('title')
    Coupon Create
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('coupons.store')}}" method="post" >
                @csrf
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

              </div>
              <div class="form-group col-md-8">
                <label name="group" class="bmd-label-floating">Value</label>
                    <select name="parent_id" class="form-control h-100">
                        <option value="">Select Parent Category</option>
                        @foreach ($parentCategories as $item)
                            <option value="{{$item->id}}" {{old('parent_id') == $item->id ? 'selected' : ''}}>{{$item->id}}--{{$item->name}}</option>
                        @endforeach
                    </select>


            </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
