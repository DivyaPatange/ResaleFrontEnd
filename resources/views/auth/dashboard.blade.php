@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<section class="services p-0">
    <div class="container-fluid pl-0 pr-0">
        <div class="col-lg-12">
            <div class="row">
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="container p-0">
                        <?php
                            $categories = DB::table('categories')->where('status', 1)->get();
                        ?>
                        <ul class="list-group text-left">
                            @foreach($categories as $c)
                            <li class="list-group-item p-2"><img src="{{  URL::asset('categoryIcon/' . $c->category_icon) }}" alt="" width="25px">&nbsp;&nbsp;&nbsp;<a href="#">{{ $c->category_name }}<i class="fa fa-angle-double-right float-right" aria-hidden="true"></i></a></li>
                            <div class="clearfix"></div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pt-4 pb-4">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ url('/product_detail') }}">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body p-0">
                            <p class="card-text p-0 m-0 text-center">Maruti Suzuki MG Motor</p>
                            <p class="card-text p-0 m-0 text-center text-danger">Rs. 50000</p>
                            <p class="card-text p-0 m-0 text-center">70.000 km / Diesel</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" style="width: 18rem;">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        <div class="card-body p-0">
                            <p class="card-text p-0 m-0 text-center">Maruti Suzuki MG Motor</p>
                            <p class="card-text p-0 m-0 text-center text-danger">Rs. 50000</p>
                            <p class="card-text p-0 m-0 text-center">70.000 km / Diesel</p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="card" style="width: 18rem;">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        <div class="card-body p-0">
                            <p class="card-text p-0 m-0 text-center">Maruti Suzuki MG Motor</p>
                            <p class="card-text p-0 m-0 text-center text-danger">Rs. 50000</p>
                            <p class="card-text p-0 m-0 text-center">70.000 km / Diesel</p>
                        </div>
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