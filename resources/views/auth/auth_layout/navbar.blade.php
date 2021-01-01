<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php"><span class="color-b">Resale99.com</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <form action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" id="location" placeholder="Locaton">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <form action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" id="product" placeholder="Product">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
              </div>
            </form>
          </li>
        </ul>
      </div>
      @guest
        @if (Route::has('login'))
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block mr-2" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        post free add
        </button>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
          login
          <!-- <span class="fa fa-user" aria-hidden="true"></span> -->
        </button>
        @endif
        @else 
        <a href="{{ route('post-ad') }}"><button type="button" class="btn btn-b-n  d-none d-md-block mr-2" >
        post free add
        </button></a>
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
    </div>
  </nav>