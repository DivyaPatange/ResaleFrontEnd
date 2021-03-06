@extends('auth.auth_layout.main')
@section('title', 'Property Sale Post')
@section('customcss')
<style>
    .owl-carousel .owl-item img{
        display: initial;
       width: unset;
    }
    h1,h2,h3,h4,h5,h6{
        font-family: 'Ionicons';
    }
    .table td, .table th {
    
    border-top: 0px solid #dee2e6;
    }
    .btn{
        padding: 10px 30px 10px 30px;
        float: right;
    }
</style>
@endsection
@section('content')
<main id="main">
  <!-- ======= Property Single ======= -->
  <section class="property-single nav-arrow-b section-property section-t8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h2 class="title-d">@if($singlePost->project_name){{ $singlePost->project_name }} @endif </h2>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8  section-md-t3">
                        <?php
                            $photos = $singlePost->exterior_photos;
                            $explodePhotos = explode(",", $photos);
                            $living = $singlePost->living_room_photos;
                            $explodeLiving = explode(",", $living);
                            // dd($explodeLiving);

                            $bedroom = $singlePost->bedroom_photos;
                            $explodeBedroom = explode(",", $bedroom);

                            $bathroom = $singlePost->bathroom_photos;
                            $explodeBathroom = explode(",", $bathroom);

                            $kitchen = $singlePost->kitchen_photos;
                            $explodeKitchen = explode(",", $kitchen);
                        ?>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Exterior ({{ count($explodePhotos) }})</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Living Room ( @if(!empty($explodeLiving)){{ count($explodeLiving) }}@endif)</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Bedroom ({{ count($explodeBedroom) }})</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3">Washroom ({{ count($explodeBathroom) }})</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu4">Kitchen ({{ count($explodeKitchen) }})</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane container active">
                                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @for($i= 0; $i < count($explodePhotos); $i++)
                                        <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                            <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                        </div>
                                        @endfor
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane container fade">
                                <div id="myCarousel1" class="carousel slide" data-interval="3000" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel1" data-slide-to="1"></li>
                                        <li data-target="#myCarousel1" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @for($i= 0; $i < count($explodeLiving); $i++)
                                        <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                            <img src="{{  URL::asset('adPhotos/' . $explodeLiving[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                        </div>
                                        @endfor
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel1" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel1" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane container fade">
                                <div id="myCarousel2" class="carousel slide" data-interval="3000" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel2" data-slide-to="1"></li>
                                        <li data-target="#myCarousel2" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @for($i= 0; $i < count($explodeBedroom); $i++)
                                        <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                            <img src="{{  URL::asset('adPhotos/' . $explodeBedroom[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                        </div>
                                        @endfor
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel2" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel2" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane container fade">
                                <div id="myCarousel3" class="carousel slide" data-interval="3000" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel3" data-slide-to="1"></li>
                                        <li data-target="#myCarousel3" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @for($i= 0; $i < count($explodeBathroom); $i++)
                                        <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                            <img src="{{  URL::asset('adPhotos/' . $explodeBathroom[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                        </div>
                                        @endfor
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel3" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel3" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="menu4" class="tab-pane container fade">
                                <div id="myCarousel4" class="carousel slide" data-interval="3000" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel4" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel4" data-slide-to="1"></li>
                                        <li data-target="#myCarousel4" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @for($i= 0; $i < count($explodeKitchen); $i++)
                                        <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                            <img src="{{  URL::asset('adPhotos/' . $explodeKitchen[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                        </div>
                                        @endfor
                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel4" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel4" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="container">
                            <h2 class="mt-3">Property Details</h2>
                            <div class="row">
                                @if($singlePost->bedroom)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Bedrooms</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->bedroom }}</p>
                                </div>
                                @endif
                                @if($singlePost->balcony)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Balcony</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->balcony }}</p>
                                </div>
                                @endif
                                @if($singlePost->bathroom)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Bathrooms</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->bathroom }}</p>
                                </div>
                                @endif
                                @if($singlePost->add_rooms)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Additional Rooms</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->add_rooms }}</p>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                @if($singlePost->super_area)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Super Build-Up Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->super_area }} {{ $singlePost->super_area_unit }}</p>
                                </div>
                                @endif
                                @if($singlePost->carpet_area)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Carpet Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->carpet_area }} {{ $singlePost->carpet_unit }}</p>
                                </div>
                                @endif
                                @if($singlePost->build_up_area)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Build Up Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->build_up_area }} {{ $singlePost->build_unit }}</p>
                                </div>
                                @endif
                                @if($singlePost->covered_area)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Covered Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->covered_area }} {{ $singlePost->covered_unit }}</p>
                                </div>
                                @endif
                                @if($singlePost->plot_area)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Plot Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->plot_area }} {{ $singlePost->plot_unit }}</p>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                @if($singlePost->possess_status)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Status</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->possess_status }}</p>
                                </div>
                                @endif
                                @if($singlePost->transaction_type)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Transaction Type</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->transaction_type }}</p>
                                </div>
                                @endif
                                @if($singlePost->floor_no)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Floor</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->floor_no }} (Out Of {{ $singlePost->total_floor }})</p>
                                </div>
                                @endif
                                @if($singlePost->car_parking)
                                <div class="col-md-3">
                                    <p class="text-muted mb-0" style="font-size:14px;">Car Parking</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->car_parking }}</p>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>Property Specification</b></p>
                                </div>
                            </div>
                            @if($singlePost->total_price)
                            <div class="row">
                                <div class="col-md-3">Total Price</div>
                                <div class="col-md-9">&#8377; {{ $singlePost->total_price }} @if($singlePost->price_per_sq_ft)| &#8377; {{ $singlePost->price_per_sq_ft }} / Sq-ft @endif</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->booking_token_amt)
                            <div class="row">
                                <div class="col-md-3">Booking Amount</div>
                                <div class="col-md-9">&#8377; {{ $singlePost->booking_token_amt }}</div>
                            </div>
                            <hr>
                            @endif
                            <div class="row">
                                <div class="col-md-3">Facilities</div>
                                <div class="col-md-9">@if($singlePost->status_of_water){{ $singlePost->status_of_water }} Water Supply @endif @if($singlePost->status_of_electricity), {{ $singlePost->status_of_electricity }} @endif @if($singlePost->personal_washroom == "Yes"), Personal Washroom @endif @if($singlePost->main_road_facing == "Yes"), Main Road Facing @endif @if($singlePost->pantry_cafe), {{ $singlePost->pantry_cafe }} Pantry Cafe @endif</div>
                            </div>
                            <hr>
                            @if($singlePost->address)
                            <div class="row">
                                <div class="col-md-3">Address</div>
                                <div class="col-md-9">{{ $singlePost->address }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->locality)
                            <div class="row">
                                <div class="col-md-3">Locality</div>
                                <div class="col-md-9">{{ $singlePost->locality }}</div>
                                @endif
                            </div>
                            <hr>
                            @if($singlePost->overlooking)
                            <div class="row">
                                <div class="col-md-3">Overlooking</div>
                                <div class="col-md-9">{{ $singlePost->overlooking }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->flooring)
                            <div class="row">
                                <div class="col-md-3">Flooring</div>
                                <div class="col-md-9">{{ $singlePost->flooring }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->age_of_construction)
                            <div class="row">
                                <div class="col-md-3">Age of Construction</div>
                                <div class="col-md-9">{{ $singlePost->age_of_construction }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->furnishing)
                            <div class="row">
                                <div class="col-md-3">Furnishing</div>
                                <div class="col-md-9">{{ $singlePost->furnishing }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->ownership_approval)
                            <div class="row">
                                <div class="col-md-3">Type of Ownership</div>
                                <div class="col-md-9">{{ $singlePost->ownership_approval }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->aminities)
                            <div class="row">
                                <div class="col-md-3">Amenities</div>
                                <div class="col-md-9">{{ $singlePost->aminities }}</div>
                            </div>
                            <hr>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 section-md-t3">
                        <div class="property-summary">
                            <div class="card">
                                <div class="card-body">
                                    @if($singlePost->type_id)
                                        <?php
                                            $type = DB::table('types')->where('id', $singlePost->type_id)->first();
                                        ?>
                                        {{ $type->type_name }}
                                    @endif
                                    <h2><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</h2>
                                    <p>Price : @if($singlePost->show_price_as){{ $singlePost->show_price_as }}@endif</p>
                                    <button type="button" class="btn btn-primary">Call</button>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="property-description">
                                        <h2 class="title-d mb-5">Description</h2>
                                        <p class="description color-text-a">
                                        {!! $singlePost->description !!}
                                        </p>
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
  </section><!-- End Property Single-->

</main><!-- End #main -->

@endsection
@section('customjs')

@endsection