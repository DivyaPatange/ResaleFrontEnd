@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
<style>
#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    background-color: #333;
    padding: 0;
}
.row{
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
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
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
<section class="section-property pt-md-4">
    <div class="container-fluid p-0">
        <div class="row" id="body-row">
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
                <!--<a href="#" class="list-group-item list-group-item-action bg-dark text-white">-->
                <!--    <span class="menu-collapsed">Reports</span>-->
                <!--</a>-->
                <!--<a href="#" class="list-group-item list-group-item-action bg-dark text-white">-->
                <!--    <span class="menu-collapsed">Tables</span>-->
                <!--</a>-->
            </div>
             @endforeach
            
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30">    
            </li>   
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col">
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                    <h5 class="title-a">
                        Properties For Buy & Sell</h5>
                    </div>
                    <div class="title-link">
                    <h5>
                        <a href="all_product.php">All Property
                        <span class="ion-ios-arrow-forward"></span>
                         </a>
                    </h5>
                   
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="container">
                    <div class="row">
                    <!--    <div id="property-carousel" class="owl-carousel owl-theme">-->
                    <!--        <div class="carousel-item-b">-->
                    <!--    <div class="card p-2">-->
                    <!--        <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                    <!--        <div class="card-body" style="font-size:13px">-->
                    <!--            <p class="card-text m-0">157 West-->
                    <!--            <br /> Central Park.</p>-->
                    <!--            <div class="price-box d-flex text-right">-->
                    <!--            <span class="price-a">rent | $ 12.000</span>-->
                    <!--            </div>-->
                    <!--           <a href="product_detail.php" class="">Click here to view-->
                    <!--            <span class="ion-ios-arrow-forward"></span>-->
                    <!--           </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="carousel-item-b">-->
                    <!--    <div class="card p-2">-->
                    <!--        <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                    <!--        <div class="card-body" style="font-size:13px">-->
                    <!--            <p class="card-text m-0">157 West-->
                    <!--            <br /> Central Park.</p>-->
                    <!--            <div class="price-box d-flex text-right">-->
                    <!--            <span class="price-a">rent | $ 12.000</span>-->
                    <!--            </div>-->
                    <!--           <a href="product_detail.php" class="">Click here to view-->
                    <!--            <span class="ion-ios-arrow-forward"></span>-->
                    <!--           </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="carousel-item-b">-->
                    <!--    <div class="card p-2">-->
                    <!--        <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                    <!--        <div class="card-body" style="font-size:13px">-->
                    <!--            <p class="card-text m-0">157 West-->
                    <!--            <br /> Central Park.</p>-->
                    <!--            <div class="price-box d-flex text-right">-->
                    <!--            <span class="price-a">rent | $ 12.000</span>-->
                    <!--            </div>-->
                    <!--           <a href="product_detail.php" class="">Click here to view-->
                    <!--            <span class="ion-ios-arrow-forward"></span>-->
                    <!--           </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--    </div>-->
                        <!--<div id="recipeCarousel1" class="carousel slide w-100" data-ride="carousel">-->
                        <!--    <div class="carousel-inner w-100" role="listbox">-->
                        <!--        <div class="carousel-item row no-gutters active">-->
                        
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-secondary">
                                            <div class="card-header bg-transparent border-secondary ">
                                                 <img class="img-fluid myimg" src="assets/img/property-3.jpg">
                                            </div>
                                            <div class="card-body text-secondary ">
                                                <div class="card-body p-0" style="font-size:13px">
                                                    <p class="card-text m-0">157 West
                                                    <br /> Central Park.</p>
                                                   <a href="" class="">Click here to view
                                                    <span class="ion-ios-arrow-forward"></span>
                                                   </a>
                                                   <p class="card-text m-0"> rent | $ 12.000</p>
                                                </div>
                                            </div>
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                           <div class="col-md-4 mb-3">
                                        <div class="card border-secondary">
                                            <div class="card-header bg-transparent border-secondary ">
                                                 <img class="img-fluid myimg" src="assets/img/property-3.jpg">
                                            </div>
                                            <div class="card-body text-secondary ">
                                                <div class="card-body p-0" style="font-size:13px">
                                                    <p class="card-text m-0">157 West
                                                    <br /> Central Park.</p>
                                                   <a href="product_detail.php" class="">Click here to view
                                                    <span class="ion-ios-arrow-forward"></span>
                                                   </a>
                                                   <p class="card-text m-0"> rent | $ 12.000</p>
                                                </div>
                                            </div>
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                  <div class="col-md-4 mb-3">
                                        <div class="card border-secondary">
                                            <div class="card-header bg-transparent border-secondary ">
                                                 <img class="img-fluid myimg" src="assets/img/property-3.jpg">
                                            </div>
                                            <div class="card-body text-secondary ">
                                                <div class="card-body p-0" style="font-size:13px">
                                                    <p class="card-text m-0">157 West
                                                    <br /> Central Park.</p>
                                                   <a href="product_detail.php" class="">Click here to view
                                                    <span class="ion-ios-arrow-forward"></span>
                                                   </a>
                                                   <p class="card-text m-0"> rent | $ 12.000</p>
                                                </div>
                                            </div>
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    
                        </div>
                        <!--//row1-->
                        <!--row2-->
                                <!--<div class="carousel-item row no-gutters">-->
                                <!--<div class="row">-->
                                <!--    <div class="col-md-3 float-left">-->
                                <!--        <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                                <!--            <div class="card-header bg-transparent border-secondary ">-->
                                <!--                 <img class="img-fluid" src="assets/img/property-3.jpg">-->
                                <!--            </div>-->
                                <!--            <div class="card-body text-secondary ">-->
                                <!--                <div class="card-body p-0" style="font-size:13px">-->
                                <!--                    <p class="card-text m-0">157 West-->
                                <!--                    <br /> Central Park.</p>-->
                                <!--                   <a href="product_detail.php" class="">Click here to view-->
                                <!--                    <span class="ion-ios-arrow-forward"></span>-->
                                <!--                   </a>-->
                                <!--                   <p class="card-text m-0"> rent | $ 12.000</p>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-3 float-left">-->
                                <!--        <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                                <!--            <div class="card-header bg-transparent border-secondary ">-->
                                <!--                 <img class="img-fluid" src="assets/img/property-3.jpg">-->
                                <!--            </div>-->
                                <!--            <div class="card-body text-secondary ">-->
                                <!--                <div class="card-body p-0" style="font-size:13px">-->
                                <!--                    <p class="card-text m-0">157 West-->
                                <!--                    <br /> Central Park.</p>-->
                                <!--                   <a href="product_detail.php" class="">Click here to view-->
                                <!--                    <span class="ion-ios-arrow-forward"></span>-->
                                <!--                   </a>-->
                                <!--                   <p class="card-text m-0"> rent | $ 12.000</p>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-3 float-left">-->
                                <!--        <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                                <!--            <div class="card-header bg-transparent border-secondary ">-->
                                <!--                 <img class="img-fluid" src="assets/img/property-3.jpg">-->
                                <!--            </div>-->
                                <!--            <div class="card-body text-secondary ">-->
                                <!--                <div class="card-body p-0" style="font-size:13px">-->
                                <!--                    <p class="card-text m-0">157 West-->
                                <!--                    <br /> Central Park.</p>-->
                                <!--                   <a href="product_detail.php" class="">Click here to view-->
                                <!--                    <span class="ion-ios-arrow-forward"></span>-->
                                <!--                   </a>-->
                                <!--                   <p class="card-text m-0"> rent | $ 12.000</p>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-3 float-left">-->
                                <!--        <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                                <!--            <div class="card-header bg-transparent border-secondary ">-->
                                <!--                 <img class="img-fluid" src="assets/img/property-3.jpg">-->
                                <!--            </div>-->
                                <!--            <div class="card-body text-secondary ">-->
                                <!--                <div class="card-body p-0" style="font-size:13px">-->
                                <!--                    <p class="card-text m-0">157 West-->
                                <!--                    <br /> Central Park.</p>-->
                                <!--                   <a href="product_detail.php" class="">Click here to view-->
                                <!--                    <span class="ion-ios-arrow-forward"></span>-->
                                <!--                   </a>-->
                                <!--                   <p class="card-text m-0"> rent | $ 12.000</p>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                            <!--  rent | $ 12.000</span>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
       


    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
    </div>
</section>
@endsection
@section('customjs')
<!--<script>-->
<!--    $("#property-carousel1").owlCarousel({-->
<!--        items :3,loop:false, center: false, smartSpeed: 650 });-->
        
<!--</script>-->
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