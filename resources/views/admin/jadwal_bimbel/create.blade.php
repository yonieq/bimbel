@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Jadwal Bimbel</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('jadwal_bimbel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_bimbel_id">Pilih Bimbel</label>
                                <select id="category_bimbel_id" name="category_bimbel_id" class="form-select @error('category_bimbel_id') is-invalid @enderror">
                                    <option value="">Pilih Bimbel</option>
                                    @foreach($bimbel as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_bimbel_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="time_in">Jam Masuk</label>
                            <input type="time" class="form-control @error('time_in') is-invalid @enderror" id="time_in" placeholder="Jam Masuk" name="time_in">
                            @error('time_in')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="days">Pilih Hari</label>
                                <select id="days" name="days[]" class="choices form-select multiple-remove" multiple="multiple">
                                    <option value="Minggu">Minggu</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="time_out">Jam Keluar</label>
                            <input type="time" class="form-control @error('time_out') is-invalid @enderror" id="time_out" placeholder="Jam Keluar" name="time_out">
                            @error('time_out')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="buttons mt-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('jadwal_bimbel.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
