<div class="form-row">
    <div class="col-md-6 form-group">
        <label for="">Name of Project Office Complex<span class="text-danger">*</span><span  style="color:red" id="project_name_err"> </span></label>
        <input type="text" name="project_name" class="form-control" id="project_name">
    </div>
    <div class="form-group col-md-6">
        <label for="">Land Zone<span  style="color:red" id="land_zone_err"> </span></label>
        <select name="land_zone" id="land_zone" class="form-control">
            <option value="">-Select Land Zone-</option>
            <option value="Industrial">Industrial</option>
            <option value="Commercial">Commercial</option>
            <option value="Residential">Residential</option>
            <option value="Transport & Communication">Transport & Communication</option>
            <option value="Public Utilities">Public Utilities</option>
            <option value="Public & Semi Public Use">Public & Semi Public Use</option>
            <option value="Open Spaces">Open Spaces</option>
            <option value="Agricultural Zone">Agricultural Zone</option>
            <option value="Special Economic Zone">Special Economic Zone</option>
            <option value="Natural Conservation Zone">Natural Conservation Zone</option>
            <option value="Government Use">Government Use</option>
        </select>
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="">Ideal For Businesses</label>
    </div>
    <div class="form-group col-md-8">
        <select name="ideal_business[]" class="form-control mul-select" multiple="true">
            <option value="">-Select Multiple Option-</option>
            <option value="Call Centre/ BPO">Call Centre/ BPO</option>
            <option value="Coaching Centre">Coaching Centre</option>
            <option value="Private Consultancy">Private Consultancy</option>
            <option value="Doctor Clinic">Doctor Clinic</option>
            <option value="Pathology">Pathology</option>
            <option value="IT / ITES and Related">IT / ITES and Related</option>
            <option value="Studio / Production House">Studio / Production House</option>
            <option value="Private Office">Private Office</option>
            <option value="Individual Business">Individual Business</option>
            <option value="Self Employed Business">Self Employed Business</option>
            <option value="Boutique">Boutique</option>
            <option value="Boutique Hall">Boutique Hall</option>
            <option value="Boutique Office">Boutique Office</option>
            <option value="Mobile Service Centre">Mobile Service Centre</option>
            <option value="Back Office">Back Office</option>
            <option value="Departmental Store">Departmental Store</option>
            <option value="Corporate office Setup">Corporate office Setup</option>
            <option value="Women Sefety">Women Sefety</option>
            <option value="Sales/ Marketing Office">Sales/ Marketing Office</option>
            <option value="High security setup">High security setup</option>
            <option value="Lounge">Lounge</option>
            <option value="Health care">Health care</option>
            <option value="Cake Shop">Cake Shop</option>
            <option value="Research Centre">Research Centre</option>
            <option value="Job Consultancy">Job Consultancy</option>
            <option value="Logistic Back office">Logistic Back office</option>
            <option value="Bank">Bank</option>
            <option value="Financial Institute">Financial Institute</option>
            <option value="Govt. Offices">Govt. Offices</option>
            <option value="Packaging Back office">Packaging Back office</option>
            <option value="Private Company">Private Company</option>
            <option value="Advertising ">Advertising</option>
            <option value="Lawyers office">Lawyers office</option>
            <option value="Law Chamber">Law Chamber</option>
            <option value="Law Company">Law Company</option>
            <option value="Showroom">Showroom</option>
            <option value="Tax Consultants">Tax Consultants</option>
            <option value="Travel Agency">Travel Agency</option>
            <option value="Grocery Shop">Grocery Shop</option>
            <option value="Gold / Jewelers Shop">Gold / Jewelers Shop</option>
            <option value="Cloth / Garment Shop">Cloth / Garment Shop</option>
            <option value="Cafe / Restaurant">Cafe / Restaurant</option>
            <option value="Food Street">Food Street</option>
            <option value="Automobile">Automobile</option>
            <option value="Electronic">Electronic</option>
            <option value="Electrical">Electrical</option>
            <option value="Seeds / Fertilizer">Seeds / Fertilizer</option>
            <option value="Dairy Product">Dairy Product</option>
            <option value="Hardware / Building Material">Hardware / Building Material</option>
            <option value="Transport Hub">Transport Hub</option>
            <option value="Pharmaceutical">Pharmaceutical</option>
            <option value="Medical / Hospital">Medical / Hospital</option>
        </select>
    </div>
