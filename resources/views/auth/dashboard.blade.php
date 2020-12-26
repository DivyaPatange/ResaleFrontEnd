@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<section class="services p-0">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
            <div class="col-lg-4">
                <div class="icon-box">
                    <div id="accordion">
                        <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <!-- <i class="bx bx-chevron-right"></i> -->
                            <img src="assets/img/military-jeep (1).png" alt="" class="img-fluid" class="card-img-top" alt="...">
                            Collapsible Group Item #1
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">First item</li>
                                <li class="list-group-item">Second item</li>
                                <li class="list-group-item">Third item</li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Collapsible Group Item #2
                        </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                        </div>
                        <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            Collapsible Group Item #3
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ url('/product_detail') }}">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body p-2">
                        <p><a href="" class="text-center">Maruti Suzuki MG Motor.</a><p>
                        <p class="card-text p-0 m-0 text-center">Rs. 50000</p>
                            <p class="card-text p-0 m-0 text-center">70.000 km / Diesel</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" style="width: 18rem;">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                        <p><a href="" class="text-center">Maruti Suzuki MG Motor.</a><p>
                        <p class="card-text p-0 m-0 text-center">Rs. 50000</p>
                            <p class="card-text p-0 m-0 text-center">70.000 km / Diesel</p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="card" style="width: 18rem;">
                        <img src="assets/img/blog-post-3.jpg" alt="" class="img-fluid" class="card-img-top" alt="...">
                        <div class="card-body p-2">
                        <p><a href="" class="text-center">Maruti Suzuki MG Motor.</a><p>
                        <p class="card-text p-0 m-0 text-center">Rs. 50000</p>
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