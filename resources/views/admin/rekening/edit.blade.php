@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Rekening</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('rekening.update', $rekening->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no">No. Rekening</label>
                                <input type="number" class="form-control @error('no') is-invalid @enderror" id="no" placeholder="No Rekening" name="no" value="{{ $rekening->no }}">

                                @error('no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="bank">Bank</label>
                            <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" placeholder="Bank" name="bank" value="{{ $rekening->bank }}">

                            @error('bank')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Atas nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Atas Nama" name="name" value="{{ $rekening->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="buttons mt-4">
                        <button type="submit" class="btn btn-success">Ubah</button>
                        <a href="{{ route('rekening.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
