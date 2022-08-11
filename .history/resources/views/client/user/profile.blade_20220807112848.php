@extends('client.layouts.index')

@section('head')
    <link rel="stylesheet" href="{{asset('client/assets/cart/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/assets/styles/main_styles.css')}}" />
    <script src="https://kit.fontawesome.com/ae971d7ee0.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-50">
                <div class="col-sm-2">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item bg-light"><a class="active"  href="{{route('my-orders.index')}}">Orders</a></li>
                        <li class="list-group-item bg-light"><a href="{{route('profile')}}">Profile Details</a></li>
                    </ul>
                </div>

				<div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="pull-left text-center" href="#!">
                            <img class="media-object user-img" src="{{$user->imageShow()}}" alt="Image">
                            <form action="{{route('updateProfile', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <label for="upload-photo" class="btn btn-transparent mt-20 ">Choose Image</label>
                                <input type="file"  name="image" accept="image/*" id="upload-photo"/>
                                <button class="btn btn-danger">Change</button>
                            </form>
                        </div>
                      <form action="{{route('changePassword', $user->id)}}" method="POST" style="margin: 0 auto;  min-width: 500px">
                        @method('put')
                        @csrf
                        <div class="media-body" >
                            <ul class="user-profile-list" >
                              <li><span>Full Name:</span><input type="text" name="name" value="{{$user->name}}"></li>
                              <li><span>Address:</span><input type="text" name="address" value="{{$user->address}}"></li>
                              <li><span>Email:</span><input type="text" name="name" value="{{$user->email}}" disabled></li>
                              <li><span>Phone:</span><input type="text" name="phone" value="{{$user->phone}}"></li>
                              <li class="change">Đổi mật khẩu</li>
                              <div class="password" style="display: none">
                                <li><span>New Password:</span><input type="password" name="password"></span></li>
                                <li><span>Old Password:</span><input type="password" name="old-password"></span></li>
                              </div>
                              <button class="btn btn-danger">Change</button>
                            </ul>
                          </div>
                      </form>
                    </div>
                  </div>
			</div>
		</div>
	</div>
    <style>
       .media-body input {
            padding: 5px 10px;
            height: 30px;
            width: 70%;
            border:1px solid;
        }
        .change {
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 20px 0px;
            cursor: pointer;
        }
    </style>

    <script>
        const $change = document.querySelector('.change');
        const $pass = document.querySelector('.password');
        
        $change.addEventListener('click', ()=>{
            $pass.style.display = 'block';
        })

    </script>
</section>
@endsection
