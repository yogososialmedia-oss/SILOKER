<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                {{-- ALERT SUCCESS --}}
                @if(session('success'))
                    <div class="col-12">
                        <div id="autoAlert" class="alert alert-success alert-dismissible show mb-4">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                {{-- ALERT ERROR --}}
                @if(session('error'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible show">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                {{-- CARD HEADER PROFILE USER --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- BACKGROUND IMAGE CARD -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
                            style="height:280px; object-fit:cover;">

                        <!-- FOTO & NAMA USER DIATAS CARD -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $user->foto_pencari_kerja
    ? asset('storage/profile/' . $user->foto_pencari_kerja)
    : asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">

                            <h4 class="fw-bold mb-0 text-white">
                                {{ $user->nama_pencari_kerja }}
                            </h4>
                            <p>{{ $user->nim }}</p>
                        </div>
                    </div>
                </div>

                {{-- CARD NAVBAR PROFILE --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <!-- TOGGLER UNTUK RESPONSIVE -->
                                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarProfileUser">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarProfileUser">
                                        {{-- MENU NAVBAR --}}
                                        <ul class="navbar-nav mb-2 mb-lg-0 text-end text-lg-start ms-auto ms-lg-0">
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.profile') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.profile') }}">
                                                    Tentang Saya
                                                </a>
                                            </li>
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.history-apply') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.history-apply') }}">
                                                    History Apply
                                                </a>
                                            </li>
                                        </ul>

                                        {{-- TOMBOL EDIT & LOGOUT --}}
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-end">
                                            <li class="nav-item me-2 mb-2">
                                                <a href="{{ route('pencarikerja.profile.edit') }}"
                                                    class="btn btn-sm btn-warning">
                                                    Edit Profile
                                                </a>
                                            </li>
                                            <li class="nav-item me-2 mb-2">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Logout
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- DETAIL DATA PROFILE --}}
                <div class="col-12 mb-5">
                    <div class="card shadow-sm rounded-4 p-4">
                        <div class="card-body p-4">
                            <!-- TENTANG SAYA -->
                            <h6 class="fw-bold mb-1">Tentang Saya</h6>
                            <p class="mb-2 text-muted">{{ $user->deskripsi_diri ?? '-' }}</p>

                            <!-- ALAMAT -->
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p>{{ $user->alamat_pencari_kerja ?? '-' }}</p>

                            <!-- LINKEDIN -->
                            <h6 class="fw-bold mb-1">Akun Linked.In</h6>
                            @if($user->linkedin)
                                <a href="{{ $user->linkedin }}" target="_blank" class="btn btn-outline-primary btn-sm mb-3">
                                    Lihat Profil Linked.In
                                </a>
                            @else
                                <p class="text-muted mb-3">Belum ada profile Linked.In</p>
                            @endif

                            <!-- PENDIDIKAN -->
                            <h6 class="fw-bold mb-1">Pendidikan Terakhir</h6>
                            <p>{{ $user->pendidikan_terakhir ?? '-' }}</p>

                            <!-- EMAIL -->
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-4">{{ $user->email_pencari_kerja }}</p>

                            <!-- NO TELP -->
                            <h6 class="fw-bold mb-1">No.Telp</h6>
                            <p>{{ $user->no_telp_pencari_kerja ?? '-' }}</p>

                            <!-- CV -->
                            <h6 class="fw-bold mb-1">Curriculum Vitae (CV)</h6>
                            @if($user->cv)
                                <!-- BUTTON UNTUK BUKA MODAL CV -->
                                <button type="button" class="btn btn-outline-primary btn-sm mb-4" data-bs-toggle="modal"
                                    data-bs-target="#modalCV">
                                    Lihat CV
                                </button>
                            @else
                                <p class="text-muted">Belum upload CV</p>
                            @endif

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
                                            <iframe src="{{ asset('storage/' . $user->cv) }}" width="100%"
                                                height="600px" style="border:none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
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

        <!-- BACKDROP EFFECT -->
        <div class="content-backdrop fade"></div>
    </div>

    {{-- SCRIPT ALERT OTOMATIS HILANG --}}
    <script>
        setTimeout(() => {
            const alert = document.getElementById('autoAlert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</x-pencari_kerja.layout>