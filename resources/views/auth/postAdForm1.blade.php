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
                <p>Properties/For Sale: Houses & Apartments</p>
                </div>
                <div class="card-body p-5"><b>FILL DETAILS</b>
                <form>
                    <div class="form-group mt-4">
                        <label>Type <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="appartment" id="appartment" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Appartment</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="builder_floors" id="builder_floors" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Builder Floors</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="farm_house" id="farm_house" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Farm House</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="house_villa" id="house_villa" value="option3">
                            <label class="form-check-label" for="inlineRadio3">House & villas</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Bedrooms<span class="text-danger">*</span></label><br>
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
                        <label>Furnishing<span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="furnished" id="furnished" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Furnished</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="semi_furnished" id="semi_furnished" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Semi-Furnished</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="unfurnished" id="unfurnished" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Unfurnished</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Construction Status <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="new_launch" id="new_launch" value="option1">
                            <label class="form-check-label" for="inlineRadio1">New Launch</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ready_to_move" id="ready_to_move" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Ready To Move</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="under_construction" id="under_construction" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Under Construction</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Listed by <span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="builder" id="builder" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Builder</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dealer" id="dealer" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Dealer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="owner" id="owner" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Owner</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Super Builtup area (ft²)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="super_builtup_area"  name="super_builtup_area">
                    </div>
                    <div class="form-group mt-4">
                        <label>Carpet Area (ft²)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="carpet_area"  name="carpet_area">
                    </div>
                    <div class="form-group mt-4">
                        <label>Maintenance (Monthly)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="maintenance"  name="maintenance">
                    </div>
                    <div class="form-group mt-4">
                        <label>Total Floors<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="total_floors"  name="total_floors">
                    </div>
                    <div class="form-group mt-4">
                        <label>Floor No<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="floor_no"  name="floor_no">
                    </div>
                    <div class="form-group mt-4">
                        <label>Car Parking<span class="text-danger">*</span></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options1" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options2" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options3" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options4" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">3+</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Options5" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">4+</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Facing <span class="text-danger">*</span></label>
                        <select class="form-control" id="facing" name="facing">
                            <option>Select Facing</option>
                            <option>East</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label>Project Name<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="project_name" name="project_name">
                    </div>
                    <div class="form-group mt-4">
                        <label>Ad title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ad_title" placeholder="(e.g. brand, model, age, type)" name="ad_title">
                    </div>
                    <div class="form-group mt-4">
                        <label>Description <span class="text-danger">*</span></label>
                        <input type="textarea" class="form-control" id="description"  name="description">
                    </div>
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

@endsection
