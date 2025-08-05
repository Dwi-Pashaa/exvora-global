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
                    <h2 class="mb-4">Profile Perusahaan</h2>
                    <h3 class="card-title">Detail Perusahaan</h3>
                    <form action="{{ route('setting.companie.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-center mb-3">
                            <div class="col-auto">
                                <span class="avatar avatar-xl logo-companie" style="background-image: url({{ asset($companie->image ?? 'logo.png') }})"> </span>
                            </div>
                            <div class="col-auto">
                                <label class="btn btn-1 mb-0">
                                    Ubah Logo
                                    <input type="file" name="image" accept="image/*" style="display: none;" onchange="previewLogo(this)">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Nama Perusahaan</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $companie->name ?? 'Perusahaan Test' }}">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Email Perusahaan</label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $companie->email ?? 'perusahaan@gmail.com' }}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">No Telephone Perusahaan (WA)</label>
                                    <input type="text" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ $companie->telp ?? '085730046642' }}">
                                    @error('telp')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Alamat Perusahaan</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $companie->address ?? 'Jl. Testing NO 24' }}">
                                    @error('address')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title my-3">Social Media</h3>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Twitter Perusahaan</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ $companie->twitter ?? '-' }}">
                                    @error('twitter')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Facebook Perusahaan</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $companie->facebook ?? '-' }}">
                                    @error('facebook')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Instagram Perusahaan</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ $companie->instagram ?? '-' }}">
                                    @error('instagram')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Linkedin Perusahaan</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ $companie->linkedin ?? '-' }}">
                                    @error('linkedin')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

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
    <script>
        function previewLogo(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.logo-companie').style.backgroundImage = `url('${e.target.result}')`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush