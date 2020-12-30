@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
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
}
i.fa-camera {
  margin: 10px;
  cursor: pointer;
  font-size: 30px;
}
i:hover {
  opacity: 0.6;
}
input[type=file]{
  display: none;
}
</style>
@endsection
@section('content')

<div class="container-fluid pl-0">
    <div class="row">
        <div class="col-md-7">
        <div class="card m-5">
            <div class="card-body">
                <h4 class="card-title mb-3">The best way to sell your Car</h4>
                <p class="card-text">List your vehicle for FREE</p>
                <!-- <p>All Categories</p> -->
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
                <div class="form-group mt-4">
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
                        <label>KMS Driven</label>
                        <input type="text" class="form-control" id="driven" name="driven">
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
                     <div class="element">
                    <i class="fa fa-camera"></i><span class="name">No file selected</span>
                    <input type="file" name="" id="">
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
    $("i").click(function () {
  $("input[type='file']").trigger('click');
});

$('input[type="file"]').on('change', function() {
  var val = $(this).val();
  $(this).siblings('span').text(val);
})
    </script>
@endsection
