@extends('auth.auth_layout.main')
@section('title', 'Job Post')
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
                    <h3 class="title-d">{{ $singlePost->job_title }}</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                {!! $singlePost->job_description !!}
                </p>
              </div>
              <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Job Details</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    @if($singlePost->job_title)
                    <li class="d-flex justify-content-between">
                      <strong>Job Title:</strong>
                      <span>{{ $singlePost->job_title }}</span>
                    </li>
                    @endif
                    @if($singlePost->job_type)
                    <li class="d-flex justify-content-between">
                      <strong>Job Type:</strong>
                      <span>{{ $singlePost->job_type }}</span>
                    </li>
                    @endif
                    @if($singlePost->salary_period)
                    <li class="d-flex justify-content-between">
                      <strong>Salary Period:</strong>
                      <span>{{ $singlePost->salary_period }}</span>
                    </li>
                    @endif
                    @if($singlePost->position)
                    <li class="d-flex justify-content-between">
                      <strong>Position:</strong>
                      <span>{{ $singlePost->position }}</span>
                    </li>
                    @endif
                    @if($singlePost->min_monthly_salary || $singlePost->max_monthly_salary)
                    <li class="d-flex justify-content-between">
                      <strong>Monthly Salary:</strong>
                      <span>Min. <i class="fa fa-inr"></i>{{ $singlePost->min_monthly_salary }} - Max. <i class="fa fa-inr"></i> {{ $singlePost->max_monthly_salary }}</span>
                    </li>
                    @endif
                    @if($singlePost->min_experience || $singlePost->max_experience)
                    <li class="d-flex justify-content-between">
                      <strong>Experience:</strong>
                      <span>Min. {{ $singlePost->min_experience }} yrs - Max. {{ $singlePost->max_experience }} yrs</span>
                    </li>
                    @endif
                    @if($singlePost->company_name)
                    <li class="d-flex justify-content-between">
                      <strong>Company Name:</strong>
                      <span>{{ $singlePost->company_name }}</span>
                    </li>
                    @endif
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