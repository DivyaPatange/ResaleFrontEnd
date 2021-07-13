<hr>
<div class="form-group">
    <h6>Property Feature</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Floors Allowed for construction</label>
        <select name="floor_constru" id="floor_constru" class="form-control @error('floor_constru') invalid-feedback @enderror">
            <option value="">-Select floors Allowed for construction-</option>
            @for($i=1; $i <= 201 ;$i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>
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
        <input type="text" class="form-control Stylednumber @error('width_of_road') invalid-feedback @enderror" name="width_of_road" value="{{ old('width_of_road') }}" placeholder="Meters">
    </div>
    <div class="form-group col-md-3">
        <select name="road_facing_unit" id="road_facing_unit" class="form-control sel-status @error('road_facing_unit') invalid-feedback @enderror">
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
<div class="form-group">
    <h6>Area</h6>
</div>
<div class="form-row">
    <div class="col-md-4">
        <label for="">Plot Area<span class="text-danger">*</span><span class="text-danger" id="plot_err"></span></label>
    </div>
    <div class="form-group col-md-4">
        <input type="number" id="plot_area" class="form-control @error('plot_area') invalid-feedback @enderror" name="plot_area" value="{{ old('plot_area') }}">
    </div>
    <div class="form-group col-md-4">
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
        <select name="plot_length_unit" id="plot_length_unit" class="form-control sel-status">
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
        <select name="plot_width_unit" id="plot_width_unit" class="form-control sel-status">
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
    <h6>Transaction Type/ Property Availability</h6>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="">Transaction Type <span class="text-danger">*</span><span class="text-danger" id="trans_err"></span></label>
    </div>
    <div class="form-group col-md-8">
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
<div class="form-group">
    <h6>Price Detail</h6>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="floor">Expected price<span class="text-danger">*</span><span class="text-danger" id="price_err"></span></label>
                <input type="text" id="total_price" name="total_price" class="form-control Stylednumber" onkeyup="convertNumberToWords(this.value)">
                <span id="show_price" class="text-muted"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Price per Sq.Ft.</label>
                <input type="text" name="price_per_sq_ft" class="form-control Stylednumber @error('price_per_sq') is-invalid @enderror" value="{{ old('price_per_sq') }}">
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
                    <input type="radio" class="form-check-input" id="show_rent1" name="show_price_as" value="">
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
                          <div id="upload_form11">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">
                                Add File
                              </span>
                              <input class="FileUpload1" id="FileInput" name="site_photos[]" type="file"/>
                              <img id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile5" role="tabpanel" aria-labelledby="nav-profile5-tab">
                          <div id="upload_form12">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
                              <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>      
                        </div>
                        <div class="tab-pane fade" id="nav-contact5" role="tabpanel" aria-labelledby="nav-contact5-tab">
                          <div id="upload_form13">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
                              <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                              <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                            </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-others5" role="tabpanel" aria-labelledby="nav-others5-tab">
                          <div id="upload_form14">
                            <label class="filelabel p_file">
                              <div class="icon">X</div>
                              <i class="fa fa-paperclip" id="icon1"></i>
                              <span class="title1">Add File</span>
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
                <button type="button" id="showButton3" class="btn btn-primary">Continue & Next</button>
                <div class="hidden" id="showDiv3">
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
                  <div class="form-group">
                    <h6>Ownership & Approvals</h6>
                  </div>
                  <div class="form-row">
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
                        <option value="NMRDA" @if(old('approved_by') == "NMRDA") Selected @endif>NMRDA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Description <span class="text-danger">*</span><span class="text-danger" id="description_err"></span></label>
                    <textarea class="form-control ckeditor @error('description') is-invalid @enderror" id="description"  name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Land Mark</label>
                    <input type="text" class="form-control @error('land_mark') is-invalid @enderror" id="land_mark"  name="land_mark" value="{{ old('land_mark') }}">
                    @error('land_mark')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <hr>
                  <button type="button" id="submitForm3" class="btn btn-primary">Post Your Add</button>
                </div>
              </div>