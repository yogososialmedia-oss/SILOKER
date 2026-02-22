<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold text-primary">FORM APPLY</h5>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" 
                        action="{{ route('pencarikerja.loker.apply.store', $loker) }}" 
                        enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input name="nama" class="form-control"
                                            value="{{ old('nama', $pencari->nama_pencari_kerja) }}"
                                            placeholder="Tambahkan nama lengkap anda">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa stikom)</label>
                                        <input name="nim" class="form-control"
                                            value="{{ old('nim', $pencari->nim) }}"
                                            placeholder="Tambahkan NIM (jika mahasiswa stikom)">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.id</label>
                                        <input name="linkedin" class="form-control"
                                            value="{{ old('linkedin', $pencari->linkedin) }}"
                                            placeholder="Tambahkan link profile linked.id anda">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload CV</label>
                                        <input name="cv" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Pendidikan Terakhir</label>
                                        <select name="pendidikan_terakhir" id="defaultSelect" class="form-select">
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <option value="Pendidikan Terakhir SMA/sederajat"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir SMA/sederajat' ? 'selected' : '' }}>
                                                Pendidikan Terakhir SMA/sederajat
                                            </option>
                                            <option value="Pendidikan Terakhir D1"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir D1' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D1
                                            </option>
                                            <option value="Pendidikan Terakhir D2"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir D2' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D2
                                            </option>
                                            <option value="Pendidikan Terakhir D3"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir D3' ? 'selected' : '' }}>
                                                Pendidikan Terakhir D3
                                            </option>
                                            <option value="Pendidikan Terakhir S1"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir S1' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S1
                                            </option>
                                            <option value="Pendidikan Terakhir S2"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir S2' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S2
                                            </option>
                                            <option value="Pendidikan Terakhir S3"
                                                {{ old('pendidikan_terakhir', $pencari->pendidikan_terakhir) == 'Pendidikan Terakhir S3' ? 'selected' : '' }}>
                                                Pendidikan Terakhir S3
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email" class="form-control"
                                            value="{{ old('email', $pencari->email_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat email anda">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="no_telp" class="form-control"
                                            value="{{ old('no_telp', $pencari->no_telp_pencari_kerja) }}"
                                            placeholder="Tambahkan nomor telepon anda">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" class="form-control"
                                            value="{{ old('alamat', $pencari->alamat_pencari_kerja) }}"
                                            placeholder="Tambahkan alamat lengkap anda">
                                        <div class="form-text"></div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl py-4">
                ©2026 Yogo & Wahyu
            </div>
        </footer>
    </div>
</x-pencari_kerja.layout>