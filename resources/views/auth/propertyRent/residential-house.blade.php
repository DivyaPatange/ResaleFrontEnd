<div class="form-row">
    <div class="col-md-6 form-group">
    <label for="">Name of Project Society<span class="text-danger">*</span><span  style="color:red" id="project_name_err"> </span></label>
    <input type="text" name="project_name" class="form-control" id="project_name">
    </div>
    <div class="form-group col-md-6">
    </div>
</div>
<div class="form-group">
    <h6>Property Feature</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-3">
            <label>Bedroom<span class="text-danger">*</span><span  style="color:red" id="bedroom_err"> </span>
            </label>
        </div>
        <div class="col-md-9">
            <div class="switch-field">
            @for($i=1; $i<21; $i++)
            <input type="radio" id="{{ $i }}" name="bedroom" value="{{ $i }}" @if(old('bedroom') == $i) checked @endif/>
            <label for="{{ $i }}">{{ $i }}</label>
            @endfor
            <!--<input type="radio" id="2" name="bedroom" value="2" @if(old('bedroom') == "2") checked @endif/>-->
            <!--<label for="2">2</label>-->
            <!--<input type="radio" id="3" name="bedroom" value="3" @if(old('bedroom') == "3") checked @endif/>-->
            <!--<label for="3">3</label>-->
            <!--<input type="radio" id="4" name="bedroom" value="4" @if(old('bedroom') == "4") checked @endif/>-->
            <!--<label for="4">4</label>-->
            <!--<input type="radio" id="5" name="bedroom" value="5" @if(old('bedroom') == "5") checked @endif/>-->
            <!--<label for="5">5</label>-->
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
    <div class="col-md-3">
        <label>Balcony <span class="text-danger">*</span></label>
    </div>
    <div class="col-md-9">
        <div class="switch-field">
        <input type="radio" id="balcony1" name="balcony" value="1" @if(old('balcony') == "1") checked @endif/>
        <label for="balcony1">1</label>
        <input type="radio" id="balcony2" name="balcony" value="2" @if(old('balcony') == "2") checked @endif/>
        <label for="balcony2">2</label>
        <input type="radio" id="balcony3" name="balcony" value="3" @if(old('balcony') == "3") checked @endif/>
        <label for="balcony3">3</label>
        <input type="radio" id="balcony4" name="balcony" value="4" @if(old('balcony') == "4") checked @endif/>
        <label for="balcony4">4</label>
        <input type="radio" id="balcony5" name="balcony" value="5" @if(old('balcony') == "5") checked @endif/>
        <label for="balcony5">5</label>
        </div>
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-3">
            <label>Bathroom <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9">
            <div class="switch-field">
                <input type="radio" id="inlineRadio1" name="bathroom" value="1" @if(old('bathroom') == "1") checked @endif/>
                <label for="inlineRadio1">1</label>
                <input type="radio" id="inlineRadio2" name="bathroom" value="2" @if(old('bathroom') == "2") checked @endif/>
                <label for="inlineRadio2">2</label>
                <input type="radio" id="inlineRadio3" name="bathroom" value="3" @if(old('bathroom') == "3") checked @endif/>
                <label for="inlineRadio3">3</label>
                <input type="radio" id="inlineRadio4" name="bathroom" value="4" @if(old('bathroom') == "4") checked @endif/>
                <label for="inlineRadio4">4</label>
                <input type="radio" id="inlineRadio5" name="bathroom" value="5" @if(old('bathroom') == "5") checked @endif/>
                <label for="inlineRadio5">5</label>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <h6>Floor</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="floor">Property Floor No.<span  style="color:red" id="floor_err"> </span></label>
                <select name="property_floor_no" class="form-control sel-status @error('property_floor_no') is-invalid @enderror" id="property_floor_no" style="width:100%">
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
                <label for="floor">No. of Floor<span  style="color:red" id="total_floor_err"> </span></label>
                <select name="total_floor" id="no_of_floor" class="form-control sel-status @error('total_floor') is-invalid @enderror" style="width:100%;">
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
<div class="form-group">
    <div class="row">
        <div class="col-md-3">
            <label>Furnishing<span class="text-danger">*</span><span  style="color:red" id="furnishing_err"> </span>
            </label>
        </div>
        <div class="col-md-9">
            <div class="switch-field">
                <input type="radio" id="Furnished" name="furnishing" value="Furnished" @if(old('furnishing') == "Furnished") checked @endif/>
                <label for="Furnished">Furnished</label>
                <input type="radio" id="Semi-Furnished" name="furnishing" value="Semi-Furnished" @if(old('furnishing') == "Semi-Furnished") checked @endif/>
                <label for="Semi-Furnished">Semi-Furnished</label>
                <input type="radio" id="Unfurnished" name="furnishing" value="Unfurnished" @if(old('furnishing') == "Unfurnished") checked @endif/>
                <label for="Unfurnished">Unfurnished</label>
            </div>
        </div>
    </div>
