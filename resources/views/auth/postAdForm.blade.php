@extends('auth.auth_layout.main')
@section('title', 'Cars')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<style>
  .myimg
  {
    width:100%;
    height:300px;
  }
  .card-header-a .card-title-a {
    font-size: 25px;
  }

  .element {
    display: inline-flex;
    align-items: center;
    border: 1px solid grey;
    padding: 20px;
    margin:10px;
  }
  #upload_form{
    display:inline-flex;
    flex-wrap:wrap;
  }
  .filelabel {
    width: 110px;
    height:110px;
    border: 2px dashed grey;
    border-radius: 5px;
    /* display: inline-block; */
    padding: 5px;
    transition: border 300ms ease;
    cursor: pointer;
    text-align: center;
    margin: 6px;
    position:relative;
  }
  .icon{
    position: absolute;
    /* left: 0%; */
    right: 0%;
    top: -13%;
    border-radius: 50%;
    background: black;
    width: 21px;
    color: white;
  }
  .filelabel i {
    display: block;
    font-size: 30px;
    padding-bottom: 5px;
  }
  .filelabel i, .filelabel .title {
    color: grey;
    transition: 200ms color;
  }
  .filelabel:hover {
    border: 2px solid #1665c4;
  }
  .filelabel:hover i, .filelabel:hover .title {
    color: #1665c4;
  }
  #FileInput{
    display:none;
  }
  .hidden{
    display:none;
  }
  .switch-field {
    display: flex;
    overflow: hidden;
    flex-wrap: wrap;
  }

  .switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
  }

  .switch-field label {
    background-color: white;
    color: rgba(0, 0, 0, 0.6);
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 8px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.1s ease-in-out;
  }

  .switch-field label:hover {
    cursor: pointer;
  }

  .switch-field input:checked + label {
    background-color: #a5dc86;
    box-shadow: none;
  }

  .switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
  }

  .switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
  }
  .select2-container .select2-selection--single{
    height:34px;
  }
  .foo { color: #808080; text-size: smaller; }
  /* .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: white;
    color: black;
  } */
</style>
@endsection
@section('content')
<section class="intro-single mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-single-box">
          <h1 class="title-single">The Best Way To Sell Your {{ $subCategory->sub_category }}</h1> 
        </div>
      </div>
    </div>
    @include('auth.auth_layout.changeCategory')
  </div>
</section>
<!-- End Intro Single-->
<!-- ======= Contact Single ======= -->
<section class="contact">
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
        </div>
        @endif
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-8">
            <form method="POST" id="submitForm" action="{{ url('save-car-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
              <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
              <input type="hidden" name="category_id" value="{{ $category->id }}">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">I am <span class="text-danger">*<span><span class="text-danger" id="user_err"><span></label>
                </div>
                <div class="form-group col-md-8">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="" name="user_type" value="Individual">
                    <label class="form-check-label" for="">Individual</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="" name="user_type" value="Dealer">
                    <label class="form-check-label" for="">Dealer</label>
                  </div>
                </div>
              </div>
              <div class="form-row hidden" id="showDiv">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="">GST No.<span class="text-danger">*<span><span class="text-danger" id="gst_err"><span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="text" name="gst_no" id="gst_no" class="form-control @error('gst_no') invalid-feedback @enderror" value="{{ old('gst_no') }}">
                    @error('gst_no')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Brand Name<span class="text-danger">*<span></label>
                  <select id="brand_name" class="form-control sel-status @error('brand_name') is-invalid @enderror" name="brand_name">
                    <option value="">Choose...</option>
                    @foreach($brand as $b)
                    <option value="{{ $b->id }}" @if (old('brand_name') == $b->id) selected="selected" @endif>{{ $b->brand_name }}</option>
                    @endforeach
                  </select>
                  @error('brand_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label>Model Name<span class="text-danger">*<span></label>
                  <select id="model_name" class="form-control sel-status @error('model_name') is-invalid @enderror" name="model_name">

                  </select>
                  @error('model_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label>Car Varient<span class="text-danger">*<span></label>
                  <select id="car_varient" class="form-control sel-status @error('car_varient') is-invalid @enderror" name="car_varient">
                    
                  </select>
                  @error('car_varient')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Year of Registration<span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('year_of_registration') is-invalid @enderror" id="year_of_registration" name="year_of_registration" value="{{ old('year_of_registration') }}" placeholder="Month, Year" onfocus="(this.type='month')">
                  @error('year_of_registration')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>KMS Driven</label>
                  <input type="text" class="form-control Stylednumber @error('kms_driven') is-invalid @enderror" id="kms_driven" name="kms_driven" value="{{ old('kms_driven') }}">
                  @error('kms_driven')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Fuel Type<span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                    <div class="switch-field">
                      <input type="radio" id="Petrol" name="fuel_type" value="Petrol" @if(old('fuel_type') == "Petrol") checked @endif/>
                      <label for="Petrol">Petrol</label>
                      <input type="radio" id="CNG" name="fuel_type" value="CNG" @if(old('fuel_type') == "CNG") checked @endif/>
                      <label for="CNG">CNG</label>
                      <input type="radio" name="fuel_type" id="Diesel" value="Diesel" @if(old('fuel_type') == "Diesel") checked @endif>
                      <label for="Diesel">Diesel</label>
                      <input type="radio" name="fuel_type" id="Electric" value="Electric" @if(old('fuel_type') == "Electric") checked @endif>
                      <label for="Electric">Electric</label>
                    </div>
                  </div>
                </div>
                @error('fuel_type')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Transmission <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <div class="switch-field">
                      <input type="radio" name="transmission" id="Automatic" value="Automatic" @if(old('transmission') == "Automatic") checked @endif>
                      <label for="Automatic">Automatic</label>
                      <input type="radio" name="transmission" id="Manual" value="Manual" @if(old('transmission') == "Manual") checked @endif>
                      <label for="Manual">Manual</label>
                    </div>
                  </div>
                </div>
                @error('transmission')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>No. of Owners <span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                    <div class="switch-field">
                      <input type="radio" name="no_of_owners" id="inlineRadio1" value="1st" @if(old('no_of_owners') == "1st") checked @endif>
                      <label for="inlineRadio1">1st</label>
                      <input type="radio" name="no_of_owners" id="inlineRadio2" value="2nd" @if(old('no_of_owners') == "2nd") checked @endif>
                      <label for="inlineRadio2">2nd</label>
                      <input type="radio" name="no_of_owners" id="inlineRadio3" value="3rd" @if(old('no_of_owners') == "3rd") checked @endif>
                      <label for="inlineRadio3">3rd</label>
                      <input type="radio" name="no_of_owners" id="inlineRadio4" value="4th" @if(old('no_of_owners') == "4th") checked @endif>
                      <label for="inlineRadio4">4th</label>
                      <input type="radio" name="no_of_owners" id="inlineRadio5" value="4+" @if(old('no_of_owners') == "4+") checked @endif>
                      <label for="inlineRadio5">4+</label>
                    </div>
                  </div>
                </div>
                @error('no_of_owners')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Car Body Type <span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                    <div class="switch-field">
                      <input type="radio" name="body_type" id="inlineRadio6" value="SUV" @if(old('body_type') == "SUV") checked @endif>
                      <label for="inlineRadio6">SUV</label>
                      <input type="radio" name="body_type" id="inlineRadio7" value="COMPACT SUV" @if(old('body_type') == "COMPACT SUV") checked @endif>
                      <label for="inlineRadio7">COMPACT SUV</label>
                      <input type="radio" name="body_type" id="inlineRadio8" value="SEDAN" @if(old('body_type') == "SEDAN") checked @endif>
                      <label for="inlineRadio8">SEDAN</label>
                      <input type="radio" name="body_type" id="inlineRadio9" value="COMPACT SEDAN" @if(old('body_type') == "COMPACT SEDAN") checked @endif>
                      <label for="inlineRadio9">COMPACT SEDAN</label>
                      <input type="radio" name="body_type" id="inlineRadio10" value="HATCHBACK" @if(old('body_type') == "HATCHBACK") checked @endif>
                      <label for="inlineRadio10">HATCHBACK</label>
                      <input type="radio" name="body_type" id="inlineRadio11" value="MUV" @if(old('body_type') == "MUV") checked @endif>
                      <label for="inlineRadio11">MUV</label>
                      <input type="radio" name="body_type" id="inlineRadio12" value="VAN" @if(old('body_type') == "VAN") checked @endif>
                      <label for="inlineRadio12">VAN</label>
                    </div>
                  </div>
                </div>
                @error('body_type')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Ad title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('ad_title') is-invalid @enderror" id="ad_title" placeholder="(e.g. brand, model, age, type)" name="ad_title" value="{{ old('ad_title') }}">
                @error('ad_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
              <div class="form-group">
                <label>Description <span class="text-danger">*</span></label>
                <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Photos <span class="text-danger">*</span></label><strong>(Upload Upto 25 Photos)</strong>
              </div>
              <div id="upload_form">
                @for($i=1; $i < 26; $i++)
                <label class="filelabel p_file" id="label{{ $i }}">
                  <div class="icon">X</div>
                  <i class="fa fa-paperclip" id="icon{{ $i }}">
                  </i>
                  
                  <span class="title{{ $i }}">
                      Add File
                  </span>
                  <input class="FileUpload{{ $i }}" id="FileInput" name="photos[]" type="file"/>
                  <img  id="frame{{ $i }}" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
                @endfor
              </div>
              @error('photos')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="form-row">
                <div class="form-group mb-3 col-md-6">
                  <label>Colour<span class="text-danger">*</span></label>
                  <select name="colour" class="form-control sel-status @error('colour') is-invalid @enderror">
                    <option value="">-Select Colour-</option>
                    <option value="White" @if(old('colour') == "White") Selected @endif>White</option>
                    <option value="Black" @if(old('colour') == "Black") Selected @endif>Black</option>
                    <option value="Silver" @if(old('colour') == "Silver") Selected @endif>Silver</option>
                    <option value="Red" @if(old('colour') == "Red") Selected @endif>Red</option>
                    <option value="Blue" @if(old('colour') == "Blue") Selected @endif>Blue</option>
                    <option value="Grey" @if(old('colour') == "Grey") Selected @endif>Grey</option>
                    <option value="Beige" @if(old('colour') == "Beige") Selected @endif>Beige</option>
                    <option value="Brown" @if(old('colour') == "Brown") Selected @endif>Brown</option>
                    <option value="Gold/Yellow" @if(old('colour') == "Gold/Yellow") Selected @endif>Gold/Yellow</option>
                    <option value="Green" @if(old('colour') == "Green") Selected @endif>Green</option>
                    <option value="Purple" @if(old('colour') == "Purple") Selected @endif>Purple</option>
                    <option value="Maroon" @if(old('colour') == "Maroon") Selected @endif>Maroon</option>
                    <option value="Others" @if(old('colour') == "Others") Selected @endif>Others</option>
                  </select>
                  @error('colour')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-3 col-md-6">
                  <label>Insurance<span class="text-danger">*</span></label>
                  <select name="insurance" class="form-control sel-status @error('insurance') is-invalid @enderror">
                    <option value="">-Choose-</option>
                    <option value="Comprehensive/Standard" @if(old('insurance') == "Comprehensive/Standard") Selected @endif data-foo="Covers Damages to Your Car and Third Party">Comprehensive/Standard</option>
                    <option value="Third Party" @if(old('insurance') == "Third Party") Selected @endif>Third Party</option>
                    <option value="Zero Depreciation" @if(old('insurance') == "Zero Depreciation") Selected @endif>Zero Depreciation</option>
                    <option value="No Insurance" @if(old('insurance') == "No Insurance") Selected @endif>No Insurance</option>
                  </select>
                  @error('insurance')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="form-group">
                <h6>Expected Selling</h6>
                <div class="row">
                  <div class="col-md-3">
                    <label>Price</label><span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-rupee"></i></div>
                      </div>
                      <input type="text" class="form-control Stylednumber @error('price') is-invalid @enderror" id="price" placeholder="Price" name="price" value="{{ old('price') }}">
                    </div>
                  </div>
                </div>
                @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <hr>
              <div class="form-group">
                <h6>Fill User Details</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4 mb-3">
                  <?php 
                    $ext = pathinfo(Auth::user()->avatar, PATHINFO_EXTENSION);
                  ?>
                  @if($ext == "")
                  <img src="{{ Auth::user()->avatar }}" alt="" class="img-fluid rounded-circle">
                  @else
                  <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="img-fluid rounded-circle">
                  @endif
                </div>
                <div class="form-group col-md-8 mb-3">
                  <label>Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ Auth::user()->name }}">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                  <label>Email<span class="text-danger">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ Auth::user()->email }}">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6 mb-3">
                  <label>Mobile Number<span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no"  name="mobile_no" value="{{ Auth::user()->mobile_no }}">
                  @error('mobile_no')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>State</label><span class="text-danger">*</span></label>
                  <select id="state" class="form-control sel-status @error('state') is-invalid @enderror" name="state">
                    <option value="">Choose...</option>
                    @foreach($state as $s)
                    <option value="{{ $s->id }}" @if (old('state') == $s->id) selected="selected" @endif>{{ $s->state_name }}</option>
                    @endforeach
                  </select>
                  @error('state')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="inputCity">City</label><span class="text-danger">*</span></label>
                  <select class="form-control sel-status @error('city') is-invalid @enderror" id="city" name="city">
                  </select>
                  @error('city')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="inputLocality">Locality</label><span class="text-danger">*</span></label>
                  <select class="form-control sel-status @error('locality') is-invalid @enderror" id="locality" name="locality">
                  </select>
                  @error('locality')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Address</label><span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Pin Code</label>
                  <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" name="pin_code">
                  @error('pin_code')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div> 
              </div>
              <button type="button" id="submitButton" class="btn btn-primary">Post Your Add</button>
            </form>
          </div>
          <div class="col-md-4 section-md-t3">
            <div class="icon-box section-b2">
              <div class="icon-box-icon">
                <span class="ion-ios-paper-plane"></span>
              </div>
              <div class="icon-box-content table-cell">
                <div class="icon-box-title">
                  <h4 class="icon-title">Say Hello</h4>
                </div>
                <div class="icon-box-content">
                  <p class="mb-1">Email.
                    <span class="color-a">contact@example.com</span>
                  </p>
                  <p class="mb-1">Phone.
                    <span class="color-a">+54 356 945234</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="icon-box section-b2">
              <div class="icon-box-icon">
                <span class="ion-ios-pin"></span>
              </div>
              <div class="icon-box-content table-cell">
                <div class="icon-box-title">
                  <h4 class="icon-title">Find us in</h4>
                </div>
                <div class="icon-box-content">
                  <p class="mb-1">
                    Manhattan, Nueva York 10036,
                    <br> EE. UU.
                  </p>
                </div>
              </div>
            </div>
            <div class="icon-box">
              <div class="icon-box-icon">
                <span class="ion-ios-redo"></span>
              </div>
              <div class="icon-box-content table-cell">
                <div class="icon-box-title">
                  <h4 class="icon-title">Social networks</h4>
                </div>
                <div class="icon-box-content">
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
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
<!-- End Contact Single-->
@endsection
@section('customjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
$(document).ready(function () {
  $('.ckeditor').ckeditor();
});
String.prototype.replaceAll = function(search, replacement) {
  var target = this;
  return target.replace(new RegExp(search, 'g'), replacement);
};
$('input.Stylednumber').keyup(function() {
  var input = $(this).val().replaceAll(',', '');
  if (input.length < 1)
    $(this).val('0');
  else {
    var formatted = inrFormat(input);
    if (formatted.indexOf('.') > 0) {
      var split = formatted.split('.');
      formatted = split[0] + '.' + split[1].substring(0, 2);
    }
    $(this).val(formatted);
  }
});
function inrFormat(val) {
  var x = val;
  x = x.toString();
  var afterPoint = '';
  if (x.indexOf('.') > 0)
    afterPoint = x.substring(x.indexOf('.'), x.length);
  x = Math.floor(x);
  x = x.toString();
  var lastThree = x.substring(x.length - 3);
  var otherNumbers = x.substring(0, x.length - 3);
  if (otherNumbers != '')
    lastThree = ',' + lastThree;
  var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
  return res;
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
 $('body')
    .delegate('#upload_form input[type="file"]', 'change', inputChanged)
    .delegate('#upload_form .icon', 'click', removeField);

function inputChanged(e) {
    
    $current_count = $('#upload_form input[type="file"]').length;
    // console.log($current_count);
    $next_count = $current_count + 1;
    var labelVal = $(".title"+$current_count).text();
    var oldfileName = $(this).val();
    
    console.log(oldfileName);
    $(".filelabel .title").text(labelVal);
    fileName = e.target.value.split( '\\' ).pop();
    if (oldfileName == fileName) {return false;}
            var className = $(this).attr("class");
            // console.log(className);
            var lastChar = className.match(/(\d+)/);
            console.log(lastChar);
            var inc  = 1 + +lastChar;
            // console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
            var extension = fileName.split('.').pop();
            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel #icon"+lastChar).hide();
                $('#frame'+lastChar).removeClass("hidden");
                $('#frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
                $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                $(".filelabel").css({'border':' 2px solid #208440'});
            }
            if(fileName ){
                if (fileName.length > 10){
                    $(".filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
                }
                else{
                    $(".filelabel .title"+$current_count).text(fileName);
                }
            }
            else{
                $(".filelabel .title").text(labelVal);
            }
            
            if($(".FileUpload"+inc).length > 0) {
                console.log('exist');
            }
            // else{
            // $(this).closest('.p_file').after(
            // '<label class="filelabel p_file"><div class="icon">X</div>' +
            // '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
            // '<span class="title'+$next_count+'">Add File</span>' +
            // '<input class="FileUpload'+$next_count+'" id="FileInput" name="photos[]" type="file"/>'+
            // '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
            // '</label>');
            // }
           
}

function removeField(){
  var id = $(this).closest('.p_file').attr('id');
  var lastChar = id.match(/(\d+)/);
  // alert(id);
  $("#frame"+lastChar).removeAttr('src');
  $("#frame"+lastChar).addClass('hidden');
  $(".title"+lastChar).text('Add File');
  $(".filelabel #icon"+lastChar).show();
  return false;
}
</script>

<script type=text/javascript>
  $('#brand_name').change(function(){
  var brandID = $(this).val();  
//   alert(brandID);
  if(brandID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-model-list')}}?brand_id="+brandID,
      success:function(res){        
      if(res){
        $("#model_name").empty();
        $("#model_name").append('<option value="">Select Model Name</option>');
        $.each(res,function(key,value){
          $("#model_name").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#model_name").empty();
      }
      }
    });
  }else{
    $("#model_name").empty();
  }   
  });


  $('#model_name').change(function(){
  var modelID = $(this).val();  
//   alert(brandID);
  if(modelID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-car-varient-list')}}?model_id="+modelID,
      success:function(res){        
      if(res){
        $("#car_varient").empty();
        $("#car_varient").append('<option value="">Select Car Varient</option>');
        $.each(res,function(key,value){
          $("#car_varient").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#car_varient").empty();
      }
      }
    });
  }else{
    $("#car_varient").empty();
  }   
  });


  $('#state').change(function(){
  var stateID = $(this).val();  
//   alert(brandID);
  if(stateID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-city-list')}}?state_id="+stateID,
      success:function(res){        
      if(res){
        $("#city").empty();
        $("#city").append('<option value="">Select City</option>');
        $.each(res,function(key,value){
          $("#city").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#city").empty();
      }
      }
    });
  }else{
    $("#city").empty();
  }   
  });


  $('#city').change(function(){
  var cityID = $(this).val();  
//   alert(brandID);
  if(cityID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-locality-list')}}?city_id="+cityID,
      success:function(res){        
      if(res){
        $("#locality").empty();
        $("#locality").append('<option value="">Select Locality</option>');
        $.each(res,function(key,value){
          $("#locality").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#locality").empty();
      }
      }
    });
  }else{
    $("#locality").empty();
  }   
  });
  $(document).ready(function() {
    $("input[name$='user_type']").click(function() {
      var test = $(this).val();
      if(test=="Individual")
      {
        $("#showDiv").hide();
      }
      if(test=="Dealer")
      {
        $("#showDiv").show();
      }
    })
  })
  $(document).ready(function() {
    $(".sel-status").select2();
  });
  // $(function(){
  //   $(".select2").select2({
  //     matcher: matchCustom,
  //     templateResult: formatCustom
  //   });
  //   function stringMatch(term, candidate) {
  //     return candidate && candidate.toLowerCase().indexOf(term.toLowerCase()) >= 0;
  //   }

  //   function matchCustom(params, data) {
  //     // If there are no search terms, return all of the data
  //     if ($.trim(params.term) === '') {
  //       return data;
  //     }
  //     // Do not display the item if there is no 'text' property
  //     // if (typeof data.text === 'undefined') {
  //     //   return null;
  //     // }
  //     // Match text of option
  //     if (stringMatch(params.term, data.text)) {
  //       return data;
  //     }
  //     // Match attribute "data-foo" of option
  //     if (stringMatch(params.term, $(data.element).attr('data-foo'))) {
  //       return data;
  //     }
  //     // return null;
  //   }

  //   function formatCustom(state) {
  //     return $(
  //       '<div><div>' + state.text + '</div><div class="foo">'+ $(state.element).attr('data-foo')+ '</div></div>'
  //     );
  //   }
  // })
  $('body').on('click', '#submitButton', function () {
    var user_type = $('input[name="user_type"]:checked').val();
    var gst_no = $('#gst_no').val();
    // alert(user_type);
    if(user_type == null)
    {
      $("#user_err").fadeIn().html("Required");
      setTimeout(function(){ $("#user_err").fadeOut(); }, 3000);
      $('input[name="user_type"]').focus();
      return false;
    }
    if(user_type == "Dealer")
    {
      if(gst_no == ""){
        $("#gst_err").fadeIn().html("Required");
        setTimeout(function(){ $("#gst_err").fadeOut(); }, 3000);
        $('#gst_no').focus();
        return false;
      }
      else{
        $("#submitForm").submit();
      }
    }
    else{
      $("#submitForm").submit();
    }
  });
</script>
@endsection
