@extends('auth.auth_layout.main')
@section('title', 'Furniture Post')
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
                    @if($singlePost->type_id)
                    <li class="d-flex justify-content-between">
                      <strong>Furniture Type:</strong>
                      <?php
                        $type = DB::table('types')->where('id', $singlePost->type_id)->where('status', 1)->first();
                      ?>
                      <span>@if(!empty($type)){{ $type->type_name }}@endif</span>
                    </li>
                    @endif
                    @if($singlePost->type_brand_id)
                    <li class="d-flex justify-content-between">
                      <strong>Brand Name:</strong>
                      <?php
                        $typeBrand = DB::table('type_brands')->where('id', $singlePost->type_brand_id)->where('status', 1)->first();
                      ?>
                      <span>@if(!empty($typeBrand)){{ $typeBrand->type_brand_name }} @endif</span>
                    </li>
                    @endif
                    @if($singlePost->condition)
                    <li class="d-flex justify-content-between">
                      <strong>Condition:</strong>
                      <span>{{ $singlePost->condition }}</span>
                    </li>
                    @endif
                    @if($singlePost->age)
                    <li class="d-flex justify-content-between">
                      <strong>Age:</strong>
                      <span>{{ $singlePost->age }}</span>
                    </li>
                    @endif
                    @if($singlePost->user_type)
                    <li class="d-flex justify-content-between">
                      <strong>User Type:</strong>
                      <span>{{ $singlePost->user_type }}</span>
                    </li>
                    @endif
                    @if($singlePost->gst_no)
                    <li class="d-flex justify-content-between">
                      <strong>GST No.:</strong>
                      <span>{{ $singlePost->gst_no }}</span>
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