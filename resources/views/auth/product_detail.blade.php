@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<!-- ======= Property Single ======= -->
<section class="property-single nav-arrow-b section-property section-t8 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
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
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">&#8377;</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{ $singlePost->price }}</h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
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
                        <span>{{ $brand->brand_name }}</span>
                      </li>
                      @endif
                      @if($singlePost->model_id)
                      <li class="d-flex justify-content-between">
                        <strong>Model Name:</strong>
                        <?php
                          $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                        ?>
                        <span>{{ $modelName->model_name }}</span>
                      </li>
                      @endif
                      @if($singlePost->year_of_registration)
                      <li class="d-flex justify-content-between">
                        <strong>Year of Registration:</strong>
                        <span>{{ $singlePost->year_of_registration }}</span>
                      </li>
                      @endif
                      @if($singlePost->fuel_type)
                      <li class="d-flex justify-content-between">
                        <strong>Fuel Type:</strong>
                        <span>{{ $singlePost->fuel_type }}</span>
                      </li>
                      @endif
                      @if($singlePost->transmission)
                      <li class="d-flex justify-content-between">
                        <strong>Transmission:</strong>
                        <span>{{ $singlePost->transmission }}
                        </span>
                      </li>
                      @endif
                      @if($singlePost->kms_driven)
                      <li class="d-flex justify-content-between">
                        <strong>KMS Driven:</strong>
                        <span>{{ $singlePost->kms_driven }}</span>
                      </li>
                      @endif
                      @if($singlePost->no_of_owners)
                      <li class="d-flex justify-content-between">
                        <strong>No. of Owners:</strong>
                        <span>{{ $singlePost->no_of_owners }}</span>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
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
                  <p class="description color-text-a no-margin">
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                    malesuada. Quisque velit nisi,
                    pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>
                    <li>Deck</li>
                    <li>Tennis Courts</li>
                    <li>Internet</li>
                    <li>Parking</li>
                    <li>Sun Room</li>
                    <li>Concrete Flooring</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

@endsection
@section('customjs')

@endsection