@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Jadwal Bimbel</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('jadwal_bimbel.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_bimbel_id">Pilih Bimbel</label>
                                <select id="category_bimbel_id" name="category_bimbel_id" class="form-select @error('category_bimbel_id') is-invalid @enderror">
                                    @foreach($bimbel as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $schedule->category_bimbel_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_bimbel_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="time_in">Jam Masuk</label>
                            <input type="time" class="form-control @error('time_in') is-invalid @enderror" id="time_in" placeholder="Jam Masuk" name="time_in" value="{{ old('time_in', $schedule->time_in) }}">
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
                                    @foreach(['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                        <option value="{{ $day }}" @if(in_array($day, json_decode($schedule->days))) selected @endif>{{ $day }}</option>
                                    @endforeach
                                </select>
                                @error('days')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="time_out">Jam Keluar</label>
                            <input type="time" class="form-control @error('time_out') is-invalid @enderror" id="time_out" placeholder="Jam Keluar" name="time_out" value="{{ old('time_out', $schedule->time_out) }}">
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
