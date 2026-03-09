<x-pencari_kerja.layout>
    <!-- Wrapper utama halaman edit profile -->
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y mt-5">
            <div class="row">
                <div class="col-12">
                    <!-- Card utama edit profile -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">EDIT PROFILE</h5> <!-- Judul card -->
                        </div>

                        <div class="card-body">
                            <!-- Form update profile -->
                            <form action="{{ route('pencarikerja.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT') <!-- Method PUT untuk update -->
                                @csrf <!-- Token CSRF -->

                                <div class="row">
                                    <!-- Nama Lengkap -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input name="nama_pencari_kerja" class="form-control @error('nama_pencari_kerja') is-invalid @enderror" value="{{ old('nama_pencari_kerja', $user->nama_pencari_kerja) }}" placeholder="Tambahkan nama lengkap anda">
                                        @error('nama_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- NIM -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa stikom)</label>
                                        <input name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $user->nim) }}" placeholder="Tambahkan NIM (jika mahasiswa stikom)">
                                        @error('nim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_pencari_kerja" class="form-control @error('email_pencari_kerja') is-invalid @enderror" value="{{ old('email_pencari_kerja', $user->email_pencari_kerja) }}" placeholder="Tambahkan alamat email anda">
                                        @error('email_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- No.Telp -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="no_telp_pencari_kerja" class="form-control @error('no_telp_pencari_kerja') is-invalid @enderror" value="{{ old('no_telp_pencari_kerja', $user->no_telp_pencari_kerja) }}" placeholder="Tambahkan nomor telepon anda">
                                        @error('no_telp_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Alamat -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat_pencari_kerja" class="form-control @error('alamat_pencari_kerja') is-invalid @enderror" value="{{ old('alamat_pencari_kerja', $user->alamat_pencari_kerja) }}" placeholder="Tambahkan alamat lengkap anda">
                                        @error('alamat_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- LinkedIn -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.id</label>
                                        <input name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', $user->linkedin) }}" placeholder="Tambahkan link profile LinkedIn anda">
                                        @error('linkedin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Pendidikan Terakhir -->
                                    <div class="col-md-4 mb-4">
                                        <label for="defaultSelect" class="form-label">Pendidikan Terakhir</label>
                                        <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            @foreach ([
                                            'Pendidikan Terakhir SMA/sederajat',
                                            'Pendidikan Terakhir D1',
                                            'Pendidikan Terakhir D2',
                                            'Pendidikan Terakhir D3',
                                            'Pendidikan Terakhir S1',
                                            'Pendidikan Terakhir S2',
                                            'Pendidikan Terakhir S3'
                                            ] as $p)
                                                <option value="{{ $p }}" {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == $p ? 'selected' : '' }}>
                                                    {{ $p }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Upload CV -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Upload CV</label>
                                        <input name="cv" type="file" class="form-control @error('cv') is-invalid @enderror" accept="application/pdf">
                                        @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Foto Profile -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Foto Profile</label>
                                        <input id="fotoProfileInput" name="foto_pencari_kerja" type="file" class="form-control @error('foto_pencari_kerja') is-invalid @enderror" accept="image/png,image/jpeg,image/jpg">
                                        <small class="text-danger d-none" id="fotoProfileError">
                                        Ukuran file terlalu besar. Maksimal 2MB.
                                        </small>
                                        @error('foto_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tentang Saya -->
                                    <div class="col-md-12 mb-4">
                                        <label for="exampleFormControlTextarea1" class="form-label">Tentang Saya</label>
                                        <textarea name="deskripsi_diri" class="form-control @error('deskripsi_diri') is-invalid @enderror" rows="3">{{ old('deskripsi_diri', $user->deskripsi_diri) }}</textarea>
                                        @error('deskripsi_diri')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tombol submit -->
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- End card -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer halaman edit profile -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </div>
    </footer>
    <script>
    document.getElementById('fotoProfileInput').addEventListener('change', function () {

        const file = this.files[0];
        const maxSize = 2 * 1024 * 1024; // 2MB
        const error = document.getElementById('fotoProfileError');

        if (!file) return;

        if (file.size > maxSize) {
            error.classList.remove('d-none');
            this.value = ''; // reset file
        } else {
            error.classList.add('d-none');
        }
    });
    </script>
</x-pencari_kerja.layout>