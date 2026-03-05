<x-admin_perusahaan.layout>
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
                            <form action="{{ route('perusahaan.loker.update', $loker->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Nama Perusahaan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" value="{{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}" readonly>
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control" value="{{ old('jabatan', $loker->jabatan) }}">
                                        @error('jabatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_perusahaan" type="text" class="form-control" value="{{ old('email_perusahaan', $loker->email_perusahaan) }}">
                                        @error('email_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- No Telp -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. Telp</label>
                                        <input type="text" name="no_telp_perusahaan" class="form-control" value="{{ old('no_telp_perusahaan', $loker->perusahaanMitra->no_telp_perusahaan ?? '') }}">
                                        @error('no_telp_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Mulai -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" name="tanggal_mulai_loker" type="date" class="form-control" value="{{ old('tanggal_mulai_loker', \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->format('Y-m-d')) }}" min="{{ now()->toDateString() }}">
                                        @error('tanggal_mulai_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Berakhir -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" name="tanggal_berakhir_loker" type="date" class="form-control" value="{{ old('tanggal_berakhir_loker', \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->format('Y-m-d')) }}" min="{{ old('tanggal_mulai_loker', $loker->tanggal_mulai_loker) }}">
                                        @error('tanggal_berakhir_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Poster -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker (Format: JPG / PNG · Maksimal 2MB)</label>
                                        <input name="poster_loker" type="file" class="form-control" id="posterLoker" accept="image/*">
                                        <small class="text-danger d-none" id="posterError">Ukuran file terlalu besar. Maksimal 2MB.</small>
                                        @error('poster_loker')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Provinsi -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-select @error('provinsi') is-invalid @enderror">
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                        @error('provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Kabupaten -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <select name="kabupaten" id="kabupaten" class="form-select @error('kabupaten') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Alamat -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" value="{{ old('alamat', $loker->alamat) }}">
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Model Kerja -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Model Kerja</label>
                                        <select name="model_kerja" class="form-select @error('model_kerja') is-invalid @enderror">
                                            <option value="">Pilih model kerja</option>
                                            <option value="Work From Home" {{ old('model_kerja', $loker->model_kerja) == 'Work From Home' ? 'selected' : '' }}>Work From Home</option>
                                            <option value="Work From Office" {{ old('model_kerja', $loker->model_kerja) == 'Work From Office' ? 'selected' : '' }}>Work From Office</option>
                                            <option value="Hybrid" {{ old('model_kerja', $loker->model_kerja) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                        @error('model_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tipe Loker -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tipe Loker</label>
                                        <select name="tipe_loker" class="form-select @error('tipe_loker') is-invalid @enderror">
                                            <option value="">Pilih tipe loker</option>
                                            <option value="job_opportunity" {{ old('tipe_loker', $loker->tipe_loker) == 'job_opportunity' ? 'selected' : '' }}>Job Opportunity</option>
                                            <option value="internship" {{ old('tipe_loker', $loker->tipe_loker) == 'internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                        @error('tipe_loker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Minimal Pendidikan -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Minimal Pendidikan</label>
                                        @php $pendidikan = old('minimal_pendidikan', $loker->minimal_pendidikan); @endphp
                                        <select name="minimal_pendidikan" class="form-select">
                                            <option value="">Pilih Minimal Pendidikan</option>
                                            <option value="Minimal Pendidikan SMA/sederajat" {{ $pendidikan == 'Minimal Pendidikan SMA/sederajat' ? 'selected' : '' }}>Minimal Pendidikan SMA/Sederajat</option>
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

                                    <!-- Petunjuk Kualifikasi -->
                                    <div class="alert alert-info mb-3">
                                        <strong>Petunjuk Penulisan Kualifikasi:</strong>
                                        <ul class="mb-0 mt-2">
                                            <li>Gunakan <strong>Heading 3 (H3)</strong> dan <strong>Bold</strong> untuk judul kualifikasi</li>
                                            <li>Gunakan teks biasa untuk penjelasan/detail kualifikasi</li>
                                            <li>Pisahkan setiap poin menggunakan <strong>baris baru atau bullet</strong> agar mudah dibaca</li>
                                        </ul>
                                    </div>

                                    <!-- Kualifikasi -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Kualifikasi</label>
                                        <textarea id="editor" name="deskripsi" class="form-control" rows="6">{{ old('deskripsi', $loker->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
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
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">©2026 Yogo & Wahyu</div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // ==========================================
                // TANGGAL (SUDAH SUPPORT OLD)
                // ==========================================
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
                    let mulaiDate = new Date(mulai.value);
                    mulaiDate.setDate(mulaiDate.getDate() + 1);
                    let minSelesai = mulaiDate.toISOString().split('T')[0];
                    selesai.min = minSelesai;
                    if (selesai.value && selesai.value < minSelesai) {
                        selesai.value = '';
                    }
                }

                syncTanggal();
                mulai.addEventListener('change', syncTanggal);

                // ==========================================
                // WILAYAH INDONESIA (SUPPORT OLD)
                // ==========================================
                const provinsi = document.getElementById('provinsi');
                const kabupaten = document.getElementById('kabupaten');
                const kecamatan = document.getElementById('kecamatan');

                let oldProvinsi = "{{ old('provinsi', $loker->provinsi) }}";
                let oldKabupaten = "{{ old('kabupaten', $loker->kabupaten) }}";
                let oldKecamatan = "{{ old('kecamatan', $loker->kecamatan) }}";

                fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                    .then(res => res.json())
                    .then(data => {
                        let opt = '<option value="">Pilih Provinsi</option>';
                        let selectedProvId = null;
                        data.forEach(item => {
                            let selected = oldProvinsi === item.name ? 'selected' : '';
                            if (selected) selectedProvId = item.id;
                            opt += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                        });
                        provinsi.innerHTML = opt;
                        if (selectedProvId) { loadKabupaten(selectedProvId); }
                    });

                function loadKabupaten(id) {
                    kabupaten.disabled = true;
                    kecamatan.disabled = true;
                    kabupaten.innerHTML = '<option value="">Loading...</option>';
                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kabupaten</option>';
                            let selectedKabId = null;
                            data.forEach(item => {
                                let selected = oldKabupaten === item.name ? 'selected' : '';
                                if (selected) selectedKabId = item.id;
                                opt += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                            });
                            kabupaten.innerHTML = opt;
                            kabupaten.disabled = false;
                            if (selectedKabId) { loadKecamatan(selectedKabId); }
                        });
                }

                function loadKecamatan(id) {
                    kecamatan.disabled = true;
                    kecamatan.innerHTML = '<option value="">Loading...</option>';
                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kecamatan</option>';
                            data.forEach(item => {
                                let selected = oldKecamatan === item.name ? 'selected' : '';
                                opt += `<option value="${item.name}" ${selected}>${item.name}</option>`;
                            });
                            kecamatan.innerHTML = opt;
                            kecamatan.disabled = false;
                        });
                }

                provinsi.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;
                    if (!id) return;
                    oldKabupaten = '';
                    oldKecamatan = '';
                    loadKabupaten(id);
                });

                kabupaten.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;
                    if (!id) return;
                    oldKecamatan = '';
                    loadKecamatan(id);
                });
            });
        </script>
    @endpush

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
                        'bulletedList', 'numberedList', '|',
                        'link', 'blockQuote', '|',
                        'undo', 'redo'
                    ]
                })
                .catch(error => { console.error(error); });
        </script>
    @endpush
</x-admin_perusahaan.layout>