<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">Edit Loker</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input name="NamaPerusahaan" type="text" class="form-control"
                                            placeholder="Tambahkan nama perusahaan">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="Jabatan" type="text" class="form-control"
                                            placeholder="Tambahkan jabatan">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="Email" type="text" class="form-control"
                                            placeholder="Tambahkan email perusahaan">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="NoTelp" type="text" class="form-control"
                                            placeholder="Tambahkan nomor telepon perusahaan">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input name="TanggalMulai" type="date" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input name="TanggalSelesai" type="date" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Logo Perusahaan</label>
                                        <input name="LogoPerusahaan" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker</label>
                                        <input name="PosterLoker" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Provinsi</label>
                                        <select name="Provinsi" id="defaultSelect" class="form-select">
                                            <option>Pilih provinsi</option>
                                            <option value="Bali">Bali</option>
                                            <option value="Banda Aceh">Banda Aceh</option>
                                            <option value="Medan">Medan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Kabupaten</label>
                                        <select name="Kabupaten" id="defaultSelect" class="form-select">
                                            <option>Pilih kabupaten</option>
                                            <option value="Tabanan">Tabanan</option>
                                            <option value="Buleleng">Buleleng</option>
                                            <option value="Badung">Badung</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Kecamatan</label>
                                        <select name="Kecamatan" id="defaultSelect" class="form-select">
                                            <option>Pilih kecamatan</option>
                                            <option value="Tabanan">Kediri</option>
                                            <option value="Buleleng">Kerambitan</option>
                                            <option value="Badung">Selemadeg</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="Alamat" type="text" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="defaultSelect" class="form-label">Model Kerja</label>
                                        <select name="ModelKerja" id="defaultSelect" class="form-select">
                                            <option>Pilih model kerja</option>
                                            <option value="Work From Office">Work From Office</option>
                                            <option value="Work From Home">Work From Home</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="defaultSelect" class="form-label">Tipe loker</label>
                                        <select name="TipeLoker" id="defaultSelect" class="form-select">
                                            <option>Pilih tipe loker</option>
                                            <option value="Job Opportunity">Job Opportunity</option>
                                            <option value="Internship">Internship</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="defaultSelect" class="form-label">Minimal Pendidikan</label>
                                        <select name="MinimalPendidikan" id="defaultSelect" class="form-select">
                                            <option>Pilih minimal pendidikan</option>
                                            <option value="Minimal Pendidikan SMA/ Sederajat">Minimal Pendidikan SMA/
                                                Sederajat</option>
                                            <option value="Minimal Pendidikan D1">Minimal Pendidikan D1</option>
                                            <option value="Minimal Pendidikan D2">Minimal Pendidikan D2</option>
                                            <option value="Minimal Pendidikan D3">Minimal Pendidikan D3</option>
                                            <option value="Minimal Pendidikan S1">Minimal Pendidikan S1</option>
                                            <option value="Minimal Pendidikan S2">Minimal Pendidikan S2</option>
                                            <option value="Minimal Pendidikan S3">Minimal Pendidikan S3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label for="exampleFormControlTextarea1" class="form-label">Kualifikasi</label>
                                        <textarea name="Kualifikasi" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="col-mb text-end">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </div>
                                </div>
                            </form> --}}
                            <form action="{{ route('perusahaan.loker.edit', $loker->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <!-- Nama Perusahaan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}" readonly>
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control"
                                            value="{{ old('jabatan', $loker->jabatan) }}">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control"
                                            value="{{ $loker->perusahaanMitra->email_perusahaan }}" readonly>
                                    </div>

                                    <!-- No Telp -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp</label>
                                        <input type="text" class="form-control"
                                            value="{{ $loker->perusahaanMitra->no_telp_perusahaan }}" readonly>
                                    </div>

                                    <!-- Tanggal Mulai -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input name="tanggal_mulai" type="date" class="form-control"
                                            value="{{ old('tanggal_mulai_loker', $loker->tanggal_mulai_loker) }}">
                                    </div>

                                    <!-- Tanggal Berakhir -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input name="tanggal_berakhir" type="date" class="form-control"
                                            value="{{ old('tanggal_berakhir_loker', $loker->tanggal_berakhir_loker) }}">
                                    </div>

                                    <!-- Poster -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker</label>
                                        <input name="poster_loker" type="file" class="form-control">
                                    </div>

                                    <!-- Provinsi -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <select name="provinsi" class="form-select">
                                            <option value="Bali"{{ $loker->provinsi == 'Bali' ? 'selected' : '' }}>Bali</option>
                                            <option value="Banda Aceh"{{ $loker->provinsi == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh</option>
                                            <option value="Medan"{{ $loker->provinsi == 'Medan' ? 'selected' : '' }}>Medan</option>
                                            <option value="Jakarta"{{ $loker->provinsi == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                        </select>
                                    </div>

                                    <!-- Kabupaten -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <select name="kabupaten" class="form-select">
                                            <option value="Tabanan"{{ $loker->kabupaten == 'Tabanan' ? 'selected' : '' }}>Tabanan</option>
                                            <option value="Buleleng"{{ $loker->kabupaten == 'Buleleng' ? 'selected' : '' }}>Buleleng</option>
                                            <option value="Badung"{{ $loker->kabupaten == 'Badung' ? 'selected' : '' }}>Badung</option>
                                            <option value="Jakarta Selatan"{{ $loker->kabupaten == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                                        </select>
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select name="kecamatan" class="form-select">
                                            <option value="Kediri"{{ $loker->kecamatan == 'Kediri' ? 'selected' : '' }}>Kediri</option>
                                            <option value="Kerambitan"{{ $loker->kecamatan == 'Kerambitan' ? 'selected' : '' }}>Kerambitan</option>
                                            <option value="Selemadeg"{{ $loker->kecamatan == 'Selemadeg' ? 'selected' : '' }}>Selemadeg</option>
                                            <option value="Cilandak"{{ $loker->kecamatan == 'Cilandak' ? 'selected' : '' }}>Cilandak</option>
                                        </select>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control"
                                            value="{{ old('alamat', $loker->alamat) }}">
                                    </div>

                                    <!-- Model Kerja -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Model Kerja</label>
                                        <select name="model_kerja" class="form-select">
                                            <option value="WFH" {{ $loker->model_kerja == 'WFH' ? 'selected' : '' }}>WFH</option>
                                            <option value="WFO" {{ $loker->model_kerja == 'WFO' ? 'selected' : '' }}>WFO</option>
                                            <option value="Hybrid" {{ $loker->model_kerja == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                    </div>

                                    <!-- Tipe Loker -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tipe Loker</label>
                                        <select name="tipe_loker" class="form-select">
                                            <option value="job_opportunity" {{ $loker->tipe_loker == 'job_opportunity' ? 'selected' : '' }}>Job</option>
                                            <option value="internship" {{ $loker->tipe_loker == 'internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                    </div>

                                    <!-- Pendidikan -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Minimal Pendidikan</label>
                                        <select name="minimal_pendidikan" class="form-select">
                                            <option value="SMA/Sederajat" {{ $loker->minimal_pendidikan == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                                            <option value="D1" {{ $loker->minimal_pendidikan == 'D1' ? 'selected' : '' }}>D1</option>
                                            <option value="D2" {{ $loker->minimal_pendidikan == 'D2' ? 'selected' : '' }}>D2</option>
                                            <option value="D3" {{ $loker->minimal_pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="S1" {{ $loker->minimal_pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ $loker->minimal_pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ $loker->minimal_pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                    </div>

                                    <!-- Kualifikasi -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Kualifikasi</label>
                                        <textarea name="kualifikasi" class="form-control"
                                            rows="4">{{ old('kualifikasi', $loker->kualifikasi) }}</textarea>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-warning">Update Loker</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- / Content -->

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

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</x-admin_perusahaan.layout>