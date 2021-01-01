@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
<style>
.list-color{
    color: #114a88;
}
/* .list-color:hover{
    color:white;
} */
</style>
@endsection
@section('content')
<section class="section-property section-t8 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
                <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
                </div>
                <div class="title-link">
                <a href="all_product.php">All Property
                    <span class="ion-ios-arrow-forward"></span>
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <ul class="list-group text-left">
                <?php 
                    $categories = DB::table('categories')->where('status', 1)->get();
                ?>
                @foreach($categories as $c)
                <li class="list-group-item p-2"><img src="{{  URL::asset('categoryIcon/' . $c->category_icon) }}" alt="" width="25px">&nbsp;&nbsp;&nbsp;<a href="#" class="list-color">{{ $c->category_name }}<i class="fa fa-angle-double-right float-right" aria-hidden="true"></i></a></li>
                <div class="clearfix"></div>
                @endforeach
            </ul>
            </div>
            <div class="col-md-9">
            <div id="property-carousel" class="owl-carousel owl-theme">
                <div class="carousel-item-b">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                    <img src="assets/img/property-6.jpg" alt="" class="img-a myimg">
                    </div>
                    <div class="card-overlay">
                    <div class="card-overlay-a-content">
                        <div class="card-header-a">
                        <h2 class="card-title-a">
                            <a href="product_detail.php">206 Mount
                            <br /> Olive Road Two</a>
                        </h2>
                        </div>
                        <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">rent | $ 12.000</span>
                        </div>
                        <a href="product_detail.php" class="link-a">Click here to view
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item-b">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                    <img src="assets/img/property-3.jpg" alt="" class="img-a myimg">
                    </div>
                    <div class="card-overlay">
                    <div class="card-overlay-a-content">
                        <div class="card-header-a">
                        <h2 class="card-title-a">
                            <a href="product_detail.php">157 West
                            <br /> Central Park</a>
                        </h2>
                        </div>
                        <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">rent | $ 12.000</span>
                        </div>
                        <a href="product_detail.php" class="link-a">Click here to view
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item-b">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                    <img src="assets/img/property-7.jpg" alt="" class="img-a myimg">
                    </div>
                    <div class="card-overlay">
                    <div class="card-overlay-a-content">
                        <div class="card-header-a">
                        <h2 class="card-title-a">
                            <a href="product_detail.php">245 Azabu
                            <br /> Nishi Park let</a>
                        </h2>
                        </div>
                        <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">rent | $ 12.000</span>
                        </div>
                        <a href="product_detail.php" class="link-a">Click here to view
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="carousel-item-b">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                    <img src="assets/img/property-10.jpg" alt="" class="img-a myimg">
                    </div>
                    <div class="card-overlay">
                    <div class="card-overlay-a-content">
                        <div class="card-header-a">
                        <h2 class="card-title-a">
                            <a href="product_detail.php">204 Montal
                            <br /> South Bela Two</a>
                        </h2>
                        </div>
                        <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">rent | $ 12.000</span>
                        </div>
                        <a href="product_detail.php" class="link-a">Click here to view
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customjs')

@endsection