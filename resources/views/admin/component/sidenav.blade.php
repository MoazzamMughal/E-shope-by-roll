 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo "  href="{{route('home')}}"><img style="height: 25vh" src={{asset('assets/images/logo.png')}} alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{route('home')}}"><img src={{asset('assets/images/logo-mini.svg')}} alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face15.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name}}</h5>
              <span>
                @if(Auth::user()->role==2)
                SuperAdmin
                @elseif(Auth::user()->role==1)
                Vander
                @else
                User
                @endif
                 
              </span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('home')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('oder.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title" >Oder Details</span>
        </a>
      </li>
      
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Product Details</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">Show Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('add.product') }}">Create Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('categories.index')}}">Show Catagories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('add.category')}}">Add Catagories</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Oders</a></li>
          </ul>
        </div>
      </li>
      
      
    </ul>
  </nav>