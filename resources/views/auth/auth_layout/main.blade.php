<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Resale99 | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

@include('auth.auth_layout.stylesheet')

@yield('customcss')
<style type="text/css">
  form.example input[type=text] {
    padding:7px 50px 7px 40px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background:white;
  }

  form.example button {
    float: left;
    width: 20%;
    padding:7px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
  form.example1 input[type=text] 
  {
    padding:7px 50px 7px 40px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 100%;
    background:white;
  }
  .myicon{
    left:6px;
    position: absolute;
    top: 12px;
    font-size: 20px;
  }
  .collapsible:before 
  {
    content: '\002B';
    padding: 3px 10px;
    background: #76b947;
    color: white;
    /* font-weight: bold; */
    /* float: left; */
    /* margin-left: 5px; */
  }
  .card-header {
    background-color: white;
  }
   .portfolio-details .portfolio-info {
    padding: 10px 70px 0px 70px;
    position: absolute;
    right: 0;
    bottom: 0px;
    background: #fff;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    z-index: 2;
    top: 0px;
    height: 422px;
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('auth.auth_layout.navbar')
  <!-- End Header -->

  

  <main id="main">

    <!-- ======= Services Section ======= -->
    @yield('content')
    
    <!-- End Services Section -->

 
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('auth.auth_layout.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('auth.auth_layout.scripts')
  @yield('customjs')
</body>

</html>