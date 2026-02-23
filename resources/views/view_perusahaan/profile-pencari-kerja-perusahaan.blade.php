<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
<div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- Thumbnail / Banner -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
                            style="height:280px; object-fit:cover;">

                        <!-- Overlay Logo & Nama -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $apply->pencariKerja->foto_pencari_kerja 
                                    ? asset('storage/' . $apply->pencariKerja->foto_pencari_kerja) 
                                    : asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">

                            <h4 class="fw-bold mb-0 text-white">
                                {{ $apply->pencariKerja->nama_pencari_kerja }}
                            </h4>

                            <p>
                                {{ $apply->pencariKerja->nim ?? '-' }}
                            </p>
                        </div>
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.profile-pelamar', $apply->id) ? 'active' : '' }}"
                                                    href="{{ route('perusahaan.apply.profile-pelamar', $apply->id) }}">
                                                    Tentang Saya
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.history', $apply->id) ? 'active' : '' }}"
                                                    href="{{ route('perusahaan.apply.history', $apply->id) }}">
                                                    History Apply
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="bg-white p-4">
                            <h6 class="fw-bold mb-1">Tentang Saya</h6>
                            <p class="mb-2 text-muted"> {{ $apply->pencariKerja->deskripsi_diri ?? 'Belum ada deskripsi diri' }} </p>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p>{{ $apply->pencariKerja->alamat_pencari_kerja }}</p>
                            <h6 class="fw-bold mb-1">Akun Linked.In</h6>
                            @if($apply->pencariKerja->linkedin)
                                <a href="{{ $apply->pencariKerja->linkedin }}" target="_blank" class="d-block mb-4 text-primary">
                                    Klik di sini untuk melihat profile LinkedIn saya
                                </a>
                            @else
                                <p class="text-muted">Belum menambahkan LinkedIn</p>
                            @endif
                            <h6 class="fw-bold mb-1">Pendidikan Terakhir</h6>
                            <p>{{ $apply->pencariKerja->pendidikan_terakhir ?? '-' }}</p>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-4">{{ $apply->pencariKerja->email_pencari_kerja }}</p>
                            <h6 class="fw-bold mb-1">No.Telp</h6>
                            <p>{{ $apply->pencariKerja->no_telp_pencari_kerja }}</p>
                            <h6 class="fw-bold mb-1">Curriculum Vitae (CV)</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" data-bs-toggle="modal"
                                data-bs-target="#modalCV">
                                Lihat CV
                            </button>
                            <!-- MODAL CV -->
                            <div class="modal fade" id="modalCV" tabindex="-1" aria-labelledby="modalCVLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCVLabel">Curriculum Vitae</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body p-0">
                                            @if($apply->pencariKerja->cv)
                                                <iframe src="{{ asset('storage/'.$apply->pencariKerja->cv) }}"
                                                        width="100%" height="600px" style="border:none;">
                                                </iframe>
                                            @else
                                                <div class="p-4 text-center">
                                                    <p class="text-muted">CV belum diupload</p>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

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