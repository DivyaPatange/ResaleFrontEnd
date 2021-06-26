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

/*for input type*/
    .a1{
        border:none;
        border-bottom:1px solid gray;
        padding: 5px;
        width: 400px;
        font-size: 14px;
    }
/*//for input type*/
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
                           <a href="{{url ('contact') }}" style="font-size:25px">Contact Us</a>
                        </div>
                        
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <h6>Write to us</h6>
                                        <p>Whether it is queries, issues or feedback,<br>
                                        send us a note, we’re all ears!</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                       <h6>Write to management</h6>
                                       <p>Issue still not resolved?<br>
                                        Let us know here.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="containe">
                                   <div class="row p-5">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="https://admin.resale99.com/categoryIcon/1198278413.png" alt="" width="30px" >
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Cars & Bikes</h6>
                                                    <p>All things Resale99Cars</p>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="https://admin.resale99.com/categoryIcon/1998651534.png" alt="" width="30px">
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Home</h6>
                                                    <p>All things Resale99Homes</p>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="https://admin.resale99.com/categoryIcon/118203936.png" alt="" width="30px">
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Mobiles & Tablets</h6>
                                                    <p>Anything and everything related to Mobiles and Tablets</p>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="https://admin.resale99.com/categoryIcon/541746089.png" alt="" width="30px">
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Jobs</h6>
                                                    <p>All things Resale99Jobs</p>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                  <div class="row p-5">
                                       <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!--<img src="https://admin.resale99.com/categoryIcon/1198278413.png" alt="" width="30px">-->
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Services</h6>
                                                    <p>All Things Resale99</p>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!--<img src="https://admin.resale99.com/categoryIcon/1198278413.png" alt="" width="30px">-->
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Premium Ads</h6>
                                                    <p>Anything and everything related to premium Ads</p>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!--<img src="https://admin.resale99.com/categoryIcon/1198278413.png" alt="" width="30px">-->
                                                </div>
                                                <div class="col-md-9">
                                                    <h6>Miscellaneous</h6>
                                                    <p>Any other category related issues or feedback</p>
                                                </div>
                                            </div>    
                                        </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!--<div class="col-lg-2 col-md-2">-->
                                    
                                <!--</div>-->
                                <div class="col-lg-12 col-md-12 text-center pt-3">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="text-right">
                                                    <div class="form-group">
                                                      <input type="text" class="a1" id="complaint" placeholder="Your Complaint Ticket Id*" name="complaint">
                                                    </div>
                                                </td>
                                               <td class="text-left">
                                                    <div class="form-group">
                                                        <input type="text" class="a1" id="subject" placeholder="Subject*" name="subject">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <div class="form-group">
                                                        <input type="text" class="a1" id="name" placeholder="Full Name*" name="name">
                                                    </div>
                                                </td>
                                                 <td class="text-left">
                                                    <textarea class="p-2" rows="2" cols="40" id="message" placeholder="Message" name="message" ></textarea>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <div class="form-group">
                                                        <input type="number" class=" a1" id="mobile" placeholder="Mobile*" name="mobile">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td class="text-right">
                                                    <div class="form-group">
                                                        <input type="email" class=" a1" id="email" placeholder="Email*" name="email">
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- <div class="col-lg-6 col-md-6">-->
                                    
                                <!--</div>-->
                            </div>
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