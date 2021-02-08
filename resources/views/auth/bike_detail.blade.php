@extends('auth.auth_layout.main')
@section('title', 'Bike Post')
@section('customcss')

@endsection
@section('content')
<main id="main">
  <!-- ======= Property Single ======= -->
  <section class="property-single nav-arrow-b section-property section-t8 mt-5">
    <div class="container">
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
                  <div class="title-box-d">
                    <h3 class="title-d">{{ $singlePost->ad_title }}</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {{ $singlePost->description }}
                </p>
              </div>
              <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Product Details</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    @if($singlePost->brand_id)
                    <li class="d-flex justify-content-between">
                      <strong>Brand Name:</strong>
                      <?php
                        $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                      ?>
                      <span>@if(!empty($brand)) {{ $brand->brand_name }} @endif</span>
                    </li>
                    @endif
                    @if($singlePost->model_id)
                    <li class="d-flex justify-content-between">
                      <strong>Model Name:</strong>
                      <?php
                        $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                      ?>
                      <span>@if(!empty($modelName)) {{ $modelName->model_name }} @endif</span>
                    </li>
                    @endif
                    @if($singlePost->year_of_registration)
                    <li class="d-flex justify-content-between">
                      <strong>Year of Registration:</strong>
                      <span>{{ $singlePost->year_of_registration }}</span>
                    </li>
                    @endif
                    @if($singlePost->kms_driven)
                    <li class="d-flex justify-content-between">
                      <strong>KMS Driven:</strong>
                      <span>{{ $singlePost->kms_driven }}</span>
                    </li>
                    @endif
                    <hr>
                    <li class="d-flex justify-content-between">
                      <strong>Selling Price</strong>
                      <span><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3 section-t4">
              <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <?php
                $photos = $singlePost->photos;
                $explodePhotos = explode(",", $photos);
                // dd($explodePhotos);
                ?>
                @for($i= 0; $i < count($explodePhotos); $i++)
                <div class="carousel-item-b">
                    <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="" height="350px">
                </div>
                @endfor
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