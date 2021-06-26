@extends('auth.auth_layout.main')
@section('title', 'Spare Parts')
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

</style>
@endsection
@section('content')
<section class="intro-single mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-single-box">
          <h1 class="title-single">The Best Way To Sell Your {{ $subCategory->sub_category }}</h1>
          <!--<span class="color-text-a">Resale99 Makes Selling A Car An Easy,Guaranteed Purchase. Free Paperwork. Free RC Transfer. Free Online Car Valuation. Hassle Free Selling. Free Ownership Transfer. Free Valuation in 10 Sec. Instant Payment. Book An Appointment. Instant Valuation.</span>-->
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
            <form method="POST" action="{{ url('save-spareParts-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
                <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="product_type">Product Type <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="product_type" id="product_type" class="form-control @error('product_type') invalid-feedback @enderror">
                                <option value="">-Select Product Type-</option>
                                @foreach($type as $t)
                                <option value="{{ $t->id }}" @if(old('product_type') == $t->id) selected @endif>{{ $t->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('product_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Ad Title <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('ad_title') is-invalid @enderror" id="ad_title" placeholder="(e.g. brand, model, age, type)" name="ad_title" value="{{ old('ad_title') }}">
                        </div>
                    </div>
                    @error('ad_title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Description <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Photos <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div id="upload_form">
                                @for($i=1;$i < 16; $i++)
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
                        </div>
                    </div>
                    @error('photos')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <h6>Expected Selling</h6>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <label>Price</label><span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8">
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
                    <label>Address</label><span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
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
            console.log(className);
            var lastChar = className.match(/(\d+)/);
            var inc  = 1 + +lastChar;
            console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
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
  // console.log($(this).closest('.p_file').remove());
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
 $('#accessory_type').change(function(){
  var typeID = $(this).val();  
//   alert(brandID);
  if(typeID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-brand-list')}}?type_id="+typeID,
      success:function(res){        
      if(res){
        $("#brand_name").empty();
        $("#brand_name").append('<option value="">Choose Brand...</option>');
        $.each(res,function(key,value){
          $("#brand_name").append('<option value="'+key+'" >'+value+'</option>');
        });
      
      }else{
        $("#brand_name").empty();
      }
      }
    });
  }else{
    $("#brand_name").empty();
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
