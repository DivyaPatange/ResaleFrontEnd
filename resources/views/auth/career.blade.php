@extends('auth.auth_layout.main')
@section('title', 'Free Classified Ads in India, Post Ads Online | Buy & Sale free in All over India, Resale99 Free Classified Advertising')
@section('customcss')
<style>
p{
    font-size:13px;
}
#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    /*background-color: #333;*/
    padding: 0;
}
.myrow{
    margin-top:56px;
}
/* Sidebar sizes when expanded and expanded */
.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}

/* Menu item*/
#sidebar-container .list-group a {
    /*height: 0px;*/
    color: #2973ba;
     /*background-color: #292b2c; */
    /*width: 255px;*/
}

/* Submenu item*/
#sidebar-container .list-group .sidebar-submenu a {
    /*height: 45px;*/
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}

.bg-dark {
    background-color: #15518a!important;
}
/* Separators */
.sidebar-separator-title {
    background-color: #333;
    height: 35px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;    
    height: 60px;
}
.myimg{
    height:145px;
    width:100%;
}
.mycard{
    border: 1px solid #8080806e;
    padding: 9px;
}

/* Closed submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
/* Opened submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: black;
     background-color: white; 
}
/*tab pills*/
.nav-tabs .nav-link:hover {
    border-top:3px solid #ef810b;
    background-color: #d3d3d352;
}

/*tab pills*/

/*for carousel text*/
.center {
  position: absolute;
  top: 40%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
  /* .c1 {*/
  /*vertical-align: middle;*/
}

/*//for carousel text*/
</style>
@endsection
@section('content')
<section class="section-property pt-md-4 section-t8">
    <div class="container-fluid p-0">
        <div class="row myrow" id="body-row">
            
            <!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col p-0">
                <div class="container-fluid">
                    <div class="row mt-3 bg-light p-3"style="border-bottom: 1px solid #114aa6;">
                        
                        <div class="col-md-12">
                           <a href="{{url ('career') }}" style="font-size:25px">Careers</a>
                        </div>
                        
                    </div>
                    <div class="row mt-0">
                        <div class="col-md-12 col-lg-12 col-12 px-0">
                           
                            <div id="demo" class="carousel slide" data-ride="carousel">
                              <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                                <li data-target="#demo" data-slide-to="5"></li>
                              </ul>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="assets/img/r8.jpg" alt="Los Angeles" width="100%" height="500">
                                  <div class=" text-light center">
                                      <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Franchisees System/ Pattern</b></h1>
                                    <!--<p>We had such a great time in LA!</p>-->
                                  </div>   
                                </div>
                                <div class="carousel-item">
                                  <img src="assets/img/r16.jpg" alt="Chicago" width="100%" height="500">
                                  <div class=" text-light center">
                                      <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Agent's Appointment</b></h1>
                                    <!--<p>Thank you, Chicago!</p>-->
                                  </div>   
                                </div>
                                <div class="carousel-item">
                                  <img src="assets/img/r14.jpg" alt="New York" width="100%" height="500">
                                  <div class=" text-light center">
                                      <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Dealers/ Distributors</b></h1>
                                    
                                  </div>   
                                </div>
                                 <div class="carousel-item">
                                  <img src="assets/img/r15.jpg" alt="Chicago" width="100%" height="500">
                                  <div class=" text-light center">
                                      <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Associate Partner</b></h1>
                                    
                                  </div>   
                                </div>
                                 <div class="carousel-item">
                                  <img src="assets/img/r17.jpg" alt="Chicago" width="100%" height="500">
                                  <div class=" text-light center">
                                      <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Business Partner</b></h1>
                                    <!--<p>Thank you, Chicago!</p>-->
                                  </div>   
                                </div>
                                 <div class="carousel-item">
                                  <img src="assets/img/r12.jpg" alt="Chicago" width="100%" height="500">
                                  <div class=" text-light center">
                                     <p class="text-light" style="font-size: 30px;">Resale is about</p>
                                    <h1><b class="text-light">Investor For Global Expansion</b></h1>
                                    
                                  </div>   
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                              </a>
                              <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                              </a>
                            </div>
                        </div>
                  
                </div>
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
    </div>
</section>
<!--<section>-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-12 p-0">-->
<!--                <img src="{{ asset('PHOTO-2021-02-12-09-31-28.jpg') }}" class="img-fluid">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
@endsection
@section('customjs')
<script>
    $('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
</script>
@endsection