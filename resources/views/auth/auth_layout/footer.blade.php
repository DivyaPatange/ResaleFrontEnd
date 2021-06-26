<section class="section-footer">
  <div class="container">
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
                <li class="color-a"><a href="{{url ('about') }} " target="_blank">About Us</a></li>
                <li class="color-a"><a href="{{url ('contact') }}" target="_blank">Contact Us</a></li>
                <li class="color-a"><a href="{{url ('career') }}" target="_blank">Careers</a></li>
                <li class="color-a"><a href="{{url ('video') }}" target="_blank">Resale99 Videos</a></li>
                <li class="color-a"><a href="{{url ('advertise') }}" target="_blank">Advertise with us</a></li>
                <li class="color-a"><a href="{{url ('blog') }}" target="_blank">Blog</a></li>
                <li class="color-a">Help</li>
                <li class="color-a"><a href="{{url ('featured') }}" target="_blank">featured</a></li>
                <li class="color-a">Sitemap</li>
                <li class="color-a">Posting Policy</li>
                <li class="color-a">Terms of Use</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 section-md-t3">
        <div class="widget-a text-center">
          <div class="w-header-a">
            <img src="{{ asset('/assets/img/logo/1.png') }}" class="" width="100%">
          </div>
          <div class="w-header-a">
            <h4 class="text-uppercase" style="font-size:18px;font-weight:500">follow us </h4>
          </div>
          <div class="w-body-a">
            <div class="w-footer-a">
              <ul class="list-unstyled d-inline-flex">
                  <li class="color-a"><a href="https://www.facebook.com/Resale99promotion" target="_blank">
                    <img src="{{ asset('assets/img/logo/facebook (2).png') }}" alt="" style="margin-left:10px;"></a></li>
                    
                   <li class="color-a"><a href="https://www.instagram.com/resale99cars/" target="_blank">
                    <img src="{{ asset('assets/img/logo/instagram (1).png') }}" alt="" style="margin-left:10px;"></a></li>
                    
                    <li class="color-a"><a href="3" target="_blank">
                    <img src="{{ asset('assets/img/logo/pinterest.png') }}" alt="" style="margin-left:10px;"></a></li>
                    
                    <li class="color-a"><a href="https://twitter.com/Resale99C" target="_blank">
                    <img src="{{ asset('assets/img/logo/twitter (1).png') }}" alt="" style="margin-left:10px;"></a></li>
                    
                    <li class="color-a"><a href="#"  target="_blank">
                    <img src="{{ asset('assets/img/logo/google.png') }}" alt="" style="margin-left:10px; "></a></li>
                    
                    <li class="color-a"><a href="#" target="_blank">
                    <img src="{{ asset('assets/img/logo/youtube (2).png') }}" alt="" style="margin-left:20px;"></a></li>
               
                
              </ul>
            </div>
          </div>
          <!--<div class="w-header-a">-->
          <!--  <h4 class="text-uppercase" style="font-size:18px;font-weight:500">Download our apps</h4>-->
          <!--</div>-->
          <!--<div class="w-body-a">-->
          <!--  <div class="w-footer-a">-->
          <!--  <ul class="list-unstyled d-inline-flex">-->
          <!--      <li class="color-a"><img src="{{ asset('assets/img/logo/play-store.png') }}" alt="" style="margin-right:10px; width:30px"></li>-->
          <!--      <li class="color-a"><img src="{{ asset('assets/img/logo/apple.png') }}" alt="" style="margin-right:10px; width:30px"></li>-->
          <!--    </ul>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
</section>
<section style="background-color:#e8e8e8;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-2">
        <p style="font-size:10px" class="m-0 p-0">Disclaimer: Resale99 / Zogila Digital Solution Pvt. Ltd is only an intermediary offering its platform to
            advertise Car, Commercial Vehicle, Properties, Bike, Mobile, Job, Fashion, Electronic Appliances,
            Furniture, Education &amp; Pets of Seller for a Customer/Buyer/User coming on its Website and is not
            and cannot be a party to or privy to or control in any manner any transactions between the Seller
            and the Customer/Buyer/User.....</p>
      </div>
    </div>
  </div>
</section>
<section style="background-color:#dddddd;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h6 class="text-center m-0" style="font-size:13px">
            {{ date("Y") }}&copy; All rights reserved Zogila Digital Solution Pvt. Ltd. A <img src="{{ asset('/assets/img/logo/logo_without_tagline-resale99-removebg-preview (1).png') }}" class="mt-1 p-0" style="width:115px;margin-top:12px">group venture
        </h6>
      </div>
    </div>
    <!--<div class="row">-->
    <!--  <div class="col-md-12 text-center">-->
    <!--    <nav class="navbar navbar-expand-sm p-0 justify-content-center">-->
    <!--      <ul class="navbar-nav">-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#" style="color:#1976f2">About Us</a>-->
    <!--        </li>-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#" style="color:#1976f2">Media Center</a>-->
    <!--        </li>-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#" style="color:#1976f2">Careers</a>-->
    <!--        </li>-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#" style="color:#1976f2">Privacy Policy</a>-->
    <!--        </li>-->
    <!--        <li class="nav-item">-->
    <!--          <a class="nav-link" href="#" style="color:#1976f2">Terms & Conditions</a>-->
    <!--        </li>-->
    <!--      </ul>-->
    <!--    </nav>-->
    <!--  </div>-->
    <!--</div>-->
  </div>
</section>