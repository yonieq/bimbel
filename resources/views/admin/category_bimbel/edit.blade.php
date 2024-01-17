@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Kategori Bimbel</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('bimbel.update', $bimbel->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Bimbel</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Nama Bimbel" name="name" value="{{ $bimbel->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="price">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                   placeholder="Harga" name="price" oninput="rupiahRupiahInput(this)" value="{{ formatRupiah($bimbel->price) }}">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <input type="text" class="form-control @error('class') is-invalid @enderror" id="class"
                                       placeholder="Kelas" name="class" value="{{ $bimbel->class }}">

                                @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="description">Keterangan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                      name="description" placeholder="Keterangan">{{ $bimbel->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="buttons mt-4">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('bimbel.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@pushonce('scripts')
    <script>
        function rupiahRupiahInput(input) {
            // Hapus karakter selain angka
            let str = input.value.replace(/[^\d]/g, '');

            // Format uang Rupiah tanpa Rp.
            if (str.length > 0) {
                str = parseInt(str, 10).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    currencyDisplay: 'narrowSymbol',
                    minimumFractionDigits: 0,
                }).replace('Rp', ''); // Hapus IDR (simbol)
            }

            input.value = str;
        }
    </script>
@endpushonce
