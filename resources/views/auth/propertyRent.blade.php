@extends('auth.auth_layout.main')
@section('title', 'Property For Rent/Lease')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
#upload_form, #upload_form1, #upload_form2, #upload_form3, #upload_form4, #upload_form5, #upload_form6, #upload_form7, #upload_form8,
#upload_form9, #upload_form10, #upload_form11, #upload_form12, #upload_form13, #upload_form14, #upload_form15, #upload_form16, #upload_form17, #upload_form18,
#upload_form19, #upload_form20, #upload_form21, #upload_form22
{
  display:inline-flex;
  flex-wrap:wrap;
}
.filelabel {
  width: 110px;
  height:110px;
  border: 2px solid #3688f4;
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
  background:white;
  border-radius:0;
}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
  border: none;
  padding: 8px 7px;
  color:black;
  background:white;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
  content: "";
  position: relative;
  bottom: -40px;
  left: -40%;
  border: 8px solid transparent;
  border-top-color: #1c79f3;
}
.tab-content{
  background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top:3px solid #1c79f3;
  border-bottom:2px solid #1c79f3;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
  border: none;
  background: #1c79f3;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}

.pageloader {
  width: 100%;
  height: 65px;
  background: #FFF url('{{ asset('142.gif')}}') no-repeat 50%;
}
.select2-container .select2-selection--single{
  height:34px;
}
.select2-container{
  width:100% !important;
}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;z-index:2;}
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
          //  alert(data);
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
            <form method="POST" action="{{ url('/save-property-rent-post') }}" id="property-form" enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf
              <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
              <input type="hidden" name="category_id" value="{{ $category->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <h6>Personal Details</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">I am <span class="text-danger">*<span><span class="text-danger" id="listed_err"><span></label>
                </div>
                <div class="form-group col-md-8">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="" name="listed_by" value="Builder">
                    <label class="form-check-label" for="">Builder</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="" name="listed_by" value="Owner">
                    <label class="form-check-label" for="">Owner</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="" name="listed_by" value="Agent">
                    <label class="form-check-label" for="">Agent</label>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Property Type<span class="text-danger">*<span><span  style="color:red" id="pt_err"> </span></label>
                </div>
                <div class="form-group col-md-8">
                  <select id="property_type" class="form-control sel-status @error('property_type') is-invalid @enderror" name="property_type">
                    <option value="">Choose...</option>
                    <optgroup label="All Residential Property"> 
                    @foreach($type as $t)
                    @if($t->title == "RESIDENTIAL")
                    <option value="{{ $t->id }}" @if(old('property_type') == $t->id) Selected @endif>{{ $t->type_name }}</option>
                    @endif
                    @endforeach
                    </optgroup>
                    <optgroup label="All Commercial Property"> 
                    @foreach($type as $t)
                    @if($t->title == "COMMERCIAL")
                    <option value="{{ $t->id }}" @if(old('property_type') == $t->id) Selected @endif>{{ $t->type_name }}</option>
                    @endif
                    @endforeach
                    </optgroup>
                    <optgroup label="All Agricultural Property"> 
                    @foreach($type as $t)
                    @if($t->title == "AGRICULTURAL")
                    <option value="{{ $t->id }}" @if(old('property_type') == $t->id) Selected @endif>{{ $t->type_name }}</option>
                    @endif
                    @endforeach
                    </optgroup>
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
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Address</label><span class="text-danger">*</span><span  style="color:red" id="address_err"> </span></label>
                </div>
                <div class="form-group col-md-8">
                  <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                </div>
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
                        @for($i=1; $i<21; $i++)
                        <input type="radio" id="{{ $i }}" name="bedroom" value="{{ $i }}" @if(old('bedroom') == $i) checked @endif/>
                        <label for="{{ $i }}">{{ $i }}</label>
                        @endfor
                        <!--<input type="radio" id="2" name="bedroom" value="2" @if(old('bedroom') == "2") checked @endif/>-->
                        <!--<label for="2">2</label>-->
                        <!--<input type="radio" id="3" name="bedroom" value="3" @if(old('bedroom') == "3") checked @endif/>-->
                        <!--<label for="3">3</label>-->
                        <!--<input type="radio" id="4" name="bedroom" value="4" @if(old('bedroom') == "4") checked @endif/>-->
                        <!--<label for="4">4</label>-->
                        <!--<input type="radio" id="5" name="bedroom" value="5" @if(old('bedroom') == "5") checked @endif/>-->
                        <!--<label for="5">5</label>-->
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
                        <select name="property_floor_no" class="form-control sel-status @error('property_floor_no') is-invalid @enderror" id="property_floor_no" style="width:100%">
                            <option value="">-Choose-</option>
                            <option value="Lower Basement">Lower Basement</option>
                            <option value="Upper Basement">Upper Basement</option>
                            <option value="Ground">Ground</option>
                            @for($i=1; $i <= 20; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
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
                        <select name="total_floor" id="no_of_floor" class="form-control sel-status @error('total_floor') is-invalid @enderror" style="width:100%;">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 20; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                        @error('total_floor')
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
                <div class="form-row hidden" id="showFurnishedDiv">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>AC</label>
                                <select name="ac" class="form-control" id="ac">
                                    <option value="">-Select-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">3+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bed</label>
                                <select name="bed" class="form-control" id="bed">
                                    <option value="">-Select-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">3+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Wardrobe</label>
                                <select name="wardrobe" class="form-control" id="wardrobe">
                                    <option value="">-Select-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">3+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>TV</label>
                                <select name="tv" class="form-control" id="tv">
                                    <option value="">-Select-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">3+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Fridge">Fridge
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Sofa">Sofa
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Washing Machine">Washing Machine
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Dining Table">Dining Table
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Microwave">Microwave
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Gas Connection">Gas Connection
                                </label>
                            </div>
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
                    <input type="text" class="form-control Stylednumber @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                    <input type="text" id="build_up_area" class="form-control Stylednumber @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="build_unit" id="build_unit" class="form-control">
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
                    <input type="text" id="carpet_area" class="form-control Stylednumber @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="carpet_unit" id="carpet_unit" class="form-control">
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
                <div class="form-row" id ="plot_details">
                  <div class="form-group col-md-5">
                    <label for="">Plot Area<span class="text-danger">*</span><span  style="color:red" id="plot_err"> </span></label>
                    @error('plot_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" id="plot_area" value="{{ old('plot_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_unit" id="plot_unit" class="form-control">
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

                  <div class="form-group col-md-5">
                    <label for="">Plot Length<span class="text-danger">*</span><span  style="color:red" id="plot_length_err"> </span></label>
                    @error('plot_length')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('plot_length') invalid-feedback @enderror" name="plot_length" id="plot_length" value="{{ old('plot_length') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_length_unit" id="plot_length_unit" class="form-control">
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

                  <div class="form-group col-md-5">
                    <label for="">Plot Width<span class="text-danger">*</span><span  style="color:red" id="plot_width_err"> </span></label>
                    @error('plot_width')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" readonly class="form-control @error('plot_width') invalid-feedback @enderror" name="plot_width" id="plot_width" value="{{ old('plot_width') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_width_unit" id="plot_width_unit" class="form-control">
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
                      <label class="form-check-label" style="display:-webkit-inline-box">
                        <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date &nbsp;
                        <div class="hidden" id="showDateDiv">
                          <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px">
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
                    <input type="text" class="form-control Stylednumber" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                          <input type="radio" class="form-check-input" id="show_rent1" name="show_rent_as" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent2" name="show_rent_as" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="plus-minus">
                    <input type="checkbox" name="" id="a" class="a css-checkbox">
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
                    <input type="text" class="form-control Stylednumber" name="security_amount" onkeyup="convertNumberToWords1(this.value)">
                    <span id="security_price" class="text-muted"></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charge" class="form-control Stylednumber">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Per</label>
                    <select name="m_charges_per" id="m_charges_per" class="form-control">
                      <option value="Monthly">Monthly</option>
                      <option value="Quarterly">Quarterly</option>
                      <option value="Yearly">Yearly</option>
                      <option value="One-Time">One-Time</option>
                      <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
                    </select>
                  </div>
                </div>
                <div class="form-row" id="brokerageDiv">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
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
                              Add Photo
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
                              Add Photo
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
                              Add Photo
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
                              Add Photo
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
                              Add Photo
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
                      <label for="">Lifts in the Tower </label>
                      <select name="lift_in_tower" id="lift_in_tower" class="form-control @error('lift_tower') invalid-feedback @enderror">
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
                  <div class="form-group">
                    <h6>Overlooking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Garden/Park">Garden/Park
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Pool">Pool
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                            </label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Car Parking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label" style="display:-webkit-inline-box">
                                <input type="checkbox" class="form-check-input" name="car_parking[]" value="Covered">Covered &nbsp;
                                <div class="hidden" id="showCoveredDiv">
                                  <input type="number" placeholder="Enter No." name="cover_no" id="cover_no">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label" style="display:-webkit-inline-box">
                                <input type="checkbox" class="form-check-input" name="car_parking[]" value="Open">Open &nbsp;
                                <div class="hidden" id="showOpenDiv">
                                  <input type="number" placeholder="Enter No." name="open_no" id="open_no">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="car_parking[]" value="None">None
                            </label>
                        </div>
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
                        <option value="24 HOURS Available" @if(old('status_of_water') == "24 HOURS Available") Selected @endif>24 HOURS Available</option>
                        <option value="12 HOURS Available" @if(old('status_of_water') == "12 HOURS Available") Selected @endif>12 HOURS Available</option>
                        <option value="6 HOURS Available" @if(old('status_of_water') == "6 HOURS Available") Selected @endif>6 HOURS Available</option>
                        <option value="2 HOURS Available" @if(old('status_of_water') == "2 HOURS Available") Selected @endif>2 HOURS Available</option>
                        <option value="1 HOUR Available" @if(old('status_of_water') == "1 HOUR Available") Selected @endif>1 HOUR Available</option>
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
                    <h6>Flooring</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Ceramic Tiles">Ceramic Tiles
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Marble">Marble
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Mosaic">Mosaic
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Vetrified">Vetrified
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Granite">Granite
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Marbonite">Marbonite
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Normal Tiles">Normal Tiles
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Kota Stone">Kota Stone
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="flooring[]" value="Wooden">Wooden
                            </label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Amenities</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Gymnasium">Gymnasium
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Jogging & Strolling Track">Jogging & Strolling Track
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Pipe Gas">Pipe Gas
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Back Up">Power Back Up
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking Security">Reserve Parking Security
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Swimming Pool">Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                            </label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h6>Description & Landmarks</h6>
                  </div>
                  <div class="form-group">
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description" class="form-control ckeditor"></textarea>
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
                      <select id="user_state" class="form-control sel-status @error('state') is-invalid @enderror" name="user_state" style="width:100%">
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
                      <select class="form-control sel-status @error('user_city') is-invalid @enderror" id="user_city" name="user_city" style="width:100%">
                      </select>
                      @error('user_city')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-4">
                      <label for="user_locality">Locality</label><span class="text-danger">*</span></label>
                      <select class="form-control sel-status @error('locality') is-invalid @enderror" id="user_locality" name="user_locality" style="width:100%">
                      </select>
                      @error('user_locality')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address</label><span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('user_address') is-invalid @enderror" id="user_address" name="user_address">
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
                    <select name="land_zone" id="land_zone" class="form-control sel-status">
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
                <div class="form-row" id="idealDiv">
                  <div class="form-group col-md-4">
                    <label for="">Ideal For Businesses</label>
                  </div>
                  <div class="form-group col-md-8">
                    <select name="ideal_business" class="form-control sel-status">
                      <option value="">-Choose-</option>
                      <option value="Call Centre/ BPO">Call Centre/ BPO</option>
                      <option value="Coaching Centre">Coaching Centre</option>
                      <option value="Private Consultancy">Private Consultancy</option>
                      <option value="Doctor Clinic">Doctor Clinic</option>
                      <option value="Pathology">Pathology</option>
                      <option value="IT / ITES and Related">IT / ITES and Related</option>
                      <option value="Studio / Production House">Studio / Production House</option>
                      <option value="Private Office">Private Office</option>
                      <option value="Individual Business">Individual Business</option>
                      <option value="Self Employed Business">Self Employed Business</option>
                      <option value="Boutique">Boutique</option>
                      <option value="Boutique Hall">Boutique Hall</option>
                      <option value="Boutique Office">Boutique Office</option>
                      <option value="Mobile Service Centre">Mobile Service Centre</option>
                      <option value="Back Office">Back Office</option>
                      <option value="Departmental Store">Departmental Store</option>
                      <option value="Corporate office Setup">Corporate office Setup</option>
                      <option value="Women Sefety">Women Sefety</option>
                      <option value="Sales/ Marketing Office">Sales/ Marketing Office</option>
                      <option value="High security setup">High security setup</option>
                      <option value="Lounge">Lounge</option>
                      <option value="Health care">Health care</option>
                      <option value="Cake Shop">Cake Shop</option>
                      <option value="Research Centre">Research Centre</option>
                      <option value="Job Consultancy">Job Consultancy</option>
                      <option value="Logistic Back office">Logistic Back office</option>
                      <option value="Bank">Bank</option>
                      <option value="Financial Institute">Financial Institute</option>
                      <option value="Govt. Offices">Govt. Offices</option>
                      <option value="Packaging Back office">Packaging Back office</option>
                      <option value="Private Company">Private Company</option>
                      <option value="Advertising ">Advertising</option>
                      <option value="Lawyers office">Lawyers office</option>
                      <option value="Law Chamber">Law Chamber</option>
                      <option value="Law Company">Law Company</option>
                      <option value="Showroom">Showroom</option>
                      <option value="Tax Consultants">Tax Consultants</option>
                      <option value="Travel Agency">Travel Agency</option>
                      <option value="Grocery Shop">Grocery Shop</option>
                      <option value="Gold / Jewelers Shop">Gold / Jewelers Shop</option>
                      <option value="Cloth / Garment Shop">Cloth / Garment Shop</option>
                      <option value="Cafe / Restaurant">Cafe / Restaurant</option>
                      <option value="Food Street">Food Street</option>
                      <option value="Automobile">Automobile</option>
                      <option value="Electronic">Electronic</option>
                      <option value="Electrical">Electrical</option>
                      <option value="Seeds / Fertilizer">Seeds / Fertilizer</option>
                      <option value="Dairy Product">Dairy Product</option>
                      <option value="Hardware / Building Material">Hardware / Building Material</option>
                      <option value="Transport Hub">Transport Hub</option>
                      <option value="Pharmaceutical">Pharmaceutical</option>
                      <option value="Medical / Hospital">Medical / Hospital</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-group commercialDiv">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="property_floor_no">Floor No.<span  style="color:red" id="floor_err"> </span></label>
                        <select name="property_floor_no" class="form-control sel-status @error('property_floor_no') is-invalid @enderror" id="property_floor_no" style="width:100%">
                          <option value="">-Choose-</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 20; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                        @error('property_floor_no')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Total Floor<span  style="color:red" id="total_floor_err"> </span></label>
                        <select name="total_floor" id="no_of_floor" class="form-control sel-status @error('total_floor') is-invalid @enderror" style="width:100%;">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 20; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                        @error('total_floor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group commercialDiv">
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
                <div class="form-row hidden" id="showFurnishedDiv">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Washrooms</label>
                        <select name="bathroom" class="form-control" id="bathroom">
                          <option value="">-Select-</option>
                          @for($i=1; $i < 15; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Number of Seats</label>
                        <input type="number" name="no_of_seat" class="form-control" id="no_of_seat">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cabin/Meeting Rooms</label>
                        <select name="meeting_room" class="form-control" id="meeting_room">
                          <option value="">-Select-</option>
                          @for($i=1; $i < 15; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>  
                </div>                
                <div class="form-row commercialDiv">
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
                <div class="form-row commercialDiv">
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
                <div class="form-row commercialDiv">
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
                <div class="form-row commercialDiv">
                  <div class="form-group col-md-5">
                    <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
                    @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control Stylednumber @error('super_build_up_area') invalid-feedback @enderror" id="super_build_up_area" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                    <input type="text" id="build_up_area" class="form-control Stylednumber @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="build_unit" id="build_unit" class="form-control">
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
                    <input type="text" id="carpet_area" class="form-control Stylednumber @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="carpet_unit" id="carpet_unit" class="form-control">
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
                <div class="form-row" id ="plot_details">
                  <div class="form-group col-md-5">
                    <label for="">Plot Area<span class="text-danger">*</span><span  style="color:red" id="plot_err"> </span></label>
                    @error('plot_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" id="plot_area" value="{{ old('plot_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_unit" id="plot_unit" class="form-control">
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

                  <div class="form-group col-md-5">
                    <label for="">Plot Length<span class="text-danger">*</span><span  style="color:red" id="plot_length_err"> </span></label>
                    @error('plot_length')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('plot_length') invalid-feedback @enderror" name="plot_length" id="plot_length" value="{{ old('plot_length') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_length_unit" id="plot_length_unit" class="form-control">
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

                  <div class="form-group col-md-5">
                    <label for="">Plot Width<span class="text-danger">*</span><span  style="color:red" id="plot_width_err"> </span></label>
                    @error('plot_width')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" readonly class="form-control @error('plot_width') invalid-feedback @enderror" name="plot_width" id="plot_width" value="{{ old('plot_width') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_width_unit" id="plot_width_unit" class="form-control">
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
                      <label class="form-check-label" style="display:-webkit-inline-box">
                        <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date &nbsp;
                        <div class="hidden" id="showDateDiv">
                          <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px">
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
                <div class="form-row commercialDiv">
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
                    <input type="text" class="form-control Stylednumber" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                          <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent1" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent2" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="plus-minus">
                    <input type="checkbox" name="" id="a1" class="a css-checkbox">
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
                    <input type="text" class="form-control Stylednumber" name="security_amount" onkeyup="convertNumberToWords1(this.value)">
                    <span id="security_price" class="text-muted"></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charge" class="form-control Stylednumber">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Per</label>
                    <select name="m_charges_per" id="m_charges_per" class="form-control">
                      <option value="Monthly">Monthly</option>
                      <option value="Quarterly">Quarterly</option>
                      <option value="Yearly">Yearly</option>
                      <option value="One-Time">One-Time</option>
                      <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
                    </select>
                  </div>
                </div>
                <div class="form-row" id="brokerageDiv">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
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
                <div class="form-group commercialDiv" id="exteriorDiv">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home1-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">Exterior View</a>
                      <a class="nav-item nav-link" id="nav-profile1-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Common Area</a>
                      <a class="nav-item nav-link" id="nav-contact1-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Washrrom</a>
                      <a class="nav-item nav-link" id="nav-about1-tab" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Floor Plan</a>
                      <a class="nav-item nav-link" id="nav-kitchen1-tab" data-toggle="tab" href="#nav-kitchen1" role="tab" aria-controls="nav-kitchen1" aria-selected="false">Others</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home1-tab">
                      <div id="upload_form5">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile1-tab">
                      <div id="upload_form6">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>                          
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="common_area[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact1-tab">
                      <div id="upload_form7">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about1-tab">
                      <div id="upload_form8">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="floor_plan_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-kitchen1" role="tabpanel" aria-labelledby="nav-kitchen1-tab">
                      <div id="upload_form9">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>          
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="other_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group" id="imageDiv">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home6-tab" data-toggle="tab" href="#nav-home6" role="tab" aria-controls="nav-home6" aria-selected="true">Site View</a>
                      <a class="nav-item nav-link" id="nav-profile6-tab" data-toggle="tab" href="#nav-profile6" role="tab" aria-controls="nav-profile6" aria-selected="false">Master Plan</a>
                      <a class="nav-item nav-link" id="nav-contact6-tab" data-toggle="tab" href="#nav-contact6" role="tab" aria-controls="nav-contact6" aria-selected="false">Location Map</a>
                      <a class="nav-item nav-link" id="nav-kitchen6-tab" data-toggle="tab" href="#nav-kitchen6" role="tab" aria-controls="nav-kitchen6" aria-selected="false">Others</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home6" role="tabpanel" aria-labelledby="nav-home6-tab">
                      <div id="upload_form19">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile6" role="tabpanel" aria-labelledby="nav-profile6-tab">
                      <div id="upload_form20">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>                          
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact6" role="tabpanel" aria-labelledby="nav-contact6-tab">
                      <div id="upload_form21">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-kitchen6" role="tabpanel" aria-labelledby="nav-kitchen6-tab">
                      <div id="upload_form22">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>          
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="others_photos[]" type="file"/>
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
                    <div class="form-group col-md-6 commercialDiv">
                      <label for="">Lifts in the Tower </label>
                      <select name="lift_in_tower" id="lift_in_tower" class="form-control @error('lift_in_tower') invalid-feedback @enderror">
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
                  <div class="form-row commercialDiv">
                    <div class="form-group col-md-6">
                      <label for="">Shop on the Floor</label>
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
                  <div class="form-row commercialDiv">
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
                      <select name="leed_certification" id="" class="form-control">
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
                        <option value="24 HOURS Available" @if(old('status_of_water') == "24 HOURS Available") Selected @endif>24 HOURS Available</option>
                        <option value="12 HOURS Available" @if(old('status_of_water') == "12 HOURS Available") Selected @endif>12 HOURS Available</option>
                        <option value="6 HOURS Available" @if(old('status_of_water') == "6 HOURS Available") Selected @endif>6 HOURS Available</option>
                        <option value="2 HOURS Available" @if(old('status_of_water') == "2 HOURS Available") Selected @endif>2 HOURS Available</option>
                        <option value="1 HOUR Available" @if(old('status_of_water') == "1 HOUR Available") Selected @endif>1 HOUR Available</option>
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
                    <h6>Overlooking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="overlooking[]" value="Garden/Park">Garden/Park
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Car Parking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label" style="display:-webkit-inline-box">
                          <input type="checkbox" class="form-check-input" name="car_parking[]" value="Covered">Covered &nbsp;
                          <div class="hidden" id="showCoveredDiv">
                            <input type="number" placeholder="Enter No." name="cover_no" id="cover_no">
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label" style="display:-webkit-inline-box">
                          <input type="checkbox" class="form-check-input" name="car_parking[]" value="Open">Open &nbsp;
                          <div class="hidden" id="showOpenDiv">
                            <input type="number" placeholder="Enter No." name="open_no" id="open_no">
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="car_parking[]" value="None">None
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Amenities</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Conditioner">Air Conditioner
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="CCTV Camera">CCTV Camera
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinklers">Fire Sprinklers
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria Food Court">Cafeteria Food Court
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Conference Room">Conference Room
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Intercom Facility">Intercom Facility
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Facility">Internet Wi-Fi Facility
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Tea/Coffee">Tea/Coffee
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="aminities[]" value="Printer">Printer
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Pipe Gas">Pipe Gas
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Back Up">Power Back Up
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="RO Water System">RO Water System
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking">Reserve Parking
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Services/ Goods Lift">Services/ Goods Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Swimming Pool">Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Whiteboard">Whiteboard
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitors Parking">Visitors Parking
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheelchair Accessibility">Wheelchair Accessibility
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 commercialDiv">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Water Storage">Water Storage
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security 
                          </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking">Reserve Parking 
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitors Parking">Visitors Parking 
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Water Storage">Water Storage 
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Backup">Power Backup 
                            </label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h6>Description & Landmarks</h6>
                  </div>
                  <div class="form-group">
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description1" class="form-control ckeditor"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" class="form-control">
                  </div>
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
                      <select id="user_state" class="form-control sel-status @error('state') is-invalid @enderror" name="user_state" style="width:100%">
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
                      <select class="form-control sel-status @error('user_city') is-invalid @enderror" id="user_city" name="user_city" style="width:100%">
                      </select>
                      @error('user_city')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-4">
                      <label for="user_locality">Locality</label><span class="text-danger">*</span></label>
                      <select class="form-control sel-status @error('locality') is-invalid @enderror" id="user_locality" name="user_locality" style="width:100%">
                      </select>
                      @error('user_locality')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address</label><span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('user_address') is-invalid @enderror" id="user_address" name="user_address">
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
                    <select name="total_floor" class="form-control sel-status" id="total_floor" style="width:100%;">
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
                <div class="form-row hidden" id="showFurnishedDiv">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Washrooms</label>
                        <select name="bathroom" class="form-control" id="bathroom">
                          <option value="">-Select-</option>
                          @for($i=1; $i < 15; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Number of Seats</label>
                        <input type="number" name="no_of_seat" class="form-control" id="no_of_seat">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cabin/Meeting Rooms</label>
                        <select name="meeting_room" class="form-control" id="meeting_room">
                          <option value="">-Select-</option>
                          @for($i=1; $i < 15; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
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
                    <input type="text" class="form-control Stylednumber @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                    <input type="text" id="build_up_area" class="form-control Stylednumber @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="build_unit" id="build_unit" class="form-control">
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
                    <input type="text" id="carpet_area" class="form-control Stylednumber @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="carpet_unit" id="carpet_unit" class="form-control">
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
                    <input type="text" class="form-control Stylednumber" name="entrance_width">
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
                    <input type="text" class="form-control Stylednumber" name="facing_width">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="width_facing_road_unit" class="form-control" id="">
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
                      <label class="form-check-label" style="display:-webkit-inline-box">
                        <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date &nbsp;
                        <div class="hidden" id="showDateDiv">
                          <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px">
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
                    <input type="text" class="form-control Stylednumber" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                          <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent1" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent2" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="plus-minus">
                    <input type="checkbox" name="" id="a2" class="a css-checkbox">
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
                    <input type="text" class="form-control Stylednumber" name="security_amount" onkeyup="convertNumberToWords1(this.value)">
                    <span id="security_price" class="text-muted"></span>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charge" class="form-control Stylednumber">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Per</label>
                    <select name="m_charges_per" id="m_charges_per" class="form-control">
                      <option value="Monthly">Monthly</option>
                      <option value="Quarterly">Quarterly</option>
                      <option value="Yearly">Yearly</option>
                      <option value="One-Time">One-Time</option>
                      <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
                    </select>
                  </div>
                </div>
                <div class="form-row" id="brokerageDiv">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
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
                      <a class="nav-item nav-link" id="nav-profile2-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">Common Area</a>
                      <a class="nav-item nav-link" id="nav-contact2-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact2" aria-selected="false">Washroom</a>
                      <a class="nav-item nav-link" id="nav-about2-tab" data-toggle="tab" href="#nav-about2" role="tab" aria-controls="nav-about2" aria-selected="false">Floor Plan</a>
                      <a class="nav-item nav-link" id="nav-kitchen2-tab" data-toggle="tab" href="#nav-kitchen2" role="tab" aria-controls="nav-kitchen2" aria-selected="false">Others</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home2-tab">
                      <div id="upload_form10">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
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
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="common_area[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">
                      <div id="upload_form12">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about2" role="tabpanel" aria-labelledby="nav-about2-tab">
                      <div id="upload_form13">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="floor_plan_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-kitchen2" role="tabpanel" aria-labelledby="nav-kitchen2-tab">
                      <div id="upload_form14">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add Photo</span>
                          <input class="FileUpload1" id="FileInput" name="other_photos[]" type="file"/>
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
                      <label for="">Lifts in the Tower </label>
                      <select name="lift_in_tower" id="lift_in_tower" class="form-control @error('lift_in_tower') invalid-feedback @enderror">
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
                  <div class="form-group">
                    <h6>Overlooking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Garden/Park">Garden/Park
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Pool">Pool
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                            </label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Car Parking</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label" style="display:-webkit-inline-box">
                                <input type="checkbox" class="form-check-input" name="car_parking[]" value="Covered">Covered &nbsp;
                                <div class="hidden" id="showCoveredDiv">
                                    <input type="number" placeholder="Enter No." name="cover_no" id="cover_no">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label" style="display:-webkit-inline-box">
                                <input type="checkbox" class="form-check-input" name="car_parking[]" value="Open">Open &nbsp;
                                <div class="hidden" id="showOpenDiv">
                                  <input type="number" placeholder="Enter No." name="open_no" id="open_no">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="car_parking[]" value="None">None
                            </label>
                        </div>
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
                      <select name="leed_certification" id="" class="form-control">
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
                        <option value="24 HOURS Available" @if(old('status_of_water') == "24 HOURS Available") Selected @endif>24 HOURS Available</option>
                        <option value="12 HOURS Available" @if(old('status_of_water') == "12 HOURS Available") Selected @endif>12 HOURS Available</option>
                        <option value="6 HOURS Available" @if(old('status_of_water') == "6 HOURS Available") Selected @endif>6 HOURS Available</option>
                        <option value="2 HOURS Available" @if(old('status_of_water') == "2 HOURS Available") Selected @endif>2 HOURS Available</option>
                        <option value="1 HOUR Available" @if(old('status_of_water') == "1 HOUR Available") Selected @endif>1 HOUR Available</option>
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
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Conditioner">Air Conditioner
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="CCTV Camera">CCTV Camera
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinklers">Fire Sprinklers
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria Food Court">Cafeteria Food Court
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Conference Room">Conference Room
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Intercom Facility">Intercom Facility
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Facility">Internet Wi-Fi Facility
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Tea/Coffee">Tea/Coffee
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Printer">Printer
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Pipe Gas">Pipe Gas
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Back Up">Power Back Up
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="RO Water System">RO Water System
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking">Reserve Parking
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Services/ Goods Lift">Services/ Goods Lift
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Swimming Pool">Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Whiteboard">Whiteboard
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitors Parking">Visitors Parking
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheelchair Accessibility">Wheelchair Accessibility
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Water Storage">Water Storage
                            </label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <h6>Description & Landmarks</h6>
                  </div>
                  <div class="form-group">
                    <label for="">Description<span  style="color:red" id="description_err"> </span></label>
                    <textarea name="description" id="description2" class="form-control ckeditor"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Landmark</label>
                    <input type="text" name="landmark" class="form-control">
                  </div>
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
                      <select id="user_state" class="form-control sel-status @error('state') is-invalid @enderror" name="user_state" style="width:100%">
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
                      <select class="form-control sel-status @error('user_city') is-invalid @enderror" id="user_city" name="user_city" style="width:100%">
                      </select>
                      @error('user_city')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-4">
                      <label for="user_locality">Locality</label><span class="text-danger">*</span></label>
                      <select class="form-control sel-status @error('locality') is-invalid @enderror" id="user_locality" name="user_locality" style="width:100%">
                      </select>
                      @error('user_locality')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address</label><span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('user_address') is-invalid @enderror" id="user_address" name="user_address">
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
                  <button type="button" id="submitForm2" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <div id="land-form" class="hidden">
                <hr>
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="floorDiv">
                    <label for="">Floors Allowed for construction</label>
                    <select name="floor_constru" id="floor_constru" class="form-control @error('floor_constru') invalid-feedback @enderror">
                      <option value="">-Select floors Allowed for construction-</option>
                      @for($i=1; $i <= 201 ;$i++)
                      <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Land Zone<span  style="color:red" id="land_zone_err"> </span></label>
                    <select name="land_zone" id="land_zone" class="form-control sel-status">
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
                  <div class="form-group col-md-6">
                    <label for="">No. of Open Side</label>
                    <select name="no_of_open_side" id="no_of_open_side" class="sel-status form-control @error('no_of_open_side') invalid-feedback @enderror">
                      <option value="">-Select No. of Open Side-</option>
                      <option value="1" @if(old('no_of_open_side') == "1") Selected @endif>1</option>
                      <option value="2" @if(old('no_of_open_side') == "2") Selected @endif>2</option>
                      <option value="3" @if(old('no_of_open_side') == "3") Selected @endif>3</option>
                      <option value="4" @if(old('no_of_open_side') == "4") Selected @endif>4</option>
                    </select>
                  </div>
                </div>
                <div class="form-row" id="idealDiv">
                  <div class="form-group col-md-4">
                    <label for="">Ideal For Businesses</label>
                  </div>
                  <div class="form-group col-md-8">
                    <select name="ideal_business" class="form-control sel-status">
                      <option value="">-Choose-</option>
                      <option value="Call Centre/ BPO">Call Centre/ BPO</option>
                      <option value="Coaching Centre">Coaching Centre</option>
                      <option value="Private Consultancy">Private Consultancy</option>
                      <option value="Doctor Clinic">Doctor Clinic</option>
                      <option value="Pathology">Pathology</option>
                      <option value="IT / ITES and Related">IT / ITES and Related</option>
                      <option value="Studio / Production House">Studio / Production House</option>
                      <option value="Private Office">Private Office</option>
                      <option value="Individual Business">Individual Business</option>
                      <option value="Self Employed Business">Self Employed Business</option>
                      <option value="Boutique">Boutique</option>
                      <option value="Boutique Hall">Boutique Hall</option>
                      <option value="Boutique Office">Boutique Office</option>
                      <option value="Mobile Service Centre">Mobile Service Centre</option>
                      <option value="Back Office">Back Office</option>
                      <option value="Departmental Store">Departmental Store</option>
                      <option value="Corporate office Setup">Corporate office Setup</option>
                      <option value="Women Sefety">Women Sefety</option>
                      <option value="Sales/ Marketing Office">Sales/ Marketing Office</option>
                      <option value="High security setup">High security setup</option>
                      <option value="Lounge">Lounge</option>
                      <option value="Health care">Health care</option>
                      <option value="Cake Shop">Cake Shop</option>
                      <option value="Research Centre">Research Centre</option>
                      <option value="Job Consultancy">Job Consultancy</option>
                      <option value="Logistic Back office">Logistic Back office</option>
                      <option value="Bank">Bank</option>
                      <option value="Financial Institute">Financial Institute</option>
                      <option value="Govt. Offices">Govt. Offices</option>
                      <option value="Packaging Back office">Packaging Back office</option>
                      <option value="Private Company">Private Company</option>
                      <option value="Advertising ">Advertising</option>
                      <option value="Lawyers office">Lawyers office</option>
                      <option value="Law Chamber">Law Chamber</option>
                      <option value="Law Company">Law Company</option>
                      <option value="Showroom">Showroom</option>
                      <option value="Tax Consultants">Tax Consultants</option>
                      <option value="Travel Agency">Travel Agency</option>
                      <option value="Grocery Shop">Grocery Shop</option>
                      <option value="Gold / Jewelers Shop">Gold / Jewelers Shop</option>
                      <option value="Cloth / Garment Shop">Cloth / Garment Shop</option>
                      <option value="Cafe / Restaurant">Cafe / Restaurant</option>
                      <option value="Food Street">Food Street</option>
                      <option value="Automobile">Automobile</option>
                      <option value="Electronic">Electronic</option>
                      <option value="Electrical">Electrical</option>
                      <option value="Seeds / Fertilizer">Seeds / Fertilizer</option>
                      <option value="Dairy Product">Dairy Product</option>
                      <option value="Hardware / Building Material">Hardware / Building Material</option>
                      <option value="Transport Hub">Transport Hub</option>
                      <option value="Pharmaceutical">Pharmaceutical</option>
                      <option value="Medical / Hospital">Medical / Hospital</option>
                    </select>
                  </div>
                </div>
                <div class="form-group" id="propFloorDiv">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Property Floor No.<span  style="color:red" id="floor_err"> </span></label>
                        <select name="property_floor_no" class="form-control sel-status @error('property_floor_no') is-invalid @enderror" id="property_floor_no" style="width:100%">
                          <option value="">-Choose-</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 20; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
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
                        <select name="total_floor" id="no_of_floor" class="form-control sel-status @error('total_floor') is-invalid @enderror" style="width:100%;">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 20; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                        @error('total_floor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="">Width of Road facing the Plot</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}" placeholder="Meters">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="road_facing_unit" id="road_facing_unit" class="form-control @error('road_facing_unit') invalid-feedback @enderror">
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
                      <option value="Perch">Perch</option>
                      <option value="Guntha">Guntha</option>
                      <option value="Are">Are</option>
                    </select>
                  </div>
                </div>  
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Any construction Done <span class="text-danger">*</span><span class="text-danger" id="construct_err"></span></label>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="any_construc" value="Yes">Yes
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="any_construc" value="No">No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Bondary wall Made<span class="text-danger">*</span><span class="text-danger" id="wall_err"></span></label>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="boundry_wall" value="Yes">Yes
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="boundry_wall" value="No">No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row" id="constructionDiv">
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
                  <h6>Area</h6>
                </div>
                <div class="form-row" id="areaDiv">
                  <div class="form-group col-md-5">
                    <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
                    @error('super_build_up_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control Stylednumber @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                    <input type="text" id="build_up_area" class="form-control Stylednumber @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="build_unit" id="build_unit" class="form-control">
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
                    <input type="text" id="carpet_area" class="form-control Stylednumber @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="carpet_unit" id="carpet_unit" class="form-control">
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
                  <div class="col-md-5">
                    <label for="">Plot Area<span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" id="plot_area" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_unit" id="plot_unit" class="form-control @error('plot_unit') invalid-feedback @enderror">
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
                      <option value="Perch">Perch</option>
                      <option value="Guntha">Guntha</option>
                      <option value="Are">Are</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="">Plot Length<span class="text-danger">*</span><span  style="color:red" id="plot_length_err"> </span></label>
                    @error('plot_length')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" class="form-control @error('plot_length') invalid-feedback @enderror" name="plot_length" id="plot_length" value="{{ old('plot_length') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_length_unit" id="plot_length_unit" class="form-control">
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

                  <div class="form-group col-md-5">
                    <label for="">Plot Width<span class="text-danger">*</span><span  style="color:red" id="plot_width_err"> </span></label>
                    @error('plot_width')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" readonly class="form-control @error('plot_width') invalid-feedback @enderror" name="plot_width" id="plot_width" value="{{ old('plot_width') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="plot_width_unit" id="plot_width_unit" class="form-control">
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
                  <div class="form-group col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="1" name="corner_plot">This is Corner Plot 
                      </label>
                    </div>
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
                      <label class="form-check-label" style="display:-webkit-inline-box">
                        <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date &nbsp;
                        <div class="hidden" id="showDateDiv">
                          <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px">
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
                <div class="form-group">
                  <h6>Rent/Lease Detail</h6>
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Monthly Rent<span  style="color:red" id="monthly_rent_err"> </span></label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control Stylednumber" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
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
                          <input type="radio" class="form-check-input" id="show_rent1" name="show_rent_as" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent2" name="show_rent_as" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_rent_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="plus-minus">
                    <input type="checkbox" name="" id="a" class="a css-checkbox">
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
                <div class="form-group" id="stampDiv">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
                    </label>
                  </div>
                </div>
                <div class="form-group" id="chargesDiv">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" name="ele_water_charges" class="form-check-input" value="1" checked>Electricity & Water charges excluded.
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Security Deposit Amount</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="security_amount" id="security_amount" class="form-control Stylednumber @error('security_amount') invalid-feedback @enderror" value="{{ old('security_amount') }}">
                    @error('security_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row" id="brokerageDiv">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
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
                <hr>
                <div class="form-group">
                  <h6>Photos</h6>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home5-tab" data-toggle="tab" href="#nav-home5" role="tab" aria-controls="nav-home5" aria-selected="true">Site View</a>
                          <a class="nav-item nav-link" id="nav-profile5-tab" data-toggle="tab" href="#nav-profile5" role="tab" aria-controls="nav-profile5" aria-selected="false">Master Plan</a>
                          <a class="nav-item nav-link" id="nav-contact5-tab" data-toggle="tab" href="#nav-contact5" role="tab" aria-controls="nav-contact5" aria-selected="false">Location Map</a>
                          <a class="nav-item nav-link" id="nav-others5-tab" data-toggle="tab" href="#nav-others5" role="tab" aria-controls="nav-others5" aria-selected="false">Others </a>
                        </div>
                      </nav>
                      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home5" role="tabpanel" aria-labelledby="nav-home5-tab">
                          <div id="upload_form15">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">
                                Add Photo
                              </span>
                              <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                              <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile5" role="tabpanel" aria-labelledby="nav-profile5-tab">
                          <div id="upload_form16">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add Photo</span>
                              <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>      
                        </div>
                        <div class="tab-pane fade" id="nav-contact5" role="tabpanel" aria-labelledby="nav-contact5-tab">
                          <div id="upload_form17">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add Photo</span>
                              <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-others5" role="tabpanel" aria-labelledby="nav-others5-tab">
                          <div id="upload_form18">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add Photo</span>
                              <input class="FileUpload1" id="FileInput" name="others_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <button type="button" id="showButton4" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv4">
                  <div class="form-group">
                    <h6>Additional Features</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Overlooking</label>
                    </div>
                    <div class="form-group col-md-8">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group ownershipDiv">
                    <h6>Ownership & Approvals</h6>
                  </div>
                  <div class="form-row ownershipDiv">
                    <div class="form-group col-md-6">
                      <label for="">Ownership Status</label>
                      <select name="ownership_approval" id="ownership_approval" class="form-control @error('ownership_approval') invalid-feedback @enderror">
                        <option value="">-Select Ownership Approval-</option>
                        <option value="Freehold" @if(old('ownership_approval') == "Freehold") Selected @endif>Freehold</option>
                        <option value="Leasehold" @if(old('ownership_approval') == "Leasehold") Selected @endif>Leasehold</option>
                        <option value="Power of Attorney" @if(old('ownership_approval') == "Power of Attorney") Selected @endif>Power of Attorney</option>
                        <option value="Co-Operative Society" @if(old('ownership_approval') == "Co-Operative Society") Selected @endif>Co-Operative Society</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Approved By</label>
                      <select name="approved_by" id="approved_by" class="form-control @error('approved_by') invalid-feedback @enderror">
                        <option value="">-Select Approved By-</option>
                        <option value="NMRDA" @if(old('approved_by') == "NMRDA") Selected @endif>NMRDA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group waterStatus">
                    <h6>Status of Water & Electricity</h6>
                  </div>
                  <div class="form-row waterStatus">
                    <div class="form-group col-md-6">
                      <label for="">Status of Water</label>
                      <select name="status_of_water" id="status_of_water" class="form-control @error('status_of_water') invalid-feedback @enderror">
                        <option value="">-Select Status of Water-</option>
                        <option value="24 HOURS Available" @if(old('status_of_water') == "24 HOURS Available") Selected @endif>24 HOURS Available</option>
                        <option value="12 HOURS Available" @if(old('status_of_water') == "12 HOURS Available") Selected @endif>12 HOURS Available</option>
                        <option value="6 HOURS Available" @if(old('status_of_water') == "6 HOURS Available") Selected @endif>6 HOURS Available</option>
                        <option value="2 HOURS Available" @if(old('status_of_water') == "2 HOURS Available") Selected @endif>2 HOURS Available</option>
                        <option value="1 HOUR Available" @if(old('status_of_water') == "1 HOUR Available") Selected @endif>1 HOUR Available</option>
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
                    <label>Description <span class="text-danger">*</span><span class="text-danger" id="description_err"></span></label>
                    <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Land Mark</label>
                    <input type="text" class="form-control @error('land_mark') is-invalid @enderror" id="land_mark"  name="land_mark" value="{{ old('land_mark') }}">
                    @error('land_mark')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
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
                      <select id="user_state" class="form-control sel-status @error('state') is-invalid @enderror" name="user_state" style="width:100%">
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
                      <select class="form-control sel-status @error('user_city') is-invalid @enderror" id="user_city" name="user_city" style="width:100%">
                      </select>
                      @error('user_city')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-4">
                      <label for="user_locality">Locality</label><span class="text-danger">*</span></label>
                      <select class="form-control sel-status @error('locality') is-invalid @enderror" id="user_locality" name="user_locality" style="width:100%">
                      </select>
                      @error('user_locality')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address</label><span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('user_address') is-invalid @enderror" id="user_address" name="user_address">
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
                  <button type="button" id="submitForm3" class="btn btn-primary">Post Your Add</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ asset('js/image-upload.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
$(document).ready(function () {
  $('.ckeditor').ckeditor();
});
$('.datepicker').datepicker({
  uiLibrary: 'bootstrap4'
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
    if (formatted.indexOf('.') > 0) 
    {
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


$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$("input[name='available_from']").change(function(){
  var available_from = $(this).val();
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
    if($("#land-form").css("display") == "block"){
      $("#land-form #showDateDiv").show(1000);
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
    if($("#land-form").css("display") == "block"){
      $("#land-form #showDateDiv").hide(1000);
    }
  }
})

$("input[name='furnishing']").change(function(){
  var furnishing = $(this).val();
  if((furnishing == "Furnished") || (furnishing == "Semi-Furnished"))
  {
    if($("#commercial-form").css("display") == "block"){ 
      $("#commercial-form #showFurnishedDiv").show();
    }
    if($("#rent-lease-form").css("display") == "block"){
      $("#rent-lease-form #showFurnishedDiv").show();
    }
    if($("#showroom-form").css("display") == "block"){
      $("#showroom-form #showFurnishedDiv").show();
    }
    if($("#land-form").css("display") == "block"){
      $("#land-form #showFurnishedDiv").show();
    }
  }
  else{
    if($("#commercial-form").css("display") == "block")
    { 
      $("#commercial-form #showFurnishedDiv").hide();
    }
    if($("#rent-lease-form").css("display") == "block"){
      $("#rent-lease-form #showFurnishedDiv").hide();
    }
    if($("#showroom-form").css("display") == "block"){
      $("#showroom-form #showFurnishedDiv").hide();
    }
    if($("#land-form").css("display") == "block"){
      $("#land-form #showFurnishedDiv").hide();
    }
  }
})

$("input[name='car_parking[]']").change(function(){
  var car_parking = $(this).val();
  if($("#rent-lease-form").css("display") == "block"){
    $("#rent-lease-form #show"+car_parking+"Div").toggle(1000);
  }
  if($("#showroom-form").css("display") == "block"){
    $("#showroom-form #show"+car_parking+"Div").toggle(1000);
  }
  if($("#commercial-form").css("display") == "block"){
    $("#commercial-form #show"+car_parking+"Div").toggle(1000);
  }
})

$(document).ready(function() {
  $(".sel-status").select2();
});

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
  if(n_length <= 9) {
    var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    var received_n_array = new Array();
    for (var i = 0; i < n_length; i++) {
      received_n_array[i] = number.substr(i, 1);
    }
    for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
      n_array[i] = received_n_array[j];
    }
    for(var i = 0, j = 1; i < 9; i++, j++) {
      if (i == 0 || i == 2 || i == 4 || i == 7) {
        if (n_array[i] == 1) {
          n_array[j] = 10 + parseInt(n_array[j]);
          n_array[i] = 0;
        }
      }
    }
    value = "";
    for(var i = 0; i < 9; i++) {
      if (i == 0 || i == 2 || i == 4 || i == 7) {
        value = n_array[i] * 10;
      } 
      else {
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
  if($("#land-form").css("display") == "block")
  { 
    $('#land-form #show_price').html(words_string);
  }
}

function convertNumberToWords1(amount) {
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
    $('#rent-lease-form #security_price').html(words_string);
  }
  if($("#commercial-form").css("display") == "block")
  { 
    $('#commercial-form #security_price').html(words_string);
  }
  if($("#showroom-form").css("display") == "block")
  { 
    $('#showroom-form #security_price').html(words_string);
  }
  if($("#land-form").css("display") == "block")
  { 
    $('#land-form #security_price').html(words_string);
  }
}

$(document).mouseup(function (e) { 
  if($("#commercial-form").css("display") == "block")
  { 
    var monthly_rent = $("#commercial-form #monthly_rent").val();
    if(monthly_rent != ""){
      if ($(e.target).closest("#commercial-form #monthly_rent").length === 0) {
        x=monthly_rent.toString();
        var lastThree = x.substring(x.length-3);
        var otherNumbers = x.substring(0,x.length-3);
        if(otherNumbers != '')
        lastThree = '' + lastThree;
        var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
        $("#commercial-form #show_rent1").val(res);
        $("#commercial-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#commercial-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        $("#commercial-form #show_rent2").val(res+' Negotiable');
        $("#commercial-form #show_rent").show(1000); 
      } 
    }
  }
  if($("#rent-lease-form").css("display") == "block")
  { 
    var monthly_rent = $("#rent-lease-form #monthly_rent").val();
    if(monthly_rent != ""){
      if ($(e.target).closest("#rent-lease-form #monthly_rent").length === 0) {
        x=monthly_rent.toString();
        var lastThree = x.substring(x.length-3);
        var otherNumbers = x.substring(0,x.length-3);
        if(otherNumbers != '')
        lastThree = '' + lastThree;
        var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
        $("#rent-lease-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#rent-lease-form #show_rent1").val(res);
        $("#rent-lease-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        $("#rent-lease-form #show_rent2").val(res+' Negotiable');
        // format.format(4800)  
        $("#rent-lease-form #show_rent").show(1000); 
      } 
    }
  }
  if($("#showroom-form").css("display") == "block")
  { 
    var monthly_rent = $("#showroom-form #monthly_rent").val();
    if(monthly_rent != ""){
      if ($(e.target).closest("#showroom-form #monthly_rent").length === 0) {
        x=monthly_rent.toString();
        var lastThree = x.substring(x.length-3);
        var otherNumbers = x.substring(0,x.length-3);
        if(otherNumbers != '')
        lastThree = '' + lastThree;
        var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
        $("#showroom-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#showroom-form #show_rent1").val('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#showroom-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        $("#showroom-form #show_rent2").val('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        // format.format(4800)  
        $("#showroom-form #show_rent").show(1000); 
      } 
    }
  }
  
  if($("#land-form").css("display") == "block")
  { 
    var monthly_rent = $("#land-form #monthly_rent").val();
    // alert(monthly_rent);
    if(monthly_rent != ""){
      if ($(e.target).closest("#land-form #monthly_rent").length === 0) {
        x=monthly_rent.toString();
        var lastThree = x.substring(x.length-3);
        var otherNumbers = x.substring(0,x.length-3);
        if(otherNumbers != '')
        lastThree = '' + lastThree;
        var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
        $("#land-form #rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#land-form #show_rent1").val('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
        $("#land-form #rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        $("#land-form #show_rent2").val('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
        // format.format(4800)  
        $("#land-form #show_rent").show(1000); 
      } 
    }
  }
}) 

$('body').on('click', 'input[name="listed_by"]', function () {
  var query = $(this).val();
  if(query == "Owner")
  {
    if($("#rent-lease-form").css("display") == "block")
    { 
      $("#rent-lease-form #brokerageDiv").hide(); 
    }
    if($("#commercial-form").css("display") == "block")
    {
      $("#commercial-form #brokerageDiv").hide();
    } 
    if($("#showroom-form").css("display") == "block")
    {
      $("#showroom-form #brokerageDiv").hide();
    } 
    if($("#land-form").css("display") == "block")
    {
      $("#land-form #brokerageDiv").hide();
    }
  }else{
    if($("#rent-lease-form").css("display") == "block")
    { 
      $("#rent-lease-form #brokerageDiv").show(); 
    }
    if($("#commercial-form").css("display") == "block")
    {
      $("#commercial-form #brokerageDiv").show();
    } 
    if($("#showroom-form").css("display") == "block")
    {
      $("#showroom-form #brokerageDiv").show();
    } 
    if($("#land-form").css("display") == "block")
    {
      $("#land-form #brokerageDiv").show();
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
  if($("#land-form").css("display") == "block")
  {
    $("#land-form #otherChargesDiv").fadeToggle(1000);
  } 
})
$('body').on('change', '#property_type', function () {
  var query = $(this).val();
  var listed_by = $('input[name="listed_by"]:checked').val();
  if((query == 34) || (query == 35) || (query == 36) || (query == 37) || (query == 38) || (query == 39) || (query == 40))
  {
    var showDiv = $('.pageloader');
    if (showDiv.is(":visible")) { return; }
    showDiv.show();
    setTimeout(function() {
      showDiv.hide();
      $('#land-form').fadeOut();
      $('#rent-lease-form').fadeIn();
      $('#commercial-form').fadeOut();
      $('#showroom-form').fadeOut();
      if(listed_by == "Owner")
      {
        $("#rent-lease-form #brokerageDiv").hide(); 
      }
      else{
        $("#rent-lease-form #brokerageDiv").show();
      }
      if((query == 35) || (query ==36))
      {
        $("#plot_details").show();
      }
      else{
        $("#plot_details").hide();
      }
    }, 2500);
  }
  if((query == 41) || (query == 42) || (query == 45) || (query == 46))
  {
    var showDiv = $('.pageloader');
    if (showDiv.is(":visible")) { return; }
    showDiv.show();
    setTimeout(function() {
      showDiv.hide();
      $('#land-form').fadeOut();
      $('#commercial-form').fadeIn();
      $('#rent-lease-form').fadeOut();
      $('#showroom-form').fadeOut();
      if(listed_by == "Owner")
      {
        $("#commercial-form #brokerageDiv").hide(); 
      }
      else{
        $("#commercial-form #brokerageDiv").show();
      }
      if(query == 42)
      {
        $('#idealDiv').hide();
      }
      else{
        $('#idealDiv').show();
      }
      if(query == 45){
        $('.commercialDiv').hide();
        // $('.warehouseDiv').hide();
      }
      else{
        $('.commercialDiv').show();
      }
      if((query == 45) || (query == 46))
      {
        $("#commercial-form #plot_details").show();
        $("#commercial-form #imageDiv").show();
        $("#commercial-form #exteriorDiv").hide();
      }
      else{
        $("#commercial-form #plot_details").hide();
        $("#commercial-form #imageDiv").hide();
        $("#commercial-form #exteriorDiv").show();
      }
    }, 2500);
  }
  if((query == 43) || (query == 44))
  {
    var showDiv = $('.pageloader');
    if (showDiv.is(":visible")) { return; }
    showDiv.show();
    setTimeout(function() {
      showDiv.hide();
      $('#land-form').fadeOut();
      $('#commercial-form').fadeOut();
      $('#rent-lease-form').fadeOut();
      $('#showroom-form').fadeIn();
      if(listed_by == "Owner")
      {
        $("#showroom-form #brokerageDiv").hide(); 
      }
      else{
        $("#showroom-form #brokerageDiv").show();
      }
    }, 2500);
  }
  if((query == 47) || (query == 48) || (query == 50) || (query == 51) || (query == 52) || (query == 53) || (query == 54) || (query == 55) || (query == 56))
  {
    var showDiv = $('.pageloader');
    if (showDiv.is(":visible")) { return; }
    showDiv.show();
    setTimeout(function() {
      showDiv.hide();
      $('#commercial-form').fadeOut();
      $('#rent-lease-form').fadeOut();
      $('#showroom-form').fadeOut();
      $('#land-form').fadeIn();
      if(listed_by == "Owner")
      {
        $("#land-form #brokerageDiv").hide(); 
      }
      else{
        $("#land-form #brokerageDiv").show();
      }
      if(query == 48)
      {
        $("#land-form #floorDiv").hide();
        $("#land-form #idealDiv").hide();
        $("#propFloorDiv").show();
        $("#areaDiv").show();
        $("#land-form #stampDiv").hide();
        $("#land-form #chargesDiv").show();
        $("#land-form .ownershipDiv").hide();
        $("#land-form .waterStatus").show();
      }else if(query == 47)
      {
        $("#land-form #floorDiv").hide();
        $("#land-form #idealDiv").show();
        $("#propFloorDiv").hide();
        $("#land-form #stampDiv").hide();
        $("#land-form #chargesDiv").show();
        $("#land-form .ownershipDiv").hide();
        $("#land-form .waterStatus").show();
        $("#areaDiv").hide();
      }
      else if(query == 50){
        $("#land-form #floorDiv").hide();
        $("#land-form #idealDiv").show();
        $("#propFloorDiv").hide();
        $("#areaDiv").show();
        $("#land-form #stampDiv").hide();
        $("#land-form #chargesDiv").show();
        $("#land-form .ownershipDiv").hide();
        $("#land-form .waterStatus").show();
      }
      else{
        $("#land-form #floorDiv").show();
        $("#land-form #idealDiv").hide();
        $("#propFloorDiv").hide();
        $("#areaDiv").hide();
        $("#land-form #stampDiv").show();
        $("#land-form #chargesDiv").hide();
        $("#land-form .ownershipDiv").show();
        $("#land-form .waterStatus").hide();
      }
    }, 2500);
  }
})
$('body').on('click', '#showButton1', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
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
  if(listed_by == null)
  {
    $("#listed_err").fadeIn().html("Required");
    setTimeout(function(){ $("#listed_err").fadeOut(); }, 3000);
    $('input[name="listed_by"]').focus();
    return false;
  }
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
  $("#commercial-form :input").prop("disabled", true);
  $("#showroom-form :input").prop("disabled", true);
  $("#property-form").submit();
});

$('body').on('click', '#showButton2', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var project_name = $('#project_name1').val();
  var land_zone = $('#land_zone').val();
  var no_of_floor = $('#commercial-form #no_of_floor').val();
  var furnishing = $("#commercial-form input[name='furnishing']:checked").val();
  var super_build_up_area = $('#commercial-form #super_build_up_area').val();
  var available_from = $("#commercial-form input[name='available_from']:checked").val();
  var monthly_rent = $('#commercial-form #monthly_rent').val();
  if(listed_by == null)
  {
    $("#listed_err").fadeIn().html("Required");
    setTimeout(function(){ $("#listed_err").fadeOut(); }, 3000);
    $('input[name="listed_by"]').focus();
    return false;
  }
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
    $("#commercial-form #total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#commercial-form #total_floor_err").fadeOut(); }, 3000);
    $("#commercial-form #no_of_floor").focus();
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
    $("#rent-lease-form :input").prop("disabled", true);
    $("#showroom-form :input").prop("disabled", true);
    $("#property-form").submit();
  }
});

$('body').on('click', '#showButton3', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
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
  if(listed_by == null)
  {
    $("#listed_err").fadeIn().html("Required");
    setTimeout(function(){ $("#listed_err").fadeOut(); }, 3000);
    $('input[name="listed_by"]').focus();
    return false;
  }
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
    $("#rent-lease-form :input").prop("disabled", true);
    $("#commercial-form :input").prop("disabled", true);
    $("#property-form").submit();
  }
});

$('body').on('click', '#showButton4', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var any_construct = $("#land-form input[name='any_construc']:checked").val();
  var boundary_wall = $("#land-form input[name='boundry_wall']:checked").val();
  var plot_area = $('#land-form #plot_area').val();
  var available_from = $("#land-form input[name='available_from']:checked").val();
  var monthly_rent = $('#land-form #monthly_rent').val();
  if(listed_by == null)
  {
    $("#listed_err").fadeIn().html("Required");
    setTimeout(function(){ $("#listed_err").fadeOut(); }, 3000);
    $('input[name="listed_by"]').focus();
    return false;
  }
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
  if(any_construct == null)
  {
    $("#construct_err").fadeIn().html("Required");
    setTimeout(function(){ $("#construct_err").fadeOut(); }, 3000);
    $("#land-form input[name='any_construc']").focus();
    return false;
  }
  if(boundary_wall == null)
  {
    $("#wall_err").fadeIn().html("Required");
    setTimeout(function(){ $("#wall_err").fadeOut(); }, 3000);
    $("#land-form input[name='boundry_wall']").focus();
    return false;
  }
  if(plot_area == '')
  {
    $("#land-form #plot_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land-form #plot_err").fadeOut(); }, 3000);
    $("#land-form #plot_area").focus();
    return false;
  }
  if(available_from == null)
  {
    $("#land-form #available_from_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land-form #available_from_err").fadeOut(); }, 3000);
    $("#land-form input[name='available_from']").focus();
    return false;
  }
  if(monthly_rent == '')
  {
    $("#land-form #monthly_rent_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land-form #monthly_rent_err").fadeOut(); }, 3000);
    $("#land-form #monthly_rent").focus();
    return false;
  }
  else{
    $("#showDiv4").removeClass("hidden");
    $("#showButton4").addClass("hidden");
  }
})

$('body').on('click', '#submitForm3', function () {
  var description = $('#land-form textarea#description').val();
  if(description == '')
  {
    $("#land-form #description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land-form #description_err").fadeOut(); }, 3000);
    $("#land-form #description").focus();
    return false;
  }
  else{
    $("#rent-lease-form :input").prop("disabled", true);
    $("#commercial-form :input").prop("disabled", true);
    $("#showroom-form :input").prop("disabled", true);
    $("#property-form").submit();
  }
});
 $('#user_state').change(function(){
  var stateID = $(this).val(); 
  if(stateID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-city-list')}}?state_id="+stateID,
      success:function(res){        
        if(res){
          $("#user_city").empty();
          $("#user_city").append('<option value="">Select City</option>');
          $.each(res,function(key,value){
            $("#user_city").append('<option value="'+key+'">'+value+'</option>');
          });      
        }else{
          $("#user_city").empty();
        }
      }
    });
  }else{
    $("#user_city").empty();
  }   
});


$('#user_city').change(function(){
  var cityID = $(this).val();  
  if(cityID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-locality-list')}}?city_id="+cityID,
      success:function(res){        
        if(res){
          $("#user_locality").empty();
          $("#user_locality").append('<option value="">Select Locality</option>');
          $.each(res,function(key,value){
            $("#user_locality").append('<option value="'+key+'">'+value+'</option>');
          });      
        }else{
          $("#user_locality").empty();
        }
      }
    });
  }else{
    $("#user_locality").empty();
  }   
});

$(document).ready(function(){
  var $plot_area = $('#rent-lease-form #plot_area'), $plot_length = $('#rent-lease-form #plot_length'), $plot_width = $('#rent-lease-form #plot_width');
  $plot_length.on('keypress', function(e){
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
    e.stopImmediatePropagation();
    return false;
  } }).on('keyup', function(e) {
    console.log('keyup');
    $plot_width.val(($plot_area.val() / $plot_length.val()).toFixed(2));
	});
})

$(document).ready(function(){
  var $plot_area1 = $('#land-form #plot_area'), $plot_length1 = $('#land-form #plot_length'), $plot_width1 = $('#land-form #plot_width');
  // alert($plot_area1);
  $plot_length1.on('keypress', function(e){
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
    e.stopImmediatePropagation();
    return false;
  } }).on('keyup', function(e) {
    console.log('keyup');
    $plot_width1.val(($plot_area1.val() / $plot_length1.val()).toFixed(2));
	});
})
</script>
@endsection
