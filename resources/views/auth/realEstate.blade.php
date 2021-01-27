@extends('auth.auth_layout.main')
@section('title', 'Properties')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    /* display:inline-flex; */
}
.filelabel {
    width: 120px;
    border: 2px dashed grey;
    border-radius: 5px;
    display: inline-block;
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
.filelabel i,
.filelabel .title {
  color: grey;
  transition: 200ms color;
}
.filelabel:hover {
  border: 2px solid #1665c4;
}
.filelabel:hover i,
.filelabel:hover .title {
  color: #1665c4;
}
#FileInput{
    display:none;
}
.hidden{
    display:none;
}

</style>
@endsection
@section('content')
<section class="intro-single mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-single-box">
          <h1 class="title-single">The Best Way To Sell Your {{ $subCategory->sub_category }}</h1>
          <span class="color-text-a">Sale Residential Property.</span>
        </div>
      </div>
    </div>
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
            <form method="POST" action="{{ url('save-real-estate-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
              <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Property Type<span class="text-danger">*<span></label>
                  <select id="property_type" class="form-control @error('property_type') is-invalid @enderror" name="property_type">
                    <option value="">Choose...</option>
                    <option value="Flat" @if(old('property_type') == "Flat") Selected @endif>Flat</option>
                    <option value="Apartment" @if(old('property_type') == "Apartment") Selected @endif>Apartment</option>
                  </select>
                  @error('property_type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Property For<span class="text-danger">*<span></label>
                  <select id="property_for" class="form-control @error('property_for') is-invalid @enderror" name="property_for">
                    <option value="">Choose...</option>
                    <option value="Sale" @if(old('property_for') == "Sale") Selected @endif>Sale</option>
                    <option value="Rent" @if(old('property_for') == "Rent") Selected @endif >Rent</option>
                    <option value="PG" @if(old('property_for') == "PG") Selected @endif>PG</option>
                    <option value="Hostel" @if(old('property_for') == "Hostel") Selected @endif>Hostel</option>
                  </select>
                  @error('property_for')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Property Location<span class="text-danger">*<span></label>
                  <select id="property_location" class="form-control @error('property_location') is-invalid @enderror" name="property_location">
                    <option value="">Choose Location...</option>
                    @foreach($cities as $c)
                    <option value="{{ $c->id }}" @if(old('property_location') == $c->id) Selected @endif>{{ $c->city_name }}</option>
                    @endforeach
                  </select>
                  @error('property_location')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <h6>Property Feature</h6>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Bedroom<span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bedroom" id="1" value="1" @if(old('bedroom') == "1") checked @endif>
                        <label class="form-check-label" for="1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bedroom" id="2" value="2" @if(old('bedroom') == "2") checked @endif>
                        <label class="form-check-label" for="2">2</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bedroom" id="3" value="3" @if(old('bedroom') == "3") checked @endif>
                        <label class="form-check-label" for="3">3</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bedroom" id="4" value="Bathroom" @if(old('bedroom') == "4") checked @endif>
                        <label class="form-check-label" for="4">4</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bedroom" id="four_plus" value="4+" @if(old('bedroom') == "4+") checked @endif>
                        <label class="form-check-label" for="four_plus">4+</label>
                      </div>
                  </div>
                </div>
                @error('bedroom')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Balcony <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="balcony" id="balcony1" value="1" @if(old('balcony') == "1") checked @endif>
                      <label class="form-check-label" for="balcony1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="balcony" id="balcony2" value="2" @if(old('balcony') == "2") checked @endif>
                      <label class="form-check-label" for="balcony2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="balcony" id="balcony3" value="3" @if(old('balcony') == "3") checked @endif>
                      <label class="form-check-label" for="balcony3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="balcony" id="balcony4" value="4" @if(old('balcony') == "4") checked @endif>
                      <label class="form-check-label" for="balcony4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="balcony" id="balcony4+" value="4+" @if(old('balcony') == "4+") checked @endif>
                      <label class="form-check-label" for="balcony4+">4+</label>
                    </div>
                  </div>
                </div>
                @error('balcony')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Bathroom <span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bathroom" id="inlineRadio1" value="1" @if(old('bathroom') == "1") checked @endif>
                        <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bathroom" id="inlineRadio2" value="2" @if(old('bathroom') == "2") checked @endif>
                        <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bathroom" id="inlineRadio3" value="3" @if(old('bathroom') == "3") checked @endif>
                        <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bathroom" id="inlineRadio4" value="4" @if(old('bathroom') == "4") checked @endif>
                        <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bathroom" id="inlineRadio5" value="4+" @if(old('bathroom') == "4+") checked @endif>
                        <label class="form-check-label" for="inlineRadio5">4+</label>
                    </div>
                  </div>
                </div>
                @error('bathroom')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <hr>
              <div class="form-group">
                <h6>Floor</h6>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="floor">Property Floor No.</label>
                      <input type="number" name="property_floor_no" class="form-control @error('property_floor_no') is-invalid @enderror" value="{{ old('property_floor_no') }}">
                      @error('property_floor_no')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="floor">No. of Floor</label>
                      <input type="number" name="no_of_floor" class="form-control @error('no_of_floor') is-invalid @enderror" value="{{ old('no_of_floor') }}">
                      @error('no_of_floor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Furnishing<span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="furnishing" id="Furnished" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif>
                          <label class="form-check-label" for="Furnished">Furnished</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="furnishing" id="Semi-Furnished" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif>
                          <label class="form-check-label" for="Semi-Furnished">Semi-Furnished</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="furnishing" id="Unfurnished" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif>
                          <label class="form-check-label" for="Unfurnished">Unfurnished</label>
                      </div>
                  </div>
                </div>
                @error('furnishing')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <h6>Area</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Super Build Up Area <small>(Sq.ft.)</small><span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
                  @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-4 form-group">
                  <label for="">Carpet Area <small>(Sq.ft.)</small></label>
                  <input type="text" class="form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                  @error('carpet_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-4 form-group">
                  <label for="">Build Up Area <small>(Sq.ft.)</small></label>
                  <input type="text" class="form-control @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                  @error('build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Transaction Type <span class="text-danger">*</span></label>
                  <select name="transaction_type" id="transaction_type" class="form-control @error('transaction_type') invalid-feedback @enderror">
                    <option value="">-Select Transaction Type-</option>
                    <option value="New Property" @if(old('transaction_type') == "New Property") Selected @endif>New Property</option>
                    <option value="Resale Property" @if(old('transaction_type') == "Resale Property") Selected @endif>Resale Property</option>
                  </select>
                  @error('transaction_type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Possession Status <span class="text-danger">*</span></label>
                  <select name="possession_status" id="possession_status" class="form-control @error('possession_status') invalid-feedback @enderror">
                    <option value="">-Select Possession Status-</option>
                    <option value="Under Construction" @if(old('possession_status') == "Under Construction") Selected @endif>Under Construction</option>
                    <option value="Ready to Move" @if(old('possession_status') == "Ready to Move") Selected @endif>Ready to Move</option>
                  </select>
                  @error('possession_status')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Age of Construction <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('age_of_construction') is-invalid @enderror" id="age_of_construction" name="age_of_construction" value="{{ old('age_of_construction') }}">
                  @error('age_of_construction')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Available From <span class="text-danger">*</span></label>
                  <input type="month" class="form-control @error('available_from') is-invalid @enderror" id="available_from" name="available_from" value="{{ old('available_from') }}">
                  @error('available_from')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="form-group">
                <h6>Price Details</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Total Price <span class="text-danger">*</span></label>
                  <input type="number" name="total_price" class="form-control @error('total_price') invalid-feedback @enderror" value="{{ old('total_price') }}">
                  @error('total_price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Price Per Sq.ft<span class="text-danger">*</span></label>
                  <input type="number" name="price_per_sq_ft" class="form-control @error('price_per_sq_ft') invalid-feedback @enderror" value="{{ old('price_per_sq_ft') }}">
                  @error('price_per_sq_ft')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Price Include</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="price_include" id="Car Parking" value="Car Parking" @if(old('price_include') == "Car Parking") checked @endif>
                      <label class="form-check-label" for="Car Parking">Car Parking</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="price_include" id="Club Membersip" value="Club Membersip" @if(old('price_include') == "Club Membersip") checked @endif>
                      <label class="form-check-label" for="Club Membersip">Club Membersip</label>
                    </div>
                  </div>
                </div>
                @error('price_include')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Booking Amount Charges</label>
                  <input type="number" name="booking_amount_charges" class="form-control @error('booking_amount_charges') invalid-feedback @enderror" value="{{ old('booking_amount_charges') }}">
                  @error('booking_amount_charges')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Maintenance Charges</label>
                  <input type="number" name="maintenance_charges" class="form-control @error('maintenance_charges') invalid-feedback @enderror" value="{{ old('maintenance_charges') }}">
                  @error('maintenance_charges')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label>Photos <span class="text-danger">*</span></label>
              </div>
              <div id="upload_form">
                <label class="filelabel p_file">
                  <div class="icon">X</div>
                  <i class="fa fa-paperclip" id="icon1">
                  </i>
                  
                  <span class="title1">
                      Add File
                  </span>
                  <input class="FileUpload1" id="FileInput" name="photos[]" type="file"/>
                  <img  id="frame1" width="100px" height="100px" class="hidden">
                </label>
              </div>
              @error('photos')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Listed By <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="listed_by" id="Builder" value="Builder" @if(old('listed_by') == "Builder") checked @endif>
                      <label class="form-check-label" for="Builder">Builder</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="listed_by" id="Owner" value="Owner" @if(old('listed_by') == "Owner") checked @endif>
                      <label class="form-check-label" for="Owner">Owner</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="listed_by" id="Agent" value="Agent" @if(old('listed_by') == "Agent") checked @endif>
                      <label class="form-check-label" for="Agent">Agent</label>
                    </div>
                  </div>
                </div>
                @error('listed_by')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div> 
              <hr>
              <div class="form-group">
                <h6>Additional Feature</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Rooms <span class="text-danger">*</span></label>
                  <select name="rooms" id="rooms" class="form-control @error('rooms') invalid-feedback @enderror">
                    <option value="">-Select Rooms-</option>
                    <option value="Pooja Room" @if(old('rooms') == "Pooja Room") Selected @endif >Pooja Room</option>
                    <option value="Store Room" @if(old('rooms') == "Store Room") Selected @endif>Store Room</option>
                    <option value="Study Room" @if(old('rooms') == "Study Room") Selected @endif>Study Room</option>
                    <option value="Servant Room" @if(old('rooms') == "Servant Room") Selected @endif>Servant Room</option>
                    <option value="None of these" @if(old('rooms') == "None of these") Selected @endif>None of these</option>
                  </select>
                  @error('rooms')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Facing <span class="text-danger">*</span></label>
                  <select name="facing" id="facing" class="form-control @error('facing') invalid-feedback @enderror">
                    <option value="">-Select Facing-</option>
                    <option value="East" @if(old('facing') == "East") Selected @endif>East</option>
                    <option value="West" @if(old('facing') == "West") Selected @endif>West</option>
                    <option value="North" @if(old('facing') == "North") Selected @endif>North</option>
                    <option value="South" @if(old('facing') == "South") Selected @endif>South</option>
                    <option value="North East" @if(old('facing') == "North East") Selected @endif>North East</option>
                    <option value="North West" @if(old('facing') == "North West") Selected @endif>North West</option>
                    <option value="South East" @if(old('facing') == "South East") Selected @endif>South East</option>
                    <option value="South West" @if(old('facing') == "South West") Selected @endif>South West</option>
                  </select>
                  @error('facing')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Overlooking <span class="text-danger">*</span></label>
                  <select name="overlooking" id="overlooking" class="form-control @error('overlooking') invalid-feedback @enderror">
                    <option value="">-Select Overlooking-</option>
                    <option value="Garden Park" @if(old('overlooking') == "Garden Park") Selected @endif>Garden Park</option>
                    <option value="Pool" @if(old('overlooking') == "Pool") Selected @endif>Pool</option>
                    <option value="Main Road" @if(old('overlooking') == "Main Road") Selected @endif>Main Road</option>
                    <option value="Not Available" @if(old('overlooking') == "Not Available") Selected @endif>Not Available</option>
                  </select>
                  @error('overlooking')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Car Parking <span class="text-danger">*</span></label>
                  <select name="car_parking" id="car_parking" class="form-control @error('car_parking') invalid-feedback @enderror">
                    <option value="">-Select Car Parking-</option>
                    <option value="Covered" @if(old('car_parking') == "Covered") Selected @endif>Covered</option>
                    <option value="Open" @if(old('car_parking') == "Open") Selected @endif>Open</option>
                    <option value="None" @if(old('car_parking') == "None") Selected @endif>None</option>
                  </select>
                  @error('car_parking')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <h6>Flats on Floor</h6>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="">Multiple Flat Available</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="multiple_flat" id="Yes" value="Yes" @if(old('multiple_flat') == "Yes") checked @endif>
                      <label class="form-check-label" for="Yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="multiple_flat" id="No" value="No" @if(old('multiple_flat') == "No") checked @endif>
                      <label class="form-check-label" for="No">No</label>
                    </div>
                  </div>
                </div>
                @error('multiple_flat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Area Registration No. (Optional)</label>
                <input type="text" name="area_registration_no" class="form-control @error('area_registration_no') invalid-feedback @enderror" value="{{ old('area_registration_no') }}">
                @error('area_registration_no')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Status of Water</label>
                  <select name="status_of_water" id="status_of_water" class="form-control @error('status_of_water') invalid-feedback @enderror">
                    <option value="">-Select Status of Water-</option>
                    <option value="24 hrs" @if(old('status_of_water') == "24 hrs") Selected @endif>24 hrs</option>
                    <option value="12 hrs" @if(old('status_of_water') == "12 hrs") Selected @endif>12 hrs</option>
                    <option value="6 hrs" @if(old('status_of_water') == "6 hrs") Selected @endif>6 hrs</option>
                    <option value="2 hrs" @if(old('status_of_water') == "2 hrs") Selected @endif>2 hrs</option>
                    <option value="1 hrs" @if(old('status_of_water') == "1 hrs") Selected @endif>1 hrs</option>
                  </select>
                  @error('status_of_water')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Status of Electricity</label>
                  <select name="status_of_electricity" id="status_of_electricity" class="form-control @error('status_of_electricity') invalid-feedback @enderror">
                    <option value="">-Select Status of Electricity-</option>
                    <option value="No Power Cut" @if(old('status_of_electricity') == "No Power Cut") Selected @endif>No Power Cut</option>
                    <option value="less than 3 hrs" @if(old('status_of_electricity') == "less than 3 hrs") Selected @endif>less than 3 hrs</option>
                    <option value="2 to 4 hrs Power Cut" @if(old('status_of_electricity') == "2 to 4 hrs Power Cut") Selected @endif>2 to 4 hrs Power Cut</option>
                    <option value="4 to 6 hrs Power Cut" @if(old('status_of_electricity') == "4 to 6 hrs Power Cut") Selected @endif>4 to 6 hrs Power Cut</option>
                    <option value="above 6 hrs Power Cut" @if(old('status_of_electricity') == "above 6 hrs Power Cut") Selected @endif>above 6 hrs Power Cut</option>
                  </select>
                  @error('status_of_electricity')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Ownership Approval</label>
                  <select name="ownership_approval" id="ownership_approval" class="form-control @error('ownership_approval') invalid-feedback @enderror">
                    <option value="">-Select Ownership Approval-</option>
                    <option value="Freehold" @if(old('ownership_approval') == "Freehold") Selected @endif>Freehold</option>
                    <option value="Leasehold" @if(old('ownership_approval') == "Leasehold") Selected @endif>Leasehold</option>
                    <option value="Power of Attorney" @if(old('ownership_approval') == "Power of Attorney") Selected @endif>Power of Attorney</option>
                    <option value="Co-Operative Society" @if(old('ownership_approval') == "Co-Operative Society") Selected @endif>Co-Operative Society</option>
                  </select>
                  @error('ownership_approval')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Approved By</label>
                  <select name="approved_by" id="approved_by" class="form-control @error('approved_by') invalid-feedback @enderror">
                    <option value="">-Select Approved By-</option>
                    <option value="Metropolitan Region" @if(old('approved_by') == "Metropolitan Region") Selected @endif>Metropolitan Region</option>
                    <option value="Development Authority" @if(old('approved_by') == "Development Authority") Selected @endif>Development Authority</option>
                    <option value="Developer" @if(old('approved_by') == "Developer") Selected @endif>Developer</option>
                    <option value="RWA/ Co-Operative Housing Society" @if(old('approved_by') == "RWA/ Co-Operative Housing Society") Selected @endif>RWA/ Co-Operative Housing Society</option>
                    <option value="City Muncipal Corporation" @if(old('approved_by') == "City Muncipal Corporation") Selected @endif>City Muncipal Corporation</option>
                  </select>
                  @error('approved_by')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="form-group">
                <h6>Flooring & Aminities</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Flooring</label>
                  <select name="flooring" id="flooring" class="form-control @error('flooring') invalid-feedback @enderror">
                    <option value="">-Select Flooring-</option>
                    <option value="Ceramic Tiles" @if(old('flooring') == "Ceramic Tiles") Selected @endif>Ceramic Tiles</option>
                    <option value="Marble" @if(old('flooring') == "Marble") Selected @endif>Marble</option>
                    <option value="Mosaic" @if(old('flooring') == "Mosaic") Selected @endif>Mosaic</option>
                    <option value="Vetrified" @if(old('flooring') == "Vetrified") Selected @endif>Vetrified</option>
                    <option value="Granite" @if(old('flooring') == "Granite") Selected @endif>Granite</option>
                    <option value="Marbonite" @if(old('flooring') == "Marbonite") Selected @endif>Marbonite</option>
                    <option value="Normal Tiles" @if(old('flooring') == "Normal Tiles") Selected @endif>Normal Tiles</option>
                    <option value="Kota Stone" @if(old('flooring') == "Kota Stone") Selected @endif>Kota Stone</option>
                    <option value="Wooden" @if(old('flooring') == "Wooden") Selected @endif>Wooden</option>
                  </select>
                  @error('flooring')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Aminities</label>
                  <select name="aminities" id="aminities" class="form-control @error('aminities') invalid-feedback @enderror">
                    <option value="">-Select Aminities-</option>
                    <option value="Air Conditioner" @if(old('aminities') == "Air Conditioner") Selected @endif>Air Conditioner</option>
                    <option value="Banquet Hall" @if(old('aminities') == "Banquet Hall") Selected @endif>Banquet Hall</option>
                    <option value="Bar/Lounge" @if(old('aminities') == "Bar/Lounge") Selected @endif>Bar/Lounge</option>
                    <option value="Cafeteria Food Court" @if(old('aminities') == "Cafeteria Food Court") Selected @endif>Cafeteria Food Court</option>
                    <option value="Club House" @if(old('aminities') == "Club House") Selected @endif>Club House</option>
                    <option value="Conference Room" @if(old('aminities') == "Conference Room") Selected @endif>Conference Room</option>
                    <option value="DTH Television Facility" @if(old('aminities') == "DTH Television Facility") Selected @endif>DTH Television Facility</option>
                    <option value="Gymnasium" @if(old('aminities') == "Gymnasium") Selected @endif>Gymnasium</option>
                    <option value="Intercom Facility" @if(old('aminities') == "Intercom Facility") Selected @endif>Intercom Facility</option>
                    <option value="Internet Wi-Fi Facility" @if(old('aminities') == "Internet Wi-Fi Facility") Selected @endif>Internet Wi-Fi Facility</option>
                    <option value="Jogging & Strolling Track" @if(old('aminities') == "Jogging & Strolling Track") Selected @endif>Jogging & Strolling Track</option>
                    <option value="Laundary Services" @if(old('aminities') == "Laundary Services") Selected @endif>Laundary Services</option>
                    <option value="Lift" @if(old('aminities') == "Lift") Selected @endif>Lift</option>
                    <option value="Maintenance Staff" @if(old('aminities') == "Maintenance Staff") Selected @endif>Maintenance Staff</option>
                    <option value="Outdoor Tennis Court" @if(old('aminities') == "Outdoor Tennis Court") Selected @endif>Outdoor Tennis Court</option>
                    <option value="Park" @if(old('aminities') == "Park") Selected @endif>Park</option>
                    <option value="Pipe Gas" @if(old('aminities') == "Pipe Gas") Selected @endif>Pipe Gas</option>
                    <option value="Power Back Up" @if(old('aminities') == "Power Back Up") Selected @endif>Power Back Up</option>
                    <option value="Private Terrace" @if(old('aminities') == "Private Terrace") Selected @endif>Private Terrace</option>
                    <option value="Garden" @if(old('aminities') == "Garden") Selected @endif>Garden</option>
                    <option value="RO Water System" @if(old('aminities') == "RO Water System") Selected @endif>RO Water System</option>
                    <option value="Rain Water Harvesting" @if(old('aminities') == "Rain Water Harvesting") Selected @endif>Rain Water Harvesting</option>
                    <option value="Reserve Parking Security" @if(old('aminities') == "Reserve Parking Security") Selected @endif>Reserve Parking Security</option>
                    <option value="Services/ Goods Lift" @if(old('aminities') == "Services/ Goods Lift") Selected @endif>Services/ Goods Lift</option>
                    <option value="Swimming Pool" @if(old('aminities') == "Swimming Pool") Selected @endif>Swimming Pool</option>
                    <option value="Vastu Compliment" @if(old('aminities') == "Vastu Compliment") Selected @endif>Vastu Compliment</option>
                    <option value="Visitors Parking" @if(old('aminities') == "Visitors Parking") Selected @endif>Visitors Parking</option>
                    <option value="Waste Disposal" @if(old('aminities') == "Waste Disposal") Selected @endif>Waste Disposal</option>
                    <option value="Water Storage" @if(old('aminities') == "Water Storage") Selected @endif>Water Storage</option>
                  </select>
                  @error('aminities')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <hr>
                <div class="form-group">
                    <h6>Fill User Details</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4 mb-3">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ Auth::user()->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4 mb-3">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ Auth::user()->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4 mb-3">
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
                        <select id="state" class="form-control @error('state') is-invalid @enderror" name="state">
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
                        <select class="form-control @error('city') is-invalid @enderror" id="city" name="city">
                        
                        </select>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputLocality">Locality</label><span class="text-danger">*</span></label>
                        <select class="form-control @error('locality') is-invalid @enderror" id="locality" name="locality">
                        
                        </select>
                        @error('locality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label>Pin Code</label><span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" name="pin_code" value="{{ old('pin_code') }}">
                    @error('pin_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label>Address</label><span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Post Your Add</button>
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
<script>
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
            console.log(className);
            var lastChar = className.slice(-1);
            var inc  = 1 + +lastChar;
            console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
            var extension = fileName.split('.').pop();
            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel #icon"+lastChar).remove();
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
            }else{
            $(this).closest('.p_file').after(
            '<label class="filelabel p_file"><div class="icon">X</div>' +
            '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
            '<span class="title'+$next_count+'">Add File</span>' +
            '<input class="FileUpload'+$next_count+'" id="FileInput" name="photos[]" type="file"/>'+
            '<img  id="frame'+$next_count+'" width="100px" height="100px" class="hidden">'+
            '</label>');
            }
           
}

function removeField(){
    $(this).closest('.p_file').remove();
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
        $("#model_name").append('<option>Select Model Name</option>');
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
        $("#city").append('<option>Select City</option>');
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
        $("#locality").append('<option>Select Locality</option>');
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
</script>
@endsection
