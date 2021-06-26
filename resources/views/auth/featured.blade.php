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
              
                <div class="container">
                    <div class="row mt-5">
                         <div class="col-md-12">
                             <div class="accordion" id="accordionExample">
                                  <div class="card" style="height:auto;">
                                    <div class="card-header" id="headingOne">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          1. Who can use Resale99 Featured Paid Ads ?
                                        </button>
                                      </h2>
                                    </div>
                                
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                      <div class="card-body">
                                        Any individual or business who meets Featured Ad Posting Policy and Terms of Use can
                                        opt for Resale99 Featured Listings.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card" style="height:auto;">
                                    <div class="card-header" id="headingTwo">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          2. Why should you use Resale99 Featured Ads?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                      <div class="card-body">
                                       Featured ads help you make your ad more visible / higlited, reach out to more buyer /
                                        consumers and sell your product or service faster.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card" style="height:auto;">
                                    <div class="card-header" id="headingThree">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                         3. How can one select their product or service to be a Featured Ad?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                      <div class="card-body">
                                        To OTP for a Featured Ad, you need to first start posting your ad on Resale99. As part of the
                                         Post ad flow, you will have an option to either post your ad as a free ad or a Featured paid ad.
                                            At this stage, you can select for a Featured ad option.
                                      </div>
                                    </div>
                                  </div>
                                   <div class="card" style="height:auto;">
                                    <div class="card-header" id="headingfour">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                         4. How many types of Featured Ads are there and what does a Featured Ad look like?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
                                      <div class="card-body">
                                        There are 2 types of Featured ads: First Featured Ad on Top of the page ad and second type is
                                            Featured + Urgent Top of the page. Highlighted by yellow colour on Top of the page ad
                                            gives you a top position on the respective category page.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card" style="height:auto;">
                                    <div class="card-header" id="headingfive">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        5. How can I recognise a Featured Ad ?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                                      <div class="card-body">
                                       All Featured Ads are easily recognizable.
                                            Top of the page ad: As the name says, they appear right at the Top of each category’s ad
                                            results. They are further highlighted in Yellow for increased visibility.
                                            Urgent + Top of the page ad: They are indicated by a Yellow Colour before the title and
                                            have all the other advantages of a Top of the page ad
                                            You will see these symbols on the browse page, View ad page and in your My Resale99
                                            section.
                                      </div>
                                    </div>
                                  </div>
                                </div>
                         </div>
                   
                </div>
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