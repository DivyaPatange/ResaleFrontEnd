@extends('auth.auth_layout.main')
@section('title', 'Mobile Phone')
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
                @if(count($mobilePhonePost) > 0)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">Mobile Phones Post</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($mobilePhonePost as $mobile)     
                        <?php
                            $mobilePhoto = explode(",", $mobile->photos);
                        ?>               
                        
                        <div class="col-md-3 p-1">
                            <div class="card border-secondary p-2">
                                <a href="{{ route('mobile-phone.post.ad', $mobile->id) }}">
                                
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
                                    <!--<p class="card-text m-0 pt-2" style="font-size:12px;">{{ $mobile->ad_title }}&nbsp;&nbsp;&nbsp;&nbsp;<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                                    <!--<span style="font-size:15px">Price | <i class="fa fa-inr"></i>{{ $mobile->price }}</span>-->
                                    <!--</p>-->
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