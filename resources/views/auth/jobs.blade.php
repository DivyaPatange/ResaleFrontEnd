@extends('auth.auth_layout.main')
@section('title', 'Jobs')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"> 
  
<!-- <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>  -->
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
            <form method="POST" action="{{ url('save-jobs-post') }}"  enctype="multipart/form-data" class="p-5 mb-3" style="border:2px solid #114a88;">
            @csrf 
              <input type="hidden" name="category_id" value="{{ $category->id }}">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="job_title">Job Title <span class="text-danger">*</span></label>
                  <input type="text" name="job_title" class="form-control @error('job_title') invalid-feedback @enderror" value="{{ old('job_title') }}">
                  @error('job_title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group col-md-12">
                    <label>Job Type</label>
                    @error('job_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <?php 
                    $subCategories = DB::table('sub_categories')->where('category_id', $category->id)->get();                    
                ?>
                <div class="form-group col-md-12">
                    @foreach($subCategories as $s)
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" name="job_type" class="form-check-input" value="{{ $s->id }}" @if($s->id == $subCategory->id) Checked @endif onclick="selectOnlyThis(this)">{{ $s->sub_category }}
                      </label>
                    </div>
                    @endforeach
                </div>
                <?php 
                    $roles = DB::table('roles')->where('status', 1)->get();                    
                ?>
                <div class="form-group col-md-6">
                  <label>Role</label>
                  <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                    <option value="">-Select Role-</option>
                    @foreach($roles as $r)
                    <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                    @endforeach
                  </select>
                  @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>Sub Role</label>
                  <select name="sub_role[]" id="sub_role" class="form-control mul-select @error('sub_role') is-invalid @enderror" multiple="true">
                    
                  </select>
                  @error('sub_role')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Salary Period<span class="text-danger">*<span></label>
                    <select id="salary_period" class="form-control @error('salary_period') is-invalid @enderror" name="salary_period">
                        <option value="">-Select Salary Period-</option>
                        <option value="Hourly" @if(old('salary_period') == "Hourly") Selected @endif>Hourly</option>
                        <option value="Monthly" @if(old('salary_period') == "Monthly") Selected @endif>Monthly</option>
                        <option value="Weekly" @if(old('salary_period') == "Weekly") Selected @endif>Weekly</option>
                        <option value="Yearly" @if(old('salary_period') == "Yearly") Selected @endif>Yearly</option>
                    </select>
                    @error('salary_period')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Monthly Salary</label>                                                                                                                                                                                                                                                                       
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><small>Min</small></div>
                        </div>
                        <input type="number" class="form-control @error('min_monthly_salary') is-invalid @enderror"  name="min_monthly_salary" value="{{ old('min_monthly_salary') }}" min="1000">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><small>Max</small></div>
                            </div>
                            <input type="number" class="form-control @error('max_monthly_salary') is-invalid @enderror"  name="max_monthly_salary" value="{{ old('max_monthly_salary') }}" max="100000">
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Experience</label>                                                                                                                                                                                                                                                                       
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><small>Min</small></div>
                            </div>
                            <select class="form-control @error('min_experience') is-invalid @enderror"  name="min_experience">
                                <option value="">-Select Experience-</option>
                                @for($i=0; $i < 20; $i++)
                                <option value="{{ $i }}" @if(old('min_experience') == $i) selected @endif>{{ $i }}</option>                                                                              
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><small>Max</small></div>
                            </div>
                            <select class="form-control @error('max_experience') is-invalid @enderror"  name="max_experience">
                                <option value="">-Select Experience-</option>
                                @for($i=2; $i < 22; $i++)
                                <option value="{{ $i }}" @if(old('max_experience') == $i) selected @endif>{{ $i }}</option>                                                                              
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Company Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
                @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Job Description <span class="text-danger">*</span></label>
                <textarea class="form-control ckeditor @error('job_description') is-invalid @enderror" id="job_description"  name="job_description">{{ old('job_description') }}</textarea>
                @error('job_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-froup">
                <label>Photos <span class="text-danger">*</span></label>
              </div>
              <div id="upload_form">
                  @for($i=1; $i < 13; $i++)
                <label class="filelabel p_file" id="label{{ $i }}">
                  <div class="icon">X</div>
                  <i class="fa fa-paperclip" id="icon{{ $i }}">
                  </i>
                  
                  <span class="title{{ $i }}">
                      Add File
                  </span>
                  <input class="FileUpload{{ $i }}" id="FileInput" name="photos[]" type="file"/>
                  <img  id="frame{{ $i }}" class="hidden" style="max-width: 90px; max-height: 70px;">
                </label>
                @endfor
              </div>
              @error('photos')
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
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

<script src= "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"> </script> 
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


  $('#role').change(function(){
  var roleID = $(this).val();  
//   alert(brandID);
  if(roleID){
    $.ajax({
      type:"GET",
      url:"{{url('/get-subrole-list')}}?role_id="+roleID,
      success:function(res){        
      if(res){
        $("#sub_role").empty();
        $("#sub_role").append('<option>Select Sub Role</option>');
        $.each(res,function(key,value){
          $("#sub_role").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#sub_role").empty();
      }
      }
    });
  }else{
    $("#sub_role").empty();
  }   
  });

  $(document).ready(function() { 
            $(".mul-select").select2({ 
                placeholder: "Select Sub Role", 
                tags: true, 
            }); 
        }) 
  function selectOnlyThis(id){
  var myCheckbox = document.getElementsByName("job_type");
  Array.prototype.forEach.call(myCheckbox,function(el){
  	el.checked = false;
  });
  id.checked = true;
} 
</script>
@endsection
