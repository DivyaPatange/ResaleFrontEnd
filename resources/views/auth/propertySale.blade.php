@extends('auth.auth_layout.main')
@section('title', 'Properties')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
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
#upload_form9, #upload_form10, #upload_form11, #upload_form12, #upload_form13, #upload_form14, #upload_form15, #upload_form16, #upload_form17,
#upload_form18, #upload_form19, #upload_form20, #upload_form21, #upload_form22, #upload_form23, #upload_form24, #upload_form25
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
  /* margin-bottom: 36px; */
  overflow: hidden;
  flex-wrap:wrap;
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
  /*box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);*/
  transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
  cursor: pointer;
}

.switch-field input:checked + label {
  background-color: #dbe6f1;
  box-shadow: none;
}

.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}

/*add images tab pills start*/
nav > .nav.nav-tabs{
  border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;
  font-size: 14px;
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
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute; z-index:2;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border-radius:4px;}
/*add images tab pills end*/
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
    var city = $('#search-box').val();
    var locality = $(this).val();
    if(city == '')
    {
      $("#city_err").fadeIn().html("Required");
      setTimeout(function(){ $("#city_err").fadeOut(); }, 3000);
      $("#search-box").focus();
      return false;
    }
    if(locality.length > 5 ){
      $.ajax({
        type: "GET",
        url: "{{ route('searchLocality') }}",
        data:{city:city, 'keyword':locality},
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
            <!--flat appartment form start-->
            <form method="POST" action="{{ url('save-property-sale-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;" id="property-sale">
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
                  <label>Property Type<span class="text-danger">*<span></label>
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
                <div class="row">
                  <div class="col-md-4">
                    <label>Address</label><span class="text-danger">*</span><span  style="color:red" id="address_err"> </span></label>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                  </div>
                </div>
              </div>
              <div class="pageloader hidden"></div>
              <div id="container"></div>
              <div class="hidden" id="flat-form">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Name of Society<span class="text-danger">*<span><span style="color:red" id="society_err"></span></label>
                    <input  type="text" id="name_of_society" class="form-control @error('project_name') is-invalid @enderror" name="project_name">
                    @error('project_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>Rera ID<span class="text-danger">*<span><span style="color:red" id="society_err"></span></label>
                    <input  type="text" id="rera_id" class="form-control @error('rera_id') is-invalid @enderror" name="rera_id">
                    @error('rera_id')
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
                      <label>Bedroom<span class="text-danger">*</span><span style="color:red" id="bedroom_err"></span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <div class="switch-field">
                        @for($i=1; $i < 16; $i++)
                        <input type="radio"  name="bedroom" id="{{ $i }}" value="{{ $i }}" @if(old('bedroom') == $i) checked @endif>
                        <label for="{{ $i }}">{{ $i }}</label>
                        @endfor
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
                        @for($i=1; $i < 16; $i++)
                        <input type="radio"  name="balcony" id="balcony{{ $i }}" value="{{ $i }}" @if(old('balcony') == $i) checked @endif>
                        <label for="balcony{{ $i }}">{{ $i }}</label>
                        @endfor
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
                        @for($i=1; $i < 16; $i++)
                        <input type="radio"  name="bathroom" id="bathroom{{ $i }}" value="{{ $i }}" @if(old('bathroom') == $i) checked @endif>
                        <label for="bathroom{{ $i }}">{{ $i }}</label>
                        @endfor
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
                        <label for="floor">Floor No.<span class="text-danger">*</span><span style="color:red" id="floor_err"></span></label>
                        <select name="floor_no" id="floor_no" class="form-control @error('floor_no') is-invalid @enderror">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 200; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Total Floor<span class="text-danger">*</span><span style="color:red" id="total_floor_err"></span></label>
                        <select name="total_floor" id="total_floor" class="form-control @error('no_of_floor') is-invalid @enderror">
                          <option value="">-Select-</option>
                          @for($i=1; $i <= 200; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
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
                      <label>Furnished Status<span class="text-danger">*</span><span style="color:red" id="furnished_err"></span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <div class="switch-field">
                        <input type="radio"  name="furnishing" id="Furnished" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif>
                        <label for="Furnished">Furnished</label>
                        <input type="radio" type="radio" name="furnishing" id="Semi-Furnished" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif>
                        <label for="Semi-Furnished">Semi-Furnished</label>
                        <input type="radio" type="radio" name="furnishing" id="Unfurnished" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif>
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
                <hr>
                <div class="form-group">
                  <h6>Transaction Type/ Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Transaction Type<span class="text-danger">*</span><span style="color:red" id="trans_type_err"></label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Possession Status</label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Under Construction">Under Construction
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Ready to Move">Ready to Move
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="possesDiv1">
                    <label>Available From</label>
                    <input  type="text" id="available_from" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Month-Year" onfocus="(this.type='month')">
                    @error('available_from')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6 hidden" id="possesDiv2">
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
                  <h6>Price Details</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Total Price <span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                    <input type="text" name="total_price" class="form-control Stylednumber @error('total_price') invalid-feedback @enderror" id="total_price" value="{{ old('total_price') }}" onkeyup="convertNumberToWords(this.value)">
                    <span id="show_price" class="text-muted"></span>
                    @error('total_price')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Price Per Sq.ft<span class="text-danger">*</span></label>
                    <input type="text" name="price_per_sq_ft" readonly id="price_per_sq_ft" class="form-control @error('price_per_sq_ft') invalid-feedback @enderror" value="{{ old('price_per_sq_ft') }}">
                    @error('price_per_sq_ft')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div id="show_rent" class="hidden">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="">Show Price as</label>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" id="show_rent1" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" id="show_rent2" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
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
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Price Include</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="price_include" value="Car Parking">
                        <label class="form-check-label" for="inlineCheckbox1">Car Parking</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="price_include" value="Club Membership">
                        <label class="form-check-label" for="inlineCheckbox2">Club Membership</label>
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
                    <label for="">Booking Token Amount</label>
                    <input type="text" name="booking_token_amount" class="form-control Stylednumber @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
                    @error('booking_token_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charges" class="form-control Stylednumber @error('maintenance_charges') invalid-feedback @enderror" value="{{ old('maintenance_charges') }}">
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
                          <span class="title1">Add File</span>
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
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="bedroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      <div id="upload_form3">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1"></i>
                          <span class="title1">Add File</span>
                          <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-kitchen" role="tabpanel" aria-labelledby="nav-kitchen-tab">
                      <div id="upload_form4">
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
                <hr>
                <button type="button" id="showButton1" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv1">
                  <div class="form-group">
                    <h6>Additional Feature</h6>
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
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Study Room">Study Room
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="add_room[]" value="Store Room">Store Room
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
                  <div class="form-row">
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
                      <div class="col-md-6">
                        <label for="">Multiple Flat Available</label>
                      </div>
                      <div class="col-md-6">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="" name="mul_flat_available" value="Yes">
                          <label class="form-check-label" for="">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="" name="mul_flat_available" value="No">
                          <label class="form-check-label" for="">No</label>
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
                    <label for="">Rera Registration No. (Optional)</label>
                    <input type="text" name="rera_regis_no" class="form-control @error('rera_regis_no') invalid-feedback @enderror" value="{{ old('rera_regis_no') }}">
                    @error('rera_regis_no')
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
                  <hr>
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
                    <h6>Aminities</h6>
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Banquet Hall">Banquet Hall
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Bar/Lounge">Bar/Lounge
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Club House">Club House
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="DTH Television Facility">DTH Television Facility
                            </label>
                        </div>
                    </div>
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Jogging & Strolling Track">Jogging & Strolling Track
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Laundary Services">Laundary Services
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Maintenance Staff">Maintenance Staff
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Outdoor Tennis Court">Outdoor Tennis Court
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Park">Park
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Private Terrace">Private Terrace
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Garden">Garden
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Rain Water Harvesting">Rain Water Harvesting
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Vastu Compliment">Vastu Compliment
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Waste Disposal">Waste Disposal
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Ownership Approval</label>
                      <select name="ownership_approval" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Freehold">Freehold</option>
                        <option value="Leasehold">Leasehold</option>
                        <option value="Power of Attorney">Power of Attorney</option>
                        <option value="Co-Operative Society">Co-Operative Society</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Approved By</label>
                      <select name="approved_by" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Metropolitan Region">Metropolitan Region</option>
                        <option value="Development Authority">Development Authority</option>
                        <option value="Developer">Developer</option>
                        <option value="RWA/Co-Operative Housing Society">RWA/Co-Operative Housing Society</option>
                        <option value="City Muncipal Corporation">City Muncipal Corporation</option>
                      </select>
                    </div>
                  </div>  
                  <hr>
                  <div class="form-group">
                    <label>Description <span class="text-danger">*</span><span  style="color:red" id="description_err"> </span></label>
                    <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Land Mark  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('land_mark') is-invalid @enderror" id="land_mark"  name="land_mark" value="{{ old('land_mark') }}">
                    @error('land_mark')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <hr>
                  <button type="button" id="submitForm" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <!--sflat appartment form end-->
                      <!--2nd form-->
              <!--Commercial office Space for Sale-->
              <div class="hidden" id="com-office-form">
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Name of Project/ Office Complex <span class="text-danger">*</span><span class="text-danger" id="project_err"></span></label>
                    <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="name_of_project"  name="project_name" >
                    @error('project_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Rera Id</label>
                    <input type="text" class="form-control @error('rera_id') is-invalid @enderror" id="rera_id"  name="rera_id" value="{{ old('rera_id') }}">
                    @error('rera_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Land Zone</label>
                    <select name="land_zone" id="land_zone" class="form-control @error('land_zone') invalid-feedback @enderror">
                      <option value="">-Select Land Zone-</option>
                      <option value="Industrial" @if(old('land_zone') == "Industrial") Selected @endif>Industrial</option>
                      <option value="Commercial" @if(old('land_zone') == "Commercial") Selected @endif>Commercial</option>
                      <option value="Residential" @if(old('land_zone') == " Residential") Selected @endif>Residential</option>
                      <option value="Transport & Communication" @if(old('land_zone') == "Transport & Communication") Selected @endif>Transport & Communication</option>
                      <option value="Public Utilities" @if(old('land_zone ') == "Public Utilities") Selected @endif>Public Utilities</option>
                      <option value="Public & Semi Public Use" @if(old('land_zone') == " Public & Semi Public Use") Selected @endif>Public & Semi Public Use</option>
                      <option value="Open Spaces" @if(old('land_zone') == "Open Spaces") Selected @endif>Open Spaces</option>
                      <option value="Agricultural Zone" @if(old('land_zone') == "Agricultural Zone") Selected @endif>Agricultural Zone</option>
                      <option value="Special Economic Zone" @if(old('land_zone') == "Special Economic Zone") Selected @endif>Special Economic Zone</option>
                      <option value="Natural Conservation Zone" @if(old('land_zone') == "Natural Conservation Zone") Selected @endif>Natural Conservation Zone</option>
                      <option value="Government Zone" @if(old('land_zone') == "Government Zone") Selected @endif>Government Zone</option>
                    </select>
                    @error('land_zone')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Ideal For business</label>
                    <select name="ideal_business" id="" class="form-control @error('') invalid-feedback @enderror">
                      <option value="">-Select Nearby business-</option>
                    </select>
                    @error('ideal_business')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <!--<div class="form-group">-->
                <!--  <h6>Popular Landmark Nearby Area</h6>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--  <nav>-->
                <!--    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">-->
                <!--      <a class="nav-item nav-link active" id="nav-metro-tab" data-toggle="tab" href="#nav-metro" role="tab" aria-controls="nav-metro" aria-selected="true">Metro Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-railway-tab" data-toggle="tab" href="#nav-railway" role="tab" aria-controls="nav-railway" aria-selected="false">Railway Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-bus-tab" data-toggle="tab" href="#nav-bus" role="tab" aria-controls="nav-bus" aria-selected="false">Bus Stand</a>-->
                <!--      <a class="nav-item nav-link" id="nav-airport-tab" data-toggle="tab" href="#nav-airport" role="tab" aria-controls="nav-airport" aria-selected="false">Airport</a>-->
                <!--      <a class="nav-item nav-link" id="nav-shopping-tab" data-toggle="tab" href="#nav-shopping" role="tab" aria-controls="nav-shopping" aria-selected="false">Shopping Mall</a>-->
                <!--      <a class="nav-item nav-link" id="nav-office-tab" data-toggle="tab" href="#nav-office" role="tab" aria-controls="nav-office" aria-selected="false">Office Complex</a>-->
                <!--    </div>-->
                <!--  </nav>-->
                <!--  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">-->
                <!--    <div class="tab-pane fade show active" id="nav-metro" role="tabpanel" aria-labelledby="nav-metro-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Metro Station</label>-->
                <!--              <input type="text" name="metro_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_metro" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-railway" role="tabpanel" aria-labelledby="nav-railway-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Railway Station</label>-->
                <!--              <input type="text" name="railway_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_railway" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-bus" role="tabpanel" aria-labelledby="nav-bus-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Bus Stand</label>-->
                <!--              <input type="text" name="bus_stand" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_bus" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-airport" role="tabpanel" aria-labelledby="nav-airport-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Airport</label>-->
                <!--              <input type="text" name="airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-shopping" role="tabpanel" aria-labelledby="nav-shopping-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Shopping Mall</label>-->
                <!--              <input type="text" name="shopping_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-office" role="tabpanel" aria-labelledby="nav-office-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Office Complex</label>-->
                <!--              <input type="text" name="office_complex" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_office" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-group">
                  <h6>Floor</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Floor No. <span class="text-danger">*</span><span class="text-danger" id="floor_err"></span></label>
                        <select name="floor_no" id="floor_no" class="form-control @error('floor_no') is-invalid @enderror">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i <= 200; $i++)
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
                        <label for="floor">Total Floor <span class="text-danger">*</span><span class="text-danger" id="total_floor_err"></span></label>
                        <select name="total_floor" id="total_floor" class="form-control @error('no_of_floor') is-invalid @enderror">
                          <option value="">-Select-</option>
                          @for($i=1; $i <= 200; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Furnished Status<span class="text-danger">*</span><span class="text-danger" id="furnished_err"></span></label>
                    </div>
                    <div class="col-md-6">
                      <div class="switch-field">
                        <input type="radio"  name="furnishing" id="20" value="Furnished" @if(old('furnish') == "Furnished") checked @endif>
                        <label for="20">Furnished</label>
                        <input type="radio"  name="furnishing" id="21" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif>
                        <label for="21">Unfurnished</label>
                      </div>
                    </div>
                  </div>
                  @error('furnishing')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Washroom<span class="text-danger">*</span><span class="text-danger" id="bathroom_err"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <div class="switch-field">
                        <input type="radio"  name="bathroom" id="15" value="1" @if(old('washroom') == "1") checked @endif>
                        <label for="15">1</label>
                        <input type="radio"  name="bathroom" id="16" value="2" @if(old('washroom') == "2") checked @endif>
                        <label for="16">2</label>
                        <input type="radio" type="radio" name="bathroom" id="17" value="3" @if(old('washroom') == "3") checked @endif>
                        <label for="17">3</label>
                        <input type="radio" type="radio" name="bathroom" id="18" value="4" @if(old('washroom') == "4") checked @endif>
                        <label for="18">4</label>
                        <input type="radio" type="radio" name="bathroom" id="19" value="4+" @if(old('washroom') == "4+") checked @endif>
                        <label for="19">4+</label>
                      </div>
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
                    <label for="">Covered Area<span class="text-danger">*</span><span  style="color:red" id="covered_err"> </span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control Stylednumber @error('covered_area') invalid-feedback @enderror" id="covered_area" name="covered_area" value="{{ old('covered_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="covered_unit" id="covered_unit" class="form-control">
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
                    <input type="text" id="carpet_area" class="Stylednumber form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
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
                  <div class="col-md-5 form-group">
                    <label for="">Plot Area <small>(Sq.ft.)</small></label>
                    @error('plot_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="plot_area" class="Stylednumber form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
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
                </div>
                <div class="form-group">
                  <h6>Transaction Type/ Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Transaction Type<span class="text-danger">*</span><span class="text-danger" id="trans_err"></label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Possession Status</label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Under Construction">Under Construction
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Ready to Move">Ready to Move
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="possesDiv1">
                    <label>Available From</label>
                    <input  type="text" id="available_from" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Month-Year" onfocus="(this.type='month')">
                    @error('available_from')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6 hidden" id="possesDiv2">
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
                    <label for="">Current Lease Out</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Assured Return</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="assure_return" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="assure_return" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Price Detail</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Expected price<span class="text-danger">*</span><span class="text-danger" id="price_err"></label>
                        <input type="text" name="total_price" id="total_price" class="form-control Stylednumber @error('total_price') is-invalid @enderror" value="{{ old('total_price') }}" onkeyup="convertNumberToWords(this.value)">
                        <span id="show_price" class="text-muted"></span>
                        @error('expected_price')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Price per sq.ft.</label>
                        <input type="text" name="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq_ft') is-invalid @enderror" value="{{ old('price_per_sq_ft') }}">
                        @error('price_per_sq_ft')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div id="show_rent" class="hidden">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="">Show Price as</label>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" id="show_rent1" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" id="show_rent2" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Price Include</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="price_include[]" value="Car Parking">
                        <label class="form-check-label" for="inlineCheckbox1">Car Parking</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="price_include[]" value="PLC">
                        <label class="form-check-label" for="inlineCheckbox2">PLC</label>
                      </div>
                    </div>
                  </div>
                  @error('price_include')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
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
                      <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Booking Token Amount</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="booking_token_amount" id="booking_token_amount" class="Stylednumber form-control @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
                    @error('booking_token_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charges" class="form-control Stylednumber">
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
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
                      <option value="">-Select Brokerage-</option>
                      <option value="No Brokerage">No Brokerage</option>
                      <option value="0.25 %">0.25 %</option>
                      <option value="0.5 %">0.5 %</option>
                      <option value="0.75 %">0.75 %</option>
                      <option value="1 %">1 %</option>
                      <option value="1.5 %">1.5 %</option>
                      <option value="2 %">2 %</option>
                      <option value="3 %">3 %</option>
                      <option value="4 %">4 %</option>
                      <option value="5 %">5 %</option>
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
                      <a class="nav-item nav-link" id="nav-profile1-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Common Area</a>
                      <a class="nav-item nav-link" id="nav-contact1-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Washroom</a>
                      <a class="nav-item nav-link" id="nav-about1-tab" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Master Plan</a>
                      <a class="nav-item nav-link" id="nav-kitchen1-tab" data-toggle="tab" href="#nav-kitchen1" role="tab" aria-controls="nav-kitchen1" aria-selected="false">Location Map</a>
                      <a class="nav-item nav-link" id="nav-others1-tab" data-toggle="tab" href="#nav-others1" role="tab" aria-controls="nav-others1" aria-selected="false">Others</a>
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
                          <input class="FileUpload1" id="FileInput" name="common_photos[]" type="file"/>
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
                          <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
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
                          <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
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
                          <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                          </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-others1" role="tabpanel" aria-labelledby="nav-others1-tab">
                      <div id="upload_form10">
                          <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="others_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                          </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <button type="button" id="showButton2" class="btn btn-primary">Continue & Next</button>
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
                  <div class="form-row">
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Project Rera ID</label>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="rera_id">
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Ownership Approval</label>
                      <select name="ownership_approval" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Freehold">Freehold</option>
                        <option value="Leasehold">Leasehold</option>
                        <option value="Power of Attorney">Power of Attorney</option>
                        <option value="Co-Operative Society">Co-Operative Society</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Approved By</label>
                      <select name="approved_by" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Metropolitan Region">Metropolitan Region</option>
                        <option value="Development Authority">Development Authority</option>
                        <option value="Developer">Developer</option>
                        <option value="RWA/Co-Operative Housing Society">RWA/Co-Operative Housing Society</option>
                        <option value="City Muncipal Corporation">City Muncipal Corporation</option>
                      </select>
                    </div>
                  </div>  
                  <div class="form-group">
                    <h6>Aminities</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Condition">Air Condition
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria">Cafeteria
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Food Court">Food Court
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinkler">Fire Sprinkler
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Connectivity">Internet Wi-Fi Connectivity
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
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
                            <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Service Goods Lift">Service Goods Lift
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitor Parking">Visitor Parking
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheel Chair Accessibility">Wheel Chair Accessibility
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities" value="Whiteboard">Whiteboard
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
                  <hr>
                  <button type="button" id="submitForm2" class="btn btn-primary">Post Your Add</button>
                </div>  
              </div>
              <!--Commercial office Space for Sale end-->
              <!--form 3 start-->
              <!--Sale Industrial Land / Open Plot for Sale start-->
              <div id="land-form" class="hidden">
                <hr>
                <!--<div class="form-group">-->
                <!--  <h6>Popular Landmark Nearby Area</h6>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--  <nav>-->
                <!--    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">-->
                <!--      <a class="nav-item nav-link active" id="nav-metro3-tab" data-toggle="tab" href="#nav-metro3" role="tab" aria-controls="nav-metro3" aria-selected="true">Metro Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-railway3-tab" data-toggle="tab" href="#nav-railway3" role="tab" aria-controls="nav-railway3" aria-selected="false">Railway Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-bus3-tab" data-toggle="tab" href="#nav-bus3" role="tab" aria-controls="nav-bus3" aria-selected="false">Bus Stand</a>-->
                <!--      <a class="nav-item nav-link" id="nav-airport3-tab" data-toggle="tab" href="#nav-airport3" role="tab" aria-controls="nav-airport3" aria-selected="false">Airport</a>-->
                <!--      <a class="nav-item nav-link" id="nav-shopping3-tab" data-toggle="tab" href="#nav-shopping3" role="tab" aria-controls="nav-shopping3" aria-selected="false">Shopping Mall</a>-->
                <!--      <a class="nav-item nav-link" id="nav-office3-tab" data-toggle="tab" href="#nav-office3" role="tab" aria-controls="nav-office3" aria-selected="false">Office Complex</a>-->
                <!--    </div>-->
                <!--  </nav>-->
                <!--  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">-->
                <!--    <div class="tab-pane fade show active" id="nav-metro3" role="tabpanel" aria-labelledby="nav-metro3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Metro Station</label>-->
                <!--              <input type="text" name="metro_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_metro" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-railway3" role="tabpanel" aria-labelledby="nav-railway3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Railway Station</label>-->
                <!--              <input type="text" name="railway_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_railway" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-bus3" role="tabpanel" aria-labelledby="nav-bus3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Bus Stand</label>-->
                <!--              <input type="text" name="bus_stand" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_bus" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-airport3" role="tabpanel" aria-labelledby="nav-airport3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Airport</label>-->
                <!--              <input type="text" name="airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-shopping3" role="tabpanel" aria-labelledby="nav-shopping3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Shopping Mall</label>-->
                <!--              <input type="text" name="shopping_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-office3" role="tabpanel" aria-labelledby="nav-office3-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Office Complex</label>-->
                <!--              <input type="text" name="office_complex" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_office" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Floors Allowed for construction</label>
                    <select name="floor_constru" id="floor_constru" class="form-control @error('floor_constru') invalid-feedback @enderror">
                      <option value="">-Select floors Allowed for construction-</option>
                      @for($i=1; $i <= 201 ;$i++)
                      <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">No. of Open Side</label>
                    <select name="no_of_open_side" id="no_of_open_side" class="form-control @error('no_of_open_side') invalid-feedback @enderror">
                      <option value="">-Select No. of Open Side-</option>
                      <option value="1" @if(old('no_of_open_side') == "1") Selected @endif>1</option>
                      <option value="2" @if(old('no_of_open_side') == "2") Selected @endif>2</option>
                      <option value="3" @if(old('no_of_open_side') == "3") Selected @endif>3</option>
                      <option value="4" @if(old('no_of_open_side') == "4") Selected @endif>4</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Width of Road facing the Plot</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}" placeholder="Meters">
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
                      <label for="">Bondry wall Made<span class="text-danger">*</span><span class="text-danger" id="wall_err"></span></label>
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
                <div class="form-group">
                  <h6>Area</h6>
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Plot Area<span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="number" id="plot_area" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
                  </div>
                  <div class="form-group col-md-4">
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
                  <div class="col-md-4">
                    <label for="">Plot Length</label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="text" class="Stylednumber form-control @error('plot_length') invalid-feedback @enderror" name="plot_length" value="{{ old('plot_length') }}" placeholder="yrd">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <label for="">Plot Width</label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="text" class="Stylednumber form-control @error('plot_width') invalid-feedback @enderror" name="plot_width" value="{{ old('plot_width') }}" placeholder="yrd">
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
                  <h6>Transaction Type/ Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Transaction Type <span class="text-danger">*</span><span class="text-danger" id="trans_err"></span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Price Detail</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Expected price<span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                        <input type="text" id="total_price" name="total_price" class="form-control Stylednumber" onkeyup="convertNumberToWords(this.value)">
                        <span id="show_price" class="text-muted"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Price per Sq.Ft.</label>
                        <input type="text" name="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div id="show_rent" class="hidden">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="">Show Price as</label>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent1" name="show_price_as" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent2" name="show_price_as" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
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
                      <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Booking Token Amount</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="booking_token_amount" id="booking_token_amount" class="Stylednumber form-control @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
                    @error('booking_token_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
                      <option value="">-Select Brokerage-</option>
                      <option value="No Brokerage">No Brokerage</option>
                      <option value="0.25 %">0.25 %</option>
                      <option value="0.5 %">0.5 %</option>
                      <option value="0.75 %">0.75 %</option>
                      <option value="1 %">1 %</option>
                      <option value="1.5 %">1.5 %</option>
                      <option value="2 %">2 %</option>
                      <option value="3 %">3 %</option>
                      <option value="4 %">4 %</option>
                      <option value="5 %">5 %</option>
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
                          <div id="upload_form11">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">
                                Add File
                              </span>
                              <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                              <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile5" role="tabpanel" aria-labelledby="nav-profile5-tab">
                          <div id="upload_form12">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
                              <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>      
                        </div>
                        <div class="tab-pane fade" id="nav-contact5" role="tabpanel" aria-labelledby="nav-contact5-tab">
                          <div id="upload_form13">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
                              <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-others5" role="tabpanel" aria-labelledby="nav-others5-tab">
                          <div id="upload_form14">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
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
                <button type="button" id="showButton3" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv3">
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
                  <div class="form-group">
                    <h6>Ownership & Approvals</h6>
                  </div>
                  <div class="form-row">
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
                  <button type="button" id="submitForm3" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <!--Sale Industrial Land / Open Plot for Sale end-->
              <!--form 4-->
              <!--Commercial Shop / Showroom start -->
              <div id="com-shop-form" class="hidden">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Name of Project/ Market <span class="text-danger">*</span><span class="text-danger" id="project_err"></span></label>
                    <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name"  name="project_name">
                    @error('project_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Land Zone</label>
                    <select name="land_zone" id="land_zone" class="form-control @error('land_zone') invalid-feedback @enderror">
                      <option value="">-Select Land Zone-</option>
                      <option value="Industrial" @if(old('land_zone') == "Industrial") Selected @endif>Industrial</option>
                      <option value="Commercial" @if(old('land_zone') == "Commercial") Selected @endif>Commercial</option>
                      <option value="Residential" @if(old('land_zone') == " Residential") Selected @endif>Residential</option>
                      <option value="Transport & Communication" @if(old('land_zone') == "Transport & Communication") Selected @endif>Transport & Communication</option>
                      <option value="Public Utilities" @if(old('land_zone ') == "Public Utilities") Selected @endif>Public Utilities</option>
                      <option value="Public & Semi Public Use" @if(old('land_zone') == " Public & Semi Public Use") Selected @endif>Public & Semi Public Use</option>
                      <option value="Open Spaces" @if(old('land_zone') == "Open Spaces") Selected @endif>Open Spaces</option>
                      <option value="Agricultural Zone" @if(old('land_zone') == "Agricultural Zone") Selected @endif>Agricultural Zone</option>
                      <option value="Special Economic Zone" @if(old('land_zone') == "Special Economic Zone") Selected @endif>Special Economic Zone</option>
                      <option value="Natural Conservation Zone" @if(old('land_zone') == "Natural Conservation Zone") Selected @endif>Natural Conservation Zone</option>
                      <option value="Government Zone" @if(old('land_zone') == "Government Zone") Selected @endif>Government Zone</option>
                    </select>
                    @error('land_zone')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <!--<div class="form-group">-->
                <!--  <h6>Popular Landmark Nearby Area</h6>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--  <nav>-->
                <!--    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">-->
                <!--      <a class="nav-item nav-link active" id="nav-metro2-tab" data-toggle="tab" href="#nav-metro2" role="tab" aria-controls="nav-metro2" aria-selected="true">Metro Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-railway2-tab" data-toggle="tab" href="#nav-railway2" role="tab" aria-controls="nav-railway2" aria-selected="false">Railway Station</a>-->
                <!--      <a class="nav-item nav-link" id="nav-bus2-tab" data-toggle="tab" href="#nav-bus2" role="tab" aria-controls="nav-bus2" aria-selected="false">Bus Stand</a>-->
                <!--      <a class="nav-item nav-link" id="nav-airport2-tab" data-toggle="tab" href="#nav-airport2" role="tab" aria-controls="nav-airport2" aria-selected="false">Airport</a>-->
                <!--      <a class="nav-item nav-link" id="nav-shopping2-tab" data-toggle="tab" href="#nav-shopping2" role="tab" aria-controls="nav-shopping2" aria-selected="false">Shopping Mall</a>-->
                <!--      <a class="nav-item nav-link" id="nav-office2-tab" data-toggle="tab" href="#nav-office2" role="tab" aria-controls="nav-office2" aria-selected="false">Office Complex</a>-->
                <!--    </div>-->
                <!--  </nav>-->
                <!--  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">-->
                <!--    <div class="tab-pane fade show active" id="nav-metro2" role="tabpanel" aria-labelledby="nav-metro2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Metro Station</label>-->
                <!--              <input type="text" name="metro_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_metro" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-railway2" role="tabpanel" aria-labelledby="nav-railway2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Railway Station</label>-->
                <!--              <input type="text" name="railway_station" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_railway" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-bus2" role="tabpanel" aria-labelledby="nav-bus2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Bus Stand</label>-->
                <!--              <input type="text" name="bus_stand" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_bus" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-airport2" role="tabpanel" aria-labelledby="nav-airport2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Airport</label>-->
                <!--              <input type="text" name="airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_airport" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-shopping2" role="tabpanel" aria-labelledby="nav-shopping2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Shopping Mall</label>-->
                <!--              <input type="text" name="shopping_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_mall" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--    <div class="tab-pane fade" id="nav-office2" role="tabpanel" aria-labelledby="nav-office2-tab">-->
                <!--      <div class="container-fluid">-->
                <!--        <div class="row">-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Office Complex</label>-->
                <!--              <input type="text" name="office_complex" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--          <div class="col-md-6">-->
                <!--            <div class="form-group">-->
                <!--              <label for="">Distance from Property</label>-->
                <!--              <input type="text" name="distance_office" class="form-control">-->
                <!--            </div>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Floor No. <span class="text-danger">*</span><span class="text-danger" id="floor_err"></span></label>
                        <select name="floor_no" id="floor_no" class="form-control @error('floor_no') is-invalid @enderror" value="{{ old('floor_no') }}">
                          <option value="">Choose..</option>
                          <option value="Lower Basement">Lower Basement</option>
                          <option value="Upper Basement">Upper Basement</option>
                          <option value="Ground">Ground</option>
                          @for($i=1; $i < 201; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Total Floors <span class="text-danger">*</span><span class="text-danger" id="total_floor_err"></span></label>
                        <select name="total_floor" id="total_floor" class="form-control @error('total_floor') is-invalid @enderror">
                          <option value="">Choose..</option>
                          @for($i=1; $i < 201; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Furnished Status<span class="text-danger">*</span><span class="text-danger" id="furnished_err"></span></label>
                    </div>
                    <div class="col-md-8">
                      <div class="switch-field">
                        <input type="radio"  name="furnishing" id="Furnished1" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif>
                        <label for="Furnished1">Furnished</label>
                        <input type="radio" type="radio" name="furnishing" id="Semi-Furnished1" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif>
                        <label for="Semi-Furnished1">Semi-Furnished</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Washroom<span class="text-danger">*</span><span class="text-danger" id="bathroom_err"></span>
                      </label>
                    </div>
                    <div class="col-md-6">
                      <div class="switch-field">
                        <input type="radio"  name="bathroom" id="bath15" value="1" @if(old('bathroom') == "1") checked @endif>
                        <label for="bath15">1</label>
                        <input type="radio"  name="bathroom" id="bath16" value="2" @if(old('bathroom') == "2") checked @endif>
                        <label for="bath16">2</label>
                        <input type="radio" type="radio" name="bathroom" id="bath17" value="3" @if(old('bathroom') == "3") checked @endif>
                        <label for="bath17">3</label>
                        <input type="radio" type="radio" name="bathroom" id="bath18" value="4" @if(old('bathroom') == "4") checked @endif>
                        <label for="bath18">4</label>
                        <input type="radio" type="radio" name="bathroom" id="bath19" value="4+" @if(old('bathroom') == "4+") checked @endif>
                        <label for="bath19">4+</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Personal Washroom<span class="text-danger">*</span><span class="text-danger" id="p_washroom_err"></span></label>
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
                    <label for="">Pantry/Cafeteria<span class="text-danger">*</span><span class="text-danger" id="pantry_err"></span></label>
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
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Corner Shop/Showroom <span class="text-danger">*</span><span class="text-danger" id="c_shop_err"></span></label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="corner_shop" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="corner_shop" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Is Main Road Facing<span class="text-danger">*</span><span class="text-danger" id="main_road_err"></span></label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="main_road" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="main_road" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Area</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="">Covered Area</label>
                    @error('covered_area')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="Stylednumber form-control @error('covered_area') invalid-feedback @enderror" id="covered_area" name="covered_area" value="{{ old('covered_area') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="covered_unit" id="covered_unit" class="form-control">
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
                    <label for="">Carpet Area </label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="carpet_area" class="Stylednumber form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
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
                  <div class="col-md-5 form-group">
                    <label for="">Plot Area <span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="plot_area" class="Stylednumber form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
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
                  <div class="col-md-5 form-group">
                    <label for="">Width of Entrance</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="entrance_width" class="Stylednumber form-control @error('entrance_width') invalid-feedback @enderror" name="entrance_width" value="{{ old('entrance_width') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="entrance_unit" id="entrance_unit" class="form-control">
                      <option value="meters">meters</option>
                      <option value="ft">ft</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <h6>Transaction Type/ Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Transaction Type<span class="text-danger">*</span><span class="text-danger" id="trans_type_err"></span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Possession Status</label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Under Construction">Under Construction
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="posses_status" value="Ready to Move">Ready to Move
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6" id="possesDiv1">
                    <label>Available From</label>
                    <input  type="text" id="available_from" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Month-Year" onfocus="(this.type='month')">
                    @error('available_from')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6 hidden" id="possesDiv2">
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
                <hr>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Current Lease Out</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Assured Return</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="assure_return" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="assure_return" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Price Detail</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Expected price<span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                        <input type="text" name="total_price" class="form-control Stylednumber @error('expected_price') is-invalid @enderror" id="total_price" value="{{ old('expected_price') }}" onkeyup="convertNumberToWords(this.value)">
                        <span id="show_price" class="text-muted"></span>
                        @error('total_price')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Price per sq.ft.</label>
                        <input type="text" name="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
                        @error('price_per_sq')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div id="show_rent" class="hidden">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="">Show Price as</label>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent1" name="show_price_as" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent2" name="show_price_as" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Price Include</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="price_include[]" value="Car Parking">
                        <label class="form-check-label" for="inlineCheckbox1">Car Parking</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="price_include[]" value="PLC">
                        <label class="form-check-label" for="inlineCheckbox2">PLC</label>
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
                      <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Booking Token Amount</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="booking_token_amount" id="booking_token_amount" class="Stylednumber form-control @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
                    @error('booking_token_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Maintenance Charges</label>
                    <input type="text" name="maintenance_charges" class="form-control Stylednumber">
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
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
                      <option value="">-Select Brokerage-</option>
                      <option value="No Brokerage">No Brokerage</option>
                      <option value="0.25 %">0.25 %</option>
                      <option value="0.5 %">0.5 %</option>
                      <option value="0.75 %">0.75 %</option>
                      <option value="1 %">1 %</option>
                      <option value="1.5 %">1.5 %</option>
                      <option value="2 %">2 %</option>
                      <option value="3 %">3 %</option>
                      <option value="4 %">4 %</option>
                      <option value="5 %">5 %</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label>Photos </label>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home2-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home2" aria-selected="true">Exterior View</a>
                          <a class="nav-item nav-link" id="nav-profile2-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">Common Area</a>
                          <a class="nav-item nav-link" id="nav-contact2-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact2" aria-selected="false">Washroom</a>
                          <a class="nav-item nav-link" id="nav-master1-tab" data-toggle="tab" href="#nav-master1" role="tab" aria-controls="nav-master1" aria-selected="false">Master Plan</a>
                          <a class="nav-item nav-link" id="nav-location1-tab" data-toggle="tab" href="#nav-location1" role="tab" aria-controls="nav-location1" aria-selected="false">Location Map</a>
                          <a class="nav-item nav-link" id="nav-others2-tab" data-toggle="tab" href="#nav-others2" role="tab" aria-controls="nav-others2" aria-selected="false">Others </a>
                        </div>
                      </nav>
                      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home2-tab">
                          <div id="upload_form15">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">
                                Add File
                              </span>
                              <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                              <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile2-tab">
                          <div id="upload_form16">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">
                                Add File
                              </span>
                              <input class="FileUpload1" id="FileInput" name="common_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">
                          <div id="upload_form17">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1"> Add File</span>
                              <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-master1" role="tabpanel" aria-labelledby="nav-master1-tab">
                          <div id="upload_form18">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1"> Add File</span>
                              <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-location1" role="tabpanel" aria-labelledby="nav-location1-tab">
                          <div id="upload_form19">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1"> Add File</span>
                              <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-others2" role="tabpanel" aria-labelledby="nav-others2-tab">
                          <div id="upload_form20">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
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
                  <div class="form-row">
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Project Rera ID</label>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="rera_id">
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
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Ownership Approval</label>
                      <select name="ownership_approval" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Freehold">Freehold</option>
                        <option value="Leasehold">Leasehold</option>
                        <option value="Power of Attorney">Power of Attorney</option>
                        <option value="Co-Operative Society">Co-Operative Society</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Approved By</label>
                      <select name="approved_by" class="form-control" id="">
                        <option value="">-Select-</option>
                        <option value="Metropolitan Region">Metropolitan Region</option>
                        <option value="Development Authority">Development Authority</option>
                        <option value="Developer">Developer</option>
                        <option value="RWA/Co-Operative Housing Society">RWA/Co-Operative Housing Society</option>
                        <option value="City Muncipal Corporation">City Muncipal Corporation</option>
                      </select>
                    </div>
                  </div>  
                  <div class="form-group">
                    <h6>Aminities</h6>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Condition">Air Condition
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria">Cafeteria
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Food Court">Food Court
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinkler">Fire Sprinkler
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Connectivity">Internet Wi-Fi Connectivity
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
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
                            <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Service Goods Lift">Service Goods Lift
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
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitor Parking">Visitor Parking
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheel Chair Accessibility">Wheel Chair Accessibility
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
                  </div>
                  <hr>
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
                    <label>Land Mark  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('land_mark') is-invalid @enderror" id="land_mark"  name="land_mark" value="{{ old('land_mark') }}">
                    @error('land_mark')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <hr>
                  <button type="button" id="submitForm4" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>
              <!--Commercial Shop / Showroom end-->
              <!-- Fifth Form -->
              <div class="hidden" id="agri-form">
                <div class="form-group">
                  <h6>Property Feature</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">No. of Open Side</label>
                    <select name="no_of_open_side" id="no_of_open_side" class="form-control @error('no_of_open_side') invalid-feedback @enderror">
                      <option value="">-Select No. of Open Side-</option>
                      <option value="1" @if(old('no_of_open_side') == "1") Selected @endif>1</option>
                      <option value="2" @if(old('no_of_open_side') == "2") Selected @endif>2</option>
                      <option value="3" @if(old('no_of_open_side') == "3") Selected @endif>3</option>
                      <option value="4" @if(old('no_of_open_side') == "4") Selected @endif>4</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Width of Road Facing the Plot</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}" placeholder="Meters">
                  </div>
                </div>  
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Bondry wall Made<span class="text-danger">*</span><span class="text-danger" id="wall_err"></span></label>
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
                <div class="form-group">
                  <h6>Area</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="">Land Length<span class="text-danger">*</span><span class="text-danger" id="length_err"></span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control Stylednumber @error('land_length') invalid-feedback @enderror" id="land_length" name="land_length" value="{{ old('land_length') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="land_length_unit" id="land_length_unit" class="form-control">
                      <option value="Acre">Acre</option>
                      <option value="Bigha">Bigha</option>
                      <option value="Guntha">Guntha</option>
                    </select>
                  </div>
                  <div class="col-md-5 form-group">
                    <label for="">Land Breadth <span class="text-danger">*</span><span class="text-danger" id="breadth_err"></span></label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="land_breadth" class="form-control Stylednumber @error('land_breadth') invalid-feedback @enderror" name="land_breadth" value="{{ old('land_breadth') }}">
                  </div>
                  <div class="form-group col-md-3">
                    <select name="land_breadth_unit" id="land_breadth_unit" class="form-control">
                      <option value="Acre">Acre</option>
                      <option value="Bigha">Bigha</option>
                      <option value="Guntha">Guntha</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Transaction Type/ Property Availability</h6>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Transaction Type <span class="text-danger">*</span><span class="text-danger" id="trans_type_err"></span></label>
                  </div>
                  <div class="form-group col-md-8">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Current Lease Out</label>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="Yes">Yes
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="lease_out" value="No">No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Price Detail</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Expected price <span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                        <input type="text" name="total_price" id="total_price" class="form-control Stylednumber @error('expected_price') is-invalid @enderror" value="{{ old('expected_price') }}" onkeyup="convertNumberToWords(this.value)">
                        <span id="show_price" class="text-muted"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="floor">Price per sq.ft.</label>
                        <input type="text" name="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div id="show_rent" class="hidden">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="">Show Price as</label>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent1" name="show_price_as" value="">
                          <span id="rent_1"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" id="show_rent2" name="show_price_as" value="">
                          <span id="rent_2"></span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
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
                      <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Booking Token Amount</label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="booking_token_amount" id="booking_token_amount" class="Stylednumber form-control @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
                    @error('booking_token_amount')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Brokerage (Brokers Only)</label>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="brokerage" id="brokerage" class="form-control">
                      <option value="">-Select Brokerage-</option>
                      <option value="No Brokerage">No Brokerage</option>
                      <option value="0.25 %">0.25 %</option>
                      <option value="0.5 %">0.5 %</option>
                      <option value="0.75 %">0.75 %</option>
                      <option value="1 %">1 %</option>
                      <option value="1.5 %">1.5 %</option>
                      <option value="2 %">2 %</option>
                      <option value="3 %">3 %</option>
                      <option value="4 %">4 %</option>
                      <option value="5 %">5 %</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <h6>Photos</h6>
                </div>
                <div class="form-group">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home6-tab" data-toggle="tab" href="#nav-home6" role="tab" aria-controls="nav-home6" aria-selected="true">Site View</a>
                      <a class="nav-item nav-link" id="nav-profile6-tab" data-toggle="tab" href="#nav-profile6" role="tab" aria-controls="nav-profile6" aria-selected="false">Location Map</a>
                      <a class="nav-item nav-link" id="nav-contact6-tab" data-toggle="tab" href="#nav-contact6" role="tab" aria-controls="nav-contact6" aria-selected="false">Master Plan</a>
                      <a class="nav-item nav-link" id="nav-about6-tab" data-toggle="tab" href="#nav-about6" role="tab" aria-controls="nav-about6" aria-selected="false">Others</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home6" role="tabpanel" aria-labelledby="nav-home6-tab">
                      <div id="upload_form21">
                          <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                          </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile6" role="tabpanel" aria-labelledby="nav-profile6-tab">
                      <div id="upload_form22">
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
                    <div class="tab-pane fade" id="nav-contact6" role="tabpanel" aria-labelledby="nav-contact6-tab">
                      <div id="upload_form23">
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
                    <div class="tab-pane fade" id="nav-about6" role="tabpanel" aria-labelledby="nav-about6-tab">
                      <div id="upload_form24">
                          <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="others_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                          </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <button type="button" id="showButton5" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv5">
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
                          <input type="radio" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h6>Ownership & Approvals</h6>
                  </div>
                  <div class="form-row">
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
                  <button type="button" id="submitForm5" class="btn btn-primary">Post Your Add</button>
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
<script src="{{ asset('js/image-upload1.js') }}"></script>
<script>
$(function() {
  $(".sel-status").select2();
});

$('body').on('change', '#property_type', function () {
  var query = $(this).val();
  var listed_by = $('input[name="listed_by"]:checked').val();
  var showDiv = $('.pageloader');
  if (showDiv.is(":visible")) { return; }
  showDiv.show();
  setTimeout(function() {
    showDiv.hide();
    if(query == 57)
    {
      $('#container').load('/flat-sale-form');
    }
    if(query == 61)
    {
      $('#container').load('/residential-penthouse-form');
    }
    if(query == 62)
    {
      $('#container').load('/residential-land-form');
    }
    if(query == 64)
    {
      $('#container').load('/builder-apartment-form');
    }
    if(query == 65)
    {
      $('#container').load('/residential-villa-form');
    }
    if(query == 66)
    {
      $('#container').load('/residential-house-sale-form');
    }
    if(query == 541)
    {
      $('#container').load('/studio-apartment-form');
    }
    if(query == 60)
    {
      $('#container').load('/com-office-space-form');
    }
  }, 2500);
    // if((query == 60) || (query == 59) || (query == 541))
    // {
    //   var showDiv = $('.pageloader');
    //   if (showDiv.is(":visible")) { return; }
    //   showDiv.show();
    //   setTimeout(function() {
    //     showDiv.hide();
    //     $('#flat-form').fadeOut();
    //     $('#com-office-form').fadeIn();
    //     $('#land-form').fadeOut();
    //     $('#com-shop-form').fadeOut();
    //     $('#agri-form').fadeOut();
    //   }, 2500);
    // }
    if((query == 70) || (query == 72) || (query == 62) || (query == 68) || (query == 74))
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#flat-form').fadeOut();
        $('#com-office-form').fadeOut();
        $('#land-form').fadeIn();
        $('#com-shop-form').fadeOut();
        $('#agri-form').fadeOut();
      }, 2500);
    }
    if((query == 58) || (query == 67) || (query == 71) || (query == 69))
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#flat-form').fadeOut();
        $('#com-office-form').fadeOut();
        $('#land-form').fadeOut();
        $('#com-shop-form').fadeIn();
        $('#agri-form').fadeOut();
      }, 2500);
    }
    if((query == 73) || (query == 75) || (query == 76))
    {
      var showDiv = $('.pageloader');
      if (showDiv.is(":visible")) { return; }
      showDiv.show();
      setTimeout(function() {
        showDiv.hide();
        $('#flat-form').fadeOut();
        $('#com-office-form').fadeOut();
        $('#land-form').fadeOut();
        $('#com-shop-form').fadeOut();
        $('#agri-form').fadeIn();
      }, 2500);
    }
    if(listed_by == "Owner")
    {
      $("#brokerageDiv").hide(); 
    }
    else{
      $("#brokerageDiv").show();
    }
});

$('body').on('click', '#submitForm', function () {
  var description = $('textarea#description').val();
  if(description == '')
  {
    $("#description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#description_err").fadeOut(); }, 3000);
    $("#description").focus();
    return false;
  }
  $("#com-office-form :input").prop("disabled", true);
  $("#land-form :input").prop("disabled", true);
  $("#com-shop-form :input").prop("disabled", true);
  $("#agri-form :input").prop("disabled", true);
  $("#property-sale").submit();
});

$('body').on('click', '#showButton4', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('#address').val();
  var name_of_society = $('#com-shop-form #project_name').val();
  var bathroom = $("#com-shop-form input[name='bathroom']:checked").val();
  var floor_no = $('#com-shop-form #floor_no').val();
  var no_of_floor = $('#com-shop-form #total_floor').val();
  var furnishing = $("#com-shop-form input[name='furnishing']:checked").val();
  var p_washroom = $("#com-shop-form input[name='personal_washroom']:checked").val();
  var pantry_cafe = $("#com-shop-form input[name='pantry_cafe']:checked").val();
  var corner_shop = $("#com-shop-form input[name='corner_shop']:checked").val();
  var main_road = $("#com-shop-form input[name='main_road']:checked").val();
  var plot_area = $('#com-shop-form #plot_area').val();
  var transaction_type = $("#com-shop-form input[name='transaction_type']:checked").val();
  var total_price = $("#com-shop-form #total_price").val();
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
  if(name_of_society == '')
  {
    $("#com-shop-form #project_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #project_err").fadeOut(); }, 3000);
    $("#com-shop-form #project_name").focus();
    return false;
  }
  if(bathroom == null)
  {
    $("#com-shop-form #bathroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #bathroom_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='bathroom']").focus();
    return false;
  }
  if(floor_no == '')
  {
    $("#com-shop-form #floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #floor_err").fadeOut(); }, 3000);
    $("#com-shop-form #floor_no").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#com-shop-form #total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #total_floor_err").fadeOut(); }, 3000);
    $("#com-shop-form #total_floor").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#com-shop-form #furnished_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #furnished_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='furnishing']").focus();
    return false;
  }
  if(p_washroom == null)
  {
    $("#com-shop-form #p_washroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #p_washroom_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='personal_washroom']").focus();
    return false;
  }
  if(pantry_cafe == null)
  {
    $("#com-shop-form #pantry_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #pantry_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='pantry_cafe']").focus();
    return false;
  }
  if(corner_shop == null)
  {
    $("#com-shop-form #c_shop_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #c_shop_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='corner_shop']").focus();
    return false;
  }
  if(main_road == null)
  {
    $("#com-shop-form #main_road_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #main_road_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='main_road']").focus();
    return false;
  }
  if(plot_area == '')
  {
    $("#com-shop-form #plot_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #plot_err").fadeOut(); }, 3000);
    $("#com-shop-form #plot_area").focus();
    return false;
  }
  if(transaction_type == null)
  {
    $("#com-shop-form #trans_type_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #trans_type_err").fadeOut(); }, 3000);
    $("#com-shop-form input[name='transaction_type']").focus();
    return false;
  }
  if(total_price == '')
  {
    $("#com-shop-form #price_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #price_err").fadeOut(); }, 3000);
    $("#com-shop-form #total_price").focus();
    return false;
  }
  else{
    $("#showDiv4").removeClass("hidden");
    $("#showButton4").addClass("hidden");
  }
})
$('body').on('click', '#submitForm4', function () {
  var description = $('#com-shop-form textarea#description').val();
  if(description == '')
  {
    $("#com-shop-form #description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#com-shop-form #description_err").fadeOut(); }, 3000);
    $("#com-shop-form #description").focus();
    return false;
  }
  else{
  $("#flat-form :input").prop("disabled", true);
  $("#land-form :input").prop("disabled", true);
  $("#com-office-form :input").prop("disabled", true);
  $("#agri-form :input").prop("disabled", true);
  $("#property-sale").submit();
  }
});

