<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Name of Project/ Market <span class="text-danger">*</span><span class="text-danger" id="project_err"></span></label>
        <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name"  name="project_name">
    </div>
    <div class="form-group col-md-6">
        <label for="">Rera Id</label>
        <input type="text" class="form-control @error('rera_id') is-invalid @enderror" id="rera_id"  name="rera_id" value="{{ old('rera_id') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="">Land Zone</label>
        <select name="land_zone" id="land_zone" class="form-control @error('land_zone') invalid-feedback @enderror">
            <option value="">-Select Land Zone-</option>
            <option value="Industrial" @if(old('land_zone') == "Industrial") Selected @endif>Industrial</option>
            <option value="Commercial" @if(old('land_zone') == "Commercial") Selected @endif>Commercial</option>
            <option value="Residential" @if(old('land_zone') == " Residential") Selected @endif>Residential</option>
            <option value="Transport & Communication" @if(old('land_zone') == "Transport & Communication") Selected @endif>Transport & Communication</option>
            <option value="Public Utilities" @if(old('land_zone ') == "Public Utilities") Selected @endif>Public Utilities</option>
            <option value="Public & Semi Public Use" @if(old('land_zone') == " Public & Semi Public Use") Selected @endif>Public & Semi Public Use</option>
            <option value="Open Spaces" @if(old('land_zone') == "Open Spaces") Selected @endif>Open Spaces</option>
            <option value="Agricultural Zone" @if(old('land_zone') == "Agricultural Zone") Selected @endif>Agricultural Zone</option>
            <option value="Special Economic Zone" @if(old('land_zone') == "Special Economic Zone") Selected @endif>Special Economic Zone</option>
            <option value="Natural Conservation Zone" @if(old('land_zone') == "Natural Conservation Zone") Selected @endif>Natural Conservation Zone</option>
            <option value="Government Zone" @if(old('land_zone') == "Government Zone") Selected @endif>Government Zone</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label>Ideal For business</label>
        <select name="ideal_business[]" class="form-control mul-select" multiple="true">
            <option value="">-Choose-</option>
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
<div class="form-row">
    <div class="col-md-6 form-group">
        <label for="">Floor No. <span class="text-danger">*</span><span class="text-danger" id="floor_err"></span></label>
        <select name="floor_no" id="floor_no" class="form-control @error('floor_no') is-invalid @enderror" value="{{ old('floor_no') }}">
            <option value="">Choose..</option>
            <option value="Lower Basement">Lower Basement</option>
            <option value="Upper Basement">Upper Basement</option>
            <option value="Ground">Ground</option>
            @for($i=1; $i <= 20; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-md-6 form-group">
        <label for="floor">Total Floors <span class="text-danger">*</span><span class="text-danger" id="total_floor_err"></span></label>
        <select name="total_floor" id="total_floor" class="form-control @error('total_floor') is-invalid @enderror">
            <option value="">Choose..</option>
            @for($i=1; $i <= 20; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>
<div class="form-row">
    <div class="col-md-5 form-group">
        <label>Furnished Status<span class="text-danger">*</span><span class="text-danger" id="furnished_err"></span></label>
    </div>
    <div class="col-md-7 form-group">
        <div class="switch-field">
            <input type="radio"  name="furnishing" id="Furnished" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif>
            <label for="Furnished">Furnished</label>
            <input type="radio" type="radio" name="furnishing" id="Semi-Furnished" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif>
            <label for="Semi-Furnished">Semi-Furnished</label>
            <input type="radio" type="radio" name="furnishing" id="Unfurnished" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif>
            <label for="Unfurnished">Unfurnished</label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-5 form-group">
        <label>Washroom<span class="text-danger">*</span><span class="text-danger" id="bathroom_err"></span>
        </label>
    </div>
    <div class="col-md-7 form-group">
        <div class="switch-field">
            <input type="radio"  name="bathroom" id="bath15" value="1" @if(old('bathroom') == "1") checked @endif>
            <label for="bath15">1</label>
            <input type="radio"  name="bathroom" id="bath16" value="2" @if(old('bathroom') == "2") checked @endif>
            <label for="bath16">2</label>
            <input type="radio" type="radio" name="bathroom" id="bath17" value="3" @if(old('bathroom') == "3") checked @endif>
            <label for="bath17">3</label>
            <input type="radio" type="radio" name="bathroom" id="bath18" value="4" @if(old('bathroom') == "4") checked @endif>
            <label for="bath18">4</label>
            <input type="radio" type="radio" name="bathroom" id="bath19" value="5" @if(old('bathroom') == "5") checked @endif>
            <label for="bath19">5</label>
            <input type="radio" type="radio" name="bathroom" id="bath20" value="6" @if(old('bathroom') == "6") checked @endif>
            <label for="bath20">6</label>
            <input type="radio" type="radio" name="bathroom" id="bath21" value="6+" @if(old('bathroom') == "6+") checked @endif>
            <label for="bath21">6+</label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Personal Washroom<span class="text-danger">*</span><span class="text-danger" id="p_washroom_err"></span></label>
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
        <label for="">Pantry/Cafeteria<span class="text-danger">*</span><span class="text-danger" id="pantry_err"></span></label>
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
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Corner Shop<span class="text-danger">*</span><span class="text-danger" id="c_shop_err"></span></label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="corner_shop" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="corner_shop" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Is Main Road Facing<span class="text-danger">*</span><span class="text-danger" id="main_road_err"></span></label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="main_road" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="main_road" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <h6>Area</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Covered Area</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="Stylednumber form-control @error('covered_area') invalid-feedback @enderror" id="covered_area" name="covered_area" value="{{ old('covered_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="covered_unit" id="covered_unit" class="form-control">
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
        <label for="">Carpet Area </label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="carpet_area" class="Stylednumber form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
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
    <div class="col-md-5 form-group">
        <label for="">Plot Area <span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="plot_area" class="Stylednumber form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="plot_unit" id="plot_unit" class="form-control">
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
<hr>
<div class="form-row">
    <div class="col-md-5 form-group">
        <label for="">Width of Entrance</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="entrance_width" class="Stylednumber form-control @error('entrance_width') invalid-feedback @enderror" name="entrance_width" value="{{ old('entrance_width') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="entrance_unit" id="entrance_unit" class="form-control">
            <option value="meters">meters</option>
            <option value="ft">ft</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Width of Road facing the Shop</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="road_facing_unit" id="road_facing_unit" class="form-control @error('road_facing_unit') invalid-feedback @enderror">
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
            <option value="Perch">Perch</option>
            <option value="Guntha">Guntha</option>
            <option value="Are">Are</option>
        </select>
    </div>
</div> 
<hr>
<div class="form-group">
    <h6>Transaction Type/ Property Availability</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Transaction Type<span class="text-danger">*</span><span class="text-danger" id="trans_type_err"></span></label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="transaction_type" value="New Property">New Property
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="transaction_type" value="Resale">Resale
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Possession Status</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="posses_status" value="Under Construction">Under Construction
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="posses_status" value="Ready to Move">Ready to Move
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6" id="possesDiv1">
        <label>Available From</label>
        <input  type="text" id="available_from" class="form-control @error('available_from') is-invalid @enderror" name="available_from" placeholder="Month-Year" onfocus="(this.type='month')">
    </div>
    <div class="form-group col-md-6 hidden" id="possesDiv2">
        <label>Age of Construction <span class="text-danger">*</span></label>
        <select class="form-control @error('age_of_construction') is-invalid @enderror" id="age_of_construction" name="age_of_construction">
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
<hr>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Current Lease Out</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="lease_out" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="lease_out" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Assured Return</label>
    </div>
    <div class="form-group col-md-7">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="assure_return" value="Yes">Yes
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="assure_return" value="No">No
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <h6>Price Detail</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_price">Expected price<span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                <input type="text" name="total_price" class="form-control Stylednumber @error('expected_price') is-invalid @enderror" id="total_price" value="{{ old('expected_price') }}" onkeyup="convertNumberToWords(this.value)">
                <span id="show_price" class="text-muted"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price_per_sq_ft">Price per sq.ft.</label>
                <input type="text" name="price_per_sq_ft" readonly id="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
            </div>
        </div>
    </div>
</div>
<div id="show_rent" class="hidden">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Show Price as</label>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="show_rent1" name="show_price_as" value="" checked>
                    <span id="rent_1"></span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="show_rent2" name="show_price_as" value="">
                    <span id="rent_2"></span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="show_price_as" value="Call For Price">Call For Price
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-5">
            <label for="">Price Include</label>
        </div>
        <div class="col-md-7">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="price_include[]" value="Car Parking">
                <label class="form-check-label" for="inlineCheckbox1">Car Parking</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="price_include[]" value="PLC">
                <label class="form-check-label" for="inlineCheckbox2">PLC</label>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="plus-minus">
        <input type="checkbox" name="" id="a" class="a css-checkbox">
        <label for="a" class="css-label">
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
</div>
<div class="form-group">
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" name="stamp_duty" class="form-check-input" value="1" checked>Stamp Duty & Registration Charges Excluded.
        </label>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Booking Token Amount</label>
    </div>
    <div class="form-group col-md-6">
        <input type="text" name="booking_token_amount" id="booking_token_amount" class="Stylednumber form-control @error('booking_token_amount') invalid-feedback @enderror" value="{{ old('booking_token_amount') }}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Maintenance Charges</label>
        <input type="text" name="maintenance_charges" class="form-control Stylednumber">
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
            <option value="0.25 %">0.25 %</option>
            <option value="0.5 %">0.5 %</option>
            <option value="0.75 %">0.75 %</option>
            <option value="1 %">1 %</option>
            <option value="1.5 %">1.5 %</option>
            <option value="2 %">2 %</option>
            <option value="3 %">3 %</option>
            <option value="4 %">4 %</option>
            <option value="5 %">5 %</option>
        </select>
    </div>
</div>
<hr>
<div class="form-group">
    <label>Photos </label>
</div>
<div class="form-group mt-3">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home2-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home2" aria-selected="true">Exterior View</a>
                    <a class="nav-item nav-link" id="nav-profile2-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">Common Area</a>
                    <a class="nav-item nav-link" id="nav-contact2-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact2" aria-selected="false">Washroom</a>
                    <a class="nav-item nav-link" id="nav-master1-tab" data-toggle="tab" href="#nav-master1" role="tab" aria-controls="nav-master1" aria-selected="false">Master Plan</a>
                    <a class="nav-item nav-link" id="nav-location1-tab" data-toggle="tab" href="#nav-location1" role="tab" aria-controls="nav-location1" aria-selected="false">Location Map</a>
                    <a class="nav-item nav-link" id="nav-others2-tab" data-toggle="tab" href="#nav-others2" role="tab" aria-controls="nav-others2" aria-selected="false">Others </a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home2-tab">
                    <div id="upload_form">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                            <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile2-tab">
                    <div id="upload_form9">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="common_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">
                    <div id="upload_form3">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1"> Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-master1" role="tabpanel" aria-labelledby="nav-master1-tab">
                    <div id="upload_form6">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1"> Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-location1" role="tabpanel" aria-labelledby="nav-location1-tab">
                    <div id="upload_form7">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1"> Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-others2" role="tabpanel" aria-labelledby="nav-others2-tab">
                    <div id="upload_form8">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="others_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<button type="button" id="showButton" class="btn btn-primary">Continue & Next</button>
<div class="hidden" id="showDiv">
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
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Pool">Pool
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
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Shop on the Floor</label>
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
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Ownership Approval</label>
            <select name="ownership_approval" class="form-control" id="">
                <option value="">-Select-</option>
                <option value="Freehold">Freehold</option>
                <option value="Leasehold">Leasehold</option>
                <option value="Power of Attorney">Power of Attorney</option>
                <option value="Co-Operative Society">Co-Operative Society</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">Approved By</label>
            <select name="approved_by" class="form-control" id="">
                <option value="">-Select-</option>
                <option value="Metropolitan Region">Metropolitan Region</option>
                <option value="Development Authority">Development Authority</option>
                <option value="Developer">Developer</option>
                <option value="RWA/Co-Operative Housing Society">RWA/Co-Operative Housing Society</option>
                <option value="City Muncipal Corporation">City Muncipal Corporation</option>
            </select>
        </div>
    </div>  
    <div class="form-group">
        <h6>Aminities</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Air Condition">Air Condition
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Cafeteria">Cafeteria
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Food Court">Food Court
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Fire Sprinkler">Fire Sprinkler
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Lift">Lift
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Power Backup">Power Backup
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Projector">Projector
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Security">Security
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Service Goods Lift">Service Goods Lift
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Visitor Parking">Visitor Parking
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
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Internet Wi-Fi Connectivity">Internet Wi-Fi Connectivity
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Wheel Chair Accessibility">Wheel Chair Accessibility
                </label>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label>Description <span class="text-danger">*</span><span class="text-danger" id="description_err"></span></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label>Land Mark  <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('land_mark') is-invalid @enderror" id="land_mark"  name="land_mark" value="{{ old('land_mark') }}">
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
            <input type="number" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no"  name="mobile_no" value="{{ Auth::user()->mobile_no }}">
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
    <button type="button" id="submitForm" class="btn btn-primary">Post Your Add</button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/common1.js') }}"></script>
<script>
$(function() {
    $(".sel-status").select2();
});

$(document).ready(function() { 
  $(".mul-select").select2({ 
    tags: true, 
  }); 
}) 

$(document).on("change keyup blur", "#total_price", function() {
  var covered_area = $('#covered_area').val();
  var covered_area1 = covered_area.replace(/,/g, "");
  var total_price = $('#total_price').val();
  var total_price1 = total_price.replace(/,/g, "");
  if(covered_area != ""){
    var dec = (total_price1 / covered_area1).toFixed(2); //its convert 10 into 0.10
    // alert(dec);
    $('#price_per_sq_ft').val(dec);
  }
});
$('body').on('click', '#showButton', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('#address').val();
  var name_of_society = $('#project_name').val();
  var bathroom = $("input[name='bathroom']:checked").val();
  var floor_no = $('#floor_no').val();
  var no_of_floor = $('#total_floor').val();
  var furnishing = $("input[name='furnishing']:checked").val();
  var p_washroom = $("input[name='personal_washroom']:checked").val();
  var pantry_cafe = $("input[name='pantry_cafe']:checked").val();
  var corner_shop = $("input[name='corner_shop']:checked").val();
  var main_road = $("input[name='main_road']:checked").val();
  var plot_area = $('#plot_area').val();
  var transaction_type = $("input[name='transaction_type']:checked").val();
  var total_price = $("#total_price").val();
  var covered_area = $('#covered_area').val();
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
  if(name_of_society == '')
  {
    $("#project_err").fadeIn().html("Required");
    setTimeout(function(){ $("#project_err").fadeOut(); }, 3000);
    $("#project_name").focus();
    return false;
  }
  if(floor_no == '')
  {
    $("#floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#floor_err").fadeOut(); }, 3000);
    $("#floor_no").focus();
    return false;
  }
  if(no_of_floor == '')
  {
    $("#total_floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#total_floor_err").fadeOut(); }, 3000);
    $("#total_floor").focus();
    return false;
  }
  if(furnishing == null)
  {
    $("#furnished_err").fadeIn().html("Required");
    setTimeout(function(){ $("#furnished_err").fadeOut(); }, 3000);
    $("input[name='furnishing']").focus();
    return false;
  }
  if(bathroom == null)
  {
    $("#bathroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#bathroom_err").fadeOut(); }, 3000);
    $("input[name='bathroom']").focus();
    return false;
  }
  if(p_washroom == null)
  {
    $("#p_washroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#p_washroom_err").fadeOut(); }, 3000);
    $("input[name='personal_washroom']").focus();
    return false;
  }
  if(pantry_cafe == null)
  {
    $("#pantry_err").fadeIn().html("Required");
    setTimeout(function(){ $("#pantry_err").fadeOut(); }, 3000);
    $("input[name='pantry_cafe']").focus();
    return false;
  }
  if(corner_shop == null)
  {
    $("#c_shop_err").fadeIn().html("Required");
    setTimeout(function(){ $("#c_shop_err").fadeOut(); }, 3000);
    $("input[name='corner_shop']").focus();
    return false;
  }
  if(main_road == null)
  {
    $("#main_road_err").fadeIn().html("Required");
    setTimeout(function(){ $("#main_road_err").fadeOut(); }, 3000);
    $("input[name='main_road']").focus();
    return false;
  }
  if(covered_area == '')
  {
    $("#covered_err").fadeIn().html("Required");
    setTimeout(function(){ $("#covered_err").fadeOut(); }, 3000);
    $("#covered_area").focus();
    return false;
  }
  if(plot_area == '')
  {
    $("#plot_err").fadeIn().html("Required");
    setTimeout(function(){ $("#plot_err").fadeOut(); }, 3000);
    $("#plot_area").focus();
    return false;
  }
  if(transaction_type == null)
  {
    $("#trans_type_err").fadeIn().html("Required");
    setTimeout(function(){ $("#trans_type_err").fadeOut(); }, 3000);
    $("input[name='transaction_type']").focus();
    return false;
  }
  if(total_price == '')
  {
    $("#price_err").fadeIn().html("Required");
    setTimeout(function(){ $("#price_err").fadeOut(); }, 3000);
    $("#total_price").focus();
    return false;
  }
  else{
    $("#showDiv").removeClass("hidden");
    $("#showButton").addClass("hidden");
  }
})
$('body').on('click', '#submitForm', function () {
  var description = $('textarea#description').val();
  if(description == '')
  {
    $("#description_err").fadeIn().html("Required");
    setTimeout(function(){ $("#description_err").fadeOut(); }, 3000);
    $("#description").focus();
    return false;
  }
  else{
    $("#property-sale").submit();
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