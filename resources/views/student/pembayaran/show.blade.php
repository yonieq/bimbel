@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Jadwal Bimbel</h4>
                    </div>
                    <div class="card-body">
                        @if($schedule->days)
                            <div class="badges">
                                @foreach(json_decode($schedule->days) as $day)
                                    <span class="badge bg-success mr-2">{{ $day }}</span>
                                @endforeach
                            </div>
                        @else
                            <p>No days available.</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <h6>Jam Masuk : <span
                                class="badge bg-secondary">{{ \Carbon\Carbon::make($schedule->time_in)->format('H:m') }}</span>
                        </h6>
                        <h6>Jam Keluar : <span
                                class="badge bg-secondary">{{ \Carbon\Carbon::make($schedule->time_out)->format('H:m') }}</span>
                        </h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="badges">
                            <a href="#" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
                                Anda Sudah Terdaftar pada bimbel ini</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Nama Bimbel : {{$schedule->bimbel->name}}</h4>
                    </div>
                    <div class="card-body">
                        <h4>Harga Bimbel : Rp. {{ formatRupiah($schedule->bimbel->price) }}</h4>
                        <h6>Kelas : {{$schedule->bimbel->class}}</h6>
                    </div>
                    <div class="card-footer">
                        <p>Keterangan : {{ $schedule->bimbel->description }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Murid yang terdaftar</h4>
                    </div>
                    <div class="card-body">
                        @foreach($student as $item)
                            <div class="avatar avatar-lg bg-primary me-3">
                                @php
                                    $photoPath = 'storage/user/' . $item->user->photo;
                                    $defaultPhotoPath = 'assets/compiled/png/profile.png';
                                @endphp

                                @if(file_exists($photoPath))
                                    <img src="{{ asset($photoPath) }}" alt="{{ $item->user->name }}" srcset=""
                                         data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{ $item->user->name }}">
                                @else
                                    <img src="{{ asset($defaultPhotoPath) }}" alt="{{ $item->user->name }}" srcset=""
                                         data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{ $item->user->name }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="my-4">
                <a href="{{ route('bimbel.list') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </section>
@endsection
