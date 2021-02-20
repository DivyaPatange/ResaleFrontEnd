@extends('auth.auth_layout.main')
@section('title', 'Property For Rent/Lease')
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
#upload_form, #upload_form1, #upload_form2, #upload_form3, #upload_form4, #upload_form5, #upload_form6, #upload_form7, #upload_form8{
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

.plus-minus {

}
.css-label {
  cursor: pointer;
}
.css-checkbox {
  display: none;
}
.fa {
  color: white;
  line-height: 16px;
  border-radius: 4px;
}
.fa-plus {
  padding-top: 2px;
  padding-right: 2px;
  padding-left: 2px;
  background-color: #3AC5C9;
}
.fa-minus {
  padding-top: 1px;
  padding-right: 2px;
  padding-left: 2px;
  background-color: #E85764;
  display: none;
}
.css-checkbox:checked + .css-label .fa-minus {
  display: inline;
}
.css-checkbox:checked + .css-label .fa-plus {
  display: none;
}

/* Tab Pane CSS */

nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
border: none;
  padding: 8px 7px;
  color:#fff;
  background:#272e38;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
content: "";
position: relative;
bottom: -40px;
left: -40%;
border: 8px solid transparent;
border-top-color: #e74c3c ;
}
.tab-content{
background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top:5px solid #e74c3c;
  border-bottom:5px solid #e74c3c;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
border: none;
  background: #e74c3c;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}
</style>
@endsection
@section('content')
<section class="intro-single mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-single-box">
          <h1 class="title-single">The Best Way To Sell Your </h1>
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
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Property Type<span class="text-danger">*<span><span  style="color:red" id="pt_err"> </span></label>
                    </div>
                    <div class="form-group col-md-8">
                        <select id="property_type" class="form-control @error('property_type') is-invalid @enderror" name="property_type">
                            <option value="">Choose...</option>
                            <option value="Flat" @if(old('property_type') == "Flat") Selected @endif>Flat</option>
                            <option value="Apartment" @if(old('property_type') == "Apartment") Selected @endif>Apartment</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Property Location</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City<span class="text-danger">*<span><span  style="color:red" id="city_err"> </span></label>
                        <select id="city" class="form-control @error('city') is-invalid @enderror" name="city">
                            <option value="">Choose City...</option>
                            
                        </select>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLocality">Locality<span class="text-danger">*</span><span  style="color:red" id="locality_err"> </span></label>
                        <select class="form-control @error('locality') is-invalid @enderror" id="locality" name="locality">
                        
                        </select>
                        @error('locality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label><span class="text-danger">*</span></label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"></textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="">Name of Project Office Complex<span class="text-danger">*</span><span  style="color:red" id="project_name_err"> </span></label>
                        <input type="text" name="project_name" class="form-control" id="project_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Land Zone</label>
                        <select name="land_zone" id="" class="form-control">
                            <option value="">-Select Land Zone-</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Residential">Residential</option>
                            <option value="Transport & Communication">Transport & Communication</option>
                            <option value="Public Utilities">Public Utilities</option>
                            <option value="Public & Semi Public Use">Public & Semi Public Use</option>
                            <option value="Open Spaces">Open Spaces</option>
                            <option value="Agricultural Zone">Agricultural Zone</option>
                            <option value="Special Economic Zone">Special Economic Zone</option>
                            <option value="Natural Conservation Zone">Natural Conservation Zone</option>
                            <option value="Government Use">Government Use</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-metro-tab" data-toggle="tab" href="#nav-metro" role="tab" aria-controls="nav-metro" aria-selected="true">Metro Station</a>
                            <a class="nav-item nav-link" id="nav-railway-tab" data-toggle="tab" href="#nav-railway" role="tab" aria-controls="nav-railway" aria-selected="false">Railway Station</a>
                            <a class="nav-item nav-link" id="nav-bus-tab" data-toggle="tab" href="#nav-bus" role="tab" aria-controls="nav-bus" aria-selected="false">Bus Stand</a>
                            <a class="nav-item nav-link" id="nav-airport-tab" data-toggle="tab" href="#nav-airport" role="tab" aria-controls="nav-airport" aria-selected="false">Airport</a>
                            <a class="nav-item nav-link" id="nav-shopping-tab" data-toggle="tab" href="#nav-shopping" role="tab" aria-controls="nav-shopping" aria-selected="false">Shopping Mall</a>
                            <a class="nav-item nav-link" id="nav-office-tab" data-toggle="tab" href="#nav-office" role="tab" aria-controls="nav-office" aria-selected="false">Office Complex</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-metro" role="tabpanel" aria-labelledby="nav-metro-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Metro Station</label>
                                            <input type="text" name="metro_station" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_metro" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-railway" role="tabpanel" aria-labelledby="nav-railway-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Railway Station</label>
                                            <input type="text" name="railway_station" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_railway" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-bus" role="tabpanel" aria-labelledby="nav-bus-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bus Stand</label>
                                            <input type="text" name="bus_stand" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_bus" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-airport" role="tabpanel" aria-labelledby="nav-airport-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Airport</label>
                                            <input type="text" name="airport" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_airport" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-shopping" role="tabpanel" aria-labelledby="nav-shopping-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Shopping Mall</label>
                                            <input type="text" name="shopping_mall" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_mall" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-office" role="tabpanel" aria-labelledby="nav-office-tab">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Office Complex</label>
                                            <input type="text" name="office_complex" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Distance from Property</label>
                                            <input type="text" name="distance_office" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Nearby Business</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" name="ideal_business" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <h6>Property Feature</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Total Floors</label>
                    </div>
                    <div class="form-group col-md-8">
                        <select name="total_floor" class="form-control" id="">
                            <option value="">-Select-</option>
                            @for($i=1; $i <= 200; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <label>Furnished Status<span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <div class="switch-field">
                            <input type="radio" id="Furnished" name="furnishing" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif/>
                            <label for="Furnished">Furnished</label>
                            <input type="radio" id="Unfurnished" name="furnishing" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif/>
                            <label for="Unfurnished">Unfurnished</label>
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
                    <div class="row">
                        <div class="col-md-4">
                            <label>Washroom <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="switch-field">
                                <input type="radio" id="inlineRadio1" name="bathroom" value="1" @if(old('bathroom') == "1") checked @endif/>
                                <label for="inlineRadio1">1</label>
                                <input type="radio" id="inlineRadio2" name="bathroom" value="2" @if(old('bathroom') == "2") checked @endif/>
                                <label for="inlineRadio2">2</label>
                                <input type="radio" id="inlineRadio3" name="bathroom" value="3" @if(old('bathroom') == "3") checked @endif/>
                                <label for="inlineRadio3">3</label>
                                <input type="radio" id="inlineRadio4" name="bathroom" value="4" @if(old('bathroom') == "4") checked @endif/>
                                <label for="inlineRadio4">4</label>
                                <input type="radio" id="inlineRadio5" name="bathroom" value="5" @if(old('bathroom') == "5") checked @endif/>
                                <label for="inlineRadio5">5</label>
                            </div>
                        </div>
                    </div>
                    @error('bathroom')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Lock in Period (In Years)</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="lock_period" max="2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Corner Showroom</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="corner_showroom" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="corner_showroom" value="No">No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Is Main Road Facing</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="main_road_facing" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="main_road_facing" value="No">No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Personal Washroom</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="personal_washroom" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="personal_washroom" value="No">No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Pantry/Cafeteria</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pantry_cafe" value="Dry">Dry
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pantry_cafe" value="Wet">Wet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pantry_cafe" value="Not Available">Not Available
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Area</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Super Build Up Area<span class="text-danger">*</span></label>
                        @error('super_build_up_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <select name="super_area_unit" id="super_area_unit" class="form-control">
                            <option value="Sq-ft">Sq-ft</option>
                            <option value="Sq-yrd">Sq-yrd</option>
                            <option value="Sq-m">Sq-m</option>
                            <option value="Acre">Acre</option>
                            <option value="Bigha">Bigha</option>
                            <option value="Hectare">Hectare</option>
                            <option value="Marla">Marla</option>
                            <option value="Kanal">Kanal</option>
                            <option value="Biswa1">Biswa1</option>
                            <option value="Biswa2">Biswa2</option>
                            <option value="Ground">Ground</option>
                            <option value="Aankadam">Aankadam</option>
                            <option value="Rood">Rood</option>
                            <option value="Chatak">Chatak</option>
                            <option value="Kottah">Kottah</option>
                            <option value="Cent">Cent</option>
                        </select>
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="">Carpet Area <small>(Sq.ft.)</small></label>
                        @error('carpet_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" id="carpet_area" class="form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <select name="super_area_unit" id="super_area_unit" class="form-control">
                            <option value="Sq-ft">Sq-ft</option>
                            <option value="Sq-yrd">Sq-yrd</option>
                            <option value="Sq-m">Sq-m</option>
                            <option value="Acre">Acre</option>
                            <option value="Bigha">Bigha</option>
                            <option value="Hectare">Hectare</option>
                            <option value="Marla">Marla</option>
                            <option value="Kanal">Kanal</option>
                            <option value="Biswa1">Biswa1</option>
                            <option value="Biswa2">Biswa2</option>
                            <option value="Ground">Ground</option>
                            <option value="Aankadam">Aankadam</option>
                            <option value="Rood">Rood</option>
                            <option value="Chatak">Chatak</option>
                            <option value="Kottah">Kottah</option>
                            <option value="Cent">Cent</option>
                        </select>
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="">Build Up Area <small>(Sq.ft.)</small></label>
                        @error('build_up_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" id="build_up_area" class="form-control @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <select name="super_area_unit" id="super_area_unit" class="form-control">
                            <option value="Sq-ft">Sq-ft</option>
                            <option value="Sq-yrd">Sq-yrd</option>
                            <option value="Sq-m">Sq-m</option>
                            <option value="Acre">Acre</option>
                            <option value="Bigha">Bigha</option>
                            <option value="Hectare">Hectare</option>
                            <option value="Marla">Marla</option>
                            <option value="Kanal">Kanal</option>
                            <option value="Biswa1">Biswa1</option>
                            <option value="Biswa2">Biswa2</option>
                            <option value="Ground">Ground</option>
                            <option value="Aankadam">Aankadam</option>
                            <option value="Rood">Rood</option>
                            <option value="Chatak">Chatak</option>
                            <option value="Kottah">Kottah</option>
                            <option value="Cent">Cent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Width of Entrance</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="entrance_width">
                    </div>
                    <div class="form-group col-md-3">
                        <select name="entrance_unit" class="form-control" id="">
                            <option value="meters">meters</option>
                            <option value="ft">ft</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Width of Facing Road</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" name="facing_width">
                    </div>
                    <div class="form-group col-md-3">
                        <select name="entrance_unit" class="form-control" id="">
                            <option value="meters">meters</option>
                            <option value="ft">ft</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Transaction Type/Property Availability</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <label for="">Available From</label>
                    </div>
                    <div class="col-md-6 form-group">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date
                        <div class="hidden" id="showDateDiv">
                            <input type="date" class="form-control" name="available_date">
                        </div>
                        </label>
                    </div>
                    </div>
                    <div class="col-md-3 form-group">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="available_from" value="Immediately">Immediately
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Age of Construction <span class="text-danger">*</span></label>
                    <select class="form-control @error('age_of_construction') is-invalid @enderror" id="age_of_construction" name="age_of_construction">
                        <option value="">-Select-</option>
                        <option value="New Construction">New Construction</option>
                        <option value="Less than 5 years">Less than 5 years</option>
                        <option value="5 to 10 years">5 to 10 years</option>
                        <option value="10 to 15 years">10 to 15 years</option>
                        <option value="15 to 20 years">15 to 20 years</option>
                        <option value="Above 20 years">Above 20 years</option>
                    </select>
                    @error('age_of_construction')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Currently Rent Out</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rent_out" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rent_out" value="No">No
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <h6>Rent/Lease Detail</h6>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="">Monthly Rent</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="monthly_rent" name="monthly_rent" onkeyup="show_price.innerHTML=convertNumberToWords(this.value)">
                        <span id="show_price" class="text-muted"></span>
                    </div>
                </div>
                <div id="show_rent" class="hidden">
                    <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Show Rent as</label>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="show_rent_as" >
                            <span id="rent_1"></span>
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="show_rent_as" >
                            <span id="rent_2"></span>
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="show_rent_as">Call For Price
                        </label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="plus-minus">
                    <input type="checkbox" name="other_charges" id="a" class="css-checkbox">
                    <label for="a" class="css-label">
                        <span class="fa fa-plus"></span>
                        <span class="fa fa-minus"></span>
                        Add Other Charges
                    </label>
                    </div>
                </div>
                <div id="otherChargesDiv" class="hidden">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Other Charges</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="other_charges">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" name="ele_water_charges" class="form-check-input" value="1" checked>Electricity & Water charges excluded.
                    </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">Security/Deposit Amount</label>
                    </div>
                    <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="security_amount">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="number" name="maintenance_charge" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="">Per</label>
                    <select name="m_charges_per" id="" class="form-control">
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="One-Time">One-Time</option>
                        <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
                    </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                    </div>
                    <div class="form-group col-md-6">
                    <select name="brokerage" id="" class="form-control">
                        <option value="">-Select Brokerage-</option>
                        <option value="No Brokerage">No Brokerage</option>
                        <option value="10 Days">10 Days</option>
                        <option value="15 Days">15 Days</option>
                        <option value="20 Days">20 Days</option>
                        <option value="25 Days">25 Days</option>
                        <option value="30 Days">30 Days</option>
                        <option value="45 Days">45 Days</option>
                        <option value="Others">Others</option>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Photos</h6>
                </div>
                <div class="form-group">
                    <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Exterior View</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Living Room</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Bedroom</a>
                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Bathrooms</a>
                        <a class="nav-item nav-link" id="nav-kitchen-tab" data-toggle="tab" href="#nav-kitchen" role="tab" aria-controls="nav-about" aria-selected="false">Kitchen</a>
                        <a class="nav-item nav-link" id="nav-floor-tab" data-toggle="tab" href="#nav-floor" role="tab" aria-controls="nav-about" aria-selected="false">Floor Plan</a>
                        <a class="nav-item nav-link" id="nav-master-tab" data-toggle="tab" href="#nav-master" role="tab" aria-controls="nav-about" aria-selected="false">Master Plan</a>
                        <a class="nav-item nav-link" id="nav-location-tab" data-toggle="tab" href="#nav-location" role="tab" aria-controls="nav-about" aria-selected="false">Location Map</a>
                        <a class="nav-item nav-link" id="nav-other-tab" data-toggle="tab" href="#nav-other" role="tab" aria-controls="nav-about" aria-selected="false">Others</a>
                    </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div id="upload_form">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div id="upload_form1">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="living_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div id="upload_form2">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="bedroom_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div id="upload_form3">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-kitchen" role="tabpanel" aria-labelledby="nav-kitchen-tab">
                        <div id="upload_form4">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="kitchen_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-floor" role="tabpanel" aria-labelledby="nav-floor-tab">
                        <div id="upload_form5">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="floor_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-master" role="tabpanel" aria-labelledby="nav-master-tab">
                        <div id="upload_form6">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab">
                        <div id="upload_form7">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                        <div id="upload_form8">
                            <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1">
                            </i>
                            
                            <span class="title1">
                                Add File
                            </span>
                            <input class="FileUpload1" id="FileInput" name="other_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Additional Features</h6>
                </div>
                <div class="form-row">
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
                            <option value="Garden/Park" @if(old('overlooking') == "Garden/Park") Selected @endif>Garden/Park</option>
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
                    <div class="form-group col-md-6">
                        <label for="">Lifts in the Tower </label>
                        <select name="car_parking" id="car_parking" class="form-control @error('lift_tower') invalid-feedback @enderror">
                            <option value="">-Select-</option>
                            <option value="None" @if(old('lift_tower') == "None") Selected @endif>None</option>
                            <option value="1" @if(old('lift_tower') == "1") Selected @endif>1</option>
                            <option value="2" @if(old('lift_tower') == "2") Selected @endif>2</option>
                            <option value="3" @if(old('lift_tower') == "3") Selected @endif>3</option>
                            <option value="4" @if(old('lift_tower') == "4") Selected @endif>4</option>
                            <option value="5" @if(old('lift_tower') == "5") Selected @endif>5</option>
                            <option value="6" @if(old('lift_tower') == "6") Selected @endif>6</option>
                            <option value="7" @if(old('lift_tower') == "7") Selected @endif>7</option>
                        </select>
                        @error('lift_tower')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Office on the Floor</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="office_floor">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">Multiple Units Available</label>
                    </div>
                    <div class="col-md-6">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="mul_unit_avail" value="Yes">Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="mul_unit_avail" value="No">No
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Building Class</label>
                        <select name="building_class" id="" class="form-control">
                            <option value="">-Select Building Class-</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Grade A+">Grade A+</option>
                            <option value="Grade A">Grade A</option>
                            <option value="Grade B">Grade B</option>
                            <option value="Grade C">Grade C</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">LEED Certification</label>
                        <select name="building_class" id="" class="form-control">
                            <option value="">-Select LEED Certification-</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Certified">Certified</option>
                            <option value="Silver Certified">Silver Certified</option>
                            <option value="Gold Certified">Gold Certified</option>
                            <option value="Platinum Certified">Platinum Certified</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Status of Water & Electricity</h6>
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
                </div>
                <div class="form-group">
                    <h6>Amenities</h6>
                </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Amenities</label>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Aminities</label>
                  <select name="aminities" id="aminities" class="form-control @error('aminities') invalid-feedback @enderror">
                    <option value="">-Select Aminities-</option>
                    <option value="Air Conditioner" @if(old('aminities') == "Air Conditioner") Selected @endif>Air Conditioner</option>
                    <option value="CCTV Camera" @if(old('aminities') == "CCTV Camera") Selected @endif>CCTV Camera</option>
                    <option value="Fire Sprinklers" @if(old('aminities') == "Fire Sprinklers") Selected @endif>Fire Sprinklers</option>
                    <option value="Cafeteria Food Court" @if(old('aminities') == "Cafeteria Food Court") Selected @endif>Cafeteria Food Court</option>
                    <option value="Projector" @if(old('aminities') == "Projector") Selected @endif>Projector</option>
                    <option value="Conference Room" @if(old('aminities') == "Conference Room") Selected @endif>Conference Room</option>
                    <!-- <option value="DTH Television Facility" @if(old('aminities') == "DTH Television Facility") Selected @endif>DTH Television Facility</option> -->
                    <!-- <option value="Gymnasium" @if(old('aminities') == "Gymnasium") Selected @endif>Gymnasium</option> -->
                    <option value="Intercom Facility" @if(old('aminities') == "Intercom Facility") Selected @endif>Intercom Facility</option>
                    <option value="Internet Wi-Fi Facility" @if(old('aminities') == "Internet Wi-Fi Facility") Selected @endif>Internet Wi-Fi Facility</option>
                    <option value="Tea/Coffee" @if(old('aminities') == "Tea/Coffee") Selected @endif>Tea/Coffee</option>
                    <option value="Printer" @if(old('aminities') == "Printer") Selected @endif>Printer</option>
                    <option value="Lift" @if(old('aminities') == "Lift") Selected @endif>Lift</option>
                    <option value="Security" @if(old('aminities') == "Security") Selected @endif>Security</option>
                    <!-- <option value="Outdoor Tennis Court" @if(old('aminities') == "Outdoor Tennis Court") Selected @endif>Outdoor Tennis Court</option> -->
                    <!-- <option value="Park" @if(old('aminities') == "Park") Selected @endif>Park</option> -->
                    <option value="Pipe Gas" @if(old('aminities') == "Pipe Gas") Selected @endif>Pipe Gas</option>
                    <option value="Power Back Up" @if(old('aminities') == "Power Back Up") Selected @endif>Power Back Up</option>
                    <!-- <option value="Private Terrace" @if(old('aminities') == "Private Terrace") Selected @endif>Private Terrace</option> -->
                    <!-- <option value="Garden" @if(old('aminities') == "Garden") Selected @endif>Garden</option> -->
                    <option value="RO Water System" @if(old('aminities') == "RO Water System") Selected @endif>RO Water System</option>
                    <!-- <option value="Rain Water Harvesting" @if(old('aminities') == "Rain Water Harvesting") Selected @endif>Rain Water Harvesting</option> -->
                    <option value="Reserve Parking" @if(old('aminities') == "Reserve Parking") Selected @endif>Reserve Parking</option>
                    <option value="Services/ Goods Lift" @if(old('aminities') == "Services/ Goods Lift") Selected @endif>Services/ Goods Lift</option>
                    <option value="Swimming Pool" @if(old('aminities') == "Swimming Pool") Selected @endif>Swimming Pool</option>
                    <option value="Whiteboard" @if(old('aminities') == "Whiteboard") Selected @endif>Whiteboard</option>
                    <option value="Visitors Parking" @if(old('aminities') == "Visitors Parking") Selected @endif>Visitors Parking</option>
                    <option value="Wheelchair Accessibility" @if(old('aminities') == "Wheelchair Accessibility") Selected @endif>Wheelchair Accessibility</option>
                    <option value="Water Storage" @if(old('aminities') == "Water Storage") Selected @endif>Water Storage</option>
                  </select>
                  @error('aminities')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <h6>Description & Landmarks</h6>
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="">Landmark</label>
                <input type="text" name="landmark" class="form-control">
              </div>
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <hr>
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

// Exterior View Photos
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
  $("#upload_form .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form .filelabel #icon"+lastChar).remove();
    $('#upload_form #frame'+lastChar).removeClass("hidden");
    $('#upload_form #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form .filelabel .title").text(labelVal);
  }
  if($("#upload_form .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="exterior_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField(){
    $(this).closest('.p_file').remove();
    return false;
}

// Living Room Photos
$('body')
  .delegate('#upload_form1 input[type="file"]', 'change', inputChanged1)
  .delegate('#upload_form1 .icon', 'click', removeField1);

function inputChanged1(e) {
  $current_count = $('#upload_form1 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form1 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form1 .filelabel #icon"+lastChar).remove();
    $('#upload_form1 #frame'+lastChar).removeClass("hidden");
    $('#upload_form1 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form1 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form1 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form1 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form1 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form1 .filelabel .title").text(labelVal);
  }
  if($("#upload_form1 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="living_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField1(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bedroom Photos
$('body')
    .delegate('#upload_form2 input[type="file"]', 'change', inputChanged2)
    .delegate('#upload_form2 .icon', 'click', removeField2);

function inputChanged2(e) {
  $current_count = $('#upload_form2 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form2 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form2 .filelabel #icon"+lastChar).remove();
    $('#upload_form2 #frame'+lastChar).removeClass("hidden");
    $('#upload_form2 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form2 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form2 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form2 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form2 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form2 .filelabel .title").text(labelVal);
  }
  if($("#upload_form2 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="bedroom_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField2(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bathroom Photos
$('body')
    .delegate('#upload_form3 input[type="file"]', 'change', inputChanged3)
    .delegate('#upload_form3 .icon', 'click', removeField3);

function inputChanged3(e) {
  $current_count = $('#upload_form3 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form3 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form3 .filelabel #icon"+lastChar).remove();
    $('#upload_form3 #frame'+lastChar).removeClass("hidden");
    $('#upload_form3 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form3 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form3 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form3 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form3 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form3 .filelabel .title").text(labelVal);
  }
  if($("#upload_form3 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="bathroom_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField3(){
    $(this).closest('.p_file').remove();
    return false;
}

// Kitchen Photos
$('body')
  .delegate('#upload_form4 input[type="file"]', 'change', inputChanged4)
  .delegate('#upload_form4 .icon', 'click', removeField4);

function inputChanged4(e) {
  $current_count = $('#upload_form4 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form4 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form4 .filelabel #icon"+lastChar).remove();
    $('#upload_form4 #frame'+lastChar).removeClass("hidden");
    $('#upload_form4 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form4 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form4 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form4 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form4 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form4 .filelabel .title").text(labelVal);
  }
  if($("#upload_form4 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="kitchen_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField4(){
    $(this).closest('.p_file').remove();
    return false;
}

// Floor Photos
$('body')
  .delegate('#upload_form5 input[type="file"]', 'change', inputChanged5)
  .delegate('#upload_form5 .icon', 'click', removeField5);

function inputChanged5(e) {
  $current_count = $('#upload_form5 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form5 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form5 .filelabel #icon"+lastChar).remove();
    $('#upload_form5 #frame'+lastChar).removeClass("hidden");
    $('#upload_form5 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form5 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form5 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form5 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form5 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form5 .filelabel .title").text(labelVal);
  }
  if($("#upload_form5 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="floor_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField5(){
    $(this).closest('.p_file').remove();
    return false;
}


// Master Photos
$('body')
  .delegate('#upload_form6 input[type="file"]', 'change', inputChanged6)
  .delegate('#upload_form6 .icon', 'click', removeField6);

function inputChanged6(e) {
  $current_count = $('#upload_form6 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form6 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form6 .filelabel #icon"+lastChar).remove();
    $('#upload_form6 #frame'+lastChar).removeClass("hidden");
    $('#upload_form6 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form6 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form6 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form6 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form6 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form6 .filelabel .title").text(labelVal);
  }
  if($("#upload_form6 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="master_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField6(){
    $(this).closest('.p_file').remove();
    return false;
}


// Location Photos
$('body')
  .delegate('#upload_form7 input[type="file"]', 'change', inputChanged7)
  .delegate('#upload_form7 .icon', 'click', removeField7);

function inputChanged7(e) {
  $current_count = $('#upload_form7 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form7 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form7 .filelabel #icon"+lastChar).remove();
    $('#upload_form7 #frame'+lastChar).removeClass("hidden");
    $('#upload_form7 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form7 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form7 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form7 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form7 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form7 .filelabel .title").text(labelVal);
  }
  if($("#upload_form7 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="location_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField7(){
    $(this).closest('.p_file').remove();
    return false;
}

// Other Photos
$('body')
  .delegate('#upload_form8 input[type="file"]', 'change', inputChanged8)
  .delegate('#upload_form8 .icon', 'click', removeField8);

function inputChanged8(e) {
  $current_count = $('#upload_form8 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form8 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.slice(-1);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form8 .filelabel #icon"+lastChar).remove();
    $('#upload_form8 #frame'+lastChar).removeClass("hidden");
    $('#upload_form8 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form8 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form8 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form8 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form8 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form8 .filelabel .title").text(labelVal);
  }
  if($("#upload_form8 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="other_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField8(){
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

  $("input[name='available_from']").change(function(){
    var available_from = $(this).val();
    if(available_from == "Select Date")
    {
      $("#showDateDiv").show(1000);
    }
    else{
      $("#showDateDiv").hide(1000);
    }
  })

function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
}
$(document).mouseup(function (e) { 
  // rest code here 
  var monthly_rent = $("#monthly_rent").val();
  // alert(monthly_rent);
  if(monthly_rent != ""){
  if ($(e.target).closest("#monthly_rent").length === 0) {
    x=monthly_rent.toString();
    var lastThree = x.substring(x.length-3);
    var otherNumbers = x.substring(0,x.length-3);
    if(otherNumbers != '')
        lastThree = ',' + lastThree;
    var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
    $("#rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
    $("#rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
    // format.format(4800)  
    $("#show_rent").show(1000); 
  } 
  }
}) 

$('body').on('click', '#a', function () {
  $("#otherChargesDiv").fadeToggle(1000); 
})
</script>
@endsection
