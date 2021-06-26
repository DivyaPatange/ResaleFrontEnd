<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ url('/') }}">
          <!--<span class="color-b">Resale99.com</span>-->
          <img src="{{ asset('assets/img/logo/1.png') }}" class="" style="height: 70px;width: 170px;">
          </a>
            <!--<a href="#" data-toggle="sidebar-colapse" class="bg-dark d-flex align-items-center">-->
            <!--    <div class="d-flex  justify-content-start align-items-center">-->
            <!--        <span id="collapse-icon" class="fa fa-2x mr-3"></span>-->
            <!--        <span id="collapse-text" class="menu-collapsed">Collapse</span>-->
            <!--    </div>-->
            <!--</a>-->
          
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center mr-3" id="navbarDefault">
        <ul class="navbar-nav mt-2">
          <li class="nav-item">
            <form action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" id="location" placeholder="Locaton" style="font-size:12px">
                <!--<div class="input-group-prepend">-->
                <!--  <div class="input-group-text"><i class="fa fa-search"></i></div>-->
                <!--</div>-->
                <input type="text" class="form-control" id="product" placeholder="Product" style="padding: 0px 30px 0px 30px;font-size:12px">
                <!--<div class="input-group-prepend">-->
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-search">
                      
                  </i></div>
                </div>
              </div>
            </form>
          </li>
        </ul>
      </div>
      @guest
        @if (Route::has('login'))
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-md-block mr-5" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        Post Free Ad
        </button>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse  d-md-block mr-4" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
          login / Register
          <!-- <span class="fa fa-user" aria-hidden="true"></span> -->
        </button><a href="#"> 
            <span class="fa fa-mobile" aria-hidden="true" style="color: #114aa5;
             font-size: 40px;"></span> </a>
        @endif
        @else 
        <a href="{{ route('post-ad') }}"><button type="button" class="btn btn-b-n   d-md-block mr-2" >
           Post Free Ad
            </button></a>
        <li class="nav-item dropdown list-unstyled">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fa fa-user-circle-o" style="font-size:22px;">&nbsp;</i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-dark">{{ Auth::user()->name }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-dark" href="{{ route('post-ad') }}" >
              {{ __('Post an Ad') }}
            </a>
            <a class="dropdown-item text-dark" href="{{ route('my-ad') }}" >
              {{ __('My Ads') }}
            </a>
            <a class="dropdown-item text-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>
        @endguest
        </ul>
    </div>
  </nav>