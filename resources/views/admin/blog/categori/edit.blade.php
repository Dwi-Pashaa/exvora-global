@extends('layouts.app-admin')

@section('title', 'Edit Kategori')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('blog.categori.index') }}" class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                Kembali
            </a>
        </div>
        <form action="{{ route('blog.categori.update', ['id' => $categori->id]) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $categori->name }}">
                    @error('name')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-secodanry float-start">Reset</button>
                <button type="submit" class="btn btn-primary float-end">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    
@endpush