@extends('auth.auth_layout.main')
@section('title', 'Post Ad')
@section('customcss')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.img-delete {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.img-delete:hover {
  background: white;
  color: black;
}
</style>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4 class="text-center mt-3  mb-3">POST YOUR ADD</h4>
            <div class="card pb-4">
                <div class="card-header"><b>SELECTED CATEGORY</b>
                <p>ResaleAutos (Cars)/Cars</p>
                </div>
                <div class="card-body"><b>FILL DETAILS</b>
                <form>
                    <div class="form-group mt-4">
                        <label>Brand <span class="text-danger">*</span></label>
                        <select class="form-control" id="brand" name="brand">
                            <option>Select Brand</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="year" placeholder="Year" name="year">
                    </div>
                    <div class="form-group">
                        <label>Fule <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">CNG & Hybrids</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Diesel</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Electric</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">LPG</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Petrol</label>
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
                        <label>KM/driven <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="km_driven" name="km_driven">
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
                    <div class="form-group">
                        <label>Photos <span class="text-danger">*</span></label>
                        <input type="file" id="multiple_files" name="files[]" multiple />
                    </span>
                    </div>
                    <div class=></div>
                    <div class="form-group">
                        <label>Price <span class="text-danger">*</span></label>
                        <input type="textarea" class="form-control" id="price"  name="price">
                    </div>
                    <div class="form-group">
                        <label>State<span class="text-danger">*</span></label>
                        <select class="form-control" id="state" name="state">
                            <option>Select State</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>City <span class="text-danger">*</span></label>
                        <select class="form-control" id="city" name="city">
                            <option>Select City</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">POST NOW</button>
                </form>
                </div> 
                <!-- <div class="card-footer">Footer</div> -->
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#multiple_files").on("change", function(e) {
        
      var multiple_files = e.target.files,
        filesLength = multiple_files.length;
      for (var i = 0; i < filesLength; i++) {
        var val = $(this).val();
        var f = multiple_files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"img-delete\">Remove</span>" +
            "<br/><span class=\"text-dark\">"+val+"</span>" +
            "</span>").insertAfter("#multiple_files");
          $(".img-delete").click(function(){
            $(this).parent(".pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("|Sorry, | Your browser doesn't support to File API")
  }
});
</script>
@endsection
