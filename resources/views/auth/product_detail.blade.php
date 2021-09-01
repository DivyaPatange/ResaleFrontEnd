@extends('auth.auth_layout.main')
@section('title', 'Car Post')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->     
@section('customcss')
<style>
.myimg{
  height:180px;   
}
.blog_section .blog_content .blog_item .blog_image span i {
  position: absolute;
  z-index: 2;
  color: #fff;
  font-size: 18px;
  width: 38px;
  height: 45px;
  padding-top: 7px;
  text-align: center;
  right: 20px;
  top: 0;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
  background-color: #ff5e14;
}

.blog_section .blog_content .owl-nav {
  display: block;
}

.blog_section .blog_content .owl-nav .owl-prev {
  position: absolute;
  left: -45px;
  top: 22%;
  border: 5px solid #fff;
  text-align: center;
  z-index: 5;
  width: 40px;
  height: 116px;
  /*border-radius: 50%;*/
  outline: 0;
  background: #ff5e14;
  transition: all 0.3s;
  color: #fff;
}

.blog_section .blog_content .owl-nav .owl-prev span {
  font-size: 60px;
  margin-top: -6px;
  display: inline-block;
}

.blog_section .blog_content .owl-nav .owl-prev:hover {
  background: #fff;
  border-color: #ff5e14;
  color: #ff5e14;
}

.blog_section .blog_content .owl-nav .owl-next {
  position: absolute;
  right: -44px;
  top: 22%;
  border: 5px solid #fff;
  text-align: center;
  z-index: 5;
  width: 40px;
  height: 116px;
  /*border-radius: 50%;*/
  outline: 0;
  background: #ff5e14;
  color: #fff;
  transition: all 0.3s;
}

.blog_section .blog_content .owl-nav .owl-next span {
  font-size: 60px;
  margin-top: -6px;
  display: inline-block;
}

.blog_section .blog_content .owl-nav .owl-next:hover {
  background: #fff;
  border-color: #ff5e14;
  color: #ff5e14;
}

@media only screen and (max-width: 577px) {
  .blog_section .owl-nav .owl-prev {
    left: -17px !important;
  }
  .blog_section .owl-nav .owl-next {
    right: -17px !important;
  }
}
</style>

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
.card {
  border: 3px solid rgba(0,0,0,.125);
  border-radius: 20px;
  
}
h4{
  height:30px;
}

