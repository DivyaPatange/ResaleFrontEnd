@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mb-5">
            <h4 class="text-center mt-3  mb-3">POST YOUR ADD</h4>
            <div class="card pb-4">
                <div class="card-header"><b>SELECTED CATEGORY</b>
                <p>ResaleAutos (Cars)/Cars</p>
                </div>
                <div class="card-body p-4"><b>FILL DETAILS</b>
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
                    <div class="form-group mt-4">
                        <label>Year <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="year" placeholder="Year" name="year">
                    </div>
                    <div class="form-group mt-4">
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
                    <div class="form-group mt-4">
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
                    <div class="form-group mt-4">
                        <label>KM/driven <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="km_driven" name="km_driven">
                    </div>
                    <div class="form-group mt-4">
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
                    <div class="form-group mt-4">
                        <label>Ad title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ad_title" placeholder="(e.g. brand, model, age, type)" name="ad_title">
                    </div>
                    <div class="form-group mt-4">
                        <label>Description <span class="text-danger">*</span></label>
                        <input type="textarea" class="form-control" id="description"  name="description">
                    </div>
                    <div class="form-group mt-4">
                        <label>Price <span class="text-danger">*</span></label>
                        <input type="textarea" class="form-control" id="price"  name="price">
                    </div>
                    <div class="form-group mt-4">
                        <label>State<span class="text-danger">*</span></label>
                        <select class="form-control" id="state" name="state">
                            <option>Select State</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label>City <span class="text-danger">*</span></label>
                        <select class="form-control" id="city" name="city">
                            <option>Select City</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-danger float-right">POST NOW</button>
                   
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

@endsection
