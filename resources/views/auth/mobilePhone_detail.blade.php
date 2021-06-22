@extends('auth.auth_layout.main')
@section('title', 'Mobile Phone Post')
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
</style>
@endsection
@section('content')
<main id="main">
  <!-- ======= Property Single ======= -->
  <section class="property-single nav-arrow-b section-property section-t8 mt-5">
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
                  <div class="title-box-d">
                    <h3 class="title-d">{{ $singlePost->ad_title }}</h3>
                  </div>
                </div>
              </div>

            <div class="row">
                <div class="col-md-8 section-md-t3">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                         <?php
                          $photos = $singlePost->photos;
                          $explodePhotos = explode(",", $photos);
                          // dd($explodePhotos);
                        ?>
                        @for($i= 0; $i < count($explodePhotos); $i++)
                          <div class="carousel-item-b" style="height: 350px;width: 100%;text-align: center;background-color: black;">
                            <img src="{{  URL::asset('adPhotos/' . $explodePhotos[$i]) }}" alt="" style="max-height: 350px;max-width: 100%;">
                          </div>
                        @endfor
                    </div>
                    <div class="container" style="border: 1px solid rgba(0,0,0,.125);">
                      <h4 class="m-0 pt-2">Product Details</h4>
                      <table class="table">
                        <tbody style="font-size: 13px;">
                        <tr>
                            <td>Brand Name</td>
                            <th>
                                @if($singlePost->brand_id)
                       
                                  <?php
                                    $brand = DB::table('brands')->where('id', $singlePost->brand_id)->where('status', 1)->first();
                                  ?>
                                  @if(!empty($brand)){{ $brand->brand_name }}@endif
                                
                                @endif
                                
                            </th>
                            <td>Model Name</td>
                            <th>
                                @if($singlePost->model_id)
                                
                                  <?php
                                    $modelName = DB::table('models')->where('id', $singlePost->model_id)->where('status', 1)->first();
                                  ?>
                                 @if(!empty($modelName)){{ $modelName->model_name }} @endif
                                @endif
                            </th>
                            <td>Year of Purchase</td>
                            <th>
                                @if($singlePost->year_of_purchase)
                                
                                 {{ $singlePost->year_of_purchase }}
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td>Physical Condition</td>
                            <th>
                                @if($singlePost->physical_condition)
                                  {{ $singlePost->physical_condition }}
                                @endif
                            </th>
    
                            <td>Additional Accessory</td>
                            <th>
                                @if($singlePost->additional_accessory)
                                
                                  {{ $singlePost->additional_accessory }}<
                                @endif
                            </th>
                            <td>Damages & Functional Issues</td>
                            <th>
                                @if($singlePost->damages_and_functional_issues)
                               
                                  {{ $singlePost->damages_and_functional_issues }}
                                @endif
                            </th>
                        </tr>
                        <tr>
                            @if(!empty($singlePost->user_type ))
                            <td>User Type</td>
                            <th>{{ $singlePost->user_type  }}</th>
                            @endif
                            
                            @if(!empty($singlePost->firm_name))
                            <td>Firm Name</td>
                            <th>{{ $singlePost->firm_name }}</th>
                            @endif
                            
                            @if(!empty($singlePost->gst_no ))
                            <td>GST No.</td>
                            <th>{{ $singlePost->gst_no }}</th>
                            @endif
                        </tr>
                        <tr>
                            @if(!empty($singlePost->invoice))
                            <td>Invoice</td>
                            <th>{{ $singlePost->invoice }}</th>
                            @endif
                        </tr>
                        </tbody>
                      </table>
                        <div style="font-size: 13px;border-top: 1px solid rgba(0,0,0,.125);">
                            <h4 class="title-d pt-2">Description</h4>
                            <p class="description color-text-a">
                              {{ $singlePost->description }}
                            </p>
                        </div>   
                    </div>
                </div>
                <div class="col-md-4 section-md-t3">
                    <div class="property-summary">
                        <div class="card m-0" style="height:150px;font-size: 13px">
                            <div class="card-body">
                                
                                <h6>@if(!empty($brand->brand_name)){{ $brand->brand_name}}@endif</h6>
                                  <h4><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</h4>
                                    <p>
                                      @if(!empty($modelName)){{ $modelName->model_name }} 
                                      @endif
                                    </p>
                            </div>
                        </div>
                        <div class="card mt-3" style="height:100%">
                            <div class="card-body">
                                <div class="property-description">
                                    <h4 class="title-d mb-5 ">Seller description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('assets/img/telephone.png') }}" class="img-fluid "></h4>
                                </div>
                            </div>
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