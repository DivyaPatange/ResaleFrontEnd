<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Resale99 - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('auth.auth_layout.stylesheet')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('customcss')
  <style type="text/css">
/*    .myimg*/
/*    {*/
/*        width:100%;*/
/*        height:300px;*/
/*    }*/
/*    .card-header-a .card-title-a {*/
/*    font-size: 25px;*/
/*}*/


  

  </style>
  

</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Login</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      
        <div class="row m-3  p-5" style="border: 1px solid #114a88;">
          <p>Please Provide Your Mobile Number Or Email To
              Login / Sign Up On Resale99.</p>
          <div class="col-md-12 mb-3">
            <!-- <div class="form-group" id="myDIV">
              <div class="input-group">
                <input type="text" class="form-control" id="phone" placeholder="Contineu With Phone">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-phone"></i></div>
                </div>
              </div>
              </div> -->
              <a href="{{ url('/login') }}" target="_blank">
                <button  type="button" class="btn btn-outline-primary btn-block">
                  <img src="assets/img/telephone.png" class="img-fluid pr-5" >Continue With Phone</button>
              </a>
          
          </div>
          <div class="col-md-12 text-center mb-3">
            
            <a href="{{ url('/auth/facebook') }}">
                <button type="button" class="btn btn-outline-primary btn-block">
                  <img src="assets/img/facebook.png" class="img-fluid pr-4" ></i>Continue With Facebook</button>
             </a>
            
          </div>
          <div class="col-md-12 text-center mb-3">
            <a href="{{ url('/auth/google') }}">
                <button type="button" class="btn btn-outline-primary btn-block">
                  <img src="assets/img/google.png" class="img-fluid pr-5" ></i>Continue With Google</button>
              </a>
          </div>
          <!-- <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div> -->
        </div>
      
    </div>
  </div><!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  @include('auth.auth_layout.navbar')
  <!-- End Header/Navbar -->

  
  <main id="main">
    <!-- ======= Latest Properties Section ======= -->
    @yield('content')
    <!-- End Latest Properties Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('auth.auth_layout.footer')
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  @include('auth.auth_layout.scripts')
  @yield('customjs')
</body>

</html>