@extends('layouts.app-admin')

@section('title', 'Setting')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    @include('components.alert.success')
    <div class="card">
        <div class="row g-0">
            @include('components.sub-navbar-admin')
            <div class="col-12 col-md-9 d-flex flex-column">
                <div class="card-body">
                    <h2 class="mb-4">Seo Management</h2>
                    <h3 class="card-title">Seo Management Detail</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary float-end">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush