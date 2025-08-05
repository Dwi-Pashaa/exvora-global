@extends('layouts.app-admin')

@section('title', 'Tentang Kami')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    @include('components.alert.success')
    <form action="{{ route('pages.about.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <b>Silahkan jelaskan tentang perusahaan anda dalam 2 bahasa inggris dan indonesia</b>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Tentang Perusahaan (Bahasa Indonesia)</label>
                    <textarea name="desc_id" id="tinymce-id" class="form-control @error('desc_id') is-invalid @enderror">{{ $about->desc_id ?? 'Silahkan jelaskan tentang perusahaan anda' }}</textarea>
                    @error('desc_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Tentang Perusahaan (Bahasa Inggris)</label>
                    <textarea name="desc_en" id="tinymce-en" class="form-control @error('desc_en') is-invalid @enderror">{{ $about->desc_en ?? 'Silahkan jelaskan tentang perusahaan anda' }}</textarea>
                    @error('desc_en')
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
            tinymce.init({
                selector: 'textarea#tinymce-id',
                plugins: 'image code',
                toolbar: 'undo redo | link image | code',
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', function (e) {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', function () {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            tinymce.init({
                selector: 'textarea#tinymce-en',
                plugins: 'image code',
                toolbar: 'undo redo | link image | code',
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', function (e) {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', function () {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        });
    </script>
@endpush