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
                <div class="card mb-3">
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
                        <a href="" class="btn btn-outline-primary btn-sm">
                            @lang('home.btn_detail_catalog')
                        </a>
                        <button class="btn btn-outline-warning btn-sm" onclick="window.location.href='{{ asset($prd->catalog) }}'">
                            @lang('home.btn_download_catalog')
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" onclick="window.open('https://wa.me/{{ $companie->telp }}', '_blank')">
                            @lang('home.btn_quote_catalog')
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

    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="container section-title" data-aos="fade-up">
          <h2>@lang('home.head_sec_blog')</h2>
          <p>@lang('home.body_sec_blog')</p>
        </div>
        <div class="row gy-4">
          @forelse ($blog as $blg)
            <div class="col-lg-6">
              <article>

                <div class="post-img">
                  <img src="{{ asset($blg->image)}}" alt="" class="img-fluid">
                </div>

                <h2 class="title">
                  <a href="{{ route('blog.detail', ['id' => $blg->id]) }}">
                    {{ $blg->title }}
                  </a>
                </h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                        href="{{ route('blog.detail', ['id' => $blg->id]) }}">{{ $blg->user->name }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                        href="{{ route('blog.detail', ['id' => $blg->id]) }}"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($blg->created_at)->format('d F Y') }}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                        href="{{ route('blog.detail', ['id' => $blg->id]) }}">{{ $blg->categori->name }}</a></li>
                  </ul>
                </div>

                <div class="content">
                  <p>
                    {{ Str::limit(strip_tags($locale === 'id' ? $blg->desc_id : $blg->desc_en), 200) }}
                  </p>

                  <div class="read-more">
                    <a href="{{ route('blog.detail', ['id' => $blg->id]) }}">@lang('home.btn_detail_blog')</a>
                  </div>
                </div>

              </article>
            </div>
          @empty
              <i>Belum Ada Berita</i>
          @endforelse
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