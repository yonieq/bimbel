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
                            <li class="breadcrumb-item"><a href="{{ route('admin_payment.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        <i class="bi bi-arrow-down"></i> Filter Data
                    </a>
                    <div class="collapse my-4" id="collapseExample">
                        <form action="#">
                            <div class="col-md-6">
                                <div class="form-group input-group mb-3">
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Semua Data</option>
                                        <option value="pending">Belum dibayarkan</option>
                                        <option value="waiting">Menunggu Konfirmasi</option>
                                        <option value="reject">Ditolak</option>
                                        <option value="done">Selesai</option>
                                    </select>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('partials.messages')
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script type="text/javascript">
        $(document).ready(function () {
            // Menangani perubahan pada elemen select dengan id 'status'
            $('#status').change(function () {
                // Mendapatkan nilai status yang dipilih
                var selectedStatus = $(this).val();

                // Memuat ulang tabel dengan status yang dipilih
                $('#dataTableBuilder').DataTable().ajax.url('{{ route("admin_payment.index") }}?status=' + selectedStatus).load();
            });
        });
    </script>
@endpush