@media (min-width: 576px) {
	.modal-dialog {
		max-width: 400px;
	}
	.modal-dialog .modal-content {
		padding: 1rem;
	}
}
.modal-header .close {
	margin-top: -1.5rem;
}
.form-title {
	margin: -2rem 0rem 2rem;
}
.btn-round {
	border-radius: 3rem;
}
.delimiter {
	padding: 1rem;
}
.social-buttons .btn {
	margin: 0 0.5rem 1rem;
}
.signup-section {
	padding: 0.3rem 0rem;
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
              <div class="title-box-d pt-3 pb-1 mb-0">
                <h2 class="title-d ml-4">{{ $singlePost->ad_title }}</h2>
              </div>
            </div>
          </div>
          <div class="row m-3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
            <div class="col-md-7  section-md-t3 mt-3 mb-3">
              <div id="property-single-carousel" class="owl-carousel owl-arrow ">
                <?php
                  $photos = $singlePost->photos;
                  $explodePhotos = explode(",", $photos);
                  // dd($explodePhotos);
                ?>
                @for($i= 0; $i < count($explodePhotos); $i++)
                  <div class="carousel-item-b" style="height: 450px;width: 100%;text-align: center;background-color: whitesmoke;">
                    <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="" style="max-height: 450px;max-width: 100%; position: absolute; margin: auto; top: 0; left: 0; right: 0; bottom: 0;">
                  </div>
                @endfor
              </div>              
            </div>
            <div class="col-md-5 section-md-t3 mt-4">
              <div class="property-summary">
                <div class="card m-0" style="height:200px;font-size: 13px">
                  <div class="card-body">
                    <p class="float-right text-info"><i class='far fa-calendar-alt text-danger pr-2'></i>{{ date('j F',strtotime($singlePost->created_at)) }}</p>
                    <h2><b><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</b></h2>
                    <p>&nbsp;&nbsp;
                      <span style="font-size:18px;">
                        @if($singlePost->brand_id)
                          <?php
                            $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                          ?>
                          @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                        @endif     
                        @if($singlePost->model_id)
                          <?php
                            $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                          ?>
                          {{ $modelName->model_name }}
                        @endif  
                        @if($singlePost->car_varient)
                          <?php
                            $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                          ?>
                          {{ $varients->car_varient }}
                        @endif
                        @if($singlePost->colour)
                          {{ $singlePost->colour }}
                        @endif
                      </span>
                      <br>
                      <span style="font-size:15px;">
                        <i class="fa fa-road text-danger p-2"></i>{{ $singlePost->year_of_registration }}&nbsp;&nbsp;<i class="fa fa-dashboard text-danger p-2"></i>{{ $singlePost->kms_driven }}&nbsp;&nbsp;KMS <i class='fas fa-gas-pump text-danger p-2'></i>{{ $singlePost->fuel_type }}<br>        
                        <p  class="float-right text-info"><i class="fa fa-map-marker text-danger p-2"></i>
                        @if($singlePost->city_id)
                          <?php
                            $city = DB::table('cities')->where('id', $singlePost->city_id)->first();
                          ?>
                          {{ $city->city_name }}
                        @endif,
                        @if($singlePost->state_id)
                          <?php
                            $stat = DB::table('states')->where('id', $singlePost->state_id)->first();
                          ?>
                          {{ $stat->state_name }}
                        @endif
                      </span>
                    </p>
                    <br>
                    @if($singlePost->accessory_type) 
                      <?php
                        $type = DB::table('types')->where('id', $singlePost->accessory_type)->first();
                      ?>
                      {{ $type->type_name }}</p>
                    @endif
                  </div>
                </div>
                <div class="card mt-3" style="height:227px">
                  <div class="card-body">
                    <div class="property-description text-center">
                      <h4 class="title-d mb-5 ">
                        <img src="{{asset('assets/img/user.png') }}" class="" style="width:40px">
                        Seller description &nbsp;&nbsp;&nbsp;
                        <i class='far fa-arrow-alt-circle-right mt-1' style='font-size:25px'></i>
                      </h4>
                      <div class="d-flex justify-content-center">
                        @guest
                          @if(Route::has('login'))
                          <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
                            Show Number
                          </button>
                          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header border-bottom-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-title text-center">
                                  <h4>Login</h4>
                                </div>
                                <div class="d-flex flex-column text-center">
                                  <form method="POST">
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="name"placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                      <input type="number" class="form-control" id="mobile_no" placeholder="Your Mobile No.">
                                    </div>
                                    <button type="button" class="btn btn-info btn-block btn-round">Login</button>
                                  </form>         
                                  <div class="text-center text-muted delimiter">or use a social network</div>
                                  <div class="d-flex justify-content-center social-buttons">
                                    <a href="{{ url('auth/google') }}">
                                      <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Google">
                                        <i class="fab fa-google"></i>
                                      </button>
                                    </a>
                                    <a href="{{ url('auth/facebook') }}">
                                      <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                      </button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
                            </div>
                          </div>
                        </div>
                          @endif
                        @else
                        <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#authModal">
                          Show Number
                        </button>
                        <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header border-bottom-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-title text-center">
                                  <h4>User Details</h4>
                                </div>
                                <div class="d-flex flex-column text-center">
                                  <form method="POST">
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="name"placeholder="Your Name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                      <input type="email" class="form-control" id="email" placeholder="Your Email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                      <input type="number" class="form-control" id="mobile_no" placeholder="Your Mobile No." value="{{ Auth::user()->mobile_no }}">
                                    </div>
                                    <button type="button" class="btn btn-info btn-block btn-round">Save</button>
                                  </form>    
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
                            </div>
                          </div>
                        </div>
                        @endguest
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid p-0">
            <div class="row m-3">
              <div class="col-md-8  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                <h4 class="mb-2 pt-2">Product Details</h4>
                <div class="row">
                  <div class="col-md-6" style="border-right: 1px solid #80808040">
                    <table class="table table-responsive">
                      <tbody style="font-size: 13px;">
                        <tr>
                          <td>Brand Name</td>
                          <th>
                            @if($singlePost->brand_id)
                              <?php
                                $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                              ?>       
                              @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                            @endif
                          </th>
                        </tr>
                        <tr>
                          <td>Model Name</td>
                          <th>  
                            @if($singlePost->model_id)
                              <?php
                                $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                              ?>
                              {{ $modelName->model_name }}
                            @endif
                          </th>
                        </tr>
                        <tr>
                          <td>Car varient</td>
                          <th>
                            @if($singlePost->car_varient)
                              <?php
                                $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                              ?>
                              {{ $varients->car_varient }}
                            @endif
                          </th>
                        </tr>
                        <tr>
                          <td>Year of Registration</td>
                          <th>
                            @if($singlePost->year_of_registration)
                              {{ $singlePost->year_of_registration }}
                            @endif
                          </th> 
                        </tr>
                        <tr>
                          <td>No. of Owners</td>
                          <th>
                            @if($singlePost->no_of_owners)
                              {{ $singlePost->no_of_owners }}
                            @endif
                          </th>  
                        </tr>
                        <tr></tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-responsive">
                      <tbody style="font-size: 13px;">
                        <tr>
                          <td>Fuel Type</td>
                          <th>
                            @if($singlePost->fuel_type)
                              {{ $singlePost->fuel_type }}
                            @endif
                          </th> 
                        </tr>
                        <tr>
                          <td>Transmission</td>
                          <th>
                            @if($singlePost->transmission)
                              {{ $singlePost->transmission }}
                            @endif
                          </th>
                        </tr>
                        <tr>
                          <td>KMS Driven</td>
                          <th>
                            @if($singlePost->kms_driven)
                              {{ $singlePost->kms_driven }}
                            @endif
                          </th>
                        </tr>
                        <tr> 
                          <td>Colour</td>
                          <th>
                            @if($singlePost->colour)
                              {{ $singlePost->colour }}
                            @endif
                          </th>
                        </tr>
                        <tr>
                          <td>Insurance</td>
                          <th>
                            @if($singlePost->insurance)
                              {{ $singlePost->insurance }}
                            @endif
                          </th>  
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div style="font-size: 13px;border-top: 1px solid rgba(0,0,0,.125);">
                  <h4 class="title-d pt-2">Description</h4>
                  <p class="description color-text-a">
                    {!! $singlePost->description !!}
                  </p>
                </div>   
              </div>
              <div class="col-md-4  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                Ad Position Location
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog_section ml-4 mr-4" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
    <div class="container"> 
      <h4 class="pt-2">Similar Ads</h4>
      <div class="blog_content mb-3">
        <div class="owl-carousel owl-theme">
          <?php
            $cars = DB::table('cars')->where('price', '<=', $singlePost->price)->where('city_id', $singlePost->city_id)->get();            
          ?> 
          <?php
            $cars1 = DB::table('cars')->where('price', '<=', $singlePost->price)->where('city_id', $singlePost->city_id)->where('state_id', $singlePost->state_id)->get(); 
          ?> 
          <?php
            $mycars = DB::table('cars')->get();    
          ?>
          @if(count($cars) >= 4)
            @foreach($cars as $car)
              <?php
                $carPhoto = explode(",", $car->photos);
              ?> 
              <div class="card border-secondary text-center p-2">
                <a href="{{ route('car.post.ad', $car->id) }}" target="_blank">
                  <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                  <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                    <span class="float-right">{{ date('j F',strtotime($car->created_at)) }}</span>
                    <span style="font-size:14px;font-weight: bold;">
                      <i class="fa fa-inr"></i>&nbsp;{{ $car->price }}
                    </span>
                    <br>
                    @if($car->brand_id)
                      <?php
                        $brand = DB::table('brands')->where('id', $car->brand_id)->first();
                      ?>
                      @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                    @endif
                    @if($car->model_id)
                      <?php
                        $modelName = DB::table('models')->where('id', $car->model_id)->first();
                      ?>
                      {{ $modelName->model_name }}
                    @endif
                    <br>
                    {{ $car->year_of_registration }}&nbsp;&nbsp;|
                    {{ $car-> kms_driven }}  KM &nbsp;&nbsp;|
                    {{ $car->fuel_type }}
                    <br>   
                    <span class="float-right pt-2">
                      @if($car->city_id)
                        <?php
                          $city = DB::table('cities')->where('id', $car->city_id)->first();
                        ?>
                        {{ $city->city_name }}
                      @endif ,
                      @if($car->state_id)
                        <?php
                          $stat = DB::table('states')->where('id', $car->state_id)->first();
                        ?>
                        {{ $stat->state_name }}
                      @endif 
                    </span>
                  </p>
                </a>
              </div>                        
            @endforeach 
            @elseif(count($cars1)>= 4)
              @foreach($cars1 as $car1)
                <?php
                  $carPhoto = explode(",", $car1->photos);
                ?> 
                <div class="card border-secondary text-center p-2">
                  <a href="{{ route('car.post.ad', $car1->id) }}" target="_blank">
                    <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                    <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                      <span class="float-right">{{ date('j F',strtotime($car1->created_at)) }}</span>
                      <span style="font-size:14px;font-weight: bold;">
                        <i class="fa fa-inr"></i>&nbsp;{{ $car1->price }}
                      </span>
                      <br>
                      @if($car1->brand_id)
                        <?php
                          $brand = DB::table('brands')->where('id', $car1->brand_id)->first();
                        ?>
                        @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                      @endif
                      @if($car1->model_id)
                        <?php
                          $modelName = DB::table('models')->where('id', $car1->model_id)->first();
                        ?>
                        {{ $modelName->model_name }}
                      @endif
                      <br>
                      {{ $car1->year_of_registration }}&nbsp;&nbsp;|
                      {{ $car1-> kms_driven }}  KM &nbsp;&nbsp;|
                      {{ $car1->fuel_type }}
                      <br>
                      <span class="float-right pt-2">
                        @if($car1->city_id)
                          <?php
                            $city = DB::table('cities')->where('id', $car1->city_id)->first();
                          ?>
                          {{ $city->city_name }}
                        @endif ,
                        @if($car1->state_id)
                          <?php
                            $stat = DB::table('states')->where('id', $car1->state_id)->first();
                          ?>
                          {{ $stat->state_name }}
                        @endif
                      </span>
                    </p>
                  </a>
                </div>                        
              @endforeach 
            @else
              @foreach($mycars as $cars)
                <?php
                  $carPhoto = explode(",", $cars->photos);
                ?> 
                <div class="card border-secondary text-center p-2">
                  <a href="{{ route('car.post.ad', $cars->id) }}" target="_blank">
                    <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                    <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                      <span class="float-right">{{ date('j F',strtotime($cars->created_at)) }}</span>
                      <span style="font-size:14px;font-weight: bold;">
                        <i class="fa fa-inr"></i>&nbsp;{{ $cars->price }}
                      </span>
                      <br>
                      @if($cars->brand_id)
                        <?php
                          $brand = DB::table('brands')->where('id', $cars->brand_id)->first();
                        ?>
                        @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                      @endif
                      @if($cars->model_id)
                        <?php
                          $modelName = DB::table('models')->where('id', $cars->model_id)->first();
                        ?>
                        {{ $modelName->model_name }}
                      @endif
                      <br>
                      {{ $cars->year_of_registration }}&nbsp;&nbsp;|
                      {{ $cars-> kms_driven }}  KM &nbsp;&nbsp;|
                      {{ $cars->fuel_type }}
                      <br>
                      <span class="float-right pt-2">
                        @if($cars->city_id)
                          <?php
                            $city = DB::table('cities')->where('id', $cars->city_id)->first();
                          ?>
                          {{ $city->city_name }}
                        @endif ,
                        @if($cars->state_id)
                          <?php
                            $stat = DB::table('states')->where('id', $cars->state_id)->first();
                          ?>
                          {{ $stat->state_name }}
                        @endif
                      </span>
                    </p>
                  </a>
                </div>                        
              @endforeach 
            @endif                  
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog_section m-4" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;height:300px;">
    <div class="container">
      <h4 class="pt-2">Ad Position</h4>
      <div class="blog_content mb-3">
        
      </div>  
    </div>
  </section>
</main>
<!-- End #main -->

@endsection
@section('customjs')
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:true,   
    smartSpeed: 3000, 
    autoplayTimeout:7000,
    // autoplay:false,
    // autoplayTimeout:5000,
    // autoplayHoverPause:false,
    responsive:{
        0:{
            items:4
        }
        // 600:{
        //     items:2
        // },
        // 1000:{
        //     items:3
        // }
        
    }
})


