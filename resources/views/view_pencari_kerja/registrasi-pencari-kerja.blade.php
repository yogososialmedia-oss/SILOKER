<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0 fw-bold">REGISTRASI PENCARI KERJA</h5>
                                </div>
                        </div>


                        <div class="card-body">

                            <form action="{{ route('pencarikerja.register.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- NAMA --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input name="nama_pencari_kerja"
                                            value="{{ old('nama_pencari_kerja') }}"
                                            class="form-control @error('nama_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan nama lengkap anda">
                                        @error('nama_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NIM --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa STIKOM)</label>
                                        <input name="nim" value="{{ old('nim') }}" class="form-control"
                                            placeholder="Tambahkan NIM ">
                                    </div>

                                    {{-- NO TELP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp</label>
                                        <input name="no_telp_pencari_kerja"
                                            value="{{ old('no_telp_pencari_kerja') }}"
                                            class="form-control @error('no_telp_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan nomor telepon">
                                        @error('no_telp_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ALAMAT --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat_pencari_kerja"
                                            value="{{ old('alamat_pencari_kerja') }}"
                                            class="form-control @error('alamat_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan alamat lengkap">
                                        @error('alamat_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PENDIDIKAN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pendidikan Terakhir</label>
                                        <select name="pendidikan_terakhir" class="form-select">
                                            <option value="">Pilih Pendidikan</option>
                                            @foreach (['SMA/Sederajat','D1','D2','D3','S1','S2','S3'] as $p)
                                                <option value="{{ $p }}"
                                                    {{ old('pendidikan_terakhir') == $p ? 'selected' : '' }}>
                                                    {{ $p }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- LINKEDIN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">LinkedIn</label>
                                        <input name="linkedin" value="{{ old('linkedin') }}"
                                            class="form-control" placeholder="Tambahkan link profile Linked.In">
                                    </div>

                                    {{-- CV --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload CV (PDF)</label>
                                        <input name="cv" type="file"
                                            class="form-control @error('cv') is-invalid @enderror">
                                        @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- FOTO --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Foto Profile</label>
                                        <input name="foto_pencari_kerja" type="file"
                                            class="form-control @error('foto_pencari_kerja') is-invalid @enderror">
                                        @error('foto_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- DESKRIPSI --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Tentang Saya</label>
                                        <textarea name="deskripsi_diri" class="form-control"
                                            rows="3">{{ old('deskripsi_diri') }}</textarea>
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_pencari_kerja"
                                            value="{{ old('email_pencari_kerja') }}"
                                            class="form-control @error('email_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan email anda">
                                        @error('email_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PASSWORD --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password_pencari_kerja"
                                            class="form-control @error('password_pencari_kerja') is-invalid @enderror"
                                            placeholder="Buat password minimal 8 karakter">
                                        @error('password_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- SUBMIT --}}
                                    <div class="col-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            Registrasi
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl">
                    <div
                        class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©2026 Yogo & Wahyu
                        </div>
                    </div>
                </div>
            </footer>
        <!-- / Footer -->
    </div>

</x-pencari_kerja.layout>
