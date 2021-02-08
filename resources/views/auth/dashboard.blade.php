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
    height:150px;
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

</style>
@endsection
@section('content')
<section class="section-property pt-md-4 section-t8">
    <div class="container-fluid p-0">
        <div class="row myrow" id="body-row">
            @include('auth.auth_layout.sidebar')
            <!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col">
                <?php
                    $cars = DB::table('cars')->limit(4)->orderBy('id', 'DESC')->get();
                    $commercialVehicle = DB::table('commercial_vehicles')->limit(4)->orderBy('id', 'DESC')->get();
                    $mobilePhones = DB::table('mobile_phones')->limit(4)->orderBy('id', 'DESC')->get();
                    $mobileAccessory = DB::table('mobile_accessories')->limit(4)->orderBy('id', 'DESC')->get();
                ?>
                @if(count($cars) > 0)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Car Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allCarPost') }}">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($cars as $car)     
                        <?php
                            $carPhoto = explode(",", $car->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $car->ad_title }}</p>
                                    <a href="{{ route('car.post.ad', $car->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $car->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($commercialVehicle) > 0)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Commercial Vehicle Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allCommercialVehiclePost') }}">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($commercialVehicle as $cv)     
                        <?php
                            $cvPhoto = explode(",", $cv->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $cvPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $cv->ad_title }}</p>
                                    <a href="{{ route('commercial-vehicle.post.ad', $cv->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $cv->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($mobilePhones) > 0)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Mobile Phones Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allMobilePhonePost') }}">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($mobilePhones as $mobile)     
                        <?php
                            $mobilePhoto = explode(",", $mobile->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $mobilePhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $mobile->ad_title }}</p>
                                        <a href="{{ route('mobile-phone.post.ad', $mobile->id) }}" class="">Click here to view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $mobile->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($mobileAccessory) > 0)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Mobile Accessories Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allMobileAccessoryPost') }}">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($mobileAccessory as $ma)     
                        <?php
                            $maPhoto = explode(",", $ma->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $maPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $ma->ad_title }}</p>
                                    <a href="{{ route('mobile-accessory.post.ad', $ma->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $ma->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
    </div>
</section>
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