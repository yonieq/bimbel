@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3> Data Laporan Keuangan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan Keuangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('partials.messages')
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
                                    <input type="date" id="date-range" name="date_range" class="form-control flatpickr-range" placeholder="Select date..">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
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

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#date-range', {
                mode: 'range',
                dateFormat: 'Y/m/d',
            });
        });

        $(document).ready(function () {
            $('#date-range').change(function () {

                var dateRange = $(this).val();

                // Reload DataTables with the selected date range
                $('#dataTableBuilder').DataTable().ajax.url('{{ route("admin_payment.index") }}?date_range=' + dateRange).load();
            })
        })
    </script>
@endpush