</script>
 <!-- Jquery -->
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <!-- carousel -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
@endsection@extends('auth.auth_layout.main')
@section('title', 'Car Post')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

       
@section('customcss')
<style>


.myimg{
    height:180px;
   
   
}
.blog_section .blog_content .blog_item .blog_image span i {
  position: absolute;
  z-index: 2;
  color: #fff;
  font-size: 18px;
  width: 38px;
  height: 45px;
  padding-top: 7px;
  text-align: center;
  right: 20px;
  top: 0;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
  background-color: #ff5e14;
}






.blog_section .blog_content .owl-nav {
  display: block;
}
.blog_section .blog_content .owl-nav .owl-prev {
  position: absolute;
  left: -45px;
  top: 22%;
  border: 5px solid #fff;
  text-align: center;
  z-index: 5;
  width: 40px;
  height: 116px;
  /*border-radius: 50%;*/
  outline: 0;
  background: #ff5e14;
  transition: all 0.3s;
  color: #fff;
}



.blog_section .blog_content .owl-nav .owl-prev span {
  font-size: 60px;
  margin-top: -6px;
  display: inline-block;
}
.blog_section .blog_content .owl-nav .owl-prev:hover {
  background: #fff;
  border-color: #ff5e14;
  color: #ff5e14;
}

