<x-pencari_kerja.layout>
    <div class="content-wrapper-user">

        <!-- CONTENT -->
        <div class="container-xxl flex-grow-1 container-p-y">
        <form method="GET" action="{{ route('pencarikerja.loker.index') }}">
            <!-- FILTER FORM -->
            <div class="row mb-4">


                <div class="col-md-4 mb-4">
                    <label class="form-label">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="form-select">
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kabupaten</label>
                    <select id="kabupaten" name="kabupaten" class="form-select" disabled>
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="form-select" disabled>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>


                <div class="col-md-3 mb-4">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ request('jabatan') }}" class="form-control"  placeholder="Masukan posisi jabatan">
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Tipe Lowongan</label>
                    <select name="tipe_loker" class="form-select">
                        <option value="">Pilih tipe</option>
                        <option value="internship" 
                            {{ request('tipe_loker') == 'internship' ? 'selected' : '' }}>
                            Internship
                        </option>
                        <option value="job_opportunity" 
                            {{ request('tipe_loker') == 'job_opportunity' ? 'selected' : '' }}>
                            Job Opportunity
                        </option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Model Kerja</label>
                    <select name="model_kerja" class="form-select">
                    <option value="">Pilih model kerja</option>
                    <option value="Work From Office"
                        {{ request('model_kerja') == 'Work From Office' ? 'selected' : '' }}>
                        Work From Office
                    </option>
                    <option value="Work From Home"
                        {{ request('model_kerja') == 'Work From Home' ? 'selected' : '' }}>
                        Work From Home
                    </option>
                    <option value="Hybrid"
                        {{ request('model_kerja') == 'Hybrid' ? 'selected' : '' }}>
                        Hybrid
                    </option>
                </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Minimal Pendidikan</label>
                    <select name="minimal_pendidikan" class="form-select">
                    <option value="">Pilih minimal pendidikan</option>
                    <option value="Minimal Pendidikan SMA/sederajat"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan SMA/sederajat' ? 'selected' : '' }}>
                        SMA / Sederajat
                    </option>
                    <option value="Minimal Pendidikan D1"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan D1' ? 'selected' : '' }}>
                        Minimal Pendidikan D1
                    </option>
                    <option value="Minimal Pendidikan D2"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan D2' ? 'selected' : '' }}>
                        Minimal Pendidikan D2
                    </option>
                        <option value="Minimal Pendidikan D3"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan D3' ? 'selected' : '' }}>
                        Minimal Pendidikan D3
                    </option>
                        <option value="Minimal Pendidikan S1"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan S1' ? 'selected' : '' }}>
                        Minimal Pendidikan S1
                    </option>
                        <option value="Minimal Pendidikan S2"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan S2' ? 'selected' : '' }}>
                        Minimal Pendidikan S2
                    </option>
                        <option value="Minimal Pendidikan S3"
                        {{ request('minimal_pendidikan') == 'Minimal Pendidikan S3' ? 'selected' : '' }}>
                        Minimal Pendidikan S3
                    </option>
                    </select>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-end gap-3">
                    <a href="{{ route('pencarikerja.loker.index') }}" 
                        class="btn btn-secondary px-4">
                        Reset
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-search me-1"></i> Cari Lowongan
                    </button>
                </div>
            </div>
            </form>
            <!-- LIST LOKER -->
            <div class="row">
                @forelse($lokers as $loker)
                <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                    <div class="card h-100 loker-card-beranda position-relative">

                        {{-- LINK --}}
                        <a href="{{ route('pencarikerja.loker.show', $loker) }}" 
                            class="stretched-link"></a>

                        <div class="card-body position-relative">

                            {{-- TANGGAL --}}
                            <p class="text-end fs-9 mb-2">
                                {{ $loker->tanggal_mulai_loker->format('d M Y') }}
                                -
                                {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
                            </p>

                            {{-- HEADER --}}
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="{{ $loker->perusahaanMitra->logo_url }}"
                                    style="width:60px; height:60px; object-fit:cover;"
                                    class="rounded shadow-sm" alt="">

                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">
                                        {{ $loker->perusahaanMitra->nama_perusahaan }}
                                    </h6>

                                    <p class="mb-1 small">
                                        {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                                    </p>

                                    <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                        <i class="bx bx-location-plus"></i>
                                        <span>{{ $loker->kabupaten }}</span>
                                    </p>
                                </div>
                            </div>

                            {{-- JABATAN + STATUS --}}
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0">
                                    {{ $loker->jabatan }}
                                </h5>

                                <div class="ms-auto pe-5 me-2">
                                    @if(now()->between($loker->tanggal_mulai_loker, $loker->tanggal_berakhir_loker))
                                        <span class="badge bg-primary fs-6 px-3 py-2">
                                            Open
                                        </span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2">
                                            Close
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- DETAIL --}}
                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-buildings"></i>
                                <span>{{ $loker->model_kerja }}</span>
                            </p>

                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-book-reader"></i>
                                <span>{{ $loker->minimal_pendidikan }}</span>
                            </p>

                        </div>
                    </div>
                </div>
                @empty
                    <div class="text-center">
                        <p class="text-muted">Belum ada lowongan tersedia.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $lokers->links() }}
            </div>
        </div>
        <!-- /CONTENT -->

        <!-- FOOTER -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex justify-content-between py-4">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const provinsi = document.getElementById('provinsi');
                const kabupaten = document.getElementById('kabupaten');
                const kecamatan = document.getElementById('kecamatan');

                // =========================
                // LOAD PROVINSI
                // =========================
                fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                    .then(res => res.json())
                    .then(data => {
                        let opt = '<option value="">Pilih Provinsi</option>';
                        data.forEach(item => {
                            opt += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        });
                        provinsi.innerHTML = opt;
                    });

                // =========================
                // LOAD KABUPATEN
                // =========================
                provinsi.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;

                    kabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
                    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kabupaten.disabled = true;
                    kecamatan.disabled = true;

                    if (!id) return;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kabupaten</option>';
                            data.forEach(item => {
                                opt += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            kabupaten.innerHTML = opt;
                            kabupaten.disabled = false;
                        });
                });

                // =========================
                // LOAD KECAMATAN
                // =========================
                kabupaten.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;

                    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kecamatan.disabled = true;

                    if (!id) return;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kecamatan</option>';
                            data.forEach(item => {
                                opt += `<option value="${item.name}">${item.name}</option>`;
                            });
                            kecamatan.innerHTML = opt;
                            kecamatan.disabled = false;
                        });
                });

            });
        </script>

</x-pencari_kerja.layout>