<div class="form-group">
    <h6>Property Feature</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">No. of Open Side</label>
        <select name="no_of_open_side" id="no_of_open_side" class="form-control @error('no_of_open_side') invalid-feedback @enderror">
            <option value="">-Select No. of Open Side-</option>
            <option value="1" @if(old('no_of_open_side') == "1") Selected @endif>1</option>
            <option value="2" @if(old('no_of_open_side') == "2") Selected @endif>2</option>
            <option value="3" @if(old('no_of_open_side') == "3") Selected @endif>3</option>
            <option value="4" @if(old('no_of_open_side') == "4") Selected @endif>4</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Width of Road facing the Plot</label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="road_facing_unit" id="road_facing_unit" class="form-control @error('road_facing_unit') invalid-feedback @enderror">
            <option value="Meter">Meter</option>
            <option value="Feet">Feet</option>
        </select>
    </div>
</div> 
<div class="form-row">
    <div class="col-md-5 form-group">
        <label for="">Bondary wall Made<span class="text-danger">*</span><span class="text-danger" id="wall_err"></span></label>
    </div>
    <div class="col-md-7 form-group">
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
<div class="form-group">
    <h6>Area</h6>
</div>
<div class="form-row">
    <div class="col-md-5 form-group">
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
        <label for="">Land Length<span class="text-danger">*</span><span class="text-danger" id="length_err"></span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" class="form-control Stylednumber @error('land_length') invalid-feedback @enderror" id="land_length" name="land_length" value="{{ old('land_length') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="land_length_unit" id="land_length_unit" class="form-control">
            <option value="Acre">Acre</option>
            <option value="Bigha">Bigha</option>
            <option value="Guntha">Guntha</option>
        </select>
    </div>
    <div class="col-md-5 form-group">
        <label for="">Land Breadth <span class="text-danger">*</span><span class="text-danger" id="breadth_err"></span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="text" id="land_breadth" class="form-control Stylednumber @error('land_breadth') invalid-feedback @enderror" name="land_breadth" value="{{ old('land_breadth') }}">
    </div>
    <div class="form-group col-md-3">
        <select name="land_breadth_unit" id="land_breadth_unit" class="form-control">
            <option value="Acre">Acre</option>
            <option value="Bigha">Bigha</option>
            <option value="Guntha">Guntha</option>
        </select>
    </div>
</div>
<div class="form-group">
    <h6>Transaction Type/ Property Availability</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Transaction Type <span class="text-danger">*</span><span class="text-danger" id="trans_type_err"></span></label>
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
<div class="form-group">
    <h6>Price Detail</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_price">Expected price <span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                <input type="text" name="total_price" id="total_price" class="form-control Stylednumber @error('expected_price') is-invalid @enderror" value="{{ old('expected_price') }}" onkeyup="convertNumberToWords(this.value)">
                <span id="show_price" class="text-muted"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price_per_sq_ft">Price per sq.ft.</label>
                <input type="text" name="price_per_sq_ft" id="price_per_sq_ft" readonly class="form-control @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
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
    <div class="form-group col-md-5">
        <label for="">Other Charges</label>
    </div>
    <div class="form-group col-md-7">
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
<div class="form-group">
    <h6>Photos</h6>
</div>
<div class="form-group">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home6-tab" data-toggle="tab" href="#nav-home6" role="tab" aria-controls="nav-home6" aria-selected="true">Site View</a>
            <a class="nav-item nav-link" id="nav-profile6-tab" data-toggle="tab" href="#nav-profile6" role="tab" aria-controls="nav-profile6" aria-selected="false">Location Map</a>
            <a class="nav-item nav-link" id="nav-contact6-tab" data-toggle="tab" href="#nav-contact6" role="tab" aria-controls="nav-contact6" aria-selected="false">Master Plan</a>
            <a class="nav-item nav-link" id="nav-about6-tab" data-toggle="tab" href="#nav-about6" role="tab" aria-controls="nav-about6" aria-selected="false">Others</a>
        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home6" role="tabpanel" aria-labelledby="nav-home6-tab">
            <div id="upload_form5">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile6" role="tabpanel" aria-labelledby="nav-profile6-tab">
            <div id="upload_form7">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact6" role="tabpanel" aria-labelledby="nav-contact6-tab">
            <div id="upload_form6">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-about6" role="tabpanel" aria-labelledby="nav-about6-tab">
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
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label>Overlooking</label>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="overlooking[]" value="Main Road">Main Road
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="overlooking[]" value="Not Available">Not Available
                </label>
            </div>
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
            <label for="">Project Rera ID</label>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="rera_id">
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
    <div class="form-group">
        <h6>Ownership & Approvals</h6>
    </div>
    <div class="form-row mb-3">
        <div class="form-group col-md-6">
            <label for="">Ownership Status</label>
            <select name="ownership_approval" id="ownership_approval" class="form-control @error('ownership_approval') invalid-feedback @enderror">
                <option value="">-Select Ownership Approval-</option>
                <option value="Freehold" @if(old('ownership_approval') == "Freehold") Selected @endif>Freehold</option>
                <option value="Leasehold" @if(old('ownership_approval') == "Leasehold") Selected @endif>Leasehold</option>
                <option value="Power of Attorney" @if(old('ownership_approval') == "Power of Attorney") Selected @endif>Power of Attorney</option>
                <option value="Co-Operative Society" @if(old('ownership_approval') == "Co-Operative Society") Selected @endif>Co-Operative Society</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">Approved By</label>
            <select name="approved_by" id="approved_by" class="form-control @error('approved_by') invalid-feedback @enderror">
                <option value="">-Select Approved By-</option>
                <option value="NMRDA">NMRDA</option>
                <option value="Metropolitan Region">Metropolitan Region</option>
                <option value="Development Authority">Development Authority</option>
                <option value="Developer">Developer</option>
                <option value="RWA/Co-Operative Housing Society">RWA/Co-Operative Housing Society</option>
                <option value="City Muncipal Corporation">City Muncipal Corporation</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Description <span class="text-danger">*</span><span class="text-danger" id="description_err"></span></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
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

$(document).on("change keyup blur", "#total_price", function() {
    var plot_area = $('#plot_area').val();
    var total_price = $('#total_price').val();
    var total_price1 = total_price.replace(/,/g, "");
    // alert(plot_area);
    if(plot_area != ""){
        var dec = (total_price1 / plot_area).toFixed(2); //its convert 10 into 0.10
        // alert(dec);
        $('#price_per_sq_ft').val(dec);
    }
});
$('body').on('click', '#showButton', function () {
    var listed_by = $('input[name="listed_by"]:checked').val();
    var city = $('#search-box').val();
    var locality = $('#locality').val();
    var address = $('#address').val();
    var boundry_wall = $("input[name='boundry_wall']:checked").val();
    var plot_area = $('#plot_area').val();
    var land_length = $('#land_length').val();
    var land_breadth = $('#land_breadth').val();
    var transaction_type = $("input[name='transaction_type']:checked").val();
    var total_price = $("#total_price").val();
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
    if(boundry_wall == null)
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
    if(land_length == '')
    {
        $("#length_err").fadeIn().html("Required");
        setTimeout(function(){ $("#length_err").fadeOut(); }, 3000);
        $("#land_length").focus();
        return false;
    }
    if(land_breadth == '')
    {
        $("#breadth_err").fadeIn().html("Required");
        setTimeout(function(){ $("#breadth_err").fadeOut(); }, 3000);
        $("#land_breadth").focus();
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