.blog_section .blog_content .owl-nav .owl-next {
    position: absolute;
    right: -44px;
    top: 22%;
    border: 5px solid #fff;
    text-align: center;
    z-index: 5;
    width: 40px;
    height: 116px;
    /*border-radius: 50%;*/
    outline: 0;
    background: #ff5e14;
    color: #fff;
    transition: all 0.3s;
}
.blog_section .blog_content .owl-nav .owl-next span {
  font-size: 60px;
  margin-top: -6px;
  display: inline-block;
}
.blog_section .blog_content .owl-nav .owl-next:hover {
  background: #fff;
  border-color: #ff5e14;
  color: #ff5e14;
}

@media only screen and (max-width: 577px) {
  .blog_section .owl-nav .owl-prev {
    left: -17px !important;
  }
  .blog_section .owl-nav .owl-next {
    right: -17px !important;
  }
}
</style>

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
    .card {
        border: 3px solid rgba(0,0,0,.125);
        border-radius: 20px;
        
   }
   h4{
       height:30px;
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
                      <div class="title-box-d pt-3 pb-1 mb-0">
                        <h2 class="title-d ml-4">{{ $singlePost->ad_title }}</h2>
                      </div>
                    </div>
                </div>
                <div class="row m-3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                    <div class="col-md-7  section-md-t3 mt-3 mb-3">
                        <div id="property-single-carousel" class="owl-carousel owl-arrow ">
                          <?php
                              $photos = $singlePost->photos;
                              $explodePhotos = explode(",", $photos);
                              // dd($explodePhotos);
                            ?>
                            @for($i= 0; $i < count($explodePhotos); $i++)
                              <div class="carousel-item-b" style="height: 450px;width: 100%;text-align: center;background-color: whitesmoke;">
                                <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="" style="max-height: 450px;max-width: 100%; position: absolute; margin: auto; top: 0; left: 0; right: 0; bottom: 0;">
                              </div>
                            @endfor
                        </div>
                       
                    </div>
                    <div class="col-md-5 section-md-t3 mt-4">
                    <div class="property-summary">
                    <div class="card m-0" style="height:200px;font-size: 13px">
                        <div class="card-body">
                             <p class="float-right text-info"><i class='far fa-calendar-alt text-danger pr-2'></i>{{ date('j F',strtotime($singlePost->created_at)) }}</p>
                             <h2><b><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</b></h2>
                            
                             <p>&nbsp;&nbsp;
                             <span style="font-size:18px;">
                            @if($singlePost->brand_id)
                   
                                  <?php
                                    $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                                  ?>
                                  
                                     @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                            @endif
                                
                            @if($singlePost->model_id)
                    
                                  <?php
                                    $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                                  ?>
                                    {{ $modelName->model_name }}
                            @endif
                            
                            @if($singlePost->car_varient)
                    
                                  <?php
                                    $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                                  ?>
                                    {{ $varients->car_varient }}
                            @endif
                            
                            @if($singlePost->colour)
                    
                            {{ $singlePost->colour }}
                            @endif
                            </span>
                            <br>
                            <span style="font-size:15px;">
                              <i class="fa fa-road text-danger p-2"></i>{{ $singlePost->year_of_registration }}&nbsp;&nbsp;<i class="fa fa-dashboard text-danger p-2"></i>{{ $singlePost->kms_driven }}&nbsp;&nbsp;KMS <i class='fas fa-gas-pump text-danger p-2'></i>{{ $singlePost->fuel_type }}<br>
                             
                               
                              <p  class="float-right text-info"><i class="fa fa-map-marker text-danger p-2"></i>
                              @if($singlePost->city_id)
                    
                                  <?php
                                    $city = DB::table('cities')->where('id', $singlePost->city_id)->first();
                                  ?>
                                    {{ $city->city_name }}
                            @endif
                            ,
                             @if($singlePost->state_id)
                    
                                  <?php
                                    $stat = DB::table('states')->where('id', $singlePost->state_id)->first();
                                  ?>
                                    {{ $stat->state_name }}
                            @endif
                            </span>
                            </p>
                              <br>
                           
                                @if($singlePost->accessory_type)  
                                    
                                    <?php
                                        $type = DB::table('types')->where('id', $singlePost->accessory_type)->first();
                                    ?>
                                      {{ $type->type_name }}</p>
                                @endif
                           
                           <!--<button type="button" class="btn btn-primary">Call</button>-->
                        </div>
                    </div>
                    <div class="card mt-3" style="height:227px">
                        <div class="card-body">
                            <div class="property-description text-center">
                                 
                                <h4 class="title-d mb-5 ">
                                    <img src="{{asset('assets/img/user.png') }}" class="" style="width:40px">
                                    Seller description &nbsp;&nbsp;&nbsp;
                                    <i class='far fa-arrow-alt-circle-right mt-1' style='font-size:25px'></i>
                                </h4>
                                <div>
                                    <i class="fa fa-phone"></i><span>*** *** </span> <a href="@guest @if(Route::has('login')) {{ route('login') }} @endif @endguest">show number</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
                </div>
                </div>
                </div>
                <div class="container-fluid p-0">
                    <div class="row m-3">
                        <div class="col-md-8  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                            <h4 class="mb-2 pt-2">Product Details</h4>
                            <div class="row">
                                <div class="col-md-6" style="border-right: 1px solid #80808040">
                                    <table class="table table-responsive">
                        <tbody style="font-size: 13px;">
                          <tr>
                            <td>Brand Name</td>
                            <th>
                                @if($singlePost->brand_id)
                   
                                  <?php
                                    $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                                  ?>
                                  
                                     @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                @endif
                                
                            </th>
                            
                          </tr>
                          <tr>
                            <td>Model Name</td>
                            <th>
                                @if($singlePost->model_id)
                    
                                  <?php
                                    $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                                  ?>
                                     {{ $modelName->model_name }}
                                @endif
                            </th>
                            </tr>
                            <tr>
                                <td>Car varient</td>
                                  <th>
                                    @if($singlePost->car_varient)
        
                                          <?php
                                            $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                                          ?>
                                            {{ $varients->car_varient }}
                                    @endif
                
                                 
                                  </th>
                            </tr>
                          <tr>
                            <td>Year of Registration</td>
                            <th>
                            @if($singlePost->year_of_registration)
                    
                                {{ $singlePost->year_of_registration }}
                    
                            @endif
                            </th>
                           
                          </tr>
                          <tr>
                              <td>No. of Owners</td>
                              <th>
                              @if($singlePost->no_of_owners)
                    
                                {{ $singlePost->no_of_owners }}
                               @endif
                              </th>
                              
                          </tr>
                          <tr>
                              
                          </tr>
                        </tbody>
                      </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-responsive">
                                        <tbody style="font-size: 13px;">
                                          <tr>
                                            <td>Fuel Type</td>
                                            <th>
                                            @if($singlePost->fuel_type)
                                    
                                                {{ $singlePost->fuel_type }}
                                            @endif
                                            </th>
                                            
                                          </tr>
                                          <tr>
                                            
                                            <td>Transmission</td>
                                            <th>
                                            @if($singlePost->transmission)
                                    
                                                {{ $singlePost->transmission }}
                                      
                                            @endif
                                            </th>
                                          </tr>
                                          <tr>
                                          
                                            <td>KMS Driven</td>
                                            <th>
                                            @if($singlePost->kms_driven)
                                    
                                                {{ $singlePost->kms_driven }}
                                            @endif
                                            </th>
                                          </tr>
                                          <tr>
                                              
                                              <td>Colour</td>
                                              <th>
                                              @if($singlePost->colour)
                                    
                                                {{ $singlePost->colour }}
                                              @endif
                                              </th>
                                          </tr>
                                        <tr>
                                            <td>Insurance</td>
                                              <th>
                                                @if($singlePost->insurance)
                                    
                                                    {{ $singlePost->insurance }}
                                                @endif
                                              </th>
                                              
                                              
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="font-size: 13px;border-top: 1px solid rgba(0,0,0,.125);">
                                <h4 class="title-d pt-2">Description</h4>
                                <p class="description color-text-a">
                                  {!! $singlePost->description !!}
                                </p>
                            </div>   
                        </div>
                        <div class="col-md-4  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                            Ad Position Location
                        </div>
                        
                      
                    </div>
                </div>
            </div>
          </div>
      </div>
    </section>
   
    <section class="blog_section ml-4 mr-4" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
            <div class="container">
                
                <h4 class="pt-2">Similar Ads</h4>
                <div class="blog_content mb-3">
                  
                      <div class="owl-carousel owl-theme">
                              <?php
                                $cars = DB::table('cars')->where('price', '<=', $singlePost->price)->where('city_id', $singlePost->city_id)->get(); 
                                
                              ?> 

                              <?php
                                $cars1 = DB::table('cars')->where('price', '<=', $singlePost->price)->where('city_id', $singlePost->city_id)->where('state_id', $singlePost->state_id)->get(); 
                              
                              ?> 

                              <?php
                                $mycars = DB::table('cars')->get(); 
                                
                              ?>
                              @if(count($cars) >= 4)
                              @foreach($cars as $car)
                              <?php
                                $carPhoto = explode(",", $car->photos);
                                // dd($carPhoto);
                              ?> 
                          
                            <div class="card border-secondary text-center p-2">
                              <a href="{{ route('car.post.ad', $car->id) }}" target="_blank">
                              
                                  <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                                  
                                  <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                      <span class="float-right">{{ date('j F',strtotime($car->created_at)) }}</span>
                                      <span style="font-size:14px;font-weight: bold;">
                                          <i class="fa fa-inr"></i>&nbsp;{{ $car->price }}</span>
                                    <br>
                                      @if($car->brand_id)
                                          <?php
                                              $brand = DB::table('brands')->where('id', $car->brand_id)->first();
                                          ?>
                                          @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                      @endif
                                      @if($car->model_id)
                  
                                            <?php
                                              $modelName = DB::table('models')->where('id', $car->model_id)->first();
                                            ?>
                                              {{ $modelName->model_name }}
                                      @endif
                                      
                                      <br>
                                      {{ $car->year_of_registration }}&nbsp;&nbsp;|
                                      {{ $car-> kms_driven }}  KM &nbsp;&nbsp;|
                                      {{ $car->fuel_type }}
                                      <br>
                                    
                                    <span class="float-right pt-2">
                                      @if($car->city_id)
                  
                                            <?php
                                              $city = DB::table('cities')->where('id', $car->city_id)->first();
                                            ?>
                                              {{ $city->city_name }}
                                      @endif 
                                      ,
                                      @if($car->state_id)
                  
                                            <?php
                                              $stat = DB::table('states')->where('id', $car->state_id)->first();
                                            ?>
                                              {{ $stat->state_name }}
                                      @endif
                                      
                                    </span>
                                      
                                      
                                      
                                  </p>
                              </a>
                             
                            </div>                        
                            @endforeach 
                            
                            @elseif(count($cars1)>= 4)
                              
                              @foreach($cars1 as $car1)
                              <?php
                                $carPhoto = explode(",", $car1->photos);
                                // dd($carPhoto);
                              ?> 
                          
                            <div class="card border-secondary text-center p-2">
                              <a href="{{ route('car.post.ad', $car1->id) }}" target="_blank">
                              
                                  <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                                  
                                  <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                      <span class="float-right">{{ date('j F',strtotime($car1->created_at)) }}</span>
                                      <span style="font-size:14px;font-weight: bold;">
                                          <i class="fa fa-inr"></i>&nbsp;{{ $car1->price }}</span>
                                    <br>
                                      @if($car1->brand_id)
                                          <?php
                                              $brand = DB::table('brands')->where('id', $car1->brand_id)->first();
                                          ?>
                                          @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                      @endif
                                      @if($car1->model_id)
                  
                                            <?php
                                              $modelName = DB::table('models')->where('id', $car1->model_id)->first();
                                            ?>
                                              {{ $modelName->model_name }}
                                      @endif
                                      
                                      <br>
                                      {{ $car1->year_of_registration }}&nbsp;&nbsp;|
                                      {{ $car1-> kms_driven }}  KM &nbsp;&nbsp;|
                                      {{ $car1->fuel_type }}
                                      <br>
                                    
                                    <span class="float-right pt-2">
                                      @if($car1->city_id)
                  
                                            <?php
                                              $city = DB::table('cities')->where('id', $car1->city_id)->first();
                                            ?>
                                              {{ $city->city_name }}
                                      @endif 
                                      ,
                                      @if($car1->state_id)
                  
                                            <?php
                                              $stat = DB::table('states')->where('id', $car1->state_id)->first();
                                            ?>
                                              {{ $stat->state_name }}
                                      @endif
                                      
                                    </span>
                                      
                                      
                                      
                                  </p>
                              </a>
                             
                            </div>                        
                            @endforeach 
                            @else
                               
                              @foreach($mycars as $cars)
                              <?php
                                $carPhoto = explode(",", $cars->photos);
                                // dd($carPhoto);
                              ?> 
                          
                            <div class="card border-secondary text-center p-2">
                              <a href="{{ route('car.post.ad', $cars->id) }}" target="_blank">
                              
                                  <img class="img-fluid myimg" alt="Image Not Upload" src="{{  URL::asset('adPhotos/' . $carPhoto[0]) }}">
                                  
                                  <p class="card-text m-0 pt-2" style="font-size:12px;text-align: initial;">
                                      <span class="float-right">{{ date('j F',strtotime($cars->created_at)) }}</span>
                                      <span style="font-size:14px;font-weight: bold;">
                                          <i class="fa fa-inr"></i>&nbsp;{{ $cars->price }}</span>
                                    <br>
                                      @if($cars->brand_id)
                                          <?php
                                              $brand = DB::table('brands')->where('id', $cars->brand_id)->first();
                                          ?>
                                          @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                      @endif
                                      @if($cars->model_id)
                  
                                            <?php
                                              $modelName = DB::table('models')->where('id', $cars->model_id)->first();
                                            ?>
                                              {{ $modelName->model_name }}
                                      @endif
                                      
                                      <br>
                                      {{ $cars->year_of_registration }}&nbsp;&nbsp;|
                                      {{ $cars-> kms_driven }}  KM &nbsp;&nbsp;|
                                      {{ $cars->fuel_type }}
                                      <br>
                                    
                                    <span class="float-right pt-2">
                                      @if($cars->city_id)
                  
                                            <?php
                                              $city = DB::table('cities')->where('id', $cars->city_id)->first();
                                            ?>
                                              {{ $city->city_name }}
                                      @endif 
                                      ,
                                      @if($cars->state_id)
                  
                                            <?php
                                              $stat = DB::table('states')->where('id', $cars->state_id)->first();
                                            ?>
                                              {{ $stat->state_name }}
                                      @endif
                                      
                                    </span>
                                      
                                      
                                      
                                  </p>
                              </a>
                             
                            </div>                        
                            @endforeach 
                            @endif                  
                          
                      </div>
                 
                </div>
                
            </div>
        </section>
         <section class="blog_section m-4" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;height:300px;">
            <div class="container">
                
                <h4 class="pt-2">Ad Position</h4>
                <div class="blog_content mb-3">
                  
                      
                 
                </div>
                
            </div>
        </section>
</main>
<!-- End #main -->

@endsection
@section('customjs')
<script>
$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  dots:false,
  nav:true,
  autoplay:true,   
  smartSpeed: 3000, 
  autoplayTimeout:7000,
  responsive:{
    0:{
      items:4
    }    
  }
})


</script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<!-- carousel -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
@endsection