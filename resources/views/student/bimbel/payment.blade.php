@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pembayaran Bimbel</h3>
                    <p class="text-subtitle text-muted">Lakukan pembayaran dengan Nomor Rekening yang tertera dibawah,
                        dan upload bukti pembayarannya.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('bimbel.list') }}">Bimbel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                @foreach($rekening as $bank)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>BANK: {{ $bank->bank }}</h4>
                                <h4>Nomor Rekening: {{ $bank->no }}</h4>
                                <h4>Atas Nama: {{ $bank->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah yang yang dibayarkan</h4>
                        </div>
                        <div class="card-body">
                            <h4>Rp. {{ formatRupiah($payment->bimbel->price) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form id="uploadForm" action="{{ route('bimbel.paid', $payment->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image_payment">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="image_payment" name="image_payment" accept="image/*">
            </div>
            <div class="form-group">
                <img id="preview" src="#" alt="Preview" style="max-width: 100%; display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endsection
        @pushonce('scripts')
            <script>
                $(document).ready(function () {
                    // Preview image before upload
                    $("#image_payment").change(function () {
                        readURL(this);
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#preview').attr('src', e.target.result).show();
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                });
            </script>
    @endpushonce
