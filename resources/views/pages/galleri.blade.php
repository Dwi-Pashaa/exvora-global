@extends('layouts.app-pages')  

@section('title')
  {{ $locale === "id" ? "Galeri" : "Gallery" }}
@endsection

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
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