<x-pencari_kerja.layout>

    <!-- Content wrapper -->
    <div class="content-wrapper-user">

        <div class="container-xxl flex-grow-1 container-p-y mt-5">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <div class="card-header">
                                <h5 class="mb-0 fw-bold">EDIT PROFILE</h5>
                            </div>

                            <form action="{{ route('pencarikerja.profile.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">

                                @method('PUT')
                                @csrf

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>

                                        <input name="nama_pencari_kerja"
                                            class="form-control @error('nama_pencari_kerja') is-invalid @enderror"
                                            value="{{ old('nama_pencari_kerja', $user->nama_pencari_kerja) }}"
                                            placeholder="Tambahkan nama lengkap anda">

                                        @error('nama_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa stikom)</label>

                                        <input name="nim" class="form-control @error('nim') is-invalid @enderror"
                                            value="{{ old('nim', $user->nim) }}"
                                            placeholder="Tambahkan NIM (jika mahasiswa stikom)">

                                        @error('nim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>

                                        <input name="email_pencari_kerja"
                                            class="form-control @error('email_pencari_kerja') is-invalid @enderror"
                                            value="{{ old('email_pencari_kerja', $user->email_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat email anda">

                                        @error('email_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>

                                        <input name="no_telp_pencari_kerja"
                                            class="form-control @error('no_telp_pencari_kerja') is-invalid @enderror"
                                            value="{{ old('no_telp_pencari_kerja', $user->no_telp_pencari_kerja) }}"
                                            placeholder="Tambahkan nomor telepon anda">

                                        @error('no_telp_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>

                                        <input name="alamat_pencari_kerja"
                                            class="form-control @error('alamat_pencari_kerja') is-invalid @enderror"
                                            value="{{ old('alamat_pencari_kerja', $user->alamat_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat lengkap anda">

                                        @error('alamat_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.id</label>

                                        <input name="linkedin"
                                            class="form-control @error('linkedin') is-invalid @enderror"
                                            value="{{ old('linkedin', $user->linkedin) }}"
                                            placeholder="Tambahkan link profile LinkedIn anda">

                                        @error('linkedin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Pendidikan Terakhir</label>

                                        <select name="pendidikan_terakhir"
                                            class="form-select @error('pendidikan_terakhir') is-invalid @enderror">

                                            <option value="">Pilih Pendidikan Terakhir</option>

                                            @foreach ([
                                                    'Pendidikan Terakhir SMA/Sederajat',
                                                    'Pendidikan Terakhir D1',
                                                    'Pendidikan Terakhir D2',
                                                    'Pendidikan Terakhir D3',
                                                    'Pendidikan Terakhir S1',
                                                    'Pendidikan Terakhir S2',
                                                    'Pendidikan Terakhir S3'
                                                ] as $p)

                                                    <option
                                                        value="{{ $p }}"
                                                        {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == $p ? 'selected' : '' }}>
                                                    {{ $p }}
                                                    </option>

                                            @endforeach

                                        </select>

                                        @error('pendidikan_terakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Upload CV</label>
                                        <input
                                            name="cv"
                                            type="file"
                                            class="form-control @error('cv') is-invalid @enderror"
                                            accept="application/pdf">

                                        @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Foto Profile</label>
                                        <input
                                            name="foto_pencari_kerja"
                                            type="file"
                                            class="form-control @error('foto_pencari_kerja') is-invalid @enderror"
                                            accept="image/png,image/jpeg,image/jpg">

                                        @error('foto_pencari_kerja')
                                               <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-6">
                                    <label class="form-label">Tentang Saya</label>

                                        <textarea
                                            name="deskripsi_diri"
                                            class="form-control @error('deskripsi_diri') is-invalid @enderror"
                                            rows="3">{{ old('deskripsi_diri', $user->deskripsi_diri) }}</textarea>

                                        @error('deskripsi_diri')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-mb text-end">
                                        <button type="submit" class="btn btn-warning">
                                            Simpan Perubahan
                                        </button>
                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>


                   </div>
    <!-- / Content wrapper -->


    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

</x-pencari_kerja.layout>