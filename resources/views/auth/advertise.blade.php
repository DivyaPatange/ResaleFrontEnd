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
  top: 29%;
  width: 125%;
  text-align: center;
  font-size: 18px;
}
  /*for 3rd section*/
.example1 {
  border: 2px dotted black;
  padding:20px;
  
  border-radius: 60px;
  background-color:#fff;
 
}
/*//for icons*/
i.i1{
    font-size: 60px;
    padding-left:15px;
    /*color:#c8c8c8;*/
}
/*for table1*/
.d{
    width:50%;
    margin: 50px;
}
/*for td in table1*/
.a2{
    margin-left:60px;
    margin-right:40px;
}
.a1{
    margin-left:40px;
    margin-right:50px;
}
/*for table2*/
.d1{
    width:25%;
}

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
                           <a href="{{url ('advertise') }}" style="font-size:25px">Adverties with us</a>
                        </div>
                       
                    </div>
                    <div class="row mt-0">
                        <div class="col-md-12 col-lg-12 col-12 px-0">
                           
                            <div id="demo" class="carousel slide" data-ride="carousel">
                              <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                
                              </ul>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="assets/img/v2.jpg" alt="Los Angeles" width="100%" height="350">
                                  <div class=" text-light center">
                                    
                                    <h3><b class="text-light">Grow Your Business with Resale</b></h3>
                                    <p class="text-light" style="font-size: 25px;">Reach millions of potential customer <br>Quick and Cost effectively</p>
                                  </div>   
                                </div>
                                <div class="carousel-item">
                                  <img src="assets/img/v3.jpg" alt="Chicago" width="100%" height="350">
                                  <div class=" text-light center">
                                     
                                    <h3><b style="color:black;">On Resale, your Brand and <br>Audience will never be mismatched.</b></h3>
                                    <p style="font-size: 25px;color:black;">Get sharper targeting and powerful <br>results on Resale</p>
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
                    <div class="row mt-5">
                        <div class="col-md-12 col-lg-12 col-12 text-center">
                            <h4>EXPLORE THE POWER OF Resale AUDIENCE PLATFORM</h4>
                            <p class="mx-4 px-3 py-2">
                                Consumers don’t come to Resale for entertainment or news. 
                                They come to us with a very precise intent – to either buy, 
                                sell or find something – across a wide range of categories including cars, homes, mobiles, 
                                furniture, jobs and various services. 
                                Armed with this powerful information, 
                                brands can target audiences with high intent and purchasing power 
                                and ensure the maximum impact for their campaigns.
                            </p>
                            <button class="btn px-4 py-1" style="background-color:#2973ba;color:#fff;">Enquire Now</button>
                        </div>
                    </div>
                    <div class="row mt-5 p-5" style="background-color:#2973ba;">
                        <div class="col-md-12 col-lg-12 col-12 " >
                            <h4 class="py-3 text-center text-white">Sharp Targeting. Powerful Results.</h4>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <td class="d">
                                            <div class="example1 a2">
                                                <i class="fas fa-cart-arrow-down i1"></i>
                                                <p style="float:right;text-align:center">
                                                    Target audiences who have high purchase <br>intent on our platform.
                                                </p>
                                            </div>
                                        </td>
                                        <td class="d">
                                            <div class="example1 a1">
                                                <i class="fas fa-bullhorn i1"></i>
                                                <p style="float:right;text-align:center">
                                                    Reach affinity audiences across 180+ categories with<br> our cross category targeting.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="example1 a2">
                                                <i class="fas fa-globe i1"></i>
                                                <p style="float:right;text-align:center">
                                                    Always stay top of mind with our Cookie Pool<br> Retargeting on and outside Resale.
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="example1 a1">
                                                <i class="fas fa-bullseye i1"></i>
                                                <p style="float:right;text-align:center">
                                                    Smarter ways to reach out to relevant audiences with<br> our Price, Competitor, Hyperlocal Search based targeting
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="example1 a2">
                                                <i class="fas fa-laptop i1"></i>
                                                <p style="float:right;text-align:center">
                                                    Cut through clutter with innovations for your ad <br>on our platform.
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="example1 a1">
                                                <i class="fas fa-ad i1"></i>
                                                <p style="float:right;text-align:center;">
                                                    Your ad reaches a larger pool of audiences bypassing <br>Ad Blockers only on Resale.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-5 px-5">
                        <div class="col-md-12 col-lg-12 col-12 text-center">
                            <h4 class="pb-3">The Resale Advantages</h4>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <td class="d1">
                                            <i class="fas fa-users i1"></i>
                                        </td>
                                        <td class="d1">
                                            <i class="fas fa-user-clock i1"></i>
                                        </td>
                                        <td class="d1">
                                            <i class="fas fa-chart-pie i1"></i>
                                        </td>
                                        <td class="d1">
                                            <i class="fas fa-city i1"></i>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-right d1">
                                            <h5>30 Millions</h5>
                                            <p>Unique Visitors / Month</p>
                                        </td>
                                        <td class="border-right d1">
                                            <h5>90 millions</h5>
                                            <p>Total Visitors / Month</p>
                                        </td>
                                        <td class="border-right d1">
                                            <h5>50+</h5>
                                            <p>Categories</p>
                                        </td>
                                        <td class="d1">
                                            <h5>1000</h5>
                                            <p>Cities</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-5 p-5" style="background-color:#ef7f1a">
                        <div class="col-md-12 col-lg-12 col-12 ">
                            <h4 class="text-center" style="color: black;">The Resale Footprint</h4>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <td style="width:70%">
                                            <i class="fas fa-users i1"></i>
                                        </td>
                                        <td>
                                            <i class="fas fa-user-clock i1"></i>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
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