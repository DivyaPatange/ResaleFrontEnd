@extends('auth.auth_layout.main')
@section('title', 'Free Classified Ads in India, Post Ads Online | Buy & Sale free in All over India, Resale99 Free Classified Advertising')
@section('customcss')
<script src="https://apis.mapmyindia.com/advancedmaps/v1/ddc94031bf9b9f6b7020d2027132e130/map_load?v=1.3"></script>
<!-- <script src="https://apis.mapmyindia.com/advancedmaps/api/ddc94031bf9b9f6b7020d2027132e130/map_sdk_plugins"></script> -->

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
    height:180px;
   
}
.mycard{
    border: 1px solid #8080806e;
    padding: 9px;
}
.card {
    text-align: center;
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
#map {
    position: absolute;
    left: 312px; top: 46px; 
    right: 2px; bottom: 2px; 
    border: 1px solid #cccccc; }

  
</style>


@endsection
@section('content')

<div id="map"></div>

<script>
    /*Map Initialization*/
    var map = new MapmyIndia.Map('map', {center: [28.09, 78.3], zoom: 5, search: false});
          
    /*Search plugin initialization*/
    var optional_config={
        location:[28.61, 77.23],
        /* pod:'City',
        bridge:true,
        tokenizeAddress:true,*
        filter:'cop:9QGXAM',
        distance:true,
        width:300,
        height:300*/
    };
            
    // search = null;
    new MapmyIndia.search(document.getElementById("auto"),optional_config,callback);
            
    /*CALL for fix text - LIKE THIS
    * 
    new MapmyIndia.search("agra",optional_config,callback);
    * 
    * */

    var marker;
    function callback(data) { 
        if(data)
        {
            if(data.error)
            {
                if(data.error.indexOf('responsecode:401')!==-1){
                /*TOKEN EXPIRED, set new Token ie. 
                    * MapmyIndia.setToken(newToken);
                    */
                }
                console.warn(data.error);                       
            }
            else
            {
                var dt=data[0];
                if(!dt) return false;
                var eloc=dt.eLoc;
                var lat=dt.latitude,lng=dt.longitude;
                
                var place=dt.placeName+(dt.placeAddress?", "+dt.placeAddress:"");
                /*Use elocMarker Plugin to add marker*/
                if(marker) marker.remove();
                marker=new MapmyIndia.elocMarker({map:map,eloc:lat?lat+","+lng:eloc,popupHtml:place,popupOptions:{openPopup:true}}).fitbounds();
            }
        }
    }    
</script>

<section class="section-property pt-md-4 section-t8">
    <div class="container-fluid p-0">
        <div class="row myrow" id="body-row">
            @include('auth.auth_layout.sidebar')
            <!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col p-0">
                <?php
                    $cars = DB::table('cars')->limit(4)->orderBy('id', 'DESC')->get();
                    $propertyRent = DB::table('property_rents')->limit(4)->orderBy('id', 'DESC')->get();
                    $mobilePhones = DB::table('mobile_phones')->limit(4)->orderBy('id', 'DESC')->get();
                    $jobs = DB::table('jobs')->limit(4)->orderBy('id', 'DESC')->get();
                    $bikes = DB::table('bikes')->limit(4)->orderBy('id', 'DESC')->get();
                    $electronics = DB::table('t_v_s')->limit(4)->orderBy('id', 'DESC')->get();
                    
                                  
                                  
                                    
                ?>
                @if(count($cars) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Car Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allCarPost') }}" target="_blank">Show All
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
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('car.post.ad', $car->id) }}" target="_blank">
                                
                                    <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                                    
                                    <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                        <span class="float-right">{{ date('j F',strtotime($car->created_at)) }}</span>
                                        <span style="font-size:14px;font-weight: bold;">
                                            <i class="fa fa-inr"></i>&nbsp;{{ $car->price }}</span>
                                       <br>
                                        @if($car->brand_id)
                                            <?php
                                                $brand = DB::table('brands')->where('id', $car->brand_id)->first();
                                            ?>
                                            @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                        @endif
                                        @if($car->model_id)
                    
                                              <?php
                                                $modelName = DB::table('models')->where('id', $car->model_id)->first();
                                              ?>
                                                {{ $modelName->model_name }}
                                        @endif
                                        @if($car->car_varient)
                    
                                              <?php
                                                $varients = DB::table('car_varients')->where('id', $car->car_varient)->first();
                                              ?>
                                                {{ $varients->car_varient }}
                                        @endif
                                        <br>
                                        {{ $car->year_of_registration }}&nbsp;&nbsp;|
                                        {{ $car-> kms_driven }}  KM &nbsp;&nbsp;|
                                        {{ $car->fuel_type }}
                                        <br>
                                       
                                       <span class="float-right pt-2">
                                         @if($car->city_id)
                    
                                              <?php
                                                $city = DB::table('cities')->where('id', $car->city_id)->first();
                                              ?>
                                                {{ $city->city_name }}
                                        @endif 
                                        ,
                                         @if($car->state_id)
                    
                                              <?php
                                                $stat = DB::table('states')->where('id', $car->state_id)->first();
                                              ?>
                                                {{ $stat->state_name }}
                                        @endif
                                        
                                       </span>
                                        
                                        
                                        
                                    </p>
                                </a>
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($propertyRent) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Property for Rent / Lease Post</h5>
                                </div>
                                <div class="title-link">
                                    <?php
                                        foreach($propertyRent as $pR)
                                        {
                                            $subcategory_id = $pR->sub_category_id;
                                        }
                                        // dd($subcategory_id);
                                    ?>
                                    <h5>
                                        <a href="{{ route('sidebar.property-rent.post', $subcategory_id) }}" target="_blank">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                    @foreach($propertyRent as $p)     
                        <?php
                            $fPhoto = explode(",", $p->exterior_photos);
                        ?>              
                        <div class="col-md-3  p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('property-rent.post.ad', $p->id) }}" target="_blank">
                                
                                   <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $fPhoto[0]) }}">
                                   
                                   
                                    <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                        <span style="font-size:15px;font-weight: bold;">
                                            <i class="fa fa-inr"></i>&nbsp;@if($p->rent_as){{ $p->rent_as }}@endif</span>
                                       <br>
                                        
                                      
                                        @if(!empty($p->bedroom)){{ $p->bedroom }} @endif BHK ,
                                        @if($p->carpet_area){{ $p->carpet_area }} {{ $p->carpet_unit }} @endif ,
                                        
                                        <br>
                                         
                                        @if($p->type_id)
                                            <?php
                                                $type = DB::table('types')->where('id', $p->type_id)->first();
                                            ?>
                                            {{ $type->type_name }}
                                        @endif
                                        <br>
                                        @if($p->locality){{ $p->locality }} @endif
                                        
                                    </p>
                                    
                                    <!--<p class="card-text m-0 pt-2" style="font-size:12px;">{{ $p->project_name }}&nbsp;&nbsp;&nbsp;&nbsp;<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                                    <!--<span style="font-size:15px">Monthly Rent | <i class="fa fa-inr"></i>{{ $p->monthly_rent }}</span>-->
                                    <!--</p>-->
                                </a>
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($mobilePhones) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Mobile Phones Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="{{ route('allMobilePhonePost') }}" target="_blank">Show All
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
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('mobile-phone.post.ad', $mobile->id) }}" target="_blank">
                                    <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $mobilePhoto[0]) }}">
                                    <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                        <span style="font-size:15px;font-weight: bold;"><i class="fa fa-inr"></i>&nbsp;{{ $mobile->price }}</span>
                                       <br>
                                       {{ $mobile->ad_title }}
                                       <br>
                                       {{ $mobile->year_of_purchase }}
                                        <br>
                                        
                                        {{ $mobile->address }}
                                        
                                        
                                    </p>
                                    
                                    
                                    
                                    
                                    
                                   <!--<p class="card-text m-0 pt-2" style="font-size:12px;">{{ $mobile->ad_title }}&nbsp;&nbsp;&nbsp;&nbsp;<br>-->
                                   <!--<span style="font-size:15px;font-weight: bold;">-->
                                   <!--         <i class="fa fa-inr"></i>&nbsp;{{ $mobile->price }}</span>-->
                                   <!--    <br>-->
                                       
                                   <!--<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                                   <!--<span style="font-size:15px">Price | <i class="fa fa-inr"></i>{{ $mobile->price }}</span>-->
                                   <!-- </p>-->
                                </a>
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($jobs) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Part time Jobs Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="#" target="_blank">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($jobs as $job)     
                        <?php
                            $jobPhoto = explode(",", $job->photos);
                        ?>               
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('job.post.ad', $job->id) }}" target="_blank">
                                
                                    <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $jobPhoto[0]) }}">
                                    <p class="card-text m-0 pt-2" style="font-size:12px;">{{ $job->job_title }}&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <span style="font-size:15px">Salary | Min. <i class="fa fa-inr"></i> {{ $job->min_monthly_salary }} - Max. <i class="fa fa-inr"></i> {{ $job->max_monthly_salary }}</span></p>
                                </a>
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($bikes) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Motorcycles Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="" target="_blank">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                    @foreach($bikes as $bike)     
                        <?php
                            $bikePhoto = explode(",", $bike->photos);
                        ?> 
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('bike.post.ad', $bike->id) }}" target="_blank">
                                
                                     <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $bikePhoto[0]) }}">
                                    <p class="card-text m-0 pt-2" style="font-size:12px;">{{ $bike->ad_title }}&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <span style="font-size:15px">Price | <i class="fa fa-inr"></i>{{ $bike->price }}</span>
                                    </p>
                                </a>
                            </div>
                        </div> 
                        @endforeach   
                    </div>
                </div>
                @endif
                @if(count($electronics) > 0)
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="title-wrap p-0 d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Audio / Video / Gaming Post</h5>
                                </div>
                                <div class="title-link">
                                    <h5>
                                        <a href="" target="_blank">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                    @foreach($electronics as $elec)     
                        <?php
                            $elecPhoto = explode(",", $elec->photos);
                        ?>
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('electronics.post.ad', $elec->id) }}" target="_blank">
                                
                                     <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $elecPhoto[0]) }}">
                                    <p class="card-text m-0 pt-2" style="font-size:12px;">{{ $elec->ad_title }}&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <span style="font-size:15px">Price | <i class="fa fa-inr"></i>{{ $elec->price }}</span>
                                    </p>
                                </a>
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