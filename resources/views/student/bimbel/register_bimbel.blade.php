<div class="modal fade text-left" id="registerForm" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Form Pendataran </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('bimbel.register', $schedule->bimbel->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="modal-body">
                    <label for="no_telp">No. Telephone: </label>
                    <div class="form-group">
                        <input id="no_telp" name="no_telp" type="text" oninput="validateNumberInput(this)" placeholder="No. Telephone"
                               class="form-control" required value="{{ auth()->user()->no_telp }}">
                    </div>
                    <label for="address">Alamat: </label>
                    <div class="form-group">
                        <textarea id="address" name="address" placeholder="Alamat" class="form-control" required>{{ auth()->user()->address }}
                        </textarea>
                    </div>
                    <label for="photo">Photo: </label>
                    <div class="form-group">
                        <!-- Input file untuk memilih foto baru -->
                        <input id="photo" name="photo" type="file" placeholder="Photo" class="form-control" {{ auth()->user()->photo ? 'value=auth()->user()->photo' : '' }} onchange="previewPhoto(this)" accept="image/*">

                        <!-- Tambahkan elemen img untuk menampilkan preview -->
                        <img id="photoPreview" src="{{ asset('storage/user/'.auth()->user()->photo) }}" alt="Photo Preview" style="max-width: 100%; max-height: 200px; display: {{ auth()->user()->photo ? 'block' : 'none' }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button id="btn-submit" type="submit" class="btn btn-primary ms-1"
                            data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Daftar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@pushonce('scripts')
    <script>
        $(document).on('click', '#btn-submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mendaftar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil mendaftar bimbel, silahkan untuk melanjutkan pembayaran',
                    }).then(() => {
                        $("form").submit();
                    });
                }
            });
        });

        function validateNumberInput(inputElement) {
            // Menghapus karakter selain angka
            inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
        }

        function previewPhoto(input) {
            var photoPreview = document.getElementById('photoPreview');
            var file = input.files[0];

            // Periksa apakah file gambar
            if (file && file.type.startsWith('image/')) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                    photoPreview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                // Jika bukan gambar, sembunyikan preview
                photoPreview.src = '#';
                photoPreview.style.display = 'none';
            }
        }

    </script>
@endpushonce

