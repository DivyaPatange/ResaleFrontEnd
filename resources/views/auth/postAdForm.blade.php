@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.form-group label{
    font-size: 13px;
}
.form-group input{
    font-size: 13px;
}
h4{
    font-family: 'IcoFont';
    color: #094296;
} 
body{
    background-color:#0d569f26;
}
.form-row{
    font-size:13px;
}
.form-check-label{
    font-size:13px;
}
.form-control{
    font-size:13px;
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

<div class="container-fluid pl-0">
    <div class="row">
        <div class="col-md-7">
        <div class="card m-md-5">
            <div class="card-body">
                <h4 class="card-title mb-3">The best way to sell your Car</h4>
                <p class="card-text">List your vehicle for FREE</p>
                <!-- <p>All Categories</p> -->
                <form method="POST" action="{{ route('cars.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Your Brand <span class="text-danger">*<span></label>
                    <select id="car" class="form-control" name="car">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label>Your Model <span class="text-danger">*<span></label>
                    <input type="text" class="form-control" id="your_model" name="your_model">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Year <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="year" placeholder="Year" name="year">
                    </div>
                    <div class="form-group col-md-6">
                        <label>KMS Driven</label>
                        <input type="text" class="form-control" id="driven" name="driven">
                    </div>
                </div>
                
                <div class="form-group">
                        <label>Fuel Type<span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="petrol" id="petrol" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Petrol</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cng" id="cng" value="option2">
                            <label class="form-check-label" for="inlineRadio2">CNG</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="diesel" id="diesel" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Diesel</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electric" id="electric" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Electric</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Transmission <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Automatic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Manual</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No. of Owners <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options1" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">1st</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options2" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2nd</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options3" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">3rd</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options4" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">4th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options5" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">4+</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ad title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ad_title" placeholder="(e.g. brand, model, age, type)" name="ad_title">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <input type="textarea" class="form-control" id="description"  name="description">
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

                    <!-- <div class="p_file">
        <div class="icon">X</div>
        <input type="file" name="userfile1" size="3"  class="required"  />
    </div> -->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="form-group col-md-4">
                        <label>State</label>
                        <select id="state" class="form-control" name="state">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h6>Expected Selling</h6>
                        <p>Price</p>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-rupee"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Price">
                    </div>
                    </div>
                     
                <button type="submit" class="btn btn-primary">Post Your Add</button>
            </form>
            </div>
            </div>
        </div>
        <div class="col-md-5"></div>
    </div>
</div>
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

// $(".FileUpload1").closest("label").on('change',function (e) {
//     var labelVal = $(".title").text();
//     var oldfileName = $(this).val();
    
//     fileName = e.target.value.split( '\\' ).pop();
//     if (oldfileName == fileName) {return false;}
//     var extension = fileName.split('.').pop();
//     console.log(extension);

//             if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
//                 $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
//                 $(".filelabel i, .filelabel .title").css({'color':'#208440'});
//                 $(".filelabel").css({'border':' 2px solid #208440'});
//             }
//             else if(extension == 'pdf'){
//                 $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
//                 $(".filelabel i, .filelabel .title").css({'color':'red'});
//                 $(".filelabel").css({'border':' 2px solid red'});

//             }
//   else if(extension == 'doc' || extension == 'docx'){
//             $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
//             $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
//             $(".filelabel").css({'border':' 2px solid #2388df'});
//         }
//             else{
//                 $(".filelabel i").removeClass().addClass('fa fa-file-o');
//                 $(".filelabel i, .filelabel .title").css({'color':'black'});
//                 $(".filelabel").css({'border':' 2px solid black'});
//             }

//             if(fileName ){
//                 if (fileName.length > 10){
//                     $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
//                 }
//                 else{
//                     $(".filelabel .title").text(fileName);
//                 }
//             }
//             else{
//                 $(".filelabel .title").text(labelVal);
//             }
//         });
    </script>
@endsection
