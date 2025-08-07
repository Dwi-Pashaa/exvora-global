@extends('layouts.app-admin')

@section('title', 'Edit Blog')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-header">
                <a href="{{ route('blog.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Judul</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}">
                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Ketegori</label>
                    <select name="categori_id" id="categori_id" class="form-control @error('categori_id') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @foreach ($categorie as $item)
                            <option value="{{$item->id}}" {{ $blog->categori_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categori_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Deskripsi (Bahasa Indonesia)</label>
                    <textarea name="desc_id" id="tinymce-id" class="form-control @error('desc_id') is-invalid @enderror">{{ $blog->desc_id }}</textarea>
                    @error('desc_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Deskripsi (Bahasa Inggris)</label>
                    <textarea name="desc_en" id="tinymce-en" class="form-control @error('desc_en') is-invalid @enderror">{{ $blog->desc_en }}</textarea>
                    @error('desc_en')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Thumbnail</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end">Simpan</button>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('admin') }}/libs/tinymce/tinymce.min.js?1738096684" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-id',
                height: 300,
                menubar: false,
                statusbar: false,
                license_key: 'gpl',
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | table | code fullscreen',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            };

            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }

            tinyMCE.init(options);
        });

        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-en',
                height: 300,
                menubar: false,
                statusbar: false,
                license_key: 'gpl',
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | table | code fullscreen',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            };

            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }

            tinyMCE.init(options);
        });
    </script>
@endpush