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

}
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
                            <?php 
                                $subcategories = DB::table('sub_categories')->where('category_id', $c->id)->where('status',1)->get();
                            ?>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                    <h5 class="title-a">Properties For Buy & Sell</h5>
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
                            </div>
                        </div>
                    </div>
                    <!--//row1-->
                </div>
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
                            </div>
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
                            </div>
                        </div>
                    </div>
                    <!--//sub container5-->
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