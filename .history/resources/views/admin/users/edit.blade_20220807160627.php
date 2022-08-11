@extends('admin.layouts.index')

@section('title')
    User Edit
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="">
                    <label class="bmd-label-floating">Image</label>
                    <div>
                        <input type="file"  name="image" accept="image/*" value="{{old('image') ?? $user->image}}">
                        <img src="{{$user->images->count() >0 ? asset('/upload/imgs/' . $user->images->first()->url) : '/upload/imgs/default.jpg'}}" alt="" style="width: 100px; height: 100px; border-radius:50%;">
                    </div>
                    <div>
                        <img src="" id="showImg" alt="">
                    </div>
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" value="{{old('email') ?? $user->email}}" class="form-control" name="email">

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
                    <input type="text" class="form-control" name="address" value="{{old('address') ?? $user->address}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" value="{{old('phone') ?? $user->phone}}" class="form-control" name="phone">

                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label name="group" class="bmd-label-floating">Gender</label>
                        <select name="gender" class="form-control" value={{$user->gender}}>
                            <option value="1">Male</option>
                            <option value="0">Fe-male</option>
                        </select>

                        @error('gender')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

              </div>

            <div class="form-group">
                    <label for="">Role</label>
                    <div class="row">
                        @foreach ($roles as $groupName => $role)
                            <div class="ml-5">

                                <div>
                                    @foreach ($role as $item)
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id}}"
                                            {{$user->roles->contains('id', $item->id) ? 'checked' : ''}}
                                            name="role_ids[]">
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
                <button type="submit" class="btn btn-primary pull-right">Add</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