$('body').on('click', '#showButton5', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('#address').val();
  var boundry_wall = $("#agri-form input[name='boundry_wall']:checked").val();
  var land_length = $('#agri-form #land_length').val();
  var land_breadth = $('#agri-form #land_breadth').val();
  var transaction_type = $("#agri-form input[name='transaction_type']:checked").val();
  var total_price = $("#agri-form #total_price").val();
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
  if(boundry_wall == null)
  {
    $("#agri-form #wall_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #wall_err").fadeOut(); }, 3000);
    $("#agri-form input[name='boundry_wall']").focus();
    return false;
  }
  if(land_length == '')
  {
    $("#agri-form #length_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #length_err").fadeOut(); }, 3000);
    $("#agri-form #land_length").focus();
    return false;
  }
  if(land_breadth == '')
  {
    $("#agri-form #breadth_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #breadth_err").fadeOut(); }, 3000);
    $("#agri-form #land_breadth").focus();
    return false;
  }
  if(transaction_type == null)
  {
    $("#agri-form #trans_type_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #trans_type_err").fadeOut(); }, 3000);
    $("#agri-form input[name='transaction_type']").focus();
    return false;
  }
  if(total_price == '')
  {
    $("#agri-form #price_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #price_err").fadeOut(); }, 3000);
    $("#agri-form #total_price").focus();
    return false;
  }
  else{
    $("#showDiv5").removeClass("hidden");
    $("#showButton5").addClass("hidden");
  }
})
$('body').on('click', '#submitForm5', function () {
  var description = $('#agri-form textarea#description').val();
  if(description == '')
  {
    $("#agri-form #description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#agri-form #description_err").fadeOut(); }, 3000);
    $("#agri-form #description").focus();
    return false;
  }
  else{
  $("#flat-form :input").prop("disabled", true);
  $("#land-form :input").prop("disabled", true);
  $("#com-office-form :input").prop("disabled", true);
  $("#com-shop-form :input").prop("disabled", true);
  $("#property-sale").submit();
  }
});



</script>
@endsection
