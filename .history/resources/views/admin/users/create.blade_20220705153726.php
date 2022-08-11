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
                <div class="form-group col-md-6">
                    <label name="group" class="bmd-label-floating">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="0">Male</option>
                            <option value="1">Fe-male</option>
                        </select>

                        @error('group')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

              </div>



            <div class="form-group">
                    <label for="">Role</label>
                    <div class="row">
                        @foreach ($roles as $groupName => $role)
                            <div class="ml-6">

                                <div>
                                    @foreach ($role as $item)
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="role_ids[]" value="{{ $item->id }}">
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
