@extends('auth.auth_layout.main')
@section('title', 'Property Rent Post')
@section('customcss')
<style>
    .owl-carousel .owl-item img{
        display: initial;
       width: unset;
    }
    h1,h2,h3,h4,h5,h6{
        font-family: 'Ionicons';
    }
    .table td, .table th {
    
    border-top: 0px solid #dee2e6;
    }
    .btn{
        padding: 10px 30px 10px 30px;
        float: right;
    }
    h2{
        font-size:25px;
    }
</style>
@endsection
@section('content')
<main id="main">
  <!-- ======= Property Single ======= -->
  <section class="property-single nav-arrow-b section-property section-t8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!--<div class="row">-->
                <!--    <div class="col-sm-12">-->
                <!--      <div class="title-box-d section-t4">-->
                <!--        <h2 class="title-d">@if($singlePost->project_name){{ $singlePost->project_name }} @endif</h2>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="row mt-3 p-3" style="box-shadow: 1px 2px 15px rgb(100 100 100 / 22%);font-size: 13px;">
                    <div class="col-md-4">
                        <h3 style="border-right: 1px solid #80808094;">
                             Rent : @if($singlePost->rent_as){{ $singlePost->rent_as }}@endif
                            
                        </h3>
                    </div>
                    <div class="col-md-8">
                       <!--<h3>@if($singlePost->project_name){{ $singlePost->project_name }} @endif</h3>-->
                        <h2>
                            @if($singlePost->bedroom){{ $singlePost->bedroom }} @endif BHK , 
                            @if($singlePost->carpet_area){{ $singlePost->carpet_area }} {{ $singlePost->carpet_unit }} @endif ,
                             @if($singlePost->type_id)
                                <?php
                                    $type = DB::table('types')->where('id', $singlePost->type_id)->first();
                                ?>
                                {{ $type->type_name }}
                             @endif
                             , @if($singlePost->locality){{ $singlePost->locality }} @endif
                        </h2>
                    </div>
                </div>
                <div class="row mt-3" style="box-shadow: 1px 2px 15px rgb(100 100 100 / 22%);font-size: 13px;">
                    <div class="col-md-4">
                        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property mb-0">
                            <?php
                                $photos = $singlePost->exterior_photos;
                                $explodePhotos = explode(",", $photos);
                               
                                // dd($explodeLiving == null);
                            ?>
                             @for($i= 0; $i < count($explodePhotos); $i++)
                                <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                    <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="First Slide" style="height: 350px;max-width: 100%;">
                                </div>
                            @endfor
                        </div>
                       
                        
                        
                    </div>
                    <div class="col-md-8">
                        <div class="container p-3">
                            <!--<h2 class="mt-3">Property Details</h2>-->
                            <div class="row">
                               @if($singlePost->bedroom)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Bedrooms</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->bedroom }}</p>
                                </div>
                                @endif
                                @if($singlePost->balcony)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Balcony</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->balcony }}</p>
                                </div>
                                @endif
                                
                                
                                @if($singlePost->bathroom)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Bathrooms</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->bathroom }}</p>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                @if($singlePost->super_area)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Super Build-Up Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->super_area }} {{ $singlePost->super_area_unit }}</p>
                                </div>
                                @endif
                                 @if($singlePost->build_area)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Build Up Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->build_area }} {{ $singlePost->build_unit }}</p>
                                </div>
                                @endif
                                @if($singlePost->carpet_area)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Carpet Area</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->carpet_area }} {{ $singlePost->carpet_unit }}</p>
                                </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                @if($singlePost->furnished_status)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Furnishing Status</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->furnished_status }}</p>
                                </div>
                                @endif
                                @if($singlePost->car_parking)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Car Parking</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->car_parking }}</p>
                                </div>
                                @endif
                                @if($singlePost->lift_in_tower)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Lifts in the Tower</p>
                                    <p class="mb-0 text-dark">{{ $singlePost-> lift_in_tower }}</p>
                                </div>
                                @endif
                               
                            </div>
                            <hr>
                            <div class="row">
                                @if($singlePost->property_floor_no)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Floor</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->property_floor_no }} (Out Of {{ $singlePost->total_floor }})</p>
                                </div>
                                @endif
                                @if($singlePost->facing)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Facing</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->facing }}</p>
                                </div>
                                @endif
                                @if($singlePost->overlooking)
                                <div class="col-md-4">
                                    <p class="text-muted mb-0" style="font-size:14px;">Overlooking</p>
                                    <p class="mb-0 text-dark">{{ $singlePost->overlooking }}</p>
                                </div>
                                @endif
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#exampleModalCenter">Contact Bulder</button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property mb-0">
                            <?php
                                $photos = $singlePost->exterior_photos;
                                $explodePhotos = explode(",", $photos);
                               
                                // dd($explodeLiving == null);
                            ?>
                             @for($i= 0; $i < count($explodePhotos); $i++)
                                <div class="carousel-item @if($i == 0) active @endif" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                                    <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="First Slide" style="max-height: 350px;max-width: 100%;">
                                </div>
                            @endfor
                        </div>
                      
                        <!--<div class="container p-3 mt-3" style="box-shadow: 1px 2px 15px rgb(100 100 100 / 22%);font-size: 13px;">-->
                        
                        <!--    <div class="row">-->
                        <!--        <div class="col-md-12">-->
                        <!--            <p><b>Property Specification</b></p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    @if($singlePost->overlooking)-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-md-3">Overlooking</div>-->
                        <!--        <div class="col-md-9">{{ $singlePost->overlooking }}</div>-->
                        <!--    </div>-->
                        <!--    <hr>-->
                        <!--    @endif-->
                        <!--    @if($singlePost->furnished_status)-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-md-3">Furnishing</div>-->
                        <!--        <div class="col-md-9">{{ $singlePost->furnished_status }}</div>-->
                        <!--    </div>-->
                        <!--    <hr>-->
                        <!--    @endif-->
                        <!--    @if($singlePost->ownership_approval)-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-md-3">Type of Ownership</div>-->
                        <!--        <div class="col-md-9">{{ $singlePost->ownership_approval }}</div>-->
                        <!--    </div>-->
                        <!--    <hr>-->
                        <!--    @endif-->
                            
                        <!--</div>-->
                        <div class="container p-3 mt-3" style="box-shadow: 1px 2px 15px rgb(100 100 100 / 22%);font-size: 13px;">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <p><b>Description</b></p>
                                    {!! $singlePost->description !!}
                                </div>
                            </div>
                            @if($singlePost->rent_as)
                            <div class="row">
                                <div class="col-md-3">Rent</div>
                                <div class="col-md-9">&#8377;{{ $singlePost->rent_as }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->maintenance_charge)
                            <div class="row">
                                <div class="col-md-3">Maintanance</div>
                                <div class="col-md-9">&#8377; {{ $singlePost->maintenance_charge }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->security_amount)
                            <div class="row">
                                <div class="col-md-3">Security/Deposit Amount</div>
                                <div class="col-md-9">&#8377; {{ $singlePost->security_amount }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->address)
                            <div class="row">
                                <div class="col-md-3">Address</div>
                                <div class="col-md-9">{{ $singlePost->address }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->locality)
                            <div class="row">
                                <div class="col-md-3">Locality</div>
                                <div class="col-md-9">{{ $singlePost->locality }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->landmark)
                            <div class="row">
                                <div class="col-md-3">Landmark</div>
                                <div class="col-md-9">{{ $singlePost->landmark }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->tenants_non_veg)
                            <div class="row">
                                <div class="col-md-3">Tenants who are Non Vegetarians</div>
                                <div class="col-md-9">{{ $singlePost->tenants_non_veg }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->tenants_pets)
                            <div class="row">
                                <div class="col-md-3">Tenants with Pets</div>
                                <div class="col-md-9">{{ $singlePost->tenants_pets }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->tenants_company_lease)
                            <div class="row">
                                <div class="col-md-3">Tenants without Company Lease</div>
                                <div class="col-md-9">{{ $singlePost->tenants_company_lease }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->add_rooms)
                            <div class="row">
                                <div class="col-md-3">Additional Rooms</div>
                                <div class="col-md-9">{{ $singlePost->add_rooms }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->entrance_width)
                            <div class="row">
                                <div class="col-md-3">Entrance Width</div>
                                <div class="col-md-9">{{ $singlePost->entrance_width }} {{ $singlePost->entrance_width_unit }}</div>
                            </div>
                            <hr>    
                            @endif
                            @if($singlePost->width_facing_road)
                            <div class="row">
                                <div class="col-md-3">Width of Facing Road</div>
                                <div class="col-md-9">{{ $singlePost->width_facing_road }} {{ $singlePost->width_facing_road_unit }}</div>
                            </div>
                            <hr> 
                            @endif
                            @if($singlePost->available_from)
                            <div class="row">
                                <div class="col-md-3">Available From</div>
                                <div class="col-md-9">{{ $singlePost->available_from }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->age_of_construction)
                            <div class="row">
                                <div class="col-md-3">Age of Construction</div>
                                <div class="col-md-9">{{ $singlePost->age_of_construction }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->status_of_water)
                            <div class="row">
                                <div class="col-md-3">Status of Water</div>
                                <div class="col-md-9">{{ $singlePost->status_of_water }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->status_of_electricity)
                            <div class="row">
                                <div class="col-md-3">Status of Electricity</div>
                                <div class="col-md-9">{{ $singlePost->status_of_electricity }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->lift_in_tower)
                            <div class="row">
                                <div class="col-md-3">Lifts in the Tower</div>
                                <div class="col-md-9">{{ $singlePost->lift_in_tower }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->mul_unit_avail)
                            <div class="row">
                                <div class="col-md-3">Multiple Units Available</div>
                                <div class="col-md-9">{{ $singlePost->mul_unit_avail }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->owner_resides)
                            <div class="row">
                                <div class="col-md-3">Owner's Residence</div>
                                <div class="col-md-9">{{ $singlePost->owner_resides }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->flooring)
                            <div class="row">
                                <div class="col-md-3">Flooring</div>
                                <div class="col-md-9">{{ $singlePost->flooring }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost->aminities)
                            <div class="row">
                                <div class="col-md-3">Amenities</div>
                                <div class="col-md-9">{{ $singlePost->aminities }}</div>
                            </div>
                            <hr>
                            @endif
                            @if($singlePost-> listed_by)
                            <div class="row">
                                <div class="col-md-3">Agent Brokarage </div>
                                <div class="col-md-9">{{ $singlePost-> listed_by }}</div>
                            </div>
                            <hr>
                            @endif
                            <!--@if($singlePost->flooring)-->
                            <!--<div class="row">-->
                            <!--    <div class="col-md-3">Flooring</div>-->
                            <!--    <div class="col-md-9">{{ $singlePost->flooring }}</div>-->
                            <!--</div>-->
                            <!--<hr>-->
                            <!--@endif-->
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
  </section><!-- End Property Single-->
  

</main><!-- End #main -->

@endsection
@section('customjs')

@endsection
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>