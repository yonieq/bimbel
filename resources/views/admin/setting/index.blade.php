@extends('layouts.master')
@section('content')
    @include('partials.messages')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="app_name">Nama aplikasi</label>
                                        <input type="text" id="app_name" class="form-control round @error('app_name') is-invalid @enderror" name="app_name"
                                               placeholder="Nama aplikasi" value="{{ $setting->app_name }}">

                                        @error('app_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control square @error('email') is-invalid @enderror" name="email"
                                               placeholder="Email" value="{{ $setting->email }}">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">No. Telp</label>
                                        <input type="text" id="phone" class="form-control square @error('phone') is-invalid @enderror" name="phone"
                                               placeholder="No telephone" value="{{ $setting->phone }}"
                                               oninput="validateNumberInput(this)">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                                  id="address">{{ $setting->address }}</textarea>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description">Deskripsi Aplikasi</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                                  id="description">{{ $setting->description }}</textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo">

                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <img class="w-25 my-4" src="{{ $setting->logo }}"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="banner">Banner</label>
                                        <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" id="banner">

                                        @error('banner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <img class="w-25 my-4" src="{{ $setting->banner }}"/>
                                    </div>
                                </div>
                                <div class="buttons mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function validateNumberInput(inputElement) {
            // Menghapus karakter selain angka
            inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
        }
    </script>
@endpush
