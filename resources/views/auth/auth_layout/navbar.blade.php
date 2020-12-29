<header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <!-- <p class="text-white p-0 m-0">Sale By  Anything On </p> -->
        <h1 class="text-light p-0 m-0"><a href="index.html"><span style="font-family: 'boxicons';">resale99.com</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image
         logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block" style="top: 20px;
    position: absolute;
    right: 30px;">
        <ul>
          <li>
            <form class="example1" action="">
              <input type="text" placeholder="Search Location" name="search">
            </form>
          </li>
          <li>
            <form class="example" action="">
              <input type="text" placeholder="Search Product" name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </li>
          <!-- <li><button type="button" class="btn btn-warning ml-3">Post Free Add</button></li> -->
          @guest
            @if (Route::has('login'))
              <li><a href="{{ url('/login') }}" class="m-0 p-0"><button type="button" class="btn btn-danger ml-3">Login</button></a>
              </li>
            @endif
          @else 
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-circle-o" style="font-size:22px;">&nbsp;</i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-dark">{{ Auth::user()->name }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-dark" href="{{ route('post-ad') }}" >
                {{ __('Post an Ad') }}
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
      </nav><!-- .nav-menu -->
      <div class="clearfix"></div>
    </div>
  </header>