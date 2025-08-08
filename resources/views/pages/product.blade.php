@extends('layouts.app-pages')  

@section('title')
  {{ $locale === "id" ? "Produk" : "Product" }}
@endsection

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section id="blog-posts" class="blog-posts section">
                <div class="container">
                    <div class="row gy-4">
                        @forelse ($product as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="card mb-3">
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="Product Image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                        {{ $item->name }}
                                        </h5>
                                        <p class="card-text">
                                        {{ Str::limit(strip_tags($locale === 'id' ? $item->desc_id : $item->desc_en), 100) }}
                                        </p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light">
                                        <a href="{{ route('pages.product.detail', ['id' => $item->id]) }}" class="btn btn-outline-primary btn-sm">
                                            @lang('home.btn_detail_catalog')
                                        </a>
                                        <button class="btn btn-outline-warning btn-sm" onclick="window.location.href='{{ asset($item->catalog) }}'">
                                            @lang('home.btn_download_catalog')
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm" onclick="window.open('https://wa.me/{{ $companie->telp }}', '_blank')">
                                            @lang('home.btn_quote_catalog')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <i>Belum Ada Product</i>                            
                        @endforelse
                    </div>
                </div>
            </section>
            <section id="blog-pagination" class="blog-pagination section">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        {{ $product->links() }}
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-4 sidebar">
            <div class="widgets-container">
                <!-- Search Widget -->
                <div class="search-widget widget-item">

                    <h3 class="widget-title">@lang('blog.search')</h3>
                    <form>
                        <input type="text" name="search" value="{{ request('search') }}">
                        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div><!--/Search Widget -->

                <div class="tags-widget widget-item">

                    <h3 class="widget-title">@lang('blog.categori')</h3>
                    <div class="accordion" id="accordionExample">
                        @foreach ($listCategori as $index => $ctg)
                            @php
                                $headingId = 'heading' . $index;
                                $collapseId = 'collapse' . $index;
                            @endphp

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#{{ $collapseId }}" 
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                            aria-controls="{{ $collapseId }}">
                                        <b>{{ $ctg->name }}</b>
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}" 
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                    aria-labelledby="{{ $headingId }}" 
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($ctg->subCategori as $sbc)
                                                <li>
                                                    <a href="{{ route('pages.product', ['categori' => $sbc->slug]) }}">
                                                        {{ $sbc->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    
@endpush