</div>
<div class="form-row hidden" id="showFurnishedDiv">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>AC</label>
                <select name="ac" class="form-control" id="ac">
                    <option value="">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3+">3+</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bed</label>
                <select name="bed" class="form-control" id="bed">
                    <option value="">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3+">3+</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Wardrobe</label>
                <select name="wardrobe" class="form-control" id="wardrobe">
                    <option value="">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3+">3+</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>TV</label>
                <select name="tv" class="form-control" id="tv">
                    <option value="">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3+">3+</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Fridge">Fridge
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Sofa">Sofa
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Washing Machine">Washing Machine
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Dining Table">Dining Table
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Microwave">Microwave
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-check-inline mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="furnished_detail[]" value="Gas Connection">Gas Connection
                </label>
            </div>
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
        <input type="text" class="form-control Stylednumber" name="super_build_up_area" id="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
        @error('build_up_area')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="">Plot Area<span class="text-danger">*</span><span  style="color:red" id="plot_err"> </span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="number" class="form-control" name="plot_area" id="plot_area" value="{{ old('plot_area') }}">
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
    <div class="form-group col-md-5">
        <label for="">Plot Length <span  style="color:red" id="plot_length_err"> </span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="number" class="form-control" name="plot_length" id="plot_length" value="{{ old('plot_length') }}">
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
        <label for="">Plot Width <span  style="color:red" id="plot_width_err"> </span></label>
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
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Exterior View</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Living Room</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Bedroom</a>
        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Bathrooms</a>
        <a class="nav-item nav-link" id="nav-kitchen-tab" data-toggle="tab" href="#nav-kitchen" role="tab" aria-controls="nav-about" aria-selected="false">Kitchen</a>
        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div id="upload_form1">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>     
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="living_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div id="upload_form2">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>                
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="bedroom_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            <div id="upload_form3">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>                    
                    <span class="title1">
                        Add Photo
                    </span>
                    <input class="FileUpload1" id="FileInput" name="bathroom_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-kitchen" role="tabpanel" aria-labelledby="nav-kitchen-tab">
            <div id="upload_form4">
                <label class="filelabel p_file">
                    <div class="icon">X</div>
                    <i class="fa fa-paperclip" id="icon1"></i>                
                    <span class="title1">Add Photo</span>
                    <input class="FileUpload1" id="FileInput" name="kitchen_photos[]" type="file"/>
                    <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                </label>
            </div>
        </div>
    </div>
