@extends('layouts.app-pages')  

@section('title', 'Home')

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>@lang('home.head_sec_about')</h2>
        <p>@lang('home.body_sec_about')<br></p>
      </div>
      <div class="container">
        @if ($about && ($locale === 'id' ? $about->desc_id : $about->desc_en))
            {{ Str::limit(strip_tags($locale === 'id' ? $about->desc_id : $about->desc_en), 700) }}
        @else
            <i>Belum mengisi tentang perusahaan</i>
        @endif

        <div class="mt-3">
          <a href="{{ route('about') }}" class="btn-get-started">@lang('home.btn_sec_about')</a>
        </div>
      </div>
    </section>

    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>@lang('home.head_sec_feature')</h2>
        <p>@lang('home.body_sec_feature')<br></p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-briefcase icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
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
        <h2>@lang('home.head_sec_gallery')</h2>
        <p>@lang('home.body_sec_gallery')</p>
      </div>

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            @forelse ($galleri as $glr)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <img src="{{ asset($glr->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{ $locale === "id" ? $glr->title_id : $glr->title_en }}</h4>
                  <p>{{ Str::limit(strip_tags($locale === 'id' ? $glr->desc_id : $glr->desc_en), 100) }}</p>
                  <a href="{{ asset($glr->image) }}" title="{{ $locale === "id" ? $glr->title_id : $glr->title_en }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div><!-- End Portfolio Item -->
            @empty
                <i>Belum mengisi galleri</i>
            @endforelse

          </div>
        </div>
      </div>
    </section>
@endsection

@push('js')
    
@endpush