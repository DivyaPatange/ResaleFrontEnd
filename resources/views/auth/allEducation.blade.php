@extends('auth.auth_layout.main')
@section('title', 'Education Post')
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
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                <h5 class="title-a">{{ $subCategory->sub_category }} Post</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($educations) > 0)
                    <div class="row">   
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
                    </div>
                    @endif
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