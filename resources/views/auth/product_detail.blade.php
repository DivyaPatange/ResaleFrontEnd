@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')

@endsection
@section('content')
<!-- ======= Pr0duct Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">
        <div class="row">
         <div class="col-lg-8">
             <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="assets/img/portfolio/portfolio-details-1.jpg" class="img-fluid" alt="">
            <img src="assets/img/portfolio/portfolio-details-2.jpg" class="img-fluid" alt="">
            <img src="assets/img/portfolio/portfolio-details-3.jpg" class="img-fluid" alt="">
          </div>
        </div>
         </div>
          <div class="col-lg-4">
            <div class="portfolio-info">
            <h3>Product information</h3>
            <ul>
              <li><strong>Category</strong>: Web design</li>
              <li><strong>Client</strong>: ASU Company</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Product Details Section -->
    <section>
      <div class="container">
        <div class="row">
          <div class="portfolio-description">
            <h2>Product detail</h2>
            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. 
            </p>
        </div>
        <div class="portfolio-description">
            <h2>Description</h2>
            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. 
            </p>
        </div>
        </div>
      </div>
    </section>

@endsection
@section('customjs')

@endsection