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
#upload_form, #upload_form1, #upload_form2, #upload_form3, #upload_form4, #upload_form5, #upload_form6, #upload_form7, #upload_form8,
#upload_form9, #upload_form10, #upload_form11, #upload_form12, #upload_form13, #upload_form14, #upload_form15, #upload_form16, #upload_form17
{
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

.pageloader {
  width: 100%;
  height: 65px;
  background: #FFF url('{{ asset('142.gif')}}') no-repeat 50%;
}

#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border-radius:4px;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
// AJAX call for autocomplete 
$(document).ready(function(){
	$("#search-box").keyup(function(){
    if( this.value.length > 5 ){
		$.ajax({
		type: "GET",
		url: "{{ route('searchCity') }}",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url('{{ asset('35.gif')}}') no-repeat 100%");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
    }
	});
});

//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

// AJAX call for autocomplete 
$(document).ready(function(){
	$("#locality").keyup(function(){
    if( this.value.length > 5 ){
		$.ajax({
		type: "GET",
		url: "{{ route('searchLocality') }}",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#locality").css("background","#FFF url('{{ asset('35.gif')}}') no-repeat 100%");
		},
		success: function(data){
			$("#suggesstion-locality").show();
			$("#suggesstion-locality").html(data);
			$("#locality").css("background","#FFF");
		}
		});
    }
	});
});

//To select country name
function selectLocality(val) {
$("#locality").val(val);
$("#suggesstion-locality").hide();
}
</script>
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
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Property Type<span class="text-danger">*<span><span  style="color:red" id="pt_err"> </span></label>
                </div>
                <div class="form-group col-md-8">
                  <select id="property_type" class="form-control @error('property_type') is-invalid @enderror" name="property_type">
                    <option value="">Choose...</option>
                    @foreach($type as $t)
                    <option value="{{ $t->id }}" @if(old('property_type') == $t->id) Selected @endif>{{ $t->type_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <h6>Property Location</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>City<span class="text-danger">*<span><span  style="color:red" id="city_err"> </span></label>
                  <input class="form-control" type="text" id="search-box" name="city">
                  <div id="suggesstion-box"></div>
                  @error('city')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLocality">Locality<span class="text-danger">*</span><span  style="color:red" id="locality_err"> </span></label>
                  <input type="text" class="form-control @error('locality') is-invalid @enderror" id="locality" name="locality">
                  <div id="suggesstion-locality"></div>
                  @error('locality')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label>Address</label><span class="text-danger">*</span><span  style="color:red" id="address_err"> </span></label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"></textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="pageloader hidden"></div>
              <div class="hidden" id="rent-lease-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="">Name of Project Society<span class="text-danger">*</span><span  style="color:red" id="project_name_err"> </span></label>
                    <input type="text" name="project_name" class="form-control" id="project_name">
                  </div>
                  <div class="form-group col-md-6">
                  </div>
                </div>
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label>Bedroom<span class="text-danger">*</span><span  style="color:red" id="bedroom_err"> </span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <div class="switch-field">
                        <input type="radio" id="1" name="bedroom" value="1" @if(old('bedroom') == "1") checked @endif/>
                        <label for="1">1</label>
                        <input type="radio" id="2" name="bedroom" value="2" @if(old('bedroom') == "2") checked @endif/>
                        <label for="2">2</label>
                        <input type="radio" id="3" name="bedroom" value="3" @if(old('bedroom') == "3") checked @endif/>
                        <label for="3">3</label>
                        <input type="radio" id="4" name="bedroom" value="4" @if(old('bedroom') == "4") checked @endif/>
                        <label for="4">4</label>
                        <input type="radio" id="5" name="bedroom" value="5" @if(old('bedroom') == "5") checked @endif/>
                        <label for="5">5</label>
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
                      <div class="switch-field">
                        <input type="radio" id="balcony1" name="balcony" value="1" @if(old('balcony') == "1") checked @endif/>
                        <label for="balcony1">1</label>
                        <input type="radio" id="balcony2" name="balcony" value="2" @if(old('balcony') == "2") checked @endif/>
                        <label for="balcony2">2</label>
                        <input type="radio" id="balcony3" name="balcony" value="3" @if(old('balcony') == "3") checked @endif/>
                        <label for="balcony3">3</label>
                        <input type="radio" id="balcony4" name="balcony" value="4" @if(old('balcony') == "4") checked @endif/>
                        <label for="balcony4">4</label>
                        <input type="radio" id="balcony5" name="balcony" value="5" @if(old('balcony') == "5") checked @endif/>
                        <label for="balcony5">5</label>
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
                <hr>
                <div class="form-group">
                  <h6>Floor</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Property Floor No.<span  style="color:red" id="floor_err"> </span></label>
                        <input type="number" name="property_floor_no" class="form-control @error('property_floor_no') is-invalid @enderror" value="{{ old('property_floor_no') }}" id="property_floor_no">
                        @error('property_floor_no')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">No. of Floor<span  style="color:red" id="total_floor_err"> </span></label>
                        <input type="number" name="no_of_floor" class="form-control @error('no_of_floor') is-invalid @enderror" value="{{ old('no_of_floor') }}" id="no_of_floor">
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
                      <label>Furnishing<span class="text-danger">*</span><span  style="color:red" id="furnishing_err"> </span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <div class="switch-field">
                        <input type="radio" id="Furnished" name="furnishing" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif/>
                        <label for="Furnished">Furnished</label>
                        <input type="radio" id="Semi-Furnished" name="furnishing" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif/>
                        <label for="Semi-Furnished">Semi-Furnished</label>
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
                  <h6>Area</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
                    @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                <div class="form-group">
                  <h6>Transaction Type/Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="">Available From<span  style="color:red" id="available_from_err"> </span></label>
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
                <div class="form-group">
                  <h6>Rent/Lease Detail</h6>
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Monthly Rent<span  style="color:red" id="monthly_rent_err"> </span></label>
                  </div>
                  <div class="col-md-8">
                    <input type="number" class="form-control" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                    <input type="checkbox" name="other_charges" id="a" class="a css-checkbox">
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
                  </div>
                </div>
                <button type="button" id="showButton1" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv1">
                  <div class="form-group">
                    <h6>Tenants Tou Prefer</h6>
                  </div>
                  <div class="form-group">
                    <label for="">Tenants who are Bachelors</label>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_bachelor" value="Yes">Yes
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_bachelor" value="No">No
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_bachelor" value="Doesn't Matter">Doesn't Matter
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Tenants who are Non Vegetarians</label>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_non_veg" value="Yes">Yes
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_non_veg" value="No">No
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_non_veg" value="Doesn't Matter">Doesn't Matter
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Tenants with Pets</label>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_pets" value="Yes">Yes
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_pets" value="No">No
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_pets" value="Doesn't Matter">Doesn't Matter
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Tenants without Company Lease</label>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_company_lease" value="Yes">Yes
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_company_lease" value="No">No
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tenants_company_lease" value="Doesn't Matter">Doesn't Matter
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Additional Features</h6>
                  </div>
                  <div class="form-group">
                    <label for="">Additional Rooms</label>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Pooja Room">Pooja Room
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Study">Study
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Store">Store
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Servant Room">Servant Room
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="None of these">None of these
                        </label>
                      </div>
                    </div>
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
                        <!-- <option value="Air Conditioner" @if(old('aminities') == "Air Conditioner") Selected @endif>Air Conditioner</option> -->
                        <!-- <option value="Banquet Hall" @if(old('aminities') == "Banquet Hall") Selected @endif>Banquet Hall</option> -->
                        <!-- <option value="Bar/Lounge" @if(old('aminities') == "Bar/Lounge") Selected @endif>Bar/Lounge</option> -->
                        <!-- <option value="Cafeteria Food Court" @if(old('aminities') == "Cafeteria Food Court") Selected @endif>Cafeteria Food Court</option> -->
                        <!-- <option value="Club House" @if(old('aminities') == "Club House") Selected @endif>Club House</option> -->
                        <!-- <option value="Conference Room" @if(old('aminities') == "Conference Room") Selected @endif>Conference Room</option> -->
                        <!-- <option value="DTH Television Facility" @if(old('aminities') == "DTH Television Facility") Selected @endif>DTH Television Facility</option> -->
                        <option value="Gymnasium" @if(old('aminities') == "Gymnasium") Selected @endif>Gymnasium</option>
                        <!-- <option value="Intercom Facility" @if(old('aminities') == "Intercom Facility") Selected @endif>Intercom Facility</option> -->
                        <!-- <option value="Internet Wi-Fi Facility" @if(old('aminities') == "Internet Wi-Fi Facility") Selected @endif>Internet Wi-Fi Facility</option> -->
                        <option value="Jogging & Strolling Track" @if(old('aminities') == "Jogging & Strolling Track") Selected @endif>Jogging & Strolling Track</option>
                        <!-- <option value="Laundary Services" @if(old('aminities') == "Laundary Services") Selected @endif>Laundary Services</option> -->
                        <!-- <option value="Lift" @if(old('aminities') == "Lift") Selected @endif>Lift</option> -->
                        <!-- <option value="Maintenance Staff" @if(old('aminities') == "Maintenance Staff") Selected @endif>Maintenance Staff</option> -->
                        <!-- <option value="Outdoor Tennis Court" @if(old('aminities') == "Outdoor Tennis Court") Selected @endif>Outdoor Tennis Court</option> -->
                        <!-- <option value="Park" @if(old('aminities') == "Park") Selected @endif>Park</option> -->
                        <option value="Pipe Gas" @if(old('aminities') == "Pipe Gas") Selected @endif>Pipe Gas</option>
                        <option value="Power Back Up" @if(old('aminities') == "Power Back Up") Selected @endif>Power Back Up</option>
                        <!-- <option value="Private Terrace" @if(old('aminities') == "Private Terrace") Selected @endif>Private Terrace</option> -->
                        <!-- <option value="Garden" @if(old('aminities') == "Garden") Selected @endif>Garden</option> -->
                        <!-- <option value="RO Water System" @if(old('aminities') == "RO Water System") Selected @endif>RO Water System</option> -->
                        <!-- <option value="Rain Water Harvesting" @if(old('aminities') == "Rain Water Harvesting") Selected @endif>Rain Water Harvesting</option> -->
                        <option value="Reserve Parking Security" @if(old('aminities') == "Reserve Parking Security") Selected @endif>Reserve Parking Security</option>
                        <!-- <option value="Services/ Goods Lift" @if(old('aminities') == "Services/ Goods Lift") Selected @endif>Services/ Goods Lift</option> -->
                        <option value="Swimming Pool" @if(old('aminities') == "Swimming Pool") Selected @endif>Swimming Pool</option>
                        <!-- <option value="Vastu Compliment" @if(old('aminities') == "Vastu Compliment") Selected @endif>Vastu Compliment</option> -->
                        <!-- <option value="Visitors Parking" @if(old('aminities') == "Visitors Parking") Selected @endif>Visitors Parking</option> -->
                        <!-- <option value="Waste Disposal" @if(old('aminities') == "Waste Disposal") Selected @endif>Waste Disposal</option> -->
                        <!-- <option value="Water Storage" @if(old('aminities') == "Water Storage") Selected @endif>Water Storage</option> -->
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
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Owner's Residence</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="">Owner Resides in</label>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="owner_resides" value="Same Premise">Same Premise
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="owner_resides" value="Away">Away
                        </label>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <button type="button" id="submitForm" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <div class="hidden" id="commercial-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="">Name of Project Office Complex<span class="text-danger">*</span><span  style="color:red" id="project_name1_err"> </span></label>
                    <input type="text" name="project_name" class="form-control" id="project_name1">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Land Zone<span  style="color:red" id="land_zone_err"> </span></label>
                    <select name="land_zone" id="land_zone" class="form-control">
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
                    <label for="">Ideal For Businesses</label>
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
                    <label for="">Total Floors<span  style="color:red" id="total_floor1_err"> </span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <select name="total_floor" class="form-control" id="total_floor1">
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
                      <label>Furnished Status<span class="text-danger">*</span><span  style="color:red" id="furnishing_err"> </span>
                      </label>
                    </div>
                    <div class="col-md-8">
                      <div class="switch-field">
                        <input type="radio" id="Furnished1" name="furnishing" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif/>
                        <label for="Furnished1">Furnished</label>
                        <input type="radio" id="Unfurnished1" name="furnishing" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif/>
                        <label for="Unfurnished1">Unfurnished</label>
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
                        <input type="radio" id="inlineRadio6" name="bathroom" value="1" @if(old('bathroom') == "1") checked @endif/>
                        <label for="inlineRadio6">1</label>
                        <input type="radio" id="inlineRadio7" name="bathroom" value="2" @if(old('bathroom') == "2") checked @endif/>
                        <label for="inlineRadio7">2</label>
                        <input type="radio" id="inlineRadio8" name="bathroom" value="3" @if(old('bathroom') == "3") checked @endif/>
                        <label for="inlineRadio8">3</label>
                        <input type="radio" id="inlineRadio9" name="bathroom" value="4" @if(old('bathroom') == "4") checked @endif/>
                        <label for="inlineRadio9">4</label>
                        <input type="radio" id="inlineRadio10" name="bathroom" value="5" @if(old('bathroom') == "5") checked @endif/>
                        <label for="inlineRadio10">5</label>
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
                    <label for="">Willing to modify interiors</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="modify_interior" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="modify_interior" value="No">No
                      </label>
                    </div>
                  </div>
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
                    <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
                    @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('super_build_up_area') invalid-feedback @enderror" id="super_build_up_area" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                <div class="form-group">
                  <h6>Transaction Type/Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="">Available From<span  style="color:red" id="available_from_err"> </span></label>
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
                    <label for="">Monthly Rent<span  style="color:red" id="monthly_rent_err"> </span></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                    <input type="checkbox" name="other_charges" id="a1" class="a css-checkbox">
                    <label for="a1" class="css-label">
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
                      <a class="nav-item nav-link active" id="nav-home1-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">Exterior View</a>
                      <a class="nav-item nav-link" id="nav-profile1-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Living Room</a>
                      <a class="nav-item nav-link" id="nav-contact1-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Bedroom</a>
                      <a class="nav-item nav-link" id="nav-about1-tab" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Bathrooms</a>
                      <a class="nav-item nav-link" id="nav-kitchen1-tab" data-toggle="tab" href="#nav-kitchen1" role="tab" aria-controls="nav-kitchen1" aria-selected="false">Kitchen</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home1-tab">
                      <div id="upload_form5">
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
                    <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile1-tab">
                      <div id="upload_form6">
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
                    <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact1-tab">
                      <div id="upload_form7">
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
                    <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about1-tab">
                      <div id="upload_form8">
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
                    <div class="tab-pane fade" id="nav-kitchen1" role="tabpanel" aria-labelledby="nav-kitchen1-tab">
                      <div id="upload_form9">
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
                  </div>
                </div>
                <hr>
                <button type="button" class="btn btn-primary" id="showButton2">Continue & Next</button>
                <div class="hidden" id="showDiv2">
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
                      <label for="">Offices on the Floor</label>
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
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description1" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" class="form-control">
                  </div>
                `  <hr>
                  <button type="button" id="submitButton2" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <div class="hidden" id="showroom-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="">Name of Project Office Complex<span class="text-danger">*</span><span  style="color:red" id="project_name_err"> </span></label>
                    <input type="text" name="project_name" class="form-control" id="project_name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Land Zone<span  style="color:red" id="land_zone_err"> </span></label>
                    <select name="land_zone" id="land_zone" class="form-control">
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
                      <a class="nav-item nav-link active" id="nav-metro1-tab" data-toggle="tab" href="#nav-metro1" role="tab" aria-controls="nav-metro1" aria-selected="true">Metro Station</a>
                      <a class="nav-item nav-link" id="nav-railway1-tab" data-toggle="tab" href="#nav-railway1" role="tab" aria-controls="nav-railway1" aria-selected="false">Railway Station</a>
                      <a class="nav-item nav-link" id="nav-bus1-tab" data-toggle="tab" href="#nav-bus1" role="tab" aria-controls="nav-bus1" aria-selected="false">Bus Stand</a>
                      <a class="nav-item nav-link" id="nav-airport1-tab" data-toggle="tab" href="#nav-airport1" role="tab" aria-controls="nav-airport1" aria-selected="false">Airport</a>
                      <a class="nav-item nav-link" id="nav-shopping1-tab" data-toggle="tab" href="#nav-shopping1" role="tab" aria-controls="nav-shopping1" aria-selected="false">Shopping Mall</a>
                      <a class="nav-item nav-link" id="nav-office1-tab" data-toggle="tab" href="#nav-office1" role="tab" aria-controls="nav-office1" aria-selected="false">Office Complex</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-metro1" role="tabpanel" aria-labelledby="nav-metro1-tab">
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
                    <div class="tab-pane fade" id="nav-railway1" role="tabpanel" aria-labelledby="nav-railway1-tab">
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
                    <div class="tab-pane fade" id="nav-bus1" role="tabpanel" aria-labelledby="nav-bus1-tab">
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
                    <div class="tab-pane fade" id="nav-airport1" role="tabpanel" aria-labelledby="nav-airport1-tab">
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
                    <div class="tab-pane fade" id="nav-shopping1" role="tabpanel" aria-labelledby="nav-shopping1-tab">
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
                    <div class="tab-pane fade" id="nav-office1" role="tabpanel" aria-labelledby="nav-office1-tab">
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
                    <label for="">Total Floors<span  style="color:red" id="total_floor_err"> </span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <select name="total_floor" class="form-control" id="total_floor">
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
                      <label>Furnished Status<span class="text-danger">*</span><span  style="color:red" id="furnishing_err"> </span></label>
                    </div>
                    <div class="col-md-8">
                      <div class="switch-field">
                        <input type="radio" id="Furnished2" name="furnishing" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif/>
                        <label for="Furnished2">Furnished</label>
                        <input type="radio" id="Unfurnished2" name="furnishing" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif/>
                        <label for="Unfurnished2">Unfurnished</label>
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
                      <label>Washroom <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8">
                      <div class="switch-field">
                        <input type="radio" id="inlineRadio11" name="bathroom" value="1" @if(old('bathroom') == "1") checked @endif/>
                        <label for="inlineRadio11">1</label>
                        <input type="radio" id="inlineRadio12" name="bathroom" value="2" @if(old('bathroom') == "2") checked @endif/>
                        <label for="inlineRadio12">2</label>
                        <input type="radio" id="inlineRadio13" name="bathroom" value="3" @if(old('bathroom') == "3") checked @endif/>
                        <label for="inlineRadio13">3</label>
                        <input type="radio" id="inlineRadio14" name="bathroom" value="4" @if(old('bathroom') == "4") checked @endif/>
                        <label for="inlineRadio14">4</label>
                        <input type="radio" id="inlineRadio15" name="bathroom" value="5" @if(old('bathroom') == "5") checked @endif/>
                        <label for="inlineRadio15">5</label>
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
                    <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
                    @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                    <select name="build_area_unit" id="super_area_unit" class="form-control">
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
                    <label for="">Available From<span  style="color:red" id="available_from_err"> </span></label>
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
                    <label for="">Monthly Rent<span  style="color:red" id="monthly_rent_err"> </span></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                    <input type="checkbox" name="other_charges" id="a2" class="a css-checkbox">
                    <label for="a2" class="css-label">
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
                      <a class="nav-item nav-link active" id="nav-home2-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home2" aria-selected="true">Exterior View</a>
                      <a class="nav-item nav-link" id="nav-profile2-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">Living Room</a>
                      <a class="nav-item nav-link" id="nav-contact2-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact2" aria-selected="false">Bedroom</a>
                      <a class="nav-item nav-link" id="nav-about2-tab" data-toggle="tab" href="#nav-about2" role="tab" aria-controls="nav-about2" aria-selected="false">Bathrooms</a>
                      <a class="nav-item nav-link" id="nav-kitchen2-tab" data-toggle="tab" href="#nav-kitchen2" role="tab" aria-controls="nav-kitchen2" aria-selected="false">Kitchen</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home2-tab">
                      <div id="upload_form10">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile2-tab">
                      <div id="upload_form11">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="living_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">
                      <div id="upload_form12">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="bedroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about2" role="tabpanel" aria-labelledby="nav-about2-tab">
                      <div id="upload_form13">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-kitchen2" role="tabpanel" aria-labelledby="nav-kitchen2-tab">
                      <div id="upload_form14">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="kitchen_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary" id="showButton3">Continue & Next</button>
                <div class="hidden" id="showDiv3">
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
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description2" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" class="form-control">
                  </div>
                  <hr>
                  <button type="button" id="submitForm2" class="btn btn-primary">Post Your Add</button>
                </div>
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

<script src="{{ asset('js/image-upload.js') }}"></script>

<script type=text/javascript>

  $("input[name='available_from']").change(function(){
    var available_from = $(this).val();
    // alert(available_from);
    if(available_from == "Select Date")
    {
      if($("#commercial-form").css("display") == "block"){ 
      $("#commercial-form #showDateDiv").show(1000);
      }
      if($("#rent-lease-form").css("display") == "block"){
      $("#rent-lease-form #showDateDiv").show(1000);
      }
      if($("#showroom-form").css("display") == "block"){
      $("#showroom-form #showDateDiv").show(1000);
      }
    }
    else{
      if($("#commercial-form").css("display") == "block")
      { 
        $("#commercial-form #showDateDiv").hide(1000);
      }
      if($("#rent-lease-form").css("display") == "block"){
      $("#rent-lease-form #showDateDiv").hide(1000);
      }
      if($("#showroom-form").css("display") == "block"){
      $("#showroom-form #showDateDiv").hide(1000);
      }
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
    if($("#rent-lease-form").css("display") == "block")
    { 
      $('#rent-lease-form #show_price').html(words_string);
    }
    if($("#commercial-form").css("display") == "block")
    { 
      $('#commercial-form #show_price').html(words_string);
    }
    if($("#showroom-form").css("display") == "block")
    { 
      $('#showroom-form #show_price').html(words_string);
    }
    // return words_string;
}
$(document).mouseup(function (e) { 
  // rest code here 
  if($("#commercial-form").css("display") == "block")
  { 
    var monthly_rent = $("#commercial-form #monthly_rent").val();
    // alert(monthly_rent);
    if(monthly_rent != ""){
    if ($(e.target).closest("#commercial-form #monthly_rent").length === 0) {
      x=monthly_rent.toString();
      var lastThree = x.substring(x.length-3);
      var otherNumbers = x.substring(0,x.length-3);
      if(otherNumbers != '')
          lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
      $("#commercial-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
      $("#commercial-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
      // format.format(4800)  
      $("#commercial-form #show_rent").show(1000); 
    } 
    }
  }
  if($("#rent-lease-form").css("display") == "block")
  { 
    var monthly_rent = $("#rent-lease-form #monthly_rent").val();
    // alert(monthly_rent);
    if(monthly_rent != ""){
    if ($(e.target).closest("#rent-lease-form #monthly_rent").length === 0) {
      x=monthly_rent.toString();
      var lastThree = x.substring(x.length-3);
      var otherNumbers = x.substring(0,x.length-3);
      if(otherNumbers != '')
          lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
      $("#rent-lease-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
      $("#rent-lease-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
      // format.format(4800)  
      $("#rent-lease-form #show_rent").show(1000); 
    } 
    }
  }
  if($("#showroom-form").css("display") == "block")
  { 
    var monthly_rent = $("#showroom-form #monthly_rent").val();
    // alert(monthly_rent);
    if(monthly_rent != ""){
    if ($(e.target).closest("#showroom-form #monthly_rent").length === 0) {
      x=monthly_rent.toString();
      var lastThree = x.substring(x.length-3);
      var otherNumbers = x.substring(0,x.length-3);
      if(otherNumbers != '')
          lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
      $("#showroom-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
      $("#showroom-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
      // format.format(4800)  
      $("#showroom-form #show_rent").show(1000); 
    } 
    }
  }
}) 

$('body').on('click', '.a', function () {
  if($("#rent-lease-form").css("display") == "block")
  { 
    $("#rent-lease-form #otherChargesDiv").fadeToggle(1000); 
  }
  if($("#commercial-form").css("display") == "block")
  {
    $("#commercial-form #otherChargesDiv").fadeToggle(1000);
  } 
  if($("#showroom-form").css("display") == "block")
  {
    $("#showroom-form #otherChargesDiv").fadeToggle(1000);
  } 
})
$('body').on('change', '#property_type', function () {
    var query = $(this).val();
    if(query == 63)
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#rent-lease-form').fadeIn();
        $('#commercial-form').fadeOut();
        $('#showroom-form').fadeOut();
      }, 2500);
    }
    if(query == 70)
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#commercial-form').fadeIn();
        $('#rent-lease-form').fadeOut();
        $('#showroom-form').fadeOut();
      }, 2500);
    }
    if(query == 73)
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#commercial-form').fadeOut();
        $('#rent-lease-form').fadeOut();
        $('#showroom-form').fadeIn();
      }, 2500);
    }
})
$('body').on('click', '#showButton1', function () {
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var project_name = $('#project_name').val();
  var bedroom = $("input[name='bedroom']:checked").val();
  var property_floor_no = $('#property_floor_no').val();
  var no_of_floor = $('#no_of_floor').val();
  var furnishing = $("input[name='furnishing']:checked").val();
  var super_build_up_area = $('#super_build_up_area').val();
  var available_from = $("input[name='available_from']:checked").val();
  var monthly_rent = $('#monthly_rent').val();
  if(city == '')
  {
    $("#city_err").fadeIn().html("Required");
    setTimeout(function(){ $("#city_err").fadeOut(); }, 3000);
    $("#search-box").focus();
    return false;
  }
  if(locality == '')
  {
    $("#locality_err").fadeIn().html("Required");
    setTimeout(function(){ $("#locality_err").fadeOut(); }, 3000);
    $("#locality").focus();
    return false;
  }
  if(address == '')
  {
    $("#address_err").fadeIn().html("Required");
    setTimeout(function(){ $("#address_err").fadeOut(); }, 3000);
    $("#address").focus();
    return false;
  }
  if(project_name == '')
  {
    $("#project_name_err").fadeIn().html("Required");
    setTimeout(function(){ $("#project_name_err").fadeOut(); }, 3000);
    $("#project_name").focus();
    return false;
  }
  if(bedroom == null)
  {
    $("#bedroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#bedroom_err").fadeOut(); }, 3000);
    $("input[name='bedroom']").focus();
    return false;
  }
  if(property_floor_no == '')
  {
    $("#floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#floor_err").fadeOut(); }, 3000);
    $("#property_floor_no").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#total_floor_err").fadeOut(); }, 3000);
    $("#no_of_floor").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#furnishing_err").fadeIn().html("Required");
    setTimeout(function(){ $("#furnishing_err").fadeOut(); }, 3000);
    $("input[name='furnishing']").focus();
    return false;
  }
  if(super_build_up_area == '')
  {
    $("#super_area_err").fadeIn().html("Required");
    setTimeout(function(){ $("#super_area_err").fadeOut(); }, 3000);
    $("#super_build_up_area").focus();
    return false;
  }
  if(available_from == null)
  {
    $("#available_from_err").fadeIn().html("Required");
    setTimeout(function(){ $("#available_from_err").fadeOut(); }, 3000);
    $("input[name='available_from']").focus();
    return false;
  }
  if(monthly_rent == '')
  {
    $("#monthly_rent_err").fadeIn().html("Required");
    setTimeout(function(){ $("#monthly_rent_err").fadeOut(); }, 3000);
    $("#monthly_rent").focus();
    return false;
  }
  else{
    $("#showDiv1").removeClass("hidden");
    $("#showButton1").addClass("hidden");
  }
})
$('body').on('click', '#submitForm', function () {
  var description = $('textarea#description').val();
  if(description == '')
  {
    $("#description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#description_err").fadeOut(); }, 3000);
    $("#description").focus();
    return false;
  }
  else{
    $("#property-form").submit();
  }
});

$('body').on('click', '#showButton2', function () {
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var project_name = $('#project_name1').val();
  var land_zone = $('#land_zone').val();
  var no_of_floor = $('#total_floor1').val();
  var furnishing = $("#commercial-form input[name='furnishing']:checked").val();
  var super_build_up_area = $('#commercial-form #super_build_up_area').val();
  var available_from = $("#commercial-form input[name='available_from']:checked").val();
  var monthly_rent = $('#commercial-form #monthly_rent').val();
  if(city == '')
  {
    $("#city_err").fadeIn().html("Required");
    setTimeout(function(){ $("#city_err").fadeOut(); }, 3000);
    $("#search-box").focus();
    return false;
  }
  if(locality == '')
  {
    $("#locality_err").fadeIn().html("Required");
    setTimeout(function(){ $("#locality_err").fadeOut(); }, 3000);
    $("#locality").focus();
    return false;
  }
  if(address == '')
  {
    $("#address_err").fadeIn().html("Required");
    setTimeout(function(){ $("#address_err").fadeOut(); }, 3000);
    $("#address").focus();
    return false;
  }
  if(project_name == '')
  {
    $("#project_name1_err").fadeIn().html("Required");
    setTimeout(function(){ $("#project_name1_err").fadeOut(); }, 3000);
    $("#project_name1").focus();
    return false;
  }
  if(land_zone == '')
  {
    $("#land_zone_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land_zone_err").fadeOut(); }, 3000);
    $("#land_zone").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#total_floor1_err").fadeIn().html("Required");
    setTimeout(function(){ $("#total_floor1_err").fadeOut(); }, 3000);
    $("#total_floor1").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#commercial-form #furnishing_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #furnishing_err").fadeOut(); }, 3000);
    $("#commercial-form input[name='furnishing']").focus();
    return false;
  }
  if(super_build_up_area == '')
  {
    $("#commercial-form #super_area_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #super_area_err").fadeOut(); }, 3000);
    $("#commercial-form #super_build_up_area").focus();
    return false;
  }
  if(available_from == null)
  {
    $("#commercial-form #available_from_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #available_from_err").fadeOut(); }, 3000);
    $("#commercial-form input[name='available_from']").focus();
    return false;
  }
  if(monthly_rent == '')
  {
    $("#commercial-form #monthly_rent_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #monthly_rent_err").fadeOut(); }, 3000);
    $("#commercial-form #monthly_rent").focus();
    return false;
  }
  else{
    $("#showDiv2").removeClass("hidden");
    $("#showButton2").addClass("hidden");
  }
})
$('body').on('click', '#submitButton2', function () {
  var description = $('textarea#description1').val();
  if(description == '')
  {
    $("#commercial-form #description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #description_err").fadeOut(); }, 3000);
    $("#description1").focus();
    return false;
  }
  else{
    $("#property-form").submit();
  }
});

$('body').on('click', '#showButton3', function () {
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var project_name = $('#showroom-form #project_name').val();
  var land_zone = $('#showroom-form #land_zone').val();
  var no_of_floor = $('#showroom-form #total_floor').val();
  var furnishing = $("#showroom-form input[name='furnishing']:checked").val();
  var super_build_up_area = $('#showroom-form #super_build_up_area').val();
  var available_from = $("#showroom-form input[name='available_from']:checked").val();
  var monthly_rent = $('#showroom-form #monthly_rent').val();
  if(city == '')
  {
    $("#city_err").fadeIn().html("Required");
    setTimeout(function(){ $("#city_err").fadeOut(); }, 3000);
    $("#search-box").focus();
    return false;
  }
  if(locality == '')
  {
    $("#locality_err").fadeIn().html("Required");
    setTimeout(function(){ $("#locality_err").fadeOut(); }, 3000);
    $("#locality").focus();
    return false;
  }
  if(address == '')
  {
    $("#address_err").fadeIn().html("Required");
    setTimeout(function(){ $("#address_err").fadeOut(); }, 3000);
    $("#address").focus();
    return false;
  }
  if(project_name == '')
  {
    $("#showroom-form #project_name_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #project_name_err").fadeOut(); }, 3000);
    $("#showroom-form #project_name").focus();
    return false;
  }
  if(land_zone == '')
  {
    $("#showroom-form #land_zone_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #land_zone_err").fadeOut(); }, 3000);
    $("#showroom-form #land_zone").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#showroom-form #total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #total_floor_err").fadeOut(); }, 3000);
    $("#showroom-form #total_floor").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#showroom-form #furnishing_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #furnishing_err").fadeOut(); }, 3000);
    $("#showroom-form input[name='furnishing']").focus();
    return false;
  }
  if(super_build_up_area == '')
  {
    $("#showroom-form #super_area_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #super_area_err").fadeOut(); }, 3000);
    $("#showroom-form #super_build_up_area").focus();
    return false;
  }
  if(available_from == null)
  {
    $("#showroom-form #available_from_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #available_from_err").fadeOut(); }, 3000);
    $("#showroom-form input[name='available_from']").focus();
    return false;
  }
  if(monthly_rent == '')
  {
    $("#showroom-form #monthly_rent_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #monthly_rent_err").fadeOut(); }, 3000);
    $("#showroom-form #monthly_rent").focus();
    return false;
  }
  else{
    $("#showDiv3").removeClass("hidden");
    $("#showButton3").addClass("hidden");
  }
})
$('body').on('click', '#submitForm2', function () {
  var description = $('textarea#description2').val();
  if(description == '')
  {
    $("#showroom-form #description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#showroom-form #description_err").fadeOut(); }, 3000);
    $("#showroom-form #description2").focus();
    return false;
  }
  else{
    $("#property-form").submit();
  }
});
</script>
@endsection
