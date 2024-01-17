@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user_admin.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('partials.messages')
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user_admin.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("form").submit();
                }
            });
        }
    </script>
@endpush


