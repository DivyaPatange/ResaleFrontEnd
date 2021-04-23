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
                    $cars = DB::table('cars')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $commercialVehicle = DB::table('commercial_vehicles')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $spareParts = DB::table('spare_parts')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $mobilePhones = DB::table('mobile_phones')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $mobileAccessory = DB::table('mobile_accessories')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $tablets = DB::table('mobile_tablets')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $jobs = DB::table('jobs')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $bikes = DB::table('bikes')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $electronics = DB::table('t_v_s')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $furnitures = DB::table('furniture')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $educations = DB::table('education')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
                    $pets = DB::table('pets')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

                ?>
                <div class="container">
                    <div class="row mt-4">   
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
                        @foreach($spareParts as $sparePart)     
                        <?php
                            $sparePhoto = explode(",", $sparePart->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $sparePhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $sparePart->ad_title }}</p>
                                    <a href="{{ route('spare-parts.post.ad', $sparePart->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $sparePart->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach 

                        @foreach($tablets as $t)     
                        <?php
                            $tabletPhoto = explode(",", $t->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $tabletPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $t->ad_title }}</p>
                                        <a href="{{ route('mobile-tablet.post.ad', $t->id) }}" class="">Click here to view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $t->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach

                        @foreach($jobs as $job)     
                        <?php
                            $jobPhoto = explode(",", $job->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $jobPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $job->job_title }}</p>
                                    <a href="{{ route('job.post.ad', $job->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Salary | Min. <i class="fa fa-inr"></i> {{ $job->min_monthly_salary }} - Max. <i class="fa fa-inr"></i> {{ $job->max_monthly_salary }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach  

                        @foreach($bikes as $bike)     
                        <?php
                            $bikePhoto = explode(",", $bike->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $bikePhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $bike->ad_title }}</p>
                                    <a href="{{ route('bike.post.ad', $bike->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $bike->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach 

                        @foreach($electronics as $elec)     
                        <?php
                            $elecPhoto = explode(",", $elec->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $elecPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $elec->ad_title }}</p>
                                    <a href="{{ route('electronics.post.ad', $elec->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $elec->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach

                        @foreach($furnitures as $furniture)     
                        <?php
                            $fPhoto = explode(",", $furniture->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $fPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $furniture->ad_title }}</p>
                                    <a href="{{ route('furniture.post.ad', $furniture->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $furniture->price }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach

                        @foreach($educations as $education)     
                        <?php
                            $fPhoto = explode(",", $education->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $fPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $education->ad_title }}</p>
                                    <a href="{{ route('education.post.ad', $education->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Fees | <i class="fa fa-inr"></i> {{ $education->fees }}</p>
                                    </div>
                                </div>
                                <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                
                                <!--   rent | $ 12.000</span>-->
                                <!--</div>-->
                            </div>
                        </div> 
                        @endforeach 

                        @foreach($pets as $pet)     
                        <?php
                            $fPhoto = explode(",", $pet->photos);
                        ?>               
                        <div class="col-md-3 mb-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-transparent border-secondary ">
                                    <img class="img-fluid myimg" src="{{  URL::asset('adPhotos/' . $fPhoto[0]) }}">
                                </div>
                                <div class="card-body text-secondary ">
                                    <div class="card-body p-0" style="font-size:13px">
                                        <p class="card-text m-0">{{ $pet->ad_title }}</p>
                                    <a href="{{ route('pet.post.ad', $pet->id) }}" class="">Click here to view
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                    <p class="card-text m-0"> Price | <i class="fa fa-inr"></i> {{ $pet->price }}</p>
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