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
i.fa-camera {
  margin: 10px;
  cursor: pointer;
  font-size: 30px;
}
i:hover {
  opacity: 0.6;
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
                <form id="upload_form">
    <div class="p_file">
        <div class="icon">X</div>
        <input type="file" name="userfile1" size="40"  class="required"  />
    </div>
</form>
                <form>
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
                    <div class="input-group hdtuto control-group lst increment" >

      <input type="file" name="filenames[]" class="myfrm form-control">

      <div class="input-group-btn"> 

        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>

      </div>

    </div>

    <div class="clone hide">

      <div class="hdtuto control-group lst input-group" style="margin-top:10px">

        <input type="file" name="filenames[]" class="myfrm form-control">

        <div class="input-group-btn"> 

          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

        </div>

      </div>

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
 $('body')
    .delegate('#upload_form input[type="file"]', 'change', inputChanged)
    .delegate('#upload_form .icon', 'click', removeField);

function inputChanged() {

    $current_count = $('#upload_form input[type="file"]').length;
    $next_count = $current_count + 1;
    $(this).closest('.p_file').after(
            '<div class="p_file" ><div class="icon">X</div>' +
            '<input type="file" name="userfile'
            + $next_count + '" size="40" /></div>');
}

function removeField(){
    $(this).closest('.p_file').remove();
    return false;
}
    </script>
@endsection
