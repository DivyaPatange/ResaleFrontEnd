@extends('auth.auth_layout.main')
@section('title', 'Pet Post')
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
                      <div class="title-box-d section-t4">
                        <h2 class="title-d">{{ $singlePost->ad_title }}</h2>
                      </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-8  section-md-t3">
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
                    <div class="container">
                      <h2>Product Details</h2>
                      <table class="table mt-5">
                        <tbody>
                          <tr>
                            <th>Pet Type</th>
                            <td>
                            @if($singlePost->type_id)
                            
                            <?php
                                $type = DB::table('types')->where('id', $singlePost->type_id)->first();
                            ?>
                              {{ $type->type_name }}
                            @endif
                                
                            </td>
                            <th>User Type</th>
                            <td>
                            @if($singlePost->user_type)
                    
                                {{ $singlePost->user_type }}
                            @endif
                            </td>
                            
                          </tr>
                          <tr>
                            <th>GST No.</th>
                            <td>
                                @if($singlePost->gst_no)
                                     {{ $singlePost->gst_no }}
                                @endif
                            </td>
                             
                           
                            <th></th>
                            <td>
                            
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              <div class="col-md-4 section-md-t3">
              <div class="property-summary">
                <div class="card" style="height:100%">
                    <div class="card-body">
                        @if($singlePost->type_id)
                            
                            <?php
                                $type = DB::table('types')->where('id', $singlePost->type_id)->first();
                            ?>
                              {{ $type->type_name }}
                        @endif
                          <h2><span class="ion-money">&#8377;</span>&nbsp;{{ $singlePost->price }}</h2>
                       
                        <button type="button" class="btn btn-primary">Call</button>
                    </div>
                </div>
                <div class="card mt-5" style="height:100%">
                    <div class="card-body">
                        <div class="property-description">
                            <h2 class="title-d mb-5">Description</h2>
                            <p class="description color-text-a">
                            {!! $singlePost->description !!}
                            </p>
                        </div>
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