@extends('layouts.app-pages')  

@section('title')
  {{ $locale === "id" ? "Tentang Kami" : "About" }}
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
            {!! $locale === 'id' ? $about->desc_id : $about->desc_en !!}
        @else
            <i>Belum mengisi tentang perusahaan</i>
        @endif
      </div>
    </section>
@endsection

@push('js')
    
@endpush