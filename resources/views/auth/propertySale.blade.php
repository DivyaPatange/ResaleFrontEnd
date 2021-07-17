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
#upload_form, #upload_form1, #upload_form2, #upload_form3, #upload_form4, 
#upload_form5, #upload_form6, #upload_form7, #upload_form8, #upload_form9
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
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLocality">Locality<span class="text-danger">*</span><span  style="color:red" id="locality_err"> </span></label>
                  <input type="text" class="form-control @error('locality') is-invalid @enderror" id="locality" name="locality">
                  <div id="suggesstion-locality"></div>
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
              <!-- Fifth Form -->              
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
    if(query == 59)
    {
      $('#container').load('/it-office-sez-form');
    }
    if(query == 58)
    {
      $('#container').load('/com-shop-sale-form');
    }
    if(query == 67)
    {
      $('#container').load('/com-showroom-sale-form');
    }
    if(query == 68)
    {
      $('#container').load('/com-land-sale-form');
    }
    if(query == 69)
    {
      $('#container').load('/warehouse-godown-sale-form');
    }
    if(query == 70)
    {
      $('#container').load('/industrial-land-sale-form');
    }
    if(query == 71)
    {
      $('#container').load('/industrial-building-sale-form');
    }
    if(query == 72)
    {
      $('#container').load('/industrial-shed-sale-form');
    }
    if(query == 73)
    {
      $('#container').load('/agricultural-land-sale-form');
    }
    if(query == 74)
    {
      $('#container').load('/layout-land-sale-form');
    }
    if(query == 75)
    {
      $('#container').load('/farmHouse-land-sale-form');
    }
    if(query == 76)
    {
      $('#container').load('/farm-house-sale-form');
    } 
    if(listed_by == "Owner")
    {
      $("#brokerageDiv").hide(); 
    }
    else{
      $("#brokerageDiv").show();
    }
  }, 2500);
});


</script>
@endsection
