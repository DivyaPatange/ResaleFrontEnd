@extends('auth.auth_layout.main')
@section('title', 'PG & Guest Houses')
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


.switch-field {
	display: flex;
    flex-wrap:wrap;
	/* margin-bottom: 36px; */
	overflow: hidden;
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

.switch input { 
    display:none;
}
.switch {
    display:inline-block;
    width:50px;
    height:14px;
    margin:5px;
    margin-left: 25px;
    -webkit-transform:translateY(50%);
    transform:translateY(50%);
    position:relative;
}

.slider {
    position:absolute;
    top:0px;
    bottom:0;
    left:0;
    right:0;
    border-radius:20px;
    background: #B7B7B7;
    cursor:pointer;
    border:4px solid transparent;
    overflow:visible;
    -webkit-transition:.4s;
    transition:.4s;
}
.slider:before {
    position:absolute;
    content:"";
    width:22px;
    height:22px;
    background:#706F6F;
    border-radius:100px;
    top: -8px;
    -webkit-transform:translateX(-0px);
    transform:translateX(-0px);
    -webkit-transition:.4s;
    transition:.4s;
    -webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.23);
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.23);
}

.switch input:checked + .slider:before {
    -webkit-transform:translateX(20px);
    transform:translateX(20px);
    background:#43AD50;
}
.off{
    position: absolute;
    left: -25px;
    top: -5px;
    color: #706F6F;
  -webkit-transition: all ease .4s;
    transition: all ease .4s;
}
.on{
    position: absolute;
    right: -20px;
    top: -5px;
     color: #d3d3d3;
    font-family: 'roboto_light',sans-serif;
    -webkit-transition: all ease .4s;
    transition: all ease .4s;
}
.switch input:checked ~ .off {
    color: #d3d3d3;
    
    top: -5px;
}

