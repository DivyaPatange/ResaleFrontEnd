<section class="section-footer">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-sm-12 col-md-3">
        <div class="widget-a">
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">Popular Searches</h4>
          </div>
          <?php 
            $categories = DB::table('categories')->where('status', 1)->orderBy('id', 'ASC')->get();
          ?>
          <div class="w-body-a">
            <p class="w-text-a color-text-a">
              <ul class="list-unstyled">
                @foreach($categories as $cat)
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">{{ $cat->category_name }}</a>
                </li>
                @endforeach
              </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">Top Trending City</h4>
          </div>
          <div class="w-body-a">
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Nagpur</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Kolkata</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Delhi</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Mumbai</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Pune</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Banglore</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Pondecherry</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Hyderabad</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">About Us</h4>
          </div>
          <div class="w-body-a">
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">About Us</li>
                <li class="color-a">Contact Us</li>
                <li class="color-a">Careers</li>
                <li class="color-a">Resale99 Videos</li>
                <li class="color-a">Advertise with us</li>
                <li class="color-a">Blog</li>
                <li class="color-a">Help</li>
                <li class="color-a">Featured Ads</li>
                <li class="color-a">Sitemap</li>
                <li class="color-a">Posting Policy</li>
                <li class="color-a">Terms of Use</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">follow us </h4>
          </div>
          <div class="w-body-a">
            <div class="w-footer-a">
              <ul class="list-unstyled d-inline-flex">
                <li class="color-a"><img src="{{ asset('assets/img/logo/twitter.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/facebook.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/google-plus.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/youtube.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/instagram.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/pinterest.png') }}" alt="" style="width:30px"></li>
              </ul>
            </div>
          </div>
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">Download our apps</h4>
          </div>
          <div class="w-body-a">
            <div class="w-footer-a">
            <ul class="list-unstyled d-inline-flex">
                <li class="color-a"><img src="{{ asset('assets/img/logo/play-store.png') }}" alt="" style="margin-right:10px; width:30px"></li>
                <li class="color-a"><img src="{{ asset('assets/img/logo/apple.png') }}" alt="" style="margin-right:10px; width:30px"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section style="background-color:#dddddd;padding:20px 0px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h5 class="text-dark"><b>&copy; {{ date("Y") }} resale99.com</b></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-sm p-0">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#1976f2">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#1976f2">Media Center</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#1976f2">Careers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#1976f2">Privacy Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#1976f2">Terms & Conditions</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>