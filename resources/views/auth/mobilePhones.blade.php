@extends('auth.auth_layout.main')
@section('title', 'Mobile Phones')
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
          <span class="color-text-a">Resale99 Makes Selling A Car An Easy,Guaranteed Purchase. Free Paperwork. Free RC Transfer. Free Online Car Valuation. Hassle Free Selling. Free Ownership Transfer. Free Valuation in 10 Sec. Instant Payment. Book An Appointment. Instant Valuation.</span>
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
            <form method="POST" action="{{ url('save-mobilePhone-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
            <input type="hidden" name="sub_category_id"  value="{{ $subCategory->id }}">
              <div class="form-row">
                <div class="form-group col-md-6">
                <label>Brand Name<span class="text-danger">*<span></label>
                <select id="brand_name" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name">
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
                <div class="form-group col-md-6">
                <label>Model Name<span class="text-danger">*<span></label>
                <select id="model_name" class="form-control @error('model_name') is-invalid @enderror" name="model_name">

                </select>
                @error('model_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Year of Purchase<span class="text-danger">*</span></label>
                    <input type="month" class="form-control @error('year_of_purchase') is-invalid @enderror" id="year_of_purchase" placeholder="Year" name="year_of_purchase" value="{{ old('year_of_purchase') }}">
                    @error('year_of_purchase')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Physical Condition</label>
                    <select class="form-control @error('physical_condition') is-invalid @enderror" id="physical_condition" name="physical_condition">
                        <option value="">-Select Condition-</option>
                        <option value="Excellent" @if (old('physical_condition') == "Excellent") selected="selected" @endif>Excellent</option>
                        <option value="Good" @if (old('physical_condition') == "Good") selected="selected" @endif>Good</option>
                        <option value="Fair" @if (old('physical_condition') == "Fair") selected="selected" @endif>Fair</option>
                    </select>
                    @error('physical_condition')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-froup">
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
                <hr>
                <div class="form-group">
                    <h6>Expected Selling</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label>Price</label><span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-rupee"></i></div>
                        </div>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" name="price" value="{{ old('price') }}">
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
                <hr>
                <div class="form-group">
                  <h6>Additional Details</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Are You?</label>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_type" id="Individual" value="Individual" @if(old('user_type') == "Individual") checked @endif>
                        <label class="form-check-label" for="Individual">Individual</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_type" id="Dealer" value="Dealer" @if(old('user_type') == "Dealer") checked @endif>
                        <label class="form-check-label" for="Dealer">Dealer</label>
                      </div>
                    </div>
                  </div>
                  @error('user_type')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Firm Name</label>
                    <input type="text" class="form-control @error('firm_name') invalid-feedback @enderror" name="firm_name" value="{{ old('firm_name') }}">
                    @error('firm_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">GST No.</label>
                    <input type="text" name="gst_no" class="form-control @error('gst_no') invalid-feedback @enderror" value="{{ old('gst_no') }}">
                    @error('gst_no')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Invoice</label>
                    <input type="text" name="invoice" class="form-control @error('invoice') invalid-feedback @enderror" value="{{ old('invoice') }}">
                    @error('invoice')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Additional Accessory</label>
                  <textarea name="additional_accessory" class="form-control @error('additional_accessory') invalid-feedback @enderror">{{ old('additional_accessory') }}</textarea>
                  @error('additional_accessory')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Damages & Functional Issues</label>
                  <textarea name="damages_and_functional_issues" class="form-control @error('damages_and_functional_issues') invalid-feedback @enderror">{{ old('additional_and_functional_issues') }}</textarea>
                  @error('damages_and_functional_issues')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
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
          $("#model_name").append('<option value="'+key+'" >'+value+'</option>');
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
