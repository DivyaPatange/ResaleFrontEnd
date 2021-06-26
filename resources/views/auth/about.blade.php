@extends('auth.auth_layout.main')
@section('title', 'Free Classified Ads in India, Post Ads Online | Buy & Sale free in All over India, Resale99 Free Classified Advertising')
@section('customcss')
<style>
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
                           <a href="{{url ('about') }}" style="font-size: 25px;">About Us</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <p class="p-5 bg-light text-justify"style="font-size: 14px;">Launched in 2021, Resale99.com, Central India’s First Online Classified Platform, deals with
                            every aspect of the consumers’ needs in the Automobile, Real Estate, Electronic, Job, Education,
                            Furniture and Fashion Industry. It is an online forum where buyers, sellers and brokers/agents
                            can exchange information about their product quickly, effectively and inexpensively. At
                            Resale99.com, you can advertise a All Category wise product, search for a Product, browse
                            through Listing, build your own Category wise microsite, and keep yourself updated with the
                            latest news and trends making headlines in the Online Platform.
                            <br>
                            Please write to us at support@resale99.com or call us at 9860178677 (09:00 AM to 09:00 PM,Monday to Friday)
                            </p>
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