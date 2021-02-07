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
            <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <a href="#" data-toggle="sidebar-colapse" class="list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
            <!-- Separator with title -->
            <!--<li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">-->
            <!--    <small>MAIN MENU</small>-->
            <!--</li>-->
                <?php 
                    $categories = DB::table('categories')->where('status', 1)->get();
                   ?>
             @foreach($categories as $key => $c)
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu{{$c->id}}" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="mr-3">
                        <img src="https://admin.resale99.com/categoryIcon/{{ $c->category_icon }}" alt="" width="30px">
                    </span> 
                    <span class="menu-collapsed">{{$c->category_name}}</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
               <div id="submenu{{$c->id}}" class="collapse sidebar-submenu">
                    <?php $subcategories = DB::table('sub_categories')->where('category_id', $c->id)->where('status',1)->get();?>
                    @foreach($subcategories as $s )
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">{{$s->sub_category}}</span>
                    </a>
                    @endforeach
                </div>
             @endforeach
        </ul><!-- List Group END-->
    
            </div>
            <!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col">
                <?php 
                    $category = DB::table('categories')->where('status', 1)->limit(4)->get();
                ?>
                @foreach($category as $cat)
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                   <h5 class="title-a">{{ $cat->category_name }} Post</h5>
                                </div>
                                <?php
                                    if($cat->category_name == "Auto Cars")
                                    {
                                        $cars = DB::table('cars')->where('category_id', $cat->id)->limit(4)->get();
                                        // dd($cars);
                                    }
                                ?>
                                <div class="title-link">
                                    <h5>
                                        <a href="all_product.php">Show All
                                        <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($cat->category_name == "Auto Cars")
                <div class="container">
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
                                        <p class="card-text m-0">{{ $car->ad_title }}
                                        <br />{{ $car->description }}</p>
                                       <a href="{{ url('product_detail') }}" class="">Click here to view
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
                @endforeach
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