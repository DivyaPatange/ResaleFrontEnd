@extends('auth.auth_layout.main')
@section('title', 'Car Post')
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
    .card {
        border: 3px solid rgba(0,0,0,.125);
        border-radius: 20px;
   }
   h4{
       height:30px;
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
                <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d pt-3 pb-1 mb-0">
                        <h2 class="title-d ml-4">{{ $singlePost->ad_title }}</h2>
                      </div>
                    </div>
                </div>
                <div class="row m-3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                    <div class="col-md-7  section-md-t3 mt-4">
                        <div id="property-single-carousel" class="owl-carousel owl-arrow ">
                          <?php
                              $photos = $singlePost->photos;
                              $explodePhotos = explode(",", $photos);
                              // dd($explodePhotos);
                            ?>
                            @for($i= 0; $i < count($explodePhotos); $i++)
                              <div class="carousel-item-b" style="height: 450px;width: 100%;text-align: center;background-color: whitesmoke;">
                                <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="" style="max-height: 450px;max-width: 100%;">
                              </div>
                            @endfor
                        </div>
                       
                    </div>
                    <div class="col-md-5 section-md-t3 mt-4">
                    <div class="property-summary">
                    <div class="card m-0" style="height:200px;font-size: 13px">
                        <div class="card-body">
                             <p class="float-right text-info"><i class='far fa-calendar-alt text-danger pr-2'></i>{{ date('j F',strtotime($singlePost->created_at)) }}</p>
                             <h4><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</h4>
                            
                             <p>&nbsp;&nbsp;
                            @if($singlePost->brand_id)
                   
                                  <?php
                                    $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                                  ?>
                                  
                                     @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                            @endif
                                
                            @if($singlePost->model_id)
                    
                                  <?php
                                    $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                                  ?>
                                    {{ $modelName->model_name }}
                            @endif
                            
                            @if($singlePost->car_varient)
                    
                                  <?php
                                    $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                                  ?>
                                    {{ $varients->car_varient }}
                            @endif
                            
                            @if($singlePost->colour)
                    
                            {{ $singlePost->colour }}
                            @endif<br>
                            
                              <i class="fa fa-road text-danger p-2"></i>{{ $singlePost->year_of_registration }}&nbsp;&nbsp;<i class="fa fa-dashboard text-danger p-2"></i>{{ $singlePost->kms_driven }}&nbsp;&nbsp;KMS <i class='fas fa-gas-pump text-danger p-2'></i>{{ $singlePost->fuel_type }}<br>
                             
                               
                              <p  class="float-right text-info"><i class="fa fa-map-marker text-danger p-2"></i>
                              @if($singlePost->city_id)
                    
                                  <?php
                                    $city = DB::table('cities')->where('id', $singlePost->city_id)->first();
                                  ?>
                                    {{ $city->city_name }}
                            @endif
                            ,
                             @if($singlePost->state_id)
                    
                                  <?php
                                    $stat = DB::table('states')->where('id', $singlePost->state_id)->first();
                                  ?>
                                    {{ $stat->state_name }}
                            @endif
                            </p>
                              <br>
                           
                                @if($singlePost->accessory_type)  
                                    
                                    <?php
                                        $type = DB::table('types')->where('id', $singlePost->accessory_type)->first();
                                    ?>
                                      {{ $type->type_name }}</p>
                                @endif
                           
                           <!--<button type="button" class="btn btn-primary">Call</button>-->
                        </div>
                    </div>
                    <div class="card mt-3" style="height:234px">
                        <div class="card-body">
                            <div class="property-description text-center">
                                 
                                <h4 class="title-d mb-5 ">
                                    <img src="{{asset('assets/img/user.png') }}" class="" style="width:40px">
                                    Seller description &nbsp;&nbsp;&nbsp;
                                    <i class='far fa-arrow-alt-circle-right mt-1' style='font-size:25px'></i>
                                    
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row mt-3">-->
                    <!--    <div class="col-md-4 text-right">-->
                    <!--         <i class='far fa-comments' style="font-size: 40px;-->
                    <!--            color: white;-->
                    <!--            background-color: #007bff;-->
                    <!--            padding: 20px 15px 0px 0px;-->
                    <!--            border-radius: 47px;-->
                    <!--            width: 80%;-->
                    <!--            height: 80px;"></i>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-8 text-left">-->
                    <!--             <button type="button" class="btn btn-primary" style="border-radius: 30px;width:100%;position: absolute;top: 13px; right:30px">Chat With Seller</button>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="row mt-3">-->
                    <!--    <div class="col-md-8 text-right">-->
                    <!--             <button type="button" class="btn btn-primary" style="border-radius: 30px;width:100%;position: absolute;top: 13px; left:30px">Make An Offer</button>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-4 text-left">-->
                    <!--         <i class='fa fa-gift' style="font-size: 40px;-->
                    <!--            color: white;-->
                    <!--            background-color: #007bff;-->
                    <!--            padding: 20px 0px 0px 18px;-->
                    <!--            border-radius: 47px;-->
                    <!--            width: 80%;-->
                    <!--            height: 80px;"></i>-->
                    <!--    </div>-->
                        
                    <!--</div>-->
            
                </div>
                </div>
                </div>
                <div class="container-fluid p-0">
                    <div class="row m-3">
                        <div class="col-md-8  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                            <h4 class="mb-2 pt-2">Product Details</h4>
                            <div class="row">
                                <div class="col-md-6" style="border-right: 1px solid #80808040">
                                    <table class="table table-responsive">
                        <tbody style="font-size: 13px;">
                          <tr>
                            <td>Brand Name</td>
                            <th>
                                @if($singlePost->brand_id)
                   
                                  <?php
                                    $brand = DB::table('brands')->where('id', $singlePost->brand_id)->first();
                                  ?>
                                  
                                     @if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif
                                @endif
                                
                            </th>
                            
                          </tr>
                          <tr>
                            <td>Model Name</td>
                            <th>
                                @if($singlePost->model_id)
                    
                                  <?php
                                    $modelName = DB::table('models')->where('id', $singlePost->model_id)->first();
                                  ?>
                                     {{ $modelName->model_name }}
                                @endif
                            </th>
                            </tr>
                            <tr>
                                <td>Car varient</td>
                                  <th>
                                    @if($singlePost->car_varient)
        
                                          <?php
                                            $varients = DB::table('car_varients')->where('id', $singlePost->car_varient)->first();
                                          ?>
                                            {{ $varients->car_varient }}
                                    @endif
                
                                 
                                  </th>
                            </tr>
                          <tr>
                            <td>Year of Registration</td>
                            <th>
                            @if($singlePost->year_of_registration)
                    
                                {{ $singlePost->year_of_registration }}
                    
                            @endif
                            </th>
                           
                          </tr>
                          <tr>
                              <td>No. of Owners</td>
                              <th>
                              @if($singlePost->no_of_owners)
                    
                                {{ $singlePost->no_of_owners }}
                               @endif
                              </th>
                              
                          </tr>
                          <tr>
                              
                          </tr>
                        </tbody>
                      </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-responsive">
                                        <tbody style="font-size: 13px;">
                                          <tr>
                                            <td>Fuel Type</td>
                                            <th>
                                            @if($singlePost->fuel_type)
                                    
                                                {{ $singlePost->fuel_type }}
                                            @endif
                                            </th>
                                            
                                          </tr>
                                          <tr>
                                            
                                            <td>Transmission</td>
                                            <th>
                                            @if($singlePost->transmission)
                                    
                                                {{ $singlePost->transmission }}
                                      
                                            @endif
                                            </th>
                                          </tr>
                                          <tr>
                                          
                                            <td>KMS Driven</td>
                                            <th>
                                            @if($singlePost->kms_driven)
                                    
                                                {{ $singlePost->kms_driven }}
                                            @endif
                                            </th>
                                          </tr>
                                          <tr>
                                              
                                              <td>Colour</td>
                                              <th>
                                              @if($singlePost->colour)
                                    
                                                {{ $singlePost->colour }}
                                              @endif
                                              </th>
                                          </tr>
                                        <tr>
                                            <td>Insurance</td>
                                              <th>
                                                @if($singlePost->insurance)
                                    
                                                    {{ $singlePost->insurance }}
                                                @endif
                                              </th>
                                              
                                              
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="font-size: 13px;border-top: 1px solid rgba(0,0,0,.125);">
                                <h4 class="title-d pt-2">Description</h4>
                                <p class="description color-text-a" style="width: 30%;">
                                  {{ $singlePost->description }}
                                </p>
                            </div>   
                        </div>
                        <div class="col-md-4  section-md-t3" style="border: 3px solid rgba(0,0,0,.125);border-radius: 20px;">
                            Ad Position Location
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