@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Admin</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('user_admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nama" name="name" value="{{ $user->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   placeholder="Email" name="email" value="{{ $user->email }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                       id="password" placeholder="Password" name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="no_telp">No. Telp</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                   placeholder="No. Telp" name="no_telp" oninput="validateNumberInput(this)" value="{{ $user->no_telp }}">

                            @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                       placeholder="Photo" name="photo">

                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div id="photo-preview" class="mt-2">
                                    @if($user->photo)
                                        <img src="{{ $user->photo }}" alt="User Photo" class="img-fluid" style="max-width: 100px;">
                                    @endif
                                </div>
                            </div>

                            <label for="address">Alamat</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror"
                                      id="address" placeholder="Alamat" name="address">{{ $user->address }}</textarea>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="buttons mt-4">
                        <button type="submit" class="btn btn-success">Ubah</button>
                        <a href="{{ route('user_admin.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            var preview = document.getElementById('photo-preview');
            var fileInput = input.files[0];

            if (fileInput) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview" class="img-fluid" style="max-width: 100px;">';
                };
                reader.readAsDataURL(fileInput);
            } else {
                preview.innerHTML = ''; // Kosongkan preview jika tidak ada file yang dipilih
            }
        }

        function validateNumberInput(inputElement) {
            // Menghapus karakter selain angka
            inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
        }
    </script>
@endpush

