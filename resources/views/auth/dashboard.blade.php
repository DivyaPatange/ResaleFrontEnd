@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
<style>
.list-color{
    color: #114a88;
    font-size: 12px;
}
.myimg{
    height:150px;
    width:100%;
}
.mycard{
    border: 1px solid #8080806e;
    padding: 9px;
}
.btn-link:hover {
    color: #f75b00;
    text-decoration: underline;
}
.btn-link {
    color: #2973ba;


/*#recipeCarousel1 .carousel-control-next-icon {*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e);*/
/*    background-color: #2973ba;*/
/*    position: absolute;*/
/*    top:76px;*/
/*    right: 0px;*/
/*}*/
/*#recipeCarousel1 .carousel-control-prev-icon {*/
/*    left: -6px;*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e);*/
/*    position: absolute;*/
/*    top:76px;*/
/*    background-color: #2973ba;*/
/*}*/
/*#recipeCarousel2 .carousel-control-next-icon {*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e);*/
/*    background-color: #2973ba;*/
/*    position: absolute;*/
/*    top:76px;*/
/*    right: 0px;*/
/*}*/
/*#recipeCarousel2 .carousel-control-prev-icon {*/
/*    left: -6px;*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e);*/
/*    position: absolute;*/
/*    top:76px;*/
/*    background-color: #2973ba;*/
/*}*/
/*#recipeCarousel3 .carousel-control-next-icon {*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e);*/
/*    background-color: #2973ba;*/
/*    position: absolute;*/
/*    top:76px;*/
/*    right: 0px;*/
/*}*/
/*#recipeCarousel3 .carousel-control-prev-icon {*/
/*    left: -6px;*/
/*    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e);*/
/*    position: absolute;*/
/*    top:76px;*/
/*    background-color: #2973ba;*/
/*}*/
</style>
@endsection
@section('content')
<section class="section-property section-t8 mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="">
                        <div class="" id="headingOne">
                            <h2 class="mb-0">
                                <li class="btn btn-link btn-block text-left list-group-item p-2" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseOne">
                                    Collapse
                                  <i class="fa fa-angle-double-left float-right" aria-hidden="true"></i>
                                </li>
                             </h2>
                        </div>
                    </div>
                </div>
                 <?php 
                    $categories = DB::table('categories')->where('status', 1)->get();
                   ?>
                    @foreach($categories as $key => $c)
                    <div class="accordion" id="accordionExample">
                        <div class="">
                            <div class="" id="headingOne">
                                <h2 class="mb-0">
                                <li class="btn btn-link btn-block text-left list-group-item p-2" type="button" data-toggle="collapse" data-target="#collapse{{$c->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    <img src="https://admin.resale99.com/categoryIcon/{{ $c->category_icon }}" alt="" width="30px">
                                  {{ $c->category_name }}
                                  <i class="fa fa-angle-double-down float-right" aria-hidden="true"></i>
                                </li>
                              </h2>
                            </div>
                        
                            <div id="collapse{{$c->id}}" class="collapse @if($key == 0)show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body mycard">
                              <?php $subcategories = DB::table('sub_categories')->where('category_id', $c->id)->where('status',1)->get();?>
                              @foreach($subcategories as $s )
                              <p>{{$s->sub_category}}</p>
                              @endforeach
                              
                              
                              </div>
                            </div>
                           
                        </div>
                    </div>
                     @endforeach
            </div>
            <div class="col-md-9">
    <!--sub container1-->
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
    <!--//sub container1-->
    <!--sub container2-->
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
                            <!--<a class="carousel-control-prev" href="#recipeCarousel1" role="button" data-slide="prev">-->
                            <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Previous</span>-->
                            <!--</a>-->
                            <!--<a class="carousel-control-next" href="#recipeCarousel1" role="button" data-slide="next">-->
                            <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Next</span>-->
                            <!--</a>-->
                            
                            <!--sub container2-->
                             <div class="container">
                                 <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="title-wrap d-flex justify-content-between">
                                         <div class="title-box">
                                            <h5 class="title-a">All About Cars</h5>
                                            </div>
                                            <div class="title-link">
                                            <h5>
                                            <a href="all_product.php">All Cars
                                                <span class="ion-ios-arrow-forward"></span>
                                                 </a>
                                            </h5>
                           
                                    </div>
                                </div>
                             </div>
                            </div>
                        </div>
                        <!--//sub container2-->
                        <!--sub container 3-->
                              <div class="container">
                        <!--row1-->
                                <div class="row">
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
                        <!--//sub container 3-->
                        <!--sub container 4-->
                             <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                            <h5 class="title-a">All About Cars</h5>
                            </div>
                            <div class="title-link">
                            <h5>
                                <a href="all_product.php">All Cars
                                <span class="ion-ios-arrow-forward"></span>
                                 </a>
                            </h5>
                           
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                        <!--//sub container4-->
                        <!--sub container5-->
                                <div class="container">
                        <!--row1-->
                                <div class="row">
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
                        <!--//sub container5-->
                            
                        </div>
                    </div>
                </div>
                
                
                
                <!--<div class="container">-->
                <!--    <div class="row mt-4">-->
                <!--        <div class="col-md-12">-->
                <!--        <div class="title-wrap d-flex justify-content-between">-->
                <!--            <div class="title-box">-->
                <!--            <h5 class="title-a">All About Cars</h5>-->
                <!--            </div>-->
                <!--            <div class="title-link">-->
                <!--            <h5>-->
                <!--                <a href="all_product.php">All Cars-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--                 </a>-->
                <!--            </h5>-->
                           
                <!--            </div>-->
                <!--        </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div id="property-carousel1" class="owl-carousel owl-theme">-->
                <!--    <div class="carousel-item-b">-->
                <!--        <div class="card p-2">-->
                <!--            <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                <!--            <div class="card-body" style="font-size:13px">-->
                <!--                <p class="card-text m-0">157 West-->
                <!--                <br /> Central Park.</p>-->
                <!--                <div class="price-box d-flex text-right">-->
                <!--                <span class="price-a">rent | $ 12.000</span>-->
                <!--                </div>-->
                <!--               <a href="product_detail.php" class="">Click here to view-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--               </a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="carousel-item-b">-->
                <!--        <div class="card p-2">-->
                <!--            <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                <!--            <div class="card-body" style="font-size:13px">-->
                <!--                <p class="card-text m-0">157 West-->
                <!--                <br /> Central Park.</p>-->
                <!--                <div class="price-box d-flex text-right">-->
                <!--                <span class="price-a">rent | $ 12.000</span>-->
                <!--                </div>-->
                <!--               <a href="product_detail.php" class="">Click here to view-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--               </a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="carousel-item-b">-->
                <!--        <div class="card p-2">-->
                <!--            <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                <!--            <div class="card-body" style="font-size:13px">-->
                <!--                <p class="card-text m-0">157 West-->
                <!--                <br /> Central Park.</p>-->
                <!--                <div class="price-box d-flex text-right">-->
                <!--                <span class="price-a">rent | $ 12.000</span>-->
                <!--                </div>-->
                <!--               <a href="product_detail.php" class="">Click here to view-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--               </a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="carousel-item-b">-->
                <!--        <div class="card p-2">-->
                <!--            <img src="assets/img/property-3.jpg" class="card-img-top" alt="..." height="150px">-->
                <!--            <div class="card-body" style="font-size:13px">-->
                <!--                <p class="card-text m-0">157 West-->
                <!--                <br /> Central Park.</p>-->
                <!--                <div class="price-box d-flex text-right">-->
                <!--                <span class="price-a">rent | $ 12.000</span>-->
                <!--                </div>-->
                <!--               <a href="product_detail.php" class="">Click here to view-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--               </a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                 <!--<div id="recipeCarousel2" class="carousel slide w-100" data-ride="carousel">-->
                 <!--           <div class="carousel-inner w-100" role="listbox">-->
                 <!--               <div class="carousel-item row no-gutters active">-->
                        <!--    <div class="container">-->
                        <!--row1-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-3 float-left">-->
                        <!--                <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                        <!--                    <div class="card-header bg-transparent border-secondary ">-->
                        <!--                         <img class="img-fluid" src="assets/img/property-3.jpg">-->
                        <!--                    </div>-->
                        <!--                    <div class="card-body text-secondary ">-->
                        <!--                        <div class="card-body p-0" style="font-size:13px">-->
                        <!--                            <p class="card-text m-0">157 West-->
                        <!--                            <br /> Central Park.</p>-->
                        <!--                           <a href="product_detail.php" class="">Click here to view-->
                        <!--                            <span class="ion-ios-arrow-forward"></span>-->
                        <!--                           </a>-->
                        <!--                           <p class="card-text m-0"> rent | $ 12.000</p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-md-3 float-left">-->
                        <!--                <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                        <!--                    <div class="card-header bg-transparent border-secondary ">-->
                        <!--                         <img class="img-fluid" src="assets/img/property-3.jpg">-->
                        <!--                    </div>-->
                        <!--                    <div class="card-body text-secondary ">-->
                        <!--                        <div class="card-body p-0" style="font-size:13px">-->
                        <!--                            <p class="card-text m-0">157 West-->
                        <!--                            <br /> Central Park.</p>-->
                        <!--                           <a href="product_detail.php" class="">Click here to view-->
                        <!--                            <span class="ion-ios-arrow-forward"></span>-->
                        <!--                           </a>-->
                        <!--                           <p class="card-text m-0"> rent | $ 12.000</p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-md-3 float-left">-->
                        <!--                <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                        <!--                    <div class="card-header bg-transparent border-secondary ">-->
                        <!--                         <img class="img-fluid" src="assets/img/property-3.jpg">-->
                        <!--                    </div>-->
                        <!--                    <div class="card-body text-secondary ">-->
                        <!--                        <div class="card-body p-0" style="font-size:13px">-->
                        <!--                            <p class="card-text m-0">157 West-->
                        <!--                            <br /> Central Park.</p>-->
                        <!--                           <a href="product_detail.php" class="">Click here to view-->
                                                    <!--<span class="ion-ios-arrow-forward"></span>-->
                        <!--                           </a>-->
                        <!--                           <p class="card-text m-0"> rent | $ 12.000</p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-md-3 float-left">-->
                        <!--                <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                        <!--                    <div class="card-header bg-transparent border-secondary ">-->
                        <!--                         <img class="img-fluid" src="assets/img/property-3.jpg">-->
                        <!--                    </div>-->
                        <!--                    <div class="card-body text-secondary ">-->
                        <!--                        <div class="card-body p-0" style="font-size:13px">-->
                        <!--                            <p class="card-text m-0">157 West-->
                        <!--                            <br /> Central Park.</p>-->
                        <!--                           <a href="product_detail.php" class="">Click here to view-->
                                                    <!--<span class="ion-ios-arrow-forward"></span>-->
                        <!--                           </a>-->
                        <!--                           <p class="card-text m-0"> rent | $ 12.000</p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                                    
                        <!--        </div>-->
                                <!--<div class="carousel-item row no-gutters">-->
                                <!--//row1-->
                                <!--row2-->
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
                            <!--<a class="carousel-control-prev" href="#recipeCarousel2" role="button" data-slide="prev">-->
                            <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Previous</span>-->
                            <!--</a>-->
                            <!--<a class="carousel-control-next" href="#recipeCarousel2" role="button" data-slide="next">-->
                            <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Next</span>-->
                            <!--</a>-->
                        </div>
                <!--    <div class="container">-->
                <!--    <div class="row mt-4">-->
                <!--        <div class="col-md-12">-->
                <!--        <div class="title-wrap d-flex justify-content-between">-->
                <!--            <div class="title-box">-->
                <!--            <h5 class="title-a">All About Cars</h5>-->
                <!--            </div>-->
                <!--            <div class="title-link">-->
                <!--            <h5>-->
                <!--                <a href="all_product.php">All Cars-->
                <!--                <span class="ion-ios-arrow-forward"></span>-->
                <!--                 </a>-->
                <!--            </h5>-->
                           
                <!--            </div>-->
                <!--        </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div id="recipeCarousel3" class="carousel slide w-100" data-ride="carousel">-->
                            <!--<div class="carousel-inner w-100" role="listbox">-->
                            <!--    <div class="carousel-item row no-gutters active">-->
                            <!--<div class="container">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="assets/img/property-3.jpg">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="assets/img/property-3.jpg">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="assets/img/property-3.jpg">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="http://placehold.it/350x280/444?text=2">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                                    
                            <!--    </div>-->
                                <!--<div class="carousel-item row no-gutters">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="http://placehold.it/350x280/444?text=2">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="http://placehold.it/350x280/444?text=2">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="http://placehold.it/350x280/444?text=2">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                              
                                            <!--   rent | $ 12.000</span>-->
                                            <!--</div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-3 float-left">-->
                            <!--            <div class="card border-secondary  mr-2" style="max-width: 18rem;">-->
                            <!--                <div class="card-header bg-transparent border-secondary ">-->
                            <!--                     <img class="img-fluid" src="http://placehold.it/350x280/444?text=2">-->
                            <!--                </div>-->
                            <!--                <div class="card-body text-secondary ">-->
                            <!--                    <div class="card-body p-0" style="font-size:13px">-->
                            <!--                        <p class="card-text m-0">157 West-->
                            <!--                        <br /> Central Park.</p>-->
                            <!--                       <a href="product_detail.php" class="">Click here to view-->
                            <!--                        <span class="ion-ios-arrow-forward"></span>-->
                            <!--                       </a>-->
                            <!--                       <p class="card-text m-0"> rent | $ 12.000</p>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                            <!--<div class="card-footer bg-transparent border-secondary"style="font-size:13px">-->
                                            <!--  rent | $ 12.000</span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<a class="carousel-control-prev" href="#recipeCarousel3" role="button" data-slide="prev">-->
                            <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Previous</span>-->
                            <!--</a>-->
                            <!--<a class="carousel-control-next" href="#recipeCarousel3" role="button" data-slide="next">-->
                            <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                            <!--    <span class="sr-only">Next</span>-->
                            <!--</a>-->
                        </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customjs')
<!--<script>-->
<!--    $("#property-carousel1").owlCarousel({-->
<!--        items :3,loop:false, center: false, smartSpeed: 650 });-->
        
<!--</script>-->
@endsection