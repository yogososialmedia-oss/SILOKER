<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">INPUT LOKER</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perusahaan.loker.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    {{-- Nama Perusahaan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input name="nama_perusahaan" type="text" class="form-control" value="{{ $info_perusahaan->nama_perusahaan ?? '' }}" readonly>
                                    </div>

                                    {{-- Jabatan --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" placeholder="Tambahkan jabatan">
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_perusahaan" type="email" class="form-control @error('email_perusahaan') is-invalid @enderror" value="{{ old('email_perusahaan', $info_perusahaan->email_perusahaan ?? '') }}">
                                        @error('email_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- No Telp --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="no_telp_perusahaan" type="text" class="form-control @error('no_telp_perusahaan') is-invalid @enderror" value="{{ old('no_telp_perusahaan', $info_perusahaan->no_telp_perusahaan ?? '') }}">
                                        @error('no_telp_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Tanggal Mulai --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" name="tanggal_mulai_loker" type="date" class="form-control @error('tanggal_mulai_loker') is-invalid @enderror" min="{{ now()->toDateString() }}" value="{{ old('tanggal_mulai_loker') }}">
                                        @error('tanggal_mulai_loker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Tanggal Selesai --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" name="tanggal_berakhir_loker" type="date" class="form-control @error('tanggal_berakhir_loker') is-invalid @enderror" value="{{ old('tanggal_berakhir_loker') }}" disabled>
                                        @error('tanggal_berakhir_loker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Poster --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker</label>
                                        <input name="poster_loker" type="file" accept="image/png, image/jpeg, image/jpg" class="form-control @error('poster_loker') is-invalid @enderror">
                                        <small class="text-muted">Format: JPG, JPEG, PNG (Max 2MB)</small>
                                        @error('poster_loker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Provinsi --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Provinsi</label>
                                        <select id="provinsi" name="provinsi" class="form-select @error('provinsi') is-invalid @enderror">
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                        @error('provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Kabupaten --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Kabupaten</label>
                                        <select id="kabupaten" name="kabupaten" class="form-select @error('kabupaten') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Kecamatan --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Kecamatan</label>
                                        <select id="kecamatan" name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $info_perusahaan->alamat_perusahaan ?? '') }}" placeholder="Tambahkan alamat lengkap">
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Model Kerja --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Model Kerja</label>
                                        <select name="model_kerja" class="form-select @error('model_kerja') is-invalid @enderror">
                                            <option value="">Pilih model kerja</option>
                                            <option value="Work From Home" {{ old('model_kerja') == 'Work From Home' ? 'selected' : '' }}>Work From Home</option>
                                            <option value="Work From Office" {{ old('model_kerja') == 'Work From Office' ? 'selected' : '' }}>Work From Office</option>
                                            <option value="Hybrid" {{ old('model_kerja') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                        </select>
                                        @error('model_kerja') 
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Tipe Loker --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Tipe Loker</label>
                                        <select name="tipe_loker" class="form-select @error('tipe_loker') is-invalid @enderror">
                                            <option value="">Pilih tipe loker</option>
                                            <option value="job_opportunity" {{ old('tipe_loker') == 'job_opportunity' ? 'selected' : '' }}>Job Opportunity</option>
                                            <option value="internship" {{ old('tipe_loker') == 'internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                        @error('tipe_loker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Minimal Pendidikan --}}
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Minimal Pendidikan</label>
                                        <select name="minimal_pendidikan" class="form-select @error('minimal_pendidikan') is-invalid @enderror">
                                            <option value="">Pilih Minimal Pendidikan</option>
                                            <option value="Minimal Pendidikan SMA/sederajat" {{ old('minimal_pendidikan') == 'Minimal Pendidikan SMA/sederajat' ? 'selected' : '' }}>Minimal Pendidikan SMA/Sederajat</option>
                                            <option value="Minimal Pendidikan D1" {{ old('minimal_pendidikan') == 'Minimal Pendidikan D1' ? 'selected' : '' }}>Minimal Pendidikan D1</option>
                                            <option value="Minimal Pendidikan D2" {{ old('minimal_pendidikan') == 'Minimal Pendidikan D2' ? 'selected' : '' }}>Minimal Pendidikan D2</option>
                                            <option value="Minimal Pendidikan D3" {{ old('minimal_pendidikan') == 'Minimal Pendidikan D3' ? 'selected' : '' }}>Minimal Pendidikan D3</option>
                                            <option value="Minimal Pendidikan S1" {{ old('minimal_pendidikan') == 'Minimal Pendidikan S1' ? 'selected' : '' }}>Minimal Pendidikan S1</option>
                                            <option value="Minimal Pendidikan S2" {{ old('minimal_pendidikan') == 'Minimal Pendidikan S2' ? 'selected' : '' }}>Minimal Pendidikan S2</option>
                                            <option value="Minimal Pendidikan S3" {{ old('minimal_pendidikan') == 'Minimal Pendidikan S3' ? 'selected' : '' }}>Minimal Pendidikan S3</option>
                                        </select>
                                        @error('minimal_pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-info mb-3">
                                            <strong>Petunjuk Penulisan Kualifikasi:</strong>
                                            <ul class="mb-0 mt-2">
                                                <li>Gunakan <strong>Heading 3 (H3)</strong> dan <strong>Bold</strong> untuk judul kualifikasi</li>
                                                <li>Gunakan teks biasa untuk penjelasan/detail kualifikasi</li>
                                                <li>Pisahkan setiap poin menggunakan <strong>baris baru atau bullet</strong> agar mudah dibaca</li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- Deskripsi --}}
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Kualifikasi</label>
                                        <textarea id="editor" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

                let oldProvinsi = "{{ old('provinsi') }}";
                let oldKabupaten = "{{ old('kabupaten') }}";
                let oldKecamatan = "{{ old('kecamatan') }}";

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
                        if (selectedProvId) loadKabupaten(selectedProvId);
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
                            if (selectedKabId) loadKecamatan(selectedKabId);
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
        
        {{-- CKEditor 5 --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'underline', '|', 'bulletedList', 'numberedList', '|', 'link', '|', 'undo', 'redo']
                })
                .catch(error => { console.error(error); });
        </script>
    @endpush
</x-admin_perusahaan.layout>