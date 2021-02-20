@extends('auth.property')
@section('property-form')
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
                    <label>Bedroom<span class="text-danger">*</span>
                    </label>
                  </div>
                  <div class="col-md-9">
                    <div class="switch-field">
                      <input type="radio" id="1" name="bedroom" value="1" @if(old('bedroom') == "1") checked @endif/>
                      <label for="1">1</label>
                      <input type="radio" id="2" name="bedroom" value="2" @if(old('bedroom') == "2") checked @endif/>
                      <label for="2">2</label>
                      <input type="radio" id="3" name="bedroom" value="3" @if(old('bedroom') == "3") checked @endif/>
                      <label for="3">3</label>
                      <input type="radio" id="4" name="bedroom" value="4" @if(old('bedroom') == "4") checked @endif/>
                      <label for="4">4</label>
                      <input type="radio" id="5" name="bedroom" value="5" @if(old('bedroom') == "5") checked @endif/>
                      <label for="5">5</label>
                    </div>
                  </div>
                </div>
                @error('bedroom')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                @error('balcony')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                @error('bathroom')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <hr>
              <div class="form-group">
                <h6>Floor</h6>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="floor">Property Floor No.</label>
                      <input type="number" name="property_floor_no" class="form-control @error('property_floor_no') is-invalid @enderror" value="{{ old('property_floor_no') }}">
                      @error('property_floor_no')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="floor">No. of Floor</label>
                      <input type="number" name="no_of_floor" class="form-control @error('no_of_floor') is-invalid @enderror" value="{{ old('no_of_floor') }}">
                      @error('no_of_floor')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label>Furnishing<span class="text-danger">*</span>
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
                @error('furnishing')
                <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <h6>Area</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="">Super Build Up Area<span class="text-danger">*</span></label>
                  @error('super_build_up_area')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <input type="number" class="form-control @error('super_build_up_area') invalid-feedback @enderror" name="super_build_up_area" value="{{ old('super_build_up_area') }}">
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
                  <label for="">Carpet Area <small>(Sq.ft.)</small></label>
                  @error('carpet_area')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <input type="number" id="carpet_area" class="form-control @error('carpet_area') invalid-feedback @enderror" name="carpet_area" value="{{ old('carpet_area') }}">
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
                  <input type="number" id="build_up_area" class="form-control @error('build_up_area') invalid-feedback @enderror" name="build_up_area" value="{{ old('build_up_area') }}">
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
              </div>
              <div class="form-group">
                <h6>Transaction Type/Property Availability</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="">Available From</label>
                </div>
                <div class="col-md-6 form-group">
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="available_from" value="Select Date">Select Date
                      <div class="hidden" id="showDateDiv">
                        <input type="date" class="form-control" name="available_date">
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
                  @error('age_of_construction')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <h6>Rent/Lease Detail</h6>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <label for="">Monthly Rent</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="monthly_rent" name="monthly_rent" onkeyup="show_price.innerHTML=convertNumberToWords(this.value)">
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
                        <input type="radio" class="form-check-input" name="show_rent_as" >
                        <span id="rent_1"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="show_rent_as" >
                        <span id="rent_2"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="show_rent_as">Call For Price
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="plus-minus">
                  <input type="checkbox" name="other_charges" id="a" class="css-checkbox">
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
                  <input type="number" class="form-control" name="security_amount">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Maintenance Charges</label>
                  <input type="number" name="maintenance_charge" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Per</label>
                  <select name="m_charges_per" id="" class="form-control">
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="One-Time">One-Time</option>
                    <option value="Per Sq. Unit Monthly">Per Sq. Unit Monthly</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Brokerage (Brokers Only)</label>
                </div>
                <div class="form-group col-md-6">
                  <select name="brokerage" id="" class="form-control">
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
                    <a class="nav-item nav-link" id="nav-floor-tab" data-toggle="tab" href="#nav-floor" role="tab" aria-controls="nav-about" aria-selected="false">Floor Plan</a>
                    <a class="nav-item nav-link" id="nav-master-tab" data-toggle="tab" href="#nav-master" role="tab" aria-controls="nav-about" aria-selected="false">Master Plan</a>
                    <a class="nav-item nav-link" id="nav-location-tab" data-toggle="tab" href="#nav-location" role="tab" aria-controls="nav-about" aria-selected="false">Location Map</a>
                    <a class="nav-item nav-link" id="nav-other-tab" data-toggle="tab" href="#nav-other" role="tab" aria-controls="nav-about" aria-selected="false">Others</a>
                  </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div id="upload_form">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="exterior_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div id="upload_form1">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="living_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div id="upload_form2">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="bedroom_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      <div id="upload_form3">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
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
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="kitchen_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-floor" role="tabpanel" aria-labelledby="nav-floor-tab">
                      <div id="upload_form5">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="floor_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-master" role="tabpanel" aria-labelledby="nav-master-tab">
                      <div id="upload_form6">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="master_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab">
                      <div id="upload_form7">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="location_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                      <div id="upload_form8">
                        <label class="filelabel p_file">
                          <div class="icon">X</div>
                          <i class="fa fa-paperclip" id="icon1">
                          </i>
                          
                          <span class="title1">
                              Add File
                          </span>
                          <input class="FileUpload1" id="FileInput" name="other_photos[]" type="file"/>
                          <img  id="frame1" style="max-width: 90px; max-height: 70px;" class="hidden">
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
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
                  @error('facing')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Overlooking <span class="text-danger">*</span></label>
                  <select name="overlooking" id="overlooking" class="form-control @error('overlooking') invalid-feedback @enderror">
                    <option value="">-Select Overlooking-</option>
                    <option value="Garden/Park" @if(old('overlooking') == "Garden/Park") Selected @endif>Garden/Park</option>
                    <option value="Pool" @if(old('overlooking') == "Pool") Selected @endif>Pool</option>
                    <option value="Main Road" @if(old('overlooking') == "Main Road") Selected @endif>Main Road</option>
                    <option value="Not Available" @if(old('overlooking') == "Not Available") Selected @endif>Not Available</option>
                  </select>
                  @error('overlooking')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Car Parking <span class="text-danger">*</span></label>
                  <select name="car_parking" id="car_parking" class="form-control @error('car_parking') invalid-feedback @enderror">
                    <option value="">-Select Car Parking-</option>
                    <option value="Covered" @if(old('car_parking') == "Covered") Selected @endif>Covered</option>
                    <option value="Open" @if(old('car_parking') == "Open") Selected @endif>Open</option>
                    <option value="None" @if(old('car_parking') == "None") Selected @endif>None</option>
                  </select>
                  @error('car_parking')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Lifts in the Tower </label>
                  <select name="car_parking" id="car_parking" class="form-control @error('lift_tower') invalid-feedback @enderror">
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
                  @error('lift_tower')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
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
                    <option value="24 hrs" @if(old('status_of_water') == "24 hrs") Selected @endif>24 hrs</option>
                    <option value="12 hrs" @if(old('status_of_water') == "12 hrs") Selected @endif>12 hrs</option>
                    <option value="6 hrs" @if(old('status_of_water') == "6 hrs") Selected @endif>6 hrs</option>
                    <option value="2 hrs" @if(old('status_of_water') == "2 hrs") Selected @endif>2 hrs</option>
                    <option value="1 hrs" @if(old('status_of_water') == "1 hrs") Selected @endif>1 hrs</option>
                  </select>
                  @error('status_of_water')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
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
                  @error('status_of_electricity')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <h6>Flooring & Aminities</h6>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Flooring</label>
                  <select name="flooring" id="flooring" class="form-control @error('flooring') invalid-feedback @enderror">
                    <option value="">-Select Flooring-</option>
                    <option value="Ceramic Tiles" @if(old('flooring') == "Ceramic Tiles") Selected @endif>Ceramic Tiles</option>
                    <option value="Marble" @if(old('flooring') == "Marble") Selected @endif>Marble</option>
                    <option value="Mosaic" @if(old('flooring') == "Mosaic") Selected @endif>Mosaic</option>
                    <option value="Vetrified" @if(old('flooring') == "Vetrified") Selected @endif>Vetrified</option>
                    <option value="Granite" @if(old('flooring') == "Granite") Selected @endif>Granite</option>
                    <option value="Marbonite" @if(old('flooring') == "Marbonite") Selected @endif>Marbonite</option>
                    <option value="Normal Tiles" @if(old('flooring') == "Normal Tiles") Selected @endif>Normal Tiles</option>
                    <option value="Kota Stone" @if(old('flooring') == "Kota Stone") Selected @endif>Kota Stone</option>
                    <option value="Wooden" @if(old('flooring') == "Wooden") Selected @endif>Wooden</option>
                  </select>
                  @error('flooring')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="">Aminities</label>
                  <select name="aminities" id="aminities" class="form-control @error('aminities') invalid-feedback @enderror">
                    <option value="">-Select Aminities-</option>
                    <!-- <option value="Air Conditioner" @if(old('aminities') == "Air Conditioner") Selected @endif>Air Conditioner</option> -->
                    <!-- <option value="Banquet Hall" @if(old('aminities') == "Banquet Hall") Selected @endif>Banquet Hall</option> -->
                    <!-- <option value="Bar/Lounge" @if(old('aminities') == "Bar/Lounge") Selected @endif>Bar/Lounge</option> -->
                    <!-- <option value="Cafeteria Food Court" @if(old('aminities') == "Cafeteria Food Court") Selected @endif>Cafeteria Food Court</option> -->
                    <!-- <option value="Club House" @if(old('aminities') == "Club House") Selected @endif>Club House</option> -->
                    <!-- <option value="Conference Room" @if(old('aminities') == "Conference Room") Selected @endif>Conference Room</option> -->
                    <!-- <option value="DTH Television Facility" @if(old('aminities') == "DTH Television Facility") Selected @endif>DTH Television Facility</option> -->
                    <option value="Gymnasium" @if(old('aminities') == "Gymnasium") Selected @endif>Gymnasium</option>
                    <!-- <option value="Intercom Facility" @if(old('aminities') == "Intercom Facility") Selected @endif>Intercom Facility</option> -->
                    <!-- <option value="Internet Wi-Fi Facility" @if(old('aminities') == "Internet Wi-Fi Facility") Selected @endif>Internet Wi-Fi Facility</option> -->
                    <option value="Jogging & Strolling Track" @if(old('aminities') == "Jogging & Strolling Track") Selected @endif>Jogging & Strolling Track</option>
                    <!-- <option value="Laundary Services" @if(old('aminities') == "Laundary Services") Selected @endif>Laundary Services</option> -->
                    <!-- <option value="Lift" @if(old('aminities') == "Lift") Selected @endif>Lift</option> -->
                    <!-- <option value="Maintenance Staff" @if(old('aminities') == "Maintenance Staff") Selected @endif>Maintenance Staff</option> -->
                    <!-- <option value="Outdoor Tennis Court" @if(old('aminities') == "Outdoor Tennis Court") Selected @endif>Outdoor Tennis Court</option> -->
                    <!-- <option value="Park" @if(old('aminities') == "Park") Selected @endif>Park</option> -->
                    <option value="Pipe Gas" @if(old('aminities') == "Pipe Gas") Selected @endif>Pipe Gas</option>
                    <option value="Power Back Up" @if(old('aminities') == "Power Back Up") Selected @endif>Power Back Up</option>
                    <!-- <option value="Private Terrace" @if(old('aminities') == "Private Terrace") Selected @endif>Private Terrace</option> -->
                    <!-- <option value="Garden" @if(old('aminities') == "Garden") Selected @endif>Garden</option> -->
                    <!-- <option value="RO Water System" @if(old('aminities') == "RO Water System") Selected @endif>RO Water System</option> -->
                    <!-- <option value="Rain Water Harvesting" @if(old('aminities') == "Rain Water Harvesting") Selected @endif>Rain Water Harvesting</option> -->
                    <option value="Reserve Parking Security" @if(old('aminities') == "Reserve Parking Security") Selected @endif>Reserve Parking Security</option>
                    <!-- <option value="Services/ Goods Lift" @if(old('aminities') == "Services/ Goods Lift") Selected @endif>Services/ Goods Lift</option> -->
                    <option value="Swimming Pool" @if(old('aminities') == "Swimming Pool") Selected @endif>Swimming Pool</option>
                    <!-- <option value="Vastu Compliment" @if(old('aminities') == "Vastu Compliment") Selected @endif>Vastu Compliment</option> -->
                    <!-- <option value="Visitors Parking" @if(old('aminities') == "Visitors Parking") Selected @endif>Visitors Parking</option> -->
                    <!-- <option value="Waste Disposal" @if(old('aminities') == "Waste Disposal") Selected @endif>Waste Disposal</option> -->
                    <!-- <option value="Water Storage" @if(old('aminities') == "Water Storage") Selected @endif>Water Storage</option> -->
                  </select>
                  @error('aminities')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <h6>Description & Landmarks</h6>
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" class="form-control"></textarea>
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
@endsection