.switch input:checked ~ .on {
    color: #43AD50;
    
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
            <form method="POST" action="#" id="property-form" enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
              <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
              <input type="hidden" name="category_id" value="{{ $category->id }}">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Locality<span style="color:red;">*</span><span  style="color:red" id="locality_err"> </span></label>
                  <input type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" placeholder="Enter Locality" id="locality">
                  @error('locality')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Address<span style="color:red;">*</span><span  style="color:red" id="address_err"> </span></label>
                  <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address">
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Pincode<span style="color:red;">*</span><span  style="color:red" id="pincode_err"> </span></label>
                  <input type="number" id="pincode" class="form-control @error('pincode') is-invalid @enderror" name="pincode">
                  @error('pincode')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Landmark<span style="color:red;">*</span><span  style="color:red" id="landmark_err"> </span></label>
                  <input type="text" id="landmark" class="form-control @error('landmark') is-invalid @enderror" name="landmark">
                  @error('landmark')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>PG Operational Since<span style="color:red;">*</span><span  style="color:red" id="pg_op_err"> </span></label>
                  <input type="number" id="pg_operational_since" class="form-control @error('pg_operational_since') is-invalid @enderror" name="pg_operational_since">
                  @error('pg_operational_since')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>PG is Presented in<span style="color:red;">*</span><span  style="color:red" id="pg_present_err"> </span></label>
                  <select id="pg_present_in" class="form-control @error('pg_present_in') is-invalid @enderror" name="pg_present_in">
                    <option value="">-Select-</option>
                    <option value="An Independent Flat" @if(old('pg_present_in') == "An Independent Flat") Selected @endif>An Independent Flat</option>
                    <option value="An Independent Building" @if(old('pg_present_in') == "An Independent Building") Selected @endif>An Independent Building</option>
                    <option value="In a Society" @if(old('pg_present_in') == "In a Society") Selected @endif>In a Society</option>
                  </select>
                  @error('pg_present_in')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Name of PG<span style="color:red;">*</span><span  style="color:red" id="pg_name_err"> </span></label>
                  <input type="text" id="pg_name" class="form-control @error('pg_name') is-invalid @enderror" name="pg_name">
                  @error('pg_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Ad Posted By<span style="color:red;">*</span><span  style="color:red" id="ad_post_by_err"> </span></label>
                  <select id="ad_posted_by" class="form-control @error('ad_posted_by') is-invalid @enderror" name="ad_posted_by">
                    <option value="">-Select-</option>
                    <option value="A Owner">A Owner</option>
                    <option value="Property Manager">Property Manager</option>
                    <option value="Agent">Agent</option>
                  </select>
                  @error('ad_posted_by')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <button type="button" class="btn btn-primary" id="hideButton1">Save & Next</button>
              <div class="hidden" id="hideDiv1">
                <div class="form-group">
                    <h6>Rooms Categories in Your PG<span style="color:red;">*</span></h6><span  style="color:red" id="rc_err"> </span>
                    <small>Select all the available room categories in your PG</small>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="switch-field">
                        <input type="checkbox" id="single_bed" name="rooms_categories[]" value="Single Bed" @if(old('rooms_categories') == "Single Bed") checked @endif/>
                        <label for="single_bed">Single Bed</label>
                        <input type="checkbox" id="double_bed" name="rooms_categories[]" value="Double Bed" @if(old('rooms_categories') == "Double Bed") checked @endif/>
                        <label for="double_bed">Double Bed</label>
                        <input type="checkbox" name="rooms_categories[]" id="triple_bed" value="Triple Bed" @if(old('rooms_categories') == "Triple Bed") checked @endif>
                        <label for="triple_bed">Triple Bed</label>
                        <input type="checkbox" name="rooms_categories[]" id="four_bed" value="Four Bed" @if(old('rooms_categories') == "Four Bed") checked @endif>
                        <label for="four_bed">Four Bed</label>
                        <input type="checkbox" name="rooms_categories[]" id="other" value="Other" @if(old('rooms_categories') == "Other") checked @endif>
                        <label for="other">Other</label>
                        </div>
                    </div>
                    </div>
                    @error('rooms_categories')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="button" class="btn btn-primary" id="hideButton2">Save & Next</button>
              </div>
              <div class="hidden" id="hideDiv2">
                <div class="hidden" id="hideDiv7">
                    <div class="form-group">
                        <h6>Rent Detail For Single Sharing Room</h6>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label>No. of Single Sharing Room <span class="text-danger">*</span><span  style="color:red" id="single_room_err"> </span></label>
                            <input type="number" class="form-control" name="no_single_sharing_room" id="single_room">
                            @error('no_single_sharing_room')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Rent Per Bed<span class="text-danger">*</span><span  style="color:red" id="monthly_single_rent_err"> </span></label>
                            <input type="number" class="form-control" name="monthly_rent_per_bed" id="monthly_single_rent">
                            @error('monthly_rent_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Security Deposit Per Bed<span class="text-danger">*</span><span  style="color:red" id="deposit_single_err"> </span></label>
                            <input type="number" class="form-control" name="security_deposit_per_bed" id="deposit_single">
                            @error('security_deposit_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="hideDiv8">
                    <div class="form-group">
                        <h6>Rent Detail For Twin Sharing Room</h6>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label>No. of Twin Sharing Room <span class="text-danger">*</span><span  style="color:red" id="twin_room_err"> </span></label>
                            <input type="number" class="form-control" name="no_twin_sharing_room" id="twin_room">
                            @error('no_twin_sharing_room')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Rent Per Bed<span class="text-danger">*</span><span  style="color:red" id="monthly_twin_rent_err"> </span></label>
                            <input type="number" class="form-control" name="monthly_rent_per_bed" id="monthly_twin_rent">
                            @error('monthly_rent_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Security Deposit Per Bed<span class="text-danger">*</span><span  style="color:red" id="deposit_twin_err"> </span></label>
                            <input type="number" class="form-control" name="security_deposit_per_bed" id="deposit_twin">
                            @error('security_deposit_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="hideDiv9">
                    <div class="form-group">
                        <h6>Rent Detail For Triple Sharing Room</h6>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label>No. of Triple Sharing Room <span class="text-danger">*</span><span  style="color:red" id="triple_room_err"> </span></label>
                            <input type="number" class="form-control" name="no_triple_sharing_room" id="triple_room">
                            @error('no_triple_sharing_room')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Rent Per Bed<span class="text-danger">*</span><span  style="color:red" id="monthly_triple_rent_err"> </span></label>
                            <input type="number" class="form-control" name="monthly_rent_per_bed" id="monthly_triple_rent">
                            @error('monthly_rent_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Security Deposit Per Bed<span class="text-danger">*</span><span  style="color:red" id="deposit_triple_err"> </span></label>
                            <input type="number" class="form-control" name="security_deposit_per_bed" id="deposit_triple">
                            @error('security_deposit_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="hideDiv10">
                    <div class="form-group">
                        <h6>Rent Detail For Four Sharing Room</h6>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label>No. of Four Sharing Room <span class="text-danger">*</span><span  style="color:red" id="four_room_err"> </span></label>
                            <input type="number" class="form-control" name="no_four_sharing_room" id="four_room">
                            @error('no_four_sharing_room')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Rent Per Bed<span class="text-danger">*</span><span  style="color:red" id="monthly_four_rent_err"> </span></label>
                            <input type="number" class="form-control" name="monthly_rent_per_bed" id="monthly_four_rent">
                            @error('monthly_rent_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Security Deposit Per Bed<span class="text-danger">*</span><span  style="color:red" id="deposit_four_err"> </span></label>
                            <input type="number" class="form-control" name="security_deposit_per_bed" id="deposit_four">
                            @error('security_deposit_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="hideDiv11">
                    <div class="form-group">
                        <h6>Rent Detail For Other Sharing Room</h6>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label>No. of Other Sharing Room <span class="text-danger">*</span><span  style="color:red" id="other_room_err"> </span></label>
                            <input type="number" class="form-control" name="no_other_sharing_room" id="other_room">
                            @error('no_other_sharing_room')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Rent Per Bed<span class="text-danger">*</span><span  style="color:red" id="monthly_other_rent_err"> </span></label>
                            <input type="number" class="form-control" name="monthly_rent_per_bed" id="monthly_other_rent">
                            @error('monthly_rent_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Security Deposit Per Bed<span class="text-danger">*</span><span  style="color:red" id="deposit_other_err"> </span></label>
                            <input type="number" class="form-control" name="security_deposit_per_bed" id="deposit_other">
                            @error('security_deposit_per_bed')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Room Facilities<span class="text-danger">*</span><span  style="color:red" id="room_facility_err"> </span></h6>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="switch-field">
                        <input type="checkbox" id="Geyser" name="room_facility[]" value="Geyser" @if(old('room_facility') == "Geyser") checked @endif/>
                        <label for="Geyser">Geyser</label>
                        <input type="checkbox" id="Washrooms" name="room_facility[]" value="Washrooms" @if(old('room_facility') == "Washrooms") checked @endif/>
                        <label for="Washrooms">Washrooms</label>
                        <input type="checkbox" name="room_facility[]" id="Cupboard" value="Cupboard" @if(old('room_facility') == "Cupboard") checked @endif>
                        <label for="Cupboard">Cupboard</label>
                        <input type="checkbox" name="room_facility[]" id="TV" value="TV" @if(old('room_facility') == "TV") checked @endif>
                        <label for="TV">TV</label>
                        <input type="checkbox" name="room_facility[]" id="AC" value="AC" @if(old('room_facility') == "AC") checked @endif>
                        <label for="AC">AC</label>
                        <input type="checkbox" name="room_facility[]" id="Cot" value="Cot" @if(old('room_facility') == "Cot") checked @endif>
                        <label for="Cot">Cot</label>
                        <input type="checkbox" name="room_facility[]" id="Mattress" value="Mattress" @if(old('room_facility') == "Mattress") checked @endif>
                        <label for="Mattress">Mattress</label>
                        <input type="checkbox" name="room_facility[]" id="side_table" value="Side Table" @if(old('room_facility') == "Side Table") checked @endif>
                        <label for="side_table">Side Table</label>
                        <input type="checkbox" name="room_facility[]" id="air_cooler" value="Air Cooler" @if(old('room_facility') == "Air Cooler") checked @endif>
                        <label for="air_cooler">Air Cooler</label>
                        </div>
                    </div>
                    </div>
                    @error('room_facility')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <h6>Preferred Gender<span class="text-danger">*</span><span  style="color:red" id="gender_err"> </span></h6>
                    </div>
                    <div class="col-md-8">
                        <div class="switch-field">
                        <input type="radio" id="Male" name="gender" value="Male" @if(old('gender') == "Male") checked @endif/>
                        <label for="Male">Male</label>
                        <input type="radio" id="Female" name="gender" value="Female" @if(old('gender') == "Female") checked @endif/>
                        <label for="Female">Female</label>
                        <input type="radio" name="gender" id="Both" value="Both" @if(old('gender') == "Both") checked @endif>
                        <label for="Both">Both</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <h6>Set Your Tenent Preferance <span class="text-danger">*</span><span  style="color:red" id="tenent_preference_err"> </span></h6>
                    </div>
                    <div class="col-md-8">
                        <div class="switch-field">
                        <input type="radio" id="Professional" name="tenent_preference" value="Professional" @if(old('tenent_preference') == "Professional") checked @endif/>
                        <label for="Professional">Professional</label>
                        <input type="radio" id="Student" name="tenent_preference" value="Student" @if(old('tenent_preference') == "Student") checked @endif/>
                        <label for="Student">Student</label>
                        <input type="radio" name="tenent_preference" id="Both" value="Both" @if(old('tenent_preference') == "Both") checked @endif>
                        <label for="Both">Both</label>
                        </div>
                    </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="hideButton3">Save & Next</button>
              </div>
              <div class="hidden" id="hideDiv3">
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <h6>PG Rules<span class="text-danger">*</span><span  style="color:red" id="rules_err"> </span></h6>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item border d-flex justify-content-between">Veg Only <input type="checkbox" name="rules[]" value="Veg Only"></li>
                            <li class="list-group-item border d-flex justify-content-between">No Smoking <input type="checkbox" name="rules[]" value="No Smoking"></li>
                            <li class="list-group-item border d-flex justify-content-between">Drinking Alcohol Not Allowed <input type="checkbox" name="rules[]" value="Drinking Alcohol Not Allowed"></li>
                            <li class="list-group-item border d-flex justify-content-between">Entry of Opposite Gender Not Allowed <input type="checkbox" name="rules[]" value="Entry of Opposite Gender Not Allowed"></li>
                            <li class="list-group-item border d-flex justify-content-between">Guardian Not Allowed <input type="checkbox" name="rules[]" value="Guardian Not Allowed"></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <h6>Notice Period<span class="text-danger">*</span><span  style="color:red" id="notice_period_err"> </span></h6>
                    </div>
                    <div class="col-md-8">
                        <select name="notice_period" class="form-control" id="notice_period">
                            <option value="">-Select Notice Period-</option>
                            <option value="1 Week" @if(old('notice_period') == "1 Week") Selected @endif>1 Week</option>
                            <option value="15 Days" @if(old('notice_period') == "15 Days") Selected @endif>15 Days</option>
                            <option value="1 Month" @if(old('notice_period') == "1 Month") Selected @endif>1 Month</option>
                            <option value="2 Month" @if(old('notice_period') == "2 Month") Selected @endif>2 Month</option>
                            <option value="No Notice Period" @if(old('notice_period') == "No Notice Period") Selected @endif>No Notice Period</option>
                        </select>
                    </div>
                    </div>
                    @error('notice_period')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-between">
                    <h6>Tenants must be back in PG before</h6>
                    <label class="switch">
                        <input type="checkbox" id="tenants_back_time" onclick="ShowHideDiv(this)">           
                        <span class="slider"></span>
                        <p class="off"></p>
                        <p class="on"></p>
                    </label>
                </div>
                <div id="gct" class="hidden">
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Gate Closing Time</h6>
                        </div>
                        <div class="col-md-8">
                            <select name="gate_closed_time" class="form-control">
                                <option value="">-Select Time-</option>
                                <option value="07:00 PM" @if(old('gate_closed_time') == "07:00 PM") Selected @endif>07:00 PM</option>
                                <option value="08:00 PM" @if(old('gate_closed_time') == "08:00 PM") Selected @endif>08:00 PM</option>
                                <option value="09:00 PM" @if(old('gate_closed_time') == "09:00 PM") Selected @endif>09:00 PM</option>
                                <option value="10:00 PM" @if(old('gate_closed_time') == "10:00 PM") Selected @endif>10:00 PM</option>
                                <option value="11:00 PM" @if(old('gate_closed_time') == "11:00 PM") Selected @endif>11:00 PM</option>
                                <option value="12:00 PM" @if(old('gate_closed_time') == "12:00 PM") Selected @endif>12:00 PM</option>
                            </select>
                        </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary" id="hideButton4">Save & Next</button>
              </div>
              <div class="hidden" id="hideDiv4">
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <h6>Services Available</h6>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item border d-flex justify-content-between">Laundry <input type="checkbox" name="services[]" value="Laundry"></li>
                            <li class="list-group-item border d-flex justify-content-between">Room Cleaning <input type="checkbox" name="services[]" value="Room Cleaning"></li>
                            <li class="list-group-item border d-flex justify-content-between">Warden <input type="checkbox" name="services[]" value="Warden"></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <h6>Food Provided</h6>
                    <label class="switch">
                        <input type="checkbox" id="food_service" onclick="ShowHideDiv1(this)">           
                        <span class="slider"></span>
                        <p class="off"></p>
                        <p class="on"></p>
                    </label>
                </div>
                <div id="fp" class="hidden">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                              <h6>Veg/Non-Veg Food Provided</h6>
                          </div>
                          <div class="col-md-8">
                              <select name="food_type" class="form-control">
                                  <option value="">-Select Veg/Non-Veg Food Provided-</option>
                                  <option value="Veg" @if(old('food_type') == "Veg") Selected @endif>Veg</option>
                                  <option value="Veg/Non-Veg" @if(old('food_type') == "Veg/Non-Veg") Selected @endif>Veg/Non-Veg</option>
                              </select>
                          </div>
                      </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary" id="hideButton5">Save & Next</button>
               </div> 
                <div class="hidden" id="hideDiv5">
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-4">
                            <h6>Common Area Amenities</h6>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item border d-flex justify-content-between">Kitchen for Self-Cooking <input type="checkbox" name="amenities[]" value="Kitchen for Self-Cooking"></li>
                                <li class="list-group-item border d-flex justify-content-between">RO <input type="checkbox" name="amenities[]" value="RO"></li>
                                <li class="list-group-item border d-flex justify-content-between">Fridge <input type="checkbox" name="amenities[]" value="Fridge"></li>
                                <li class="list-group-item border d-flex justify-content-between">Microwave <input type="checkbox" name="amenities[]" value="Microwave"></li>
                                <li class="list-group-item border d-flex justify-content-between">Lift <input type="checkbox" name="amenities[]" value="Lift"></li>
                                <li class="list-group-item border d-flex justify-content-between">Gymnasium <input type="checkbox" name="amenities[]" value="Gymnasium"></li>
                                <li class="list-group-item border d-flex justify-content-between">Power Backup <input type="checkbox" name="amenities[]" value="Power Backup"></li>
                                <li class="list-group-item border d-flex justify-content-between">Wi-Fi <input type="checkbox" name="amenities[]" value="Wi-Fi"></li>
                                <li class="list-group-item border d-flex justify-content-between">TV <input type="checkbox" name="amenities[]" value="TV"></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <h6>Parking Availability</h6>
                        <label class="switch">
                            <input type="checkbox" id="parking_available" onclick="ShowHideDiv2(this)">           
                            <span class="slider"></span>
                            <p class="off"></p>
                            <p class="on"></p>
                        </label>
                    </div>
                    <div id="pa" class="hidden">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                  <select name="parking" class="form-control">
                                      <option value="">-Select-</option>
                                      <option value="2-Wheeler" @if(old('parking') == "2-Wheeler") Selected @endif>2-Wheeler</option>
                                      <option value="Car Parking" @if(old('parking') == "Car Parking") Selected @endif>Car Parking</option>
                                      <option value="Both" @if(old('parking') == "Both") Selected @endif>Both</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>PG Description <span class="text-danger">*</span><span  style="color:red" id="pg_description_err"> </span></label>
                        <textarea class="form-control @error('pg_description') is-invalid @enderror" id="pg_description"  name="pg_description">{{ old('pg_description') }}</textarea>
                        @error('pg_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Photos <span class="text-danger">*</span><span  style="color:red" id="photos_err"> </span></label>
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
                        <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                    @error('photos')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ Auth::user()->name }}">
                    <hr>
                    <button type="button" id="submitForm" class="btn btn-primary">Post Your Add</button>
                </div>
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
            '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
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
  $('body').on('click', '#hideButton1', function () {
    var locality = $("#locality").val();
    var address = $("#address").val();
    var pincode = $("#pincode").val();
    var landmark = $("#landmark").val();
    var pg_operational_since = $("#pg_operational_since").val();
    var pg_present_in = $("#pg_present_in").val();
    var pg_name = $("#pg_name").val();
    var ad_posted_by = $("#ad_posted_by").val();
    if(locality=="") {
      $("#locality_err").fadeIn().html("Required");
      setTimeout(function(){ $("#locality_err").fadeOut(); }, 3000);
      $("#locality").focus();
      return false;
    }
    if(address=="") {
      $("#address_err").fadeIn().html("Required");
      setTimeout(function(){ $("#address_err").fadeOut(); }, 3000);
      $("#address").focus();
      return false;
    }
    if(pincode=="") {
      $("#pincode_err").fadeIn().html("Required");
      setTimeout(function(){ $("#pincode_err").fadeOut(); }, 3000);
      $("#pincode").focus();
      return false;
    }
    if(landmark=="") {
      $("#landmark_err").fadeIn().html("Required");
      setTimeout(function(){ $("#landmark_err").fadeOut(); }, 3000);
      $("#landmark").focus();
      return false;
    }
    if(pg_operational_since=="") {
      $("#pg_op_err").fadeIn().html("Required");
      setTimeout(function(){ $("#pg_op_err").fadeOut(); }, 3000);
      $("#pg_operational_since").focus();
      return false;
    }
    if(pg_present_in=="") {
      $("#pg_present_err").fadeIn().html("Required");
      setTimeout(function(){ $("#pg_present_err").fadeOut(); }, 3000);
      $("#pg_present_in").focus();
      return false;
    }
    if(pg_name=="") {
      $("#pg_name_err").fadeIn().html("Required");
      setTimeout(function(){ $("#pg_name_err").fadeOut(); }, 3000);
      $("#pg_name").focus();
      return false;
    }
    if(ad_posted_by=="") {
      $("#ad_post_by_err").fadeIn().html("Required");
      setTimeout(function(){ $("#ad_post_by_err").fadeOut(); }, 3000);
      $("#ad_posted_by").focus();
      return false;
    }
    else{
      $("#hideDiv1").removeClass("hidden");
      $("#hideButton1").addClass("hidden");
    }
  })
  $('body').on('click', '#hideButton2', function () {
    var rooms_categories = new Array();
    $.each($("input[name='rooms_categories[]']:checked"), function() {
        rooms_categories.push($(this).val());
    });
    // alert(rooms_categories[0]);
    if(rooms_categories.length==0) {
      $("#rc_err").fadeIn().html("Required");
      setTimeout(function(){ $("#rc_err").fadeOut(); }, 3000);
      $("input[name='rooms_categories[]']").focus();
      return false;
    }
    else{
      $("#hideDiv2").removeClass("hidden");
      $("#hideButton2").addClass("hidden");
      for( var i=0; i < rooms_categories.length; i++)
      {
        if(rooms_categories[i] == "Single Bed")
        {
          $("#hideDiv7").removeClass("hidden");
        }
        if(rooms_categories[i] == "Double Bed")
        {
          $("#hideDiv8").removeClass("hidden");
        }
        if(rooms_categories[i] == "Triple Bed")
        {
          $("#hideDiv9").removeClass("hidden");
        }
        if(rooms_categories[i] == "Four Bed")
        {
          $("#hideDiv10").removeClass("hidden");
        }
        if(rooms_categories[i] == "Other")
        {
          $("#hideDiv11").removeClass("hidden");
        }
      }
    }
  })
  $('body').on('click', '#hideButton3', function () {
    var single_room = $("#single_room").val();
    var monthly_single_rent = $("#monthly_single_rent").val();
    var deposit_single = $("#deposit_single").val();
    var twin_room = $("#twin_room").val();
    var monthly_twin_rent = $("#monthly_twin_rent").val();
    var deposit_twin = $("#deposit_twin").val();
    var triple_room = $("#triple_room").val();
    var monthly_triple_rent = $("#monthly_triple_rent").val();
    var deposit_triple = $("#deposit_triple").val();
    var four_room = $("#four_room").val();
    var monthly_four_rent = $("#monthly_four_rent").val();
    var deposit_four = $("#deposit_four").val();
    var other_room = $("#other_room").val();
    var monthly_other_rent = $("#monthly_other_rent").val();
    var deposit_other = $("#deposit_other").val();
    var room_facility = new Array();
    $.each($("input[name='room_facility[]']:checked"), function() {
      room_facility.push($(this).val());
    });
    var gender = $("input[name='gender']:checked").val();
    var tenent_preference = $("input[name='tenent_preference']:checked").val();
    // alert(single_room);
    // if (single_room=="") {
    //     $("#single_room_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#tenent_preference").fadeOut(); }, 3000);
    //     $("single_room").focus();
    //     return false;
    // }
    // if (monthly_single_rent=="") {
    //     $("#monthly_single_rent_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#monthly_single_rent_err").fadeOut(); }, 3000);
    //     $("monthly_single_rent").focus();
    //     return false;
    // }
    // if (deposit_single=="") {
    //     $("#deposit_single_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#deposit_single_err").fadeOut(); }, 3000);
    //     $("deposit_single").focus();
    //     return false;
    // }
    // if (twin_room=="") {
    //     $("#twin_room_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#twin_room_err").fadeOut(); }, 3000);
    //     $("twin_room").focus();
    //     return false;
    // }
    // if (monthly_twin_rent=="") {
    //     $("#monthly_twin_rent_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#monthly_twin_rent_err").fadeOut(); }, 3000);
    //     $("monthly_twin_rent").focus();
    //     return false;
    // }
    // if (deposit_twin=="") {
    //     $("#deposit_twin_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#deposit_twin_err").fadeOut(); }, 3000);
    //     $("deposit_twin").focus();
    //     return false;
    // }
    // if (triple_room=="") {
    //     $("#triple_room_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#triple_room_err").fadeOut(); }, 3000);
    //     $("triple_room").focus();
    //     return false;
    // }
    // if (monthly_triple_rent=="") {
    //     $("#monthly_triple_rent_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#monthly_triple_rent_err").fadeOut(); }, 3000);
    //     $("monthly_triple_rent").focus();
    //     return false;
    // }
    // if (deposit_triple=="") {
    //     $("#deposit_triple_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#deposit_triple_err").fadeOut(); }, 3000);
    //     $("deposit_triple").focus();
    //     return false;
    // }
    // if (four_room=="") {
    //     $("#four_room_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#four_room_err").fadeOut(); }, 3000);
    //     $("four_room").focus();
    //     return false;
    // }
    // if (monthly_four_rent=="") {
    //     $("#monthly_four_rent_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#monthly_four_rent_err").fadeOut(); }, 3000);
    //     $("monthly_four_rent").focus();
    //     return false;
    // }
    // if (deposit_four=="") {
    //     $("#deposit_four_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#deposit_four_err").fadeOut(); }, 3000);
    //     $("deposit_four").focus();
    //     return false;
    // }
    // if (other_room=="") {
    //     $("#other_room_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#other_room_err").fadeOut(); }, 3000);
    //     $("other_room").focus();
    //     return false;
    // }
    // if (monthly_other_rent=="") {
    //     $("#monthly_other_rent_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#monthly_other_rent_err").fadeOut(); }, 3000);
    //     $("monthly_other_rent").focus();
    //     return false;
    // }
    // if (deposit_other=="") {
    //     $("#deposit_other_err").fadeIn().html("Required");
    //     setTimeout(function(){ $("#deposit_other_err").fadeOut(); }, 3000);
    //     $("deposit_other").focus();
    //     return false;
    // }
    if(room_facility.length == 0)
    {
        $("#room_facility_err").fadeIn().html("Required");
        setTimeout(function(){ $("#room_facility_err").fadeOut(); }, 3000);
        // $("deposit_other").focus();
        return false;
    }
    if (gender == null) {
        $("#gender_err").fadeIn().html("Required");
        setTimeout(function(){ $("#gender_err").fadeOut(); }, 3000);
        // $("deposit_other").focus();
        return false;
    }
    if (tenent_preference==null) {
        $("#tenent_preference_err").fadeIn().html("Required");
        setTimeout(function(){ $("#tenent_preference_err").fadeOut(); }, 3000);
        // $("deposit_other").focus();
        return false;
    }
    else{
    // alert(single_room);
      $("#hideDiv3").removeClass("hidden");
      $("#hideButton3").addClass("hidden");
    }
  })
  $('body').on('click', '#hideButton4', function () {
    var rules = new Array();
    $.each($("input[name='rules[]']:checked"), function() {
      rules.push($(this).val());
    });
    // alert(rules);
    var notice_period = $("#notice_period").val();
    if (rules.length==0) {
      $("#rules_err").fadeIn().html("Required");
      setTimeout(function(){ $("#rules_err").fadeOut(); }, 3000);
      // $("deposit_other").focus();
      return false;
    }
    if (notice_period=="") {
      $("#notice_period_err").fadeIn().html("Required");
      setTimeout(function(){ $("#notice_period_err").fadeOut(); }, 3000);
      $("notice_period").focus();
      return false;
    }
    else{
      $("#hideDiv4").removeClass("hidden");
      $("#hideButton4").addClass("hidden");
    }
  })

  $('body').on('click', '#hideButton5', function () {
    $("#hideDiv5").removeClass("hidden");
      $("#hideButton5").addClass("hidden");
  });
  $('body').on('click', '#hideButton6', function () {
    $("#hideDiv6").removeClass("hidden");
      $("#hideButton6").addClass("hidden");
  });
  
  function ShowHideDiv(tenants_back_time) {
    $("#gct").fadeToggle();
  }
  function ShowHideDiv1(food_service) {
    $("#fp").fadeToggle();
  }
  function ShowHideDiv2(parking_available) {
    $("#pa").fadeToggle();
  }
  $('body').on('click', '#submitForm', function () {
    var pg_description = $('textarea#pg_description').val();
    var photos = new Array();
    $.each($("input[name='photos[]']"), function() {
      photos.push($(this).val());
    });
    // alert(photos);
    if (pg_description=="") {
      $("#pg_description_err").fadeIn().html("Required");
      setTimeout(function(){ $("#pg_description_err").fadeOut(); }, 3000);
      $("pg_description").focus();
      return false;
    }
    // alert(photos.length);
    if(photos.length == 1) {
      $("#photos_err").fadeIn().html("Required");
      setTimeout(function(){ $("#photos_err").fadeOut(); }, 3000);
      // $("photos").focus();
      return false;
    }
    else{
      $("#property-form").submit();
    }
  })
</script>
@endsection