</div>
<div class="form-group">
    <h6>Property Feature</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="property_floor_no">Floor No.<span  style="color:red" id="floor_err"> </span></label>
                <select name="property_floor_no" class="form-control" id="property_floor_no" style="width:100%">
                    <option value="">-Choose-</option>
                    <option value="Lower Basement">Lower Basement</option>
                    <option value="Upper Basement">Upper Basement</option>
                    <option value="Ground">Ground</option>
                    @for($i=1; $i <= 20; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="floor">Total Floor<span  style="color:red" id="total_floor_err"> </span></label>
                <select name="total_floor" id="no_of_floor" class="form-control" style="width:100%;">
                    <option value="">Choose..</option>
                    <option value="Lower Basement">Lower Basement</option>
                    <option value="Upper Basement">Upper Basement</option>
                    <option value="Ground">Ground</option>
                    @for($i=1; $i <= 20; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-5 form-group">
        <label>Furnished Status<span class="text-danger">*</span><span  style="color:red" id="furnishing_err"> </span>
        </label>
    </div>
    <div class="col-md-7 form-group">
        <div class="switch-field">
            <input type="radio" id="Furnished" name="furnishing" value="Furnished"/>
            <label for="Furnished">Furnished</label>
            <input type="radio" id="Semi-Furnished" name="furnishing" value="Semi-Furnished"/>
            <label for="Semi-Furnished">Semi-Furnished</label>
            <input type="radio" id="Unfurnished" name="furnishing" value="Unfurnished"/>
            <label for="Unfurnished">Unfurnished</label>
        </div>
    </div>
</div>
<div class="form-row hidden" id="showFurnishedDiv">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Washrooms</label>
                <select name="bathroom" class="form-control" id="bathroom">
                    <option value="">-Select-</option>
                    @for($i=1; $i < 15; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Number of Seats</label>
                <input type="number" name="no_of_seat" class="form-control" id="no_of_seat">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Cabin/Meeting Rooms</label>
                <select name="meeting_room" class="form-control" id="meeting_room">
                    <option value="">-Select-</option>
                    @for($i=1; $i < 15; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>  
</div>                
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Willing to modify interiors</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="modify_interior" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="modify_interior" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Lock in Period (In Years)</label>
    </div>
    <div class="form-group col-md-7">
        <input type="number" class="form-control" name="lock_period" max="2">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Personal Washroom</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="personal_washroom" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="personal_washroom" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Pantry/Cafeteria</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="pantry_cafe" value="Dry">Dry
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="pantry_cafe" value="Wet">Wet
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="pantry_cafe" value="Not Available">Not Available
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <h6>Area</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Super Build Up Area<span class="text-danger">*</span><span  style="color:red" id="super_area_err"> </span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control Stylednumber @error('super_build_up_area') invalid-feedback @enderror" id="super_build_up_area" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="super_area_unit" id="super_area_unit" class="form-control">
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Acre">Acre</option>
            <option value="Bigha">Bigha</option>
            <option value="Hectare">Hectare</option>
            <option value="Marla">Marla</option>
            <option value="Kanal">Kanal</option>
            <option value="Biswa1">Biswa1</option>
            <option value="Biswa2">Biswa2</option>
            <option value="Ground">Ground</option>
            <option value="Aankadam">Aankadam</option>
            <option value="Rood">Rood</option>
            <option value="Chatak">Chatak</option>
            <option value="Kottah">Kottah</option>
            <option value="Cent">Cent</option>
        </select>
    </div>
    <div class="col-md-5 form-group">
        <label for="">Build Up Area <small>(Sq.ft.)</small></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="build_up_area" class="form-control Stylednumber @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="build_unit" id="build_unit" class="form-control">
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Acre">Acre</option>
            <option value="Bigha">Bigha</option>
            <option value="Hectare">Hectare</option>
            <option value="Marla">Marla</option>
            <option value="Kanal">Kanal</option>
            <option value="Biswa1">Biswa1</option>
            <option value="Biswa2">Biswa2</option>
            <option value="Ground">Ground</option>
            <option value="Aankadam">Aankadam</option>
            <option value="Rood">Rood</option>
            <option value="Chatak">Chatak</option>
            <option value="Kottah">Kottah</option>
            <option value="Cent">Cent</option>
        </select>
    </div>
    <div class="col-md-5 form-group">
        <label for="">Carpet Area <small>(Sq.ft.)</small></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="carpet_area" class="form-control Stylednumber @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="carpet_unit" id="carpet_unit" class="form-control">
            <option value="Sq-ft">Sq-ft</option>
            <option value="Sq-yrd">Sq-yrd</option>
            <option value="Sq-m">Sq-m</option>
            <option value="Acre">Acre</option>
            <option value="Bigha">Bigha</option>
            <option value="Hectare">Hectare</option>
            <option value="Marla">Marla</option>
            <option value="Kanal">Kanal</option>
            <option value="Biswa1">Biswa1</option>
            <option value="Biswa2">Biswa2</option>
            <option value="Ground">Ground</option>
            <option value="Aankadam">Aankadam</option>
            <option value="Rood">Rood</option>
            <option value="Chatak">Chatak</option>
            <option value="Kottah">Kottah</option>
            <option value="Cent">Cent</option>
        </select>
    </div>
</div>
<div class="form-group">
    <h6>Transaction Type/Property Availability</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="">Available From<span  style="color:red" id="available_from_err"> </span></label>
    </div>
    <div class="col-md-6 form-group">
        <div class="form-check-inline">
        <label class="form-check-label" style="display:-webkit-inline-box">
            <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date &nbsp;
            <div class="hidden" id="showDateDiv">
                <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px" onfocus="(this.type='date')">
            </div>
        </label>
        </div>
    </div>
    <div class="col-md-3 form-group">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="available_from" value="Immediately">Immediately
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Age of Construction <span class="text-danger">*</span></label>
        <select class="form-control" id="age_of_construction" name="age_of_construction">
            <option value="">-Select-</option>
            <option value="New Construction">New Construction</option>
            <option value="Less than 5 years">Less than 5 years</option>
            <option value="5 to 10 years">5 to 10 years</option>
            <option value="10 to 15 years">10 to 15 years</option>
            <option value="15 to 20 years">15 to 20 years</option>
            <option value="Above 20 years">Above 20 years</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Currently Rent Out</label>
    </div>
    <div class="form-group col-md-6">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rent_out" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rent_out" value="No">No
            </label>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <h6>Rent/Lease Detail</h6>
</div>
<div class="form-row">
    <div class="col-md-4">
        <label for="">Monthly Rent<span  style="color:red" id="monthly_rent_err"> </span></label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control Stylednumber" id="monthly_rent" name="monthly_rent" onkeyup="convertNumberToWords(this.value)">
        <span id="show_price" class="text-muted"></span>
    </div>
</div>
<div id="show_rent" class="hidden">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Show Rent as</label>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent1" value="" checked>
                    <span id="rent_1"></span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="show_rent_as" id="show_rent2" value="">
                    <span id="rent_2"></span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="show_rent_as" value="Call For Price">Call For Price
                </label>
            </div>
        </div>
    </div>
</div>
<!-- <div class="form-group">
    <div class="plus-minus">
        <input type="checkbox" name="" id="a1" class="a css-checkbox">
        <label for="a1" class="css-label">
            <span class="fa fa-plus"></span>
            <span class="fa fa-minus"></span>
            Add Other Charges
        </label>
    </div>
</div>
<div id="otherChargesDiv" class="hidden">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Other Charges</label>
        </div>
        <div class="form-group col-md-8">
            <input type="text" class="form-control" name="other_charges">
        </div>
    </div>
</div> -->
<div class="form-group">
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" name="ele_water_charges" class="form-check-input" value="1" checked>Electricity & Water charges excluded.
        </label>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Security/Deposit Amount</label>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control Stylednumber" name="security_amount" onkeyup="convertNumberToWords1(this.value)">
        <span id="security_price" class="text-muted"></span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Maintenance Charges</label>
        <input type="text" name="maintenance_charge" class="form-control Stylednumber">
    </div>
    <div class="form-group col-md-6">
        <label for="">Per</label>
        <select name="m_charges_per" id="m_charges_per" class="form-control">
            <option value="Monthly">Monthly</option>
            <option value="Quarterly">Quarterly</option>
            <option value="Yearly">Yearly</option>
            <option value="One-Time">One-Time</option>
            <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
        </select>
    </div>
</div>
<div class="form-row" id="brokerageDiv">
    <div class="form-group col-md-6">
        <label for="">Brokerage (Brokers Only)</label>
    </div>
    <div class="form-group col-md-6">
        <select name="brokerage" id="brokerage" class="form-control">
            <option value="">-Select Brokerage-</option>
            <option value="No Brokerage">No Brokerage</option>
            <option value="10 Days">10 Days</option>
            <option value="15 Days">15 Days</option>
            <option value="20 Days">20 Days</option>
            <option value="25 Days">25 Days</option>
            <option value="30 Days">30 Days</option>
            <option value="45 Days">45 Days</option>
            <option value="Others">Others</option>
        </select>
    </div>
</div>
<div class="form-group">
    <h6>Photos</h6>
</div>
<div class="form-group">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home1-tab" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">Exterior View</a>
            <a class="nav-item nav-link" id="nav-profile1-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Common Area</a>
            <a class="nav-item nav-link" id="nav-contact1-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Washrrom</a>
            <a class="nav-item nav-link" id="nav-about1-tab" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Floor Plan</a>
            <a class="nav-item nav-link" id="nav-kitchen1-tab" data-toggle="tab" href="#nav-kitchen1" role="tab" aria-controls="nav-kitchen1" aria-selected="false">Others</a>
        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home1-tab">
            <div id="upload_form">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile1-tab">
            <div id="upload_form5">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>                          
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="common_area[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact1-tab">
            <div id="upload_form3">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about1-tab">
            <div id="upload_form6">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="floor_plan_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-kitchen1" role="tabpanel" aria-labelledby="nav-kitchen1-tab">
            <div id="upload_form7">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>          
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="other_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
    </div>
</div>
<hr>
<button type="button" class="btn btn-primary" id="showButton2">Continue & Next</button>
<div class="hidden" id="showDiv2">
    <div class="form-group">
        <h6>Additional Features</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <h6>Facing <span class="text-danger">*</span></h6>
            <select name="facing" id="facing" class="form-control @error('facing') invalid-feedback @enderror">
                <option value="">-Select Facing-</option>
                <option value="East" @if(old('facing') == "East") Selected @endif>East</option>
                <option value="West" @if(old('facing') == "West") Selected @endif>West</option>
                <option value="North" @if(old('facing') == "North") Selected @endif>North</option>
                <option value="South" @if(old('facing') == "South") Selected @endif>South</option>
                <option value="North East" @if(old('facing') == "North East") Selected @endif>North East</option>
                <option value="North West" @if(old('facing') == "North West") Selected @endif>North West</option>
                <option value="South East" @if(old('facing') == "South East") Selected @endif>South East</option>
                <option value="South West" @if(old('facing') == "South West") Selected @endif>South West</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <h6>Lifts in the Tower </h6>
            <select name="lift_in_tower" id="lift_in_tower" class="form-control @error('lift_in_tower') invalid-feedback @enderror">
                <option value="">-Select-</option>
                <option value="None" @if(old('lift_tower') == "None") Selected @endif>None</option>
                <option value="1" @if(old('lift_tower') == "1") Selected @endif>1</option>
                <option value="2" @if(old('lift_tower') == "2") Selected @endif>2</option>
                <option value="3" @if(old('lift_tower') == "3") Selected @endif>3</option>
                <option value="4" @if(old('lift_tower') == "4") Selected @endif>4</option>
                <option value="5" @if(old('lift_tower') == "5") Selected @endif>5</option>
                <option value="6" @if(old('lift_tower') == "6") Selected @endif>6</option>
                <option value="7" @if(old('lift_tower') == "7") Selected @endif>7</option>
            </select>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Office on the Floor</label>
        </div>
        <div class="form-group col-md-6">
            <input type="number" class="form-control" name="office_floor">
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Multiple Units Available</label>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="mul_unit_avail" value="Yes">Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="mul_unit_avail" value="No">No
                </label>
            </div>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Building Class</label>
            <select name="building_class" id="" class="form-control">
                <option value="">-Select Building Class-</option>
                <option value="Not Applicable">Not Applicable</option>
                <option value="Grade A+">Grade A+</option>
                <option value="Grade A">Grade A</option>
                <option value="Grade B">Grade B</option>
                <option value="Grade C">Grade C</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">LEED Certification</label>
            <select name="leed_certification" id="" class="form-control">
                <option value="">-Select LEED Certification-</option>
                <option value="Not Applicable">Not Applicable</option>
                <option value="Certified">Certified</option>
                <option value="Silver Certified">Silver Certified</option>
                <option value="Gold Certified">Gold Certified</option>
                <option value="Platinum Certified">Platinum Certified</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <h6>Status of Water & Electricity</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Status of Water</label>
            <select name="status_of_water" id="status_of_water" class="form-control @error('status_of_water') invalid-feedback @enderror">
                <option value="">-Select Status of Water-</option>
                <option value="24 HOURS Available" @if(old('status_of_water') == "24 HOURS Available") Selected @endif>24 HOURS Available</option>
                <option value="12 HOURS Available" @if(old('status_of_water') == "12 HOURS Available") Selected @endif>12 HOURS Available</option>
                <option value="6 HOURS Available" @if(old('status_of_water') == "6 HOURS Available") Selected @endif>6 HOURS Available</option>
                <option value="2 HOURS Available" @if(old('status_of_water') == "2 HOURS Available") Selected @endif>2 HOURS Available</option>
                <option value="1 HOUR Available" @if(old('status_of_water') == "1 HOUR Available") Selected @endif>1 HOUR Available</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">Status of Electricity</label>
            <select name="status_of_electricity" id="status_of_electricity" class="form-control @error('status_of_electricity') invalid-feedback @enderror">
                <option value="">-Select Status of Electricity-</option>
                <option value="No Power Cut" @if(old('status_of_electricity') == "No Power Cut") Selected @endif>No Power Cut</option>
                <option value="less than 3 hrs" @if(old('status_of_electricity') == "less than 3 hrs") Selected @endif>less than 3 hrs</option>
                <option value="2 to 4 hrs Power Cut" @if(old('status_of_electricity') == "2 to 4 hrs Power Cut") Selected @endif>2 to 4 hrs Power Cut</option>
                <option value="4 to 6 hrs Power Cut" @if(old('status_of_electricity') == "4 to 6 hrs Power Cut") Selected @endif>4 to 6 hrs Power Cut</option>
                <option value="above 6 hrs Power Cut" @if(old('status_of_electricity') == "above 6 hrs Power Cut") Selected @endif>above 6 hrs Power Cut</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <h6>Overlooking</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Garden/Park">Garden/Park
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6>Car Parking</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label" style="display:-webkit-inline-box">
                    <input type="checkbox" class="form-check-input" name="car_parking[]" value="Covered">Covered &nbsp;
                    <div class="hidden" id="showCoveredDiv">
                        <input type="number" placeholder="Enter No." name="cover_no" id="cover_no">
                    </div>
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label" style="display:-webkit-inline-box">
                    <input type="checkbox" class="form-check-input" name="car_parking[]" value="Open">Open &nbsp;
                    <div class="hidden" id="showOpenDiv">
                        <input type="number" placeholder="Enter No." name="open_no" id="open_no">
                    </div>
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="car_parking[]" value="None">None
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6>Amenities</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Conditioner">Air Conditioner
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="CCTV Camera">CCTV Camera
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinklers">Fire Sprinklers
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria Food Court">Cafeteria Food Court
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Conference Room">Conference Room
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Intercom Facility">Intercom Facility
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Facility">Internet Wi-Fi Facility
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Tea/Coffee">Tea/Coffee
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Printer">Printer
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Pipe Gas">Pipe Gas
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Back Up">Power Back Up
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="RO Water System">RO Water System
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking">Reserve Parking
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Services/ Goods Lift">Services/ Goods Lift
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Swimming Pool">Swimming Pool
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Whiteboard">Whiteboard
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitors Parking">Visitors Parking
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheelchair Accessibility">Wheelchair Accessibility
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Water Storage">Water Storage
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6>Description & Landmarks</h6>
    </div>
    <div class="form-group">
        <label for="">Description<span  style="color:red" id="description_err"> </span></label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Landmark</label>
        <input type="text" name="landmark" class="form-control">
    </div>
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
        </div>
        <div class="form-group col-md-6 mb-3">
            <label>Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ Auth::user()->email }}">
        </div>
        <div class="form-group col-md-6 mb-3">
            <label>Mobile Number<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no"  name="mobile_no" value="{{ Auth::user()->mobile_no }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>State</label><span class="text-danger">*</span></label>
            <select id="user_state" class="form-control sel-status @error('state') is-invalid @enderror" name="user_state" style="width:100%">
                <option value="">Choose...</option>
                @foreach($state as $s)
                <option value="{{ $s->id }}" @if (old('state') == $s->id) selected="selected" @endif>{{ $s->state_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputCity">City</label><span class="text-danger">*</span></label>
            <select class="form-control sel-status @error('user_city') is-invalid @enderror" id="user_city" name="user_city" style="width:100%">
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="user_locality">Locality</label><span class="text-danger">*</span></label>
            <select class="form-control sel-status @error('locality') is-invalid @enderror" id="user_locality" name="user_locality" style="width:100%">
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Address</label><span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('user_address') is-invalid @enderror" id="user_address" name="user_address">
        </div>
        <div class="form-group col-md-6">
            <label>Pin Code</label>
            <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" name="pin_code">
        </div> 
    </div>
    <button type="button" id="submitButton2" class="btn btn-primary">Post Your Add</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script>
$(function() {
  $(".sel-status").select2();
});
$(document).ready(function() { 
    $(".mul-select").select2({ 
      tags: true, 
    }); 
}) 
$('body').on('click', '#showButton2', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('textarea#address').val();
  var project_name = $('#project_name').val();
  var land_zone = $('#land_zone').val();
  var no_of_floor = $('#no_of_floor').val();
  var furnishing = $("input[name='furnishing']:checked").val();
  var super_build_up_area = $('#super_build_up_area').val();
  var available_from = $("input[name='available_from']:checked").val();
  var monthly_rent = $('#monthly_rent').val();
  if(listed_by == null)
  {
    $("#listed_err").fadeIn().html("Required");
    setTimeout(function(){ $("#listed_err").fadeOut(); }, 3000);
    $('input[name="listed_by"]').focus();
    return false;
  }
  if(city == '')
  {
    $("#city_err").fadeIn().html("Required");
    setTimeout(function(){ $("#city_err").fadeOut(); }, 3000);
    $("#search-box").focus();
    return false;
  }
  if(locality == '')
  {
    $("#locality_err").fadeIn().html("Required");
    setTimeout(function(){ $("#locality_err").fadeOut(); }, 3000);
    $("#locality").focus();
    return false;
  }
  if(address == '')
  {
    $("#address_err").fadeIn().html("Required");
    setTimeout(function(){ $("#address_err").fadeOut(); }, 3000);
    $("#address").focus();
    return false;
  }
  if(project_name == '')
  {
    $("#project_name_err").fadeIn().html("Required");
    setTimeout(function(){ $("#project_name_err").fadeOut(); }, 3000);
    $("#project_name").focus();
    return false;
  }
  if(land_zone == '')
  {
    $("#land_zone_err").fadeIn().html("Required");
    setTimeout(function(){ $("#land_zone_err").fadeOut(); }, 3000);
    $("#land_zone").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#total_floor_err").fadeOut(); }, 3000);
    $("#no_of_floor").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#furnishing_err").fadeIn().html("Required");
    setTimeout(function(){ $("#furnishing_err").fadeOut(); }, 3000);
    $("input[name='furnishing']").focus();
    return false;
  }
  if(super_build_up_area == '')
  {
    $("#super_area_err").fadeIn().html("Required");
    setTimeout(function(){ $("#super_area_err").fadeOut(); }, 3000);
    $("#super_build_up_area").focus();
    return false;
  }
  if(available_from == null)
  {
    $("#available_from_err").fadeIn().html("Required");
    setTimeout(function(){ $("#available_from_err").fadeOut(); }, 3000);
    $("input[name='available_from']").focus();
    return false;
  }
  if(monthly_rent == '')
  {
    $("#monthly_rent_err").fadeIn().html("Required");
    setTimeout(function(){ $("#monthly_rent_err").fadeOut(); }, 3000);
    $("#monthly_rent").focus();
    return false;
  }
  else{
    $("#showDiv2").removeClass("hidden");
    $("#showButton2").addClass("hidden");
  }
})
$('body').on('click', '#submitButton2', function () {
  var description = $('textarea#description').val();
  if(description == '')
  {
    $("#description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#description_err").fadeOut(); }, 3000);
    $("#description").focus();
    return false;
  }
  else{
    $("#property-form").submit();
  }
});
$('#user_state').change(function(){
    var stateID = $(this).val(); 
    if(stateID){
        $.ajax({
        type:"GET",
        url:"{{url('/get-city-list')}}?state_id="+stateID,
        success:function(res){        
            if(res){
            $("#user_city").empty();
            $("#user_city").append('<option value="">Select City</option>');
            $.each(res,function(key,value){
                $("#user_city").append('<option value="'+key+'">'+value+'</option>');
            });      
            }else{
            $("#user_city").empty();
            }
        }
        });
    }else{
        $("#user_city").empty();
    }   
});

$('#user_city').change(function(){
    var cityID = $(this).val();  
    if(cityID){
        $.ajax({
        type:"GET",
        url:"{{url('/get-locality-list')}}?city_id="+cityID,
        success:function(res){        
            if(res){
            $("#user_locality").empty();
            $("#user_locality").append('<option value="">Select Locality</option>');
            $.each(res,function(key,value){
                $("#user_locality").append('<option value="'+key+'">'+value+'</option>');
            });      
            }else{
            $("#user_locality").empty();
            }
        }
        });
    }else{
        $("#user_locality").empty();
    }   
});
</script>