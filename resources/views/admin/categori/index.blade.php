@extends('layouts.app-admin')

@section('title', 'Kategori')

@push('meta-seo')
    
@endpush    

@push('css')
    
@endpush

@section('content')
    @include('components.alert.success')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('product.categori.create') }}" class="btn btn-primary btn-5">
                Tambah
            </a>
        </div>
        <div class="card-body border-bottom py-3">
            <div class="d-flex">
                <div class="text-secondary">
                    <div class="mx-2 d-inline-block">
                        <select name="sort" id="sort" class="form-control">
                            @php
                                $opts = [
                                    10,25,50,100
                                ];
                            @endphp 
                            @foreach ($opts as $opt)
                                <option value="{{ $opt }}" {{ request('sort') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ms-auto text-secondary">
                    <form>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="search" placeholder="Search for…">
                            <button class="btn" type="submit">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-bordered table-vcenter text-nowrap datatable text-center">
                <thead>
                    <tr>
                        <th class="w-1">No</th>
                        <th>Kategori</th>
                        <th>Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($categori as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('product.sub.categori.index', ['categori' => $item->id]) }}" class="btn btn-outline-primary">
                                   Sub Kategori
                                </a>
                                <a href="{{ route('product.categori.edit', ['id' => $item->id]) }}" class="btn btn-outline-warning">
                                    Edit
                                </a>
                                <a href="javascript:void(0)" onclick="return deleteItem('{{ $item->id }}')" class="btn btn-outline-danger">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-secondary">
                Showing <span>{{ $categori->firstItem() }}</span> 
                to <span>{{ $categori->lastItem() }}</span> of
                <span>{{ $categori->total() }}</span> entries
            </p>
            <ul class="pagination m-0 ms-auto">
                {{ $categori->links() }}
            </ul>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const BASE = "{{ route('product.categori.index') }}";

        let params = new URLSearchParams(window.location.search);
        $("#sort").change(function() {
            params.set('sort', $(this).val());
            window.location.href = BASE + '?' + params.toString();
        });

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        function deleteItem(id) {
            Swal.fire({
                title: "Peringatan !",
                text: "Anda yakin ingin menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: BASE + '/' + id + '/destroy',
                        method: "DELETE",
                        dataType: "json",
                        data:{
                            _token:"{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Toast.fire({
                                icon: "success",
                                title: response.message
                            });

                            setTimeout(() => {
                                window.location.reload();
                            }, 3000);
                        },
                        error: function(err) {
                            Toast.fire({
                                icon: "error",
                                title: "Server Error"
                            });
                        }
                    })
                }
            });
        }
    </script>
@endpush