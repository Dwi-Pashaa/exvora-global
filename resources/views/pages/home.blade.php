@extends('layouts.app-pages')  

@section('title')
  {{ $locale === "id" ? "Beranda" : "Home" }}
@endsection

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

  <section id="services" class="services section" style="
          width: 100%;
          min-height: 500px;
          overflow: hidden;
          background-image: url('{{ asset('pages/img/cocoa-2.jpg') }}');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
        ">
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-white">@lang('home.head_sec_feature')</h2>
        <p class="text-white">@lang('home.body_sec_feature')<br></p>
      </div>
      <div class="container">
        <div class="row gy-4">
          @forelse ($benefit as $bnft)
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item d-flex position-relative h-100" style="border: 2px solid #fc7a7a">
                <i class="{{ $bnft->icon }} icon flex-shrink-0"></i>
                <div>
                  <h4 class="title">
                    <a href="jvascript:void(0)" class="stretched-link">
                      {{ $locale === "id" ? $bnft->title_id : $bnft->title_en }}
                    </a>
                  </h4>
                  <p class="description">
                    {{ Str::limit(strip_tags($locale === 'id' ? $bnft->desc_id : $bnft->desc_en), 200) }}
                  </p>
                </div>
              </div>
            </div>
          @empty
            <i>Belum mengisi benefit</i>
          @endforelse
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
              </div>
            @empty
                <i>Belum mengisi galleri</i>
            @endforelse

          </div>
        </div>
      </div>
    </section>

    <section id="product" class="portfolio section" style="
                  width: 100%;
                  min-height: 500px;
                  overflow: hidden;
                  background-image: url('{{ asset('pages/img/cocoa-1.jpg') }}');
                  background-size: cover;
                  background-position: center;
                  background-repeat: no-repeat;
                ">
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-white">@lang('home.head_sec_product')</h2>
        <p class="text-white">@lang('home.body_sec_product')</p>
      </div>

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
            @forelse ($product as $prd)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <div class="card" style="max-width: 320px">
                    <img src="{{ asset($prd->image) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">
                          {{ $prd->name }}
                        </h5>
                        <p class="card-text">
                          {{ Str::limit(strip_tags($locale === 'id' ? $prd->desc_id : $prd->desc_en), 100) }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light">
                        <button class="btn btn-primary"
                                onclick="window.location.href='{{ asset($prd->catalog) }}'">
                          Download Catalog
                        </button>
                        <button class="btn btn-outline-secondary" onclick="window.open('https://wa.me/{{ $companie->telp }}', '_blank')">
                          Quote Now
                        </button>
                    </div>
                </div>
              </div>
            @empty
              <i>Belum mengisi product</i>
            @endforelse
          </div>
        </div>
      </div>
    </section>

    @if($companie && $companie->latitude && $companie->longitude)
      <iframe
        width="100%"
        height="450"
        frameborder="0"
        style="border:0"
        src="https://www.google.com/maps?q={{ $companie->latitude }},{{ $companie->longitude }}&hl=es;z=14&output=embed"
        allowfullscreen>
      </iframe>
    @else
      <p class="text-center">Belum mengisi koordinat lokasi.</p>
    @endif
@endsection

@push('js')
    
@endpush