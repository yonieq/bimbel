@extends('layouts.master')
@section('content')
    <section class="section">
        <form action="{{ route('admin_payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nama Bimbel : {{ $bimbel->name }}</h4>
                            <h4>Kelas : {{ $bimbel->class }}</h4>
                        </div>
                        <div class="card-body">
                            <h6>Jadwal :</h6>
                            @if($bimbel->schedule->days)
                                <div class="badges">
                                    @foreach(json_decode($bimbel->schedule->days) as $day)
                                        <span class="badge bg-success mr-2">{{ $day }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p>No days available.</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <h6>Jam Masuk : <span
                                    class="badge bg-secondary">{{ \Carbon\Carbon::make($bimbel->schedule->time_in)->format('H:m') }}</span>
                            </h6>
                            <h6>Jam Keluar : <span
                                    class="badge bg-secondary">{{ \Carbon\Carbon::make($bimbel->schedule->time_out)->format('H:m') }}</span>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <h4>Harga : Rp. {{ formatRupiah($bimbel->price) }}</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Bukti Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                             src="{{ $payment->image_payment }}"
                                             data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail murid yang mendaftar</h4>
                        </div>
                        <div class="card-body">
                            <h5>Nama: {{ $payment->user->name }}</h5>
                            <h5>Email: {{ $payment->user->email }}</h5>
                            <h5>No. Telp: {{ $payment->user->no_telp }}</h5>
                            <h5>Alamat: {{ $payment->user->address }}</h5>
                        </div>
                        <div class="card-footer">
                            <h6>Foto : </h6>
                            <img class="w-25" src="{{ $bimbel->student->first()->user->photo }}">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Remark</h4>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" placeholder="Tulis Catatan Disini" name="remark">{{ $payment->remark }}</textarea>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Konfirmasi Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">------Silahkan Pilih Konfirmasi-------</option>
                                <option value="done">Terima Pembayaran</option>
                                <option value="reject">Tolak Pembayaran</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <a href="{{ route('admin_payment.index') }}" class="btn btn-danger">Kembali</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </section>
    @include('admin.payment.modal_image_payment')
@endsection
