<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{Request::routeIs('dashboard') ? 'active' : ''}} ">
          <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::routeIs('users.*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('users.index')}}">
            <p>User Profile</p>
          </a>
        </li>
        @hasrole('super-admin')
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->routeIs('roles.*') ? 'bg-gradient-primary active' : '' }} "
                href="{{ route('roles.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Role</span>
            </a>
        </li>
    @endhasrole

            {{-- <li class="nav-item {{Request::routeIs('roles.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('roles.index')}}">
                <p>Role</p>
                </a>
            </li> --}}

          <li class="nav-item {{Request::routeIs('categories.*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('categories.index')}}">
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item {{Request::routeIs('products.*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('products.index')}}">
              <p>Product</p>
            </a>
          </li>
          @can('show-coupon')
          <li class="nav-item {{Request::routeIs('coupons.*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('coupons.index')}}">
              <p>Coupon</p>
            </a>
          </li>
          @endcan


@can('show-order')
<li class="nav-item {{Request::routeIs('orders.*') ? 'active' : ''}}">
    <a class="nav-link" href="{{route('orders.index')}}">
    <p>Order</p>
    </a>
</li>
@endcan


      </ul>
    </div>
  </div>
