@extends('layouts.app-admin')

@section('title', 'Tambah Sub Kategori')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('product.sub.categori.index', ['categori' => $categori]) }}" class="btn btn-primary btn-5 d-none d-sm-inline-block">
                Kembali
            </a>
        </div>
        <form action="{{ route('product.sub.categori.store', ['categori' => $categori]) }}" method="POST">
            @csrf
            <input type="hidden" name="categori_id" id="categori_id" value="{{ $categori }}">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="" class="mb-2">Nama Sub Kategori</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
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