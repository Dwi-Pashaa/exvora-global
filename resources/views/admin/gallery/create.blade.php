@extends('layouts.app-admin')

@section('title', 'Tambah Kegiatan')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('pages.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pages.galeri') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Judul Kegiatan (Bahasa Indonesia)</label>
                            <input type="text" name="title_id" id="title_id" class="form-control @error('title_id') is-invalid @enderror">
                            @error('title_id')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Judul Kegiatan (Bahasa Inggris)</label>
                            <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror">
                            @error('title_en')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
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
                    <label for="" class="mb-2">Foto Kegiatan</label>
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