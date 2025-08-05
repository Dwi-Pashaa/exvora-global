@extends('layouts.app-pages')  

@section('title', 'Home')

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>About Us<br></p>
      </div>
      <div class="container">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod ea consectetur unde? Omnis alias accusantium odit aliquam repellat, beatae quo, aliquid sed perferendis voluptates nobis earum quae fugiat minus tempora!
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore expedita facilis rerum distinctio numquam inventore et beatae illo unde neque? Aliquid neque itaque, enim atque harum tenetur minus unde quae.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic excepturi quae incidunt laudantium in deserunt porro voluptates! Soluta doloremque odit dolorum quidem illum ullam corporis, nihil laborum asperiores, et veritatis!
      </div>
    </section>

    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-briefcase icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-card-checklist icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-card-checklist icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              </div>
            </div>
          </div><!-- End Service Item -->
        </div>

      </div>
    </section>

    <section id="portfolio" class="portfolio section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Activity Gallery</p>
      </div>

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-2.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-3.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-4.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-6.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-7.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-8.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{ asset('pages') }}/img/masonry-portfolio/masonry-portfolio-9.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div>
        </div>
      </div>
    </section>
@endsection

@push('js')
    
@endpush