</div>
<button type="button" id="showButton1" class="btn btn-primary">Continue & Next</button>
<div class="hidden" id="showDiv1">
    <div class="form-group">
        <h6>Tenants Tou Prefer</h6>
    </div>
    <div class="form-group">
        <label for="">Tenants who are Bachelors</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_bachelor" value="Yes">Yes
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_bachelor" value="No">No
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_bachelor" value="Doesn't Matter">Doesn't Matter
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Tenants who are Non Vegetarians</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_non_veg" value="Yes">Yes
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_non_veg" value="No">No
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_non_veg" value="Doesn't Matter">Doesn't Matter
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Tenants with Pets</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_pets" value="Yes">Yes
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_pets" value="No">No
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_pets" value="Doesn't Matter">Doesn't Matter
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Tenants without Company Lease</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_company_lease" value="Yes">Yes
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_company_lease" value="No">No
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="tenants_company_lease" value="Doesn't Matter">Doesn't Matter
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6>Additional Features</h6>
    </div>
    <div class="form-group">
        <label for="">Additional Rooms</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="add_room[]" value="Pooja Room">Pooja Room
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="add_room[]" value="Study">Study
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="add_room[]" value="Store">Store
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="add_room[]" value="Servant Room">Servant Room
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="add_room[]" value="None of these">None of these
                </label>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Facing <span class="text-danger">*</span></label>
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
            <label for="">Lifts in the Tower </label>
            <select name="lift_in_tower" id="lift_in_tower" class="form-control @error('lift_tower') invalid-feedback @enderror">
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
    <div class="form-group">
        <h6>Overlooking</h6>
    </div>
    <div class="form-row">
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
    <div class="form-row">
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
    <div class="form-row">
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
    <div class="form-group">
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
        <h6>Flooring</h6>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Ceramic Tiles">Ceramic Tiles
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Marble">Marble
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Mosaic">Mosaic
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Vetrified">Vetrified
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Granite">Granite
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Marbonite">Marbonite
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Normal Tiles">Normal Tiles
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Kota Stone">Kota Stone
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="flooring[]" value="Wooden">Wooden
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6>Amenities</h6>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Gymnasium">Gymnasium
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Jogging & Strolling Track">Jogging & Strolling Track
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
                    <input type="checkbox" class="form-check-input" name="aminities[]" value="Reserve Parking Security">Reserve Parking Security
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
    </div>
    <div class="form-group">
        <h6>Description & Landmarks</h6>
    </div>
    <div class="form-group">
        <label for="">Description<span  style="color:red" id="description_err"> </span></label>
        <textarea name="description" id="description" class="form-control ckeditor"></textarea>
    </div>
    <div class="form-group">
        <label for="">Landmark</label>
        <input type="text" name="landmark" class="form-control">
    </div>
    <div class="form-group">
    <h6>Owner's Residence</h6>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Owner Resides in</label>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="owner_resides" value="Same Premise">Same Premise
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="owner_resides" value="Away">Away
                </label>
            </div>
        </div>
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
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
    <button type="button" id="submitForm" class="btn btn-primary">Post Your Add</button>
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
$('body').on('click', '#showButton1', function () {
  var listed_by = $('input[name="listed_by"]:checked').val();
  var city = $('#search-box').val();
  var locality = $('#locality').val();
  var address = $('#address').val();
  var project_name = $('#project_name').val();
  var bedroom = $("input[name='bedroom']:checked").val();
  var property_floor_no = $('#property_floor_no').val();
  var no_of_floor = $('#no_of_floor').val();
  var furnishing = $("input[name='furnishing']:checked").val();
  var super_build_up_area = $('#super_build_up_area').val();
  var available_from = $("input[name='available_from']:checked").val();
  var monthly_rent = $('#monthly_rent').val();
  var plot_area = $("#plot_area").val(); 
  var plot_length = $("#plot_length").val();
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
  if(bedroom == null)
  {
    $("#bedroom_err").fadeIn().html("Required");
    setTimeout(function(){ $("#bedroom_err").fadeOut(); }, 3000);
    $("input[name='bedroom']").focus();
    return false;
  }
  if(property_floor_no == '')
  {
    $("#floor_err").fadeIn().html("Required");
    setTimeout(function(){ $("#floor_err").fadeOut(); }, 3000);
    $("#property_floor_no").focus();
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
    $("#showDiv1").removeClass("hidden");
    $("#showButton1").addClass("hidden");
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
  $("#property-form").submit();
});
</script>