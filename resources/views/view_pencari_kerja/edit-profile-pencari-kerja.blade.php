<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h5 class="mb-0 fw-bold ">EDIT PROFILE</h5>
                            </div>                    

                            <form action="{{ route('pencarikerja.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama</label>
                                        <input name="nama_pencari_kerja" class="form-control" value="{{ old('nama_pencari_kerja', $user->nama_pencari_kerja) }}"
                                            placeholder="Tambahkan nama lengkap anda">
                                        @error('nama_pencari_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa stikom)</label>
                                        <input name="nim" class="form-control" value="{{ old('nim', $user->nim) }}"
                                            placeholder="Tambahkan NIM (jika mahasiswa stikom)">
                                        @error('nim')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_pencari_kerja" class="form-control" value="{{ old('email_pencari_kerja', $user->email_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat email anda">
                                        @error('email_pencari_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="no_telp_pencari_kerja" class="form-control" value="{{ old('no_telp_pencari_kerja', $user->no_telp_pencari_kerja) }}"
                                            placeholder="Tambahkan nomor telepon anda">
                                        @error('no_telp_pencari_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat_pencari_kerja" type="text" class="form-control" value="{{ old('alamat_pencari_kerja', $user->alamat_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat lengkap anda">
                                        @error('alamat_pencari_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.id</label>
                                        <input name="linkedin" class="form-control" value="{{ old('linkedin', $user->linkedin) }}"
                                            placeholder="Tambahkan link profile linked.id anda">
                                        @error('linkedin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <label for="defaultSelect" class="form-label">Pendidikan Terakhir</label>
                                        <select name="pendidikan_terakhir" class="form-select">
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <option value="Pendidikan Terakhir SMA/Sederajat"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir SMA/Sederajat' ? 'selected' : '' }}>
                                                Pendidikan Terakhir SMA/Sederajat
                                            </option>
                                            <option value="Pendidikan Terakhir D1"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir D1' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D1
                                            </option>
                                            <option value="Pendidikan Terakhir D2"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir D2' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D2
                                            </option>
                                            <option value="Pendidikan Terakhir D3"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir D3' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D3
                                            </option>
                                            <option value="Pendidikan Terakhir S1"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir S1' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S1
                                            </option>
                                            <option value="Pendidikan Terakhir S2"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir S2' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S2
                                            </option>
                                            <option value="Pendidikan Terakhir S3"
                                                {{ $user->pendidikan_terakhir == 'Pendidikan Terakhir S3' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S3
                                            </option>
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Upload CV</label>
                                        <input name="cv" type="file" class="form-control">
                                        @error('cv')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Foto Profile</label>
                                        <input name="foto_pencari_kerja" type="file" class="form-control">
                                        @error('foto_pencari_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-6">
                                        <label for="exampleFormControlTextarea1" class="form-label">Tentang Saya</label>
                                        <textarea name="deskripsi_diri" class="form-control" rows="3">{{ old('deskripsi_diri', $user->deskripsi_diri) }}</textarea>
                                        @error('deskripsi_diri')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-mb text-end">
                                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content wrapper -->

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
</x-pencari_kerja.layout>