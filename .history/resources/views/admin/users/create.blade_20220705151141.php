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
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Display name</label>
                    <input type="text" value="{{old('display_name')}}" class="form-control" name="display_name">

                    @error('display_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="input-group input-group-static mb-4">
                <label name="group" class="bmd-label-floating">Group</label>
                    <select name="group" class="form-control col-md-4">
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>

                    @error('group')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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
                                            <input class="check-input" type="checkbox" name="permission_ids[]" value="{{ $item->id }}">
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
