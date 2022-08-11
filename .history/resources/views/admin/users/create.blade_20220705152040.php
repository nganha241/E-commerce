@extends('admin.layouts.index')

@section('title')
    user Create
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('users.store')}}" method="post" >
                @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" value="{{old('email')}}" class="form-control" name="email">

                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="address" value="{{old('address')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" value="{{old('phone')}}" class="form-control" name="phone">

                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Default radio
                        </label>
                      </div>
                      <div class="form-group">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Default checked radio
                        </label>
                      </div>
                </div>
              </div>
            <div class="form-group">
                    <label for="">Permission</label>
                    <div class="row">
                        @foreach ($roles as $groupName => $role)
                            <div class="col-6">
                                <h4>{{ $groupName }}</h4>
                                <div>
                                    @foreach ($role as $item)
                                        <div class="form-check">
                                            <input class="check-input" type="checkbox" name="role_ids[]" value="{{ $item->id }}">
                                            <label class="form-check-label"  for="customCheck">
                                                {{ $item->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
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
