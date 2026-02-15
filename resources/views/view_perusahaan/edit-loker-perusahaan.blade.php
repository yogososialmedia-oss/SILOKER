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
                                <h5 class="mb-0 fw-bold">EDIT LOKER</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('perusahaan.loker.update', $loker->id) }}" method="POST"
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
                                        @error('jabatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_perusahaan" type="text" class="form-control"
                                            value="{{ old('email_perusahaan', $loker->email_perusahaan) }}">
                                        @error('email_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- No Telp -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp</label>
                                        <input type="text" name="no_telp_perusahaan" class="form-control"
                                            value="{{ old('no_telp_perusahaan', $loker->perusahaanMitra->no_telp_perusahaan ?? '') }}">
                                        @error('no_telp_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Mulai -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" name="tanggal_mulai_loker" type="date"
                                            class="form-control"
                                            value="{{ old('tanggal_mulai_loker', $loker->tanggal_mulai_loker) }}"
                                            min="{{ now()->toDateString() }}">
                                        @error('tanggal_mulai_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Berakhir -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" name="tanggal_berakhir_loker" type="date"
                                            class="form-control"
                                            value="{{ old('tanggal_berakhir_loker', $loker->tanggal_berakhir_loker) }}"
                                            min="{{ old('tanggal_mulai_loker', $loker->tanggal_mulai_loker) }}">
                                        @error('tanggal_berakhir_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Poster -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker (Format: JPG / PNG · Maksimal
                                            2MB)</label>
                                        <input name="poster_loker" type="file" class="form-control" id="posterLoker"
                                            accept="image/*">
                                        <small class="text-danger d-none" id="posterError">Ukuran file terlalu besar.
                                            Maksimal 2MB.</small>
                                        @error('poster_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Provinsi -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        @php $provinsi = old('provinsi', $loker->provinsi); @endphp
                                        <select name="provinsi" id="provinsi" class="form-select">
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                    </div>

                                    <!-- Kabupaten -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        @php $kabupaten = old('kabupaten', $loker->kabupaten); @endphp
                                        <select name="kabupaten" id="kabupaten" class="form-select" disabled>
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        @php $kecamatan = old('kecamatan', $loker->kecamatan); @endphp
                                        <select name="kecamatan" id="kecamatan" class="form-select" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control"
                                            value="{{ old('alamat', $loker->alamat) }}">
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Model Kerja -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model Kerja</label>
                                        @php $model = old('model_kerja', $loker->model_kerja); @endphp
                                        <select name="model_kerja" class="form-select">
                                            <option value="">Pilih model kerja</option>
                                            <option value="Work From Home" {{ $model == 'Work From Home' ? 'selected' : '' }}>Work From Home</option>
                                            <option value="Work From Office" {{ $model == 'Work From Office' ? 'selected' : '' }}>Work From Office</option>
                                            <option value="Hybrid" {{ $model == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Tipe Loker -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tipe Loker</label>
                                        @php $tipe = old('tipe_loker', $loker->tipe_loker); @endphp
                                        <select name="tipe_loker" class="form-select">
                                            <option value="">Pilih tipe loker</option>
                                            <option value="job_opportunity" {{ $tipe == 'job_opportunity' ? 'selected' : '' }}>Job Opportunity</option>
                                            <option value="internship" {{ $tipe == 'internship' ? 'selected' : '' }}>
                                                Internship</option>
                                        </select>
                                    </div>

                                    <!-- Pendidikan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Minimal Pendidikan</label>
                                        @php $pendidikan = old('minimal_pendidikan', $loker->minimal_pendidikan); @endphp
                                        <select name="minimal_pendidikan" class="form-select">
                                            <option value="">Pilih Minimal Pendidikan</option>
                                            <option value="Minimal Pendidikan SMA/Sederajat" {{ $pendidikan == 'Minimal Pendidikan SMA/Sederajat' ? 'selected' : '' }}>Minimal Pendidikan
                                                SMA/Sederajat</option>
                                            <option value="Minimal Pendidikan D1" {{ $pendidikan == 'Minimal Pendidikan D1' ? 'selected' : '' }}>Minimal Pendidikan D1</option>
                                            <option value="Minimal Pendidikan D2" {{ $pendidikan == 'Minimal Pendidikan D2' ? 'selected' : '' }}>Minimal Pendidikan D2</option>
                                            <option value="Minimal Pendidikan D3" {{ $pendidikan == 'Minimal Pendidikan D3' ? 'selected' : '' }}>Minimal Pendidikan D3</option>
                                            <option value="Minimal Pendidikan S1" {{ $pendidikan == 'Minimal Pendidikan S1' ? 'selected' : '' }}>Minimal Pendidikan S1</option>
                                            <option value="Minimal Pendidikan S2" {{ $pendidikan == 'Minimal Pendidikan S2' ? 'selected' : '' }}>Minimal Pendidikan S2</option>
                                            <option value="Minimal Pendidikan S3" {{ $pendidikan == 'Minimal Pendidikan S3' ? 'selected' : '' }}>Minimal Pendidikan S3</option>
                                        </select>
                                        @error('minimal_pendidikan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Kualifikasi -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Kualifikasi</label>
                                        <textarea name="deskripsi" class="form-control"
                                            rows="4">{{ old('deskripsi', $loker->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="text-end">
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

        <div class="content-backdrop fade"></div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const provinsi = document.getElementById('provinsi');
                const kabupaten = document.getElementById('kabupaten');
                const kecamatan = document.getElementById('kecamatan');

                const selectedProvinsi = "{{ old('provinsi', $loker->provinsi) }}";
                const selectedKabupaten = "{{ old('kabupaten', $loker->kabupaten) }}";
                const selectedKecamatan = "{{ old('kecamatan', $loker->kecamatan) }}";

                // =====================
                // LOAD PROVINSI
                // =====================
                fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                    .then(res => res.json())
                    .then(data => {
                        let html = '<option value="">Pilih Provinsi</option>';
                        data.forEach(item => {
                            const selected = item.name === selectedProvinsi ? 'selected' : '';
                            html += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                        });
                        provinsi.innerHTML = html;

                        if (selectedProvinsi) loadKabupaten();
                    });

                // =====================
                // LOAD KABUPATEN
                // =====================
                function loadKabupaten() {
                    const provinsiId = provinsi.selectedOptions[0].dataset.id;
                    if (!provinsiId) return;

                    kabupaten.disabled = true;
                    kecamatan.disabled = true;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${provinsiId}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let html = '<option value="">Pilih Kabupaten</option>';
                            data.forEach(item => {
                                const selected = item.name === selectedKabupaten ? 'selected' : '';
                                html += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                            });
                            kabupaten.innerHTML = html;
                            kabupaten.disabled = false;

                            if (selectedKabupaten) loadKecamatan();
                        });
                }

                // =====================
                // LOAD KECAMATAN
                // =====================
                function loadKecamatan() {
                    const kabupatenId = kabupaten.selectedOptions[0].dataset.id;
                    if (!kabupatenId) return;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${kabupatenId}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let html = '<option value="">Pilih Kecamatan</option>';
                            data.forEach(item => {
                                const selected = item.name === selectedKecamatan ? 'selected' : '';
                                html += `<option value="${item.name}" ${selected}>${item.name}</option>`;
                            });
                            kecamatan.innerHTML = html;
                            kecamatan.disabled = false;
                        });
                }

                provinsi.addEventListener('change', loadKabupaten);
                kabupaten.addEventListener('change', loadKecamatan);

            });
        </script>
    @endpush

</x-admin_perusahaan.layout>