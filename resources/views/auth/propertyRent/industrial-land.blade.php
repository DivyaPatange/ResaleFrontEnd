<div class="form-group">
    <h6>Property Feature</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Land Zone<span  style="color:red" id="land_zone_err"> </span></label>
        <select name="land_zone" id="land_zone" class="form-control sel-status">
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
    <div class="form-group col-md-6">
        <label for="">No. of Open Side</label>
        <select name="no_of_open_side" id="no_of_open_side" class="sel-status form-control @error('no_of_open_side') invalid-feedback @enderror">
            <option value="">-Select No. of Open Side-</option>
            <option value="1" @if(old('no_of_open_side') == "1") Selected @endif>1</option>
            <option value="2" @if(old('no_of_open_side') == "2") Selected @endif>2</option>
            <option value="3" @if(old('no_of_open_side') == "3") Selected @endif>3</option>
            <option value="4" @if(old('no_of_open_side') == "4") Selected @endif>4</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="">Ideal For Businesses</label>
    </div>
    <div class="form-group col-md-8">
        <select name="ideal_business" class="form-control sel-status">
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
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Width of Road facing the Plot</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}" placeholder="Meters">
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
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="">Any construction Done <span class="text-danger">*</span><span class="text-danger" id="construct_err"></span></label>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="any_construc" value="Yes">Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="any_construc" value="No">No
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="">Bondary wall Made<span class="text-danger">*</span><span class="text-danger" id="wall_err"></span></label>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="boundry_wall" value="Yes">Yes
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="boundry_wall" value="No">No
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
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
<div class="form-group">
    <h6>Area</h6>
</div>
<div class="form-row">
    <div class="col-md-5">
        <label for="">Plot Area<span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="number" id="plot_area" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="plot_unit" id="plot_unit" class="form-control @error('plot_unit') invalid-feedback @enderror">
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
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Plot Length<span class="text-danger">*</span><span  style="color:red" id="plot_length_err"> </span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="number" class="form-control @error('plot_length') invalid-feedback @enderror" name="plot_length" id="plot_length" value="{{ old('plot_length') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="plot_length_unit" id="plot_length_unit" class="form-control">
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
    <div class="form-group col-md-5">
        <label for="">Plot Width<span class="text-danger">*</span><span  style="color:red" id="plot_width_err"> </span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" readonly class="form-control @error('plot_width') invalid-feedback @enderror" name="plot_width" id="plot_width" value="{{ old('plot_width') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="plot_width_unit" id="plot_width_unit" class="form-control">
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
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="1" name="corner_plot">This is Corner Plot 
            </label>
        </div>
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
                <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="available_date" width="175px">
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
                <input type="radio" class="form-check-input" id="show_rent1" name="show_rent_as" value="">
                <span id="rent_1"></span>
            </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" id="show_rent2" name="show_rent_as" value="">
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
            <input type="checkbox" name="ele_water_charges" class="form-check-input" value="1" checked>Electricity & Water charges excluded.
        </label>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Security Deposit Amount</label>
    </div>
    <div class="form-group col-md-6">
        <input type="text" name="security_amount" id="security_amount" class="form-control Stylednumber @error('security_amount') invalid-feedback @enderror" value="{{ old('security_amount') }}">
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
<hr>
<div class="form-group">
    <h6>Photos</h6>
</div>
<div class="form-group mt-3">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home5-tab" data-toggle="tab" href="#nav-home5" role="tab" aria-controls="nav-home5" aria-selected="true">Site View</a>
                    <a class="nav-item nav-link" id="nav-profile5-tab" data-toggle="tab" href="#nav-profile5" role="tab" aria-controls="nav-profile5" aria-selected="false">Master Plan</a>
                    <a class="nav-item nav-link" id="nav-contact5-tab" data-toggle="tab" href="#nav-contact5" role="tab" aria-controls="nav-contact5" aria-selected="false">Location Map</a>
                    <a class="nav-item nav-link" id="nav-others5-tab" data-toggle="tab" href="#nav-others5" role="tab" aria-controls="nav-others5" aria-selected="false">Others </a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home5" role="tabpanel" aria-labelledby="nav-home5-tab">
                    <div id="upload_form8">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                            <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile5" role="tabpanel" aria-labelledby="nav-profile5-tab">
                    <div id="upload_form9">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>      
                </div>
                <div class="tab-pane fade" id="nav-contact5" role="tabpanel" aria-labelledby="nav-contact5-tab">
                    <div id="upload_form10">
                        <label class="filelabel p_file">
                            <div class="icon">X</div>
                            <i class="fa fa-paperclip" id="icon1"></i>
                            <span class="title1">Add Photo</span>
                            <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                            <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-others5" role="tabpanel" aria-labelledby="nav-others5-tab">
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
    </div>
</div>
<hr>
<button type="button" id="showButton4" class="btn btn-primary">Continue & Next</button>
<div class="hidden" id="showDiv4">
    <div class="form-group">
        <h6>Additional Features</h6>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Overlooking</label>
        </div>
        <div class="form-group col-md-8">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                </label>
            </div>
        </div>
    </div>
    <div class="form-group waterStatus">
        <h6>Status of Water & Electricity</h6>
    </div>
    <div class="form-row">
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
        <label>Description <span class="text-danger">*</span><span class="text-danger" id="description_err" style="display: block;"></span></label>
        <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label>Land Mark</label>
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
    <button type="button" id="submitForm3" class="btn btn-primary">Post Your Add</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script>
$(function() {
  $(".sel-status").select2();
});
$(document).ready(function () {
    $('.ckeditor').ckeditor();
});
$('body').on('click', '#showButton4', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('#address').val();
  var any_construct = $("input[name='any_construc']:checked").val();
  var boundary_wall = $("input[name='boundry_wall']:checked").val();
  var plot_area = $('#plot_area').val();
  var plot_length = $('#plot_length').val();
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
  if(any_construct == null)
  {
    $("#construct_err").fadeIn().html("Required");
    setTimeout(function(){ $("#construct_err").fadeOut(); }, 3000);
    $("input[name='any_construc']").focus();
    return false;
  }
  if(boundary_wall == null)
  {
    $("#wall_err").fadeIn().html("Required");
    setTimeout(function(){ $("#wall_err").fadeOut(); }, 3000);
    $("input[name='boundry_wall']").focus();
    return false;
  }
  if(plot_area == '')
  {
    $("#plot_err").fadeIn().html("Required");
    setTimeout(function(){ $("#plot_err").fadeOut(); }, 3000);
    $("#plot_area").focus();
    return false;
  }
  if(plot_length == '')
  {
    $("#plot_length_err").fadeIn().html("Required");
    setTimeout(function(){ $("#plot_length_err").fadeOut(); }, 3000);
    $("#plot_length").focus();
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
    $("#showDiv4").removeClass("hidden");
    $("#showButton4").addClass("hidden");
  }
})

$('body').on('click', '#submitForm3', function () {
    var description = $('textarea#description').val();
    if(description == '')
    {
        $("#description_err").fadeIn().html("Required");
        setTimeout(function(){ $("#description_err").fadeOut(); }, 3000);
        $("textarea#description").focus();
        return false;
    }
    else{
        $("#property-form").submit();
    }
});
</script>