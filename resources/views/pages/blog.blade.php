@extends('layouts.app-pages')  

@section('title')
  Blog
@endsection

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">
                <div class="container">
                    <div class="row gy-4">
                    @forelse ($blogs as $item)
                        <div class="col-lg-12">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset($item->image) }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="{{ route('blog.detail', ['id' => $item->id]) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="{{ route('blog.detail', ['id' => $item->id]) }}">{{ $item->user->name }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('blog.detail', ['id' => $item->id]) }}"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="{{ route('blog.detail', ['id' => $item->id]) }}">{{ $item->categori->name }}</a></li>
                                    </ul>
                                    </div>

                                    <div class="content">
                                    <p>
                                        {{ Str::limit(strip_tags($locale === 'id' ? $item->desc_id : $item->desc_en), 200) }}
                                    </p>

                                    <div class="read-more">
                                        <a href="{{ route('blog.detail', ['id' => $item->id]) }}">@lang('home.btn_detail_blog')</a>
                                    </div>
                                </div>

                            </article>
                        </div>
                    @empty
                        <i>Belum Ada Blog</i>
                    @endforelse
                    </div><!-- End blog posts list -->
                </div>
            </section><!-- /Blog Posts Section -->
            <!-- Blog Pagination Section -->
            <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                    {{ $blogs->links() }}
                    </div>
                </div>
            </section><!-- /Blog Pagination Section -->
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
                <ul>
                    @foreach ($listCategori as $ctg)
                        <li><a href="{{ route('blog', ['categori' => $ctg->slug]) }}">{{$ctg->name}}</a></li>
                    @endforeach
                </ul>
            </div><!--/Tags Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

                <h3 class="widget-title">@lang('blog.recent')</h3>

                @forelse ($recentBlogs as $rcn)
                    <div class="post-item">
                        <img src="{{ asset($rcn->image) }}" alt="" class="flex-shrink-0">
                        <div>
                            <h4><a href="{{ route('blog.detail', ['id' => $rcn->id]) }}">{{ $rcn->title }}</a></h4>
                            <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($rcn->created_at)->format('d F Y')}}</time>
                        </div>
                    </div>
                @empty
                @endforelse

            </div><!--/Recent Posts Widget -->
            </div>

        </div>
    </div>
</div>
@endsection

@push('js')
    
@endpush