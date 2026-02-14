<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">Input Loker</h5>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('perusahaan.loker.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- Nama Perusahaan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $info_perusahaan->nama_perusahaan ?? '' }}" readonly>
                                    </div>

                                    {{-- Jabatan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control"
                                            value="{{ old('jabatan') }}">
                                        @error('jabatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_perusahaan" type="email" class="form-control"
                                            value="{{ old('email_perusahaan', $info_perusahaan->email_perusahaan ?? '') }}">
                                        @error('email_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- No Telp --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp</label>
                                        <input name="no_telp_perusahaan" type="text" class="form-control"
                                            value="{{ old('no_telp_perusahaan', $info_perusahaan->no_telp_perusahaan ?? '') }}">
                                        @error('no_telp_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Tanggal Mulai --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" name="tanggal_mulai_loker" type="date"
                                            class="form-control" min="{{ now()->toDateString() }}"
                                            value="{{ old('tanggal_mulai_loker') }}">
                                        @error('tanggal_mulai_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Tanggal Berakhir --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" name="tanggal_berakhir_loker" type="date"
                                            class="form-control" disabled value="{{ old('tanggal_berakhir_loker') }}">
                                        @error('tanggal_berakhir_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Poster --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker (Format: JPG / PNG· Maksimal 2MB)</label>
                                        <input name="poster_loker" type="file" class="form-control" id="posterLoker"
                                            accept="image/*">
                                        <small id="posterError" class="text-danger d-none">Ukuran poster maksimal
                                            2MB</small>
                                        @error('poster_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Provinsi --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <select name="provinsi" class="form-select">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="Bali" {{ old('provinsi') == 'Bali' ? 'selected' : '' }}>Bali
                                            </option>
                                            <option value="Banda Aceh" {{ old('provinsi') == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh</option>
                                            <option value="Medan" {{ old('provinsi') == 'Medan' ? 'selected' : '' }}>Medan
                                            </option>
                                        </select>
                                        @error('provinsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Kabupaten --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <select name="kabupaten" class="form-select">
                                            <option value="">Pilih Kabupaten</option>
                                            <option value="Tabanan" {{ old('kabupaten') == 'Tabanan' ? 'selected' : '' }}>
                                                Tabanan</option>
                                            <option value="Buleleng" {{ old('kabupaten') == 'Buleleng' ? 'selected' : '' }}>Buleleng</option>
                                            <option value="Badung" {{ old('kabupaten') == 'Badung' ? 'selected' : '' }}>
                                                Badung</option>
                                        </select>
                                        @error('kabupaten')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Kecamatan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select name="kecamatan" class="form-select">
                                            <option value="">Pilih Kecamatan</option>
                                            <option value="Kediri" {{ old('kecamatan') == 'Kediri' ? 'selected' : '' }}>
                                                Kediri</option>
                                            <option value="Kerambitan" {{ old('kecamatan') == 'Kerambitan' ? 'selected' : '' }}>Kerambitan</option>
                                            <option value="Selemadeg" {{ old('kecamatan') == 'Selemadeg' ? 'selected' : '' }}>Selemadeg</option>
                                        </select>
                                        @error('kecamatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control"
                                            value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Model Kerja --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model Kerja</label>
                                        <select name="model_kerja" class="form-select">
                                            <option value="">Pilih model kerja</option>
                                            <option value="WFH" {{ old('model_kerja') == 'WFH' ? 'selected' : '' }}>WFH
                                            </option>
                                            <option value="WFO" {{ old('model_kerja') == 'WFO' ? 'selected' : '' }}>WFO
                                            </option>
                                            <option value="Hybrid" {{ old('model_kerja') == 'Hybrid' ? 'selected' : '' }}>
                                                Hybrid</option>
                                        </select>
                                        @error('model_kerja')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Tipe Loker --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tipe Loker</label>
                                        <select name="tipe_loker" class="form-select">
                                            <option value="">Pilih tipe loker</option>
                                            <option value="job_opportunity" {{ old('tipe_loker') == 'job_opportunity' ? 'selected' : '' }}>Job Opportunity</option>
                                            <option value="internship" {{ old('tipe_loker') == 'internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                        @error('tipe_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Minimal Pendidikan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Minimal Pendidikan</label>
                                        <select name="minimal_pendidikan" class="form-select">
                                            <option value="">Pilih Pendidikan</option>
                                            @foreach(['SMA/Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'] as $p)
                                                <option value="{{ $p }}" {{ old('minimal_pendidikan') == $p ? 'selected' : '' }}>
                                                    {{ $p }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('minimal_pendidikan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Deskripsi --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Kualifikasi</label>
                                        <textarea name="deskripsi" class="form-control"
                                            rows="3">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary">Upload</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl py-4">
                ©2026 Yogo & Wahyu
            </div>
        </footer>
    </div>

    @push('scripts')
        {{-- VALIDASI FILE --}}
        <script>
            document.getElementById('posterLoker').addEventListener('change', function () {
                const file = this.files[0];
                const maxSize = 2 * 1024 * 1024;
                const error = document.getElementById('posterError');

                if (file && file.size > maxSize) {
                    error.classList.remove('d-none');
                    this.value = '';
                } else {
                    error.classList.add('d-none');
                }
            });

            // Tanggal Mulai & Berakhir
            document.addEventListener('DOMContentLoaded', function () {
                const mulai = document.getElementById('tanggal_mulai');
                const selesai = document.getElementById('tanggal_selesai');
                const today = new Date().toISOString().split('T')[0];

                function syncTanggal() {
                    if (!mulai.value) {
                        selesai.disabled = true;
                        selesai.value = '';
                        return;
                    }
                    selesai.disabled = false;
                    selesai.min = mulai.value > today ? mulai.value : today;
                    if (selesai.value && selesai.value < selesai.min) selesai.value = '';
                }

                syncTanggal();
                mulai.addEventListener('change', syncTanggal);
            });
        </script>
    @endpush
</x-admin_perusahaan.layout>