<x-pencari_kerja.layout>
    <div class="content-wrapper-user">

        <!-- CONTENT -->
        <div class="container-xxl flex-grow-1 container-p-y">

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
                    <input type="text" class="form-control" placeholder="Masukan posisi jabatan">
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Tipe Lowongan</label>
                    <select class="form-select">
                        <option selected>Pilih tipe</option>
                        <option>Internship</option>
                        <option>Job Opportunity</option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Model Kerja</label>
                    <select class="form-select">
                        <option selected>Pilih model kerja</option>
                        <option>Work From Office</option>
                        <option>Work From Home</option>
                        <option>Hybrid</option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Minimal Pendidikan</label>
                    <select class="form-select">
                        <option selected>Pilih minimal pendidikan</option>
                        <option>SMA / Sederajat</option>
                        <option>Minimal Pendidikan D1</option>
                        <option>Minimal Pendidikan D2</option>
                        <option>Minimal Pendidikan D3</option>
                        <option>Minimal Pendidikan S1</option>
                        <option>Minimal Pendidikan S2</option>
                        <option>Minimal Pendidikan S3</option>
                    </select>
                </div>
            </div>
            <form method="GET" action="{{ route('pencarikerja.loker.index') }}">
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-search me-1"></i> Cari Lowongan
                    </button>
                </div>
            </div>
            </form>
            <!-- LIST LOKER -->
            <div class="row">
                @forelse($lokers as $loker)
                    <div class="col-lg-6 mb-5">
                        <div class="card h-100 loker-card-beranda position-relative">

                            <a href="{{ route('pencarikerja.loker.show', $loker->id) }}" 
                            class="stretched-link"></a>

                            <div class="card-body position-relative">

                                <p class="text-end fs-9 mb-2">
                                    {{ $loker->tanggal_mulai_loker->format('d M Y') }}
                                    -
                                    {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
                                </p>

                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <img src="{{ asset('storage/'.$loker->perusahaanMitra->logo_perusahaan) }}"
                                        style="width:60px; height:60px;"
                                        class="img-fluid rounded">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">
                                            {{ $loker->perusahaanMitra->nama_perusahaan }}
                                        </h6>

                                        <p class="mb-1 small">
                                            {{ str_replace('_',' ', $loker->tipe_loker) }}
                                        </p>

                                        <p class="small text-muted mb-0">
                                            <i class="bx bx-location-plus"></i>
                                            {{ $loker->kabupaten }}, {{ $loker->provinsi }}
                                        </p>
                                    </div>
                                </div>

                                <h5 class="mb-3">{{ $loker->jabatan }}</h5>

                                <p class="small mb-2">
                                    <i class="bx bx-buildings"></i>
                                    {{ $loker->model_kerja }}
                                </p>

                                <p class="small mb-2">
                                    <i class="bx bx-book-reader"></i>
                                    {{ $loker->minimal_pendidikan }}
                                </p>

                                @if($loker->status === 'open')
                                    <span class="badge bg-primary">Open</span>
                                @else
                                    <span class="badge bg-danger">Close</span>
                                @endif

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