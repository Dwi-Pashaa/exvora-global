@extends('layouts.app-admin')

@section('title', 'Tambah Produk')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('product.list.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <a href="{{ route('product.list.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Ketegori Produk</label>
                    <select name="categori_id" id="categori_id" class="form-control @error('categori_id') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @foreach ($categorie as $item)
                            <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categori_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Sub Ketegori Produk</label>
                    <select name="sub_categori_id" id="sub_categori_id" class="form-control @error('sub_categori_id') is-invalid @enderror">
                        <option value="">Pilih</option>
                    </select>
                    @error('sub_categori_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Deskripsi (Bahasa Indonesia)</label>
                    <textarea name="desc_id" id="tinymce-id" class="form-control @error('desc_id') is-invalid @enderror"></textarea>
                    @error('desc_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Deskripsi (Bahasa Inggris)</label>
                    <textarea name="desc_en" id="tinymce-en" class="form-control @error('desc_en') is-invalid @enderror"></textarea>
                    @error('desc_en')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Foto Produk</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Katalog Produk</label>
                    <input type="file" name="catalog" id="catalog" class="form-control @error('catalog') is-invalid @enderror">
                    @error('catalog')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Urutan Display Produk</label>
                    <select name="sort" id="sort" class="form-control @error('sort') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @for ($i = 1; $i <= 100; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    @error('sort')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Status Produk</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">Pilih</option>
                        @php
                            $status = ["pending", "draft", "publish"];
                        @endphp
                        @foreach ($status as $st)
                            <option value="{{$st}}">{{ ucfirst($st) }}</option>
                        @endforeach
                    </select>
                    @error('status')
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


        $("#categori_id").change(function() {
            let categori_id = $(this).val();

            $.ajax({
                url: "{{route('product.list.getSubCategori')}}",
                method: "GET",
                data: { 
                    categori_id: categori_id ,
                     _token:"{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    let html = '';
                    html += '<option value="">Pilih</option>';
                    $.each(response.data, function(index, value) {
                        html +=  `<option value="${value.id}">${value.name}</option>`;
                    })
                    $("#sub_categori_id").html(html)
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })
    </script>
@endpush