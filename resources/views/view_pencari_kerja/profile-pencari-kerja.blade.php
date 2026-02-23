<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">
                    {{-- Pesan sukses --}}
                    @if(session('success'))
                    <div id="autoAlert" class="alert alert-success alert-dismissible show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- Thumbnail / Banner -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
                            style="height:280px; object-fit:cover;">

                        <!-- Overlay Logo & Nama -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $user->foto_pencari_kerja 
                                ? asset('storage/profile/'.$user->foto_pencari_kerja)
                                : asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">
                            <h4 class="fw-bold mb-0 text-white">
                                {{ $user->nama_pencari_kerja }}
                            </h4>
                            <p>{{ $user->nim ?? '-' }}</p>
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
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.profile') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.profile') }}">
                                                    Tentang Saya
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.history-apply') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.history-apply') }}">
                                                    History Apply
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                                            <li class="nav-item me-2">
                                                <a href="{{ route('pencarikerja.profile.edit') }}"
                                                    class="btn btn-sm btn-warning">
                                                    Edit Profile
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Logout
                                                    </button>
                                                </form>
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
                            <p class="mb-2 text-muted">
                                {{ $user->deskripsi_diri ?? '-' }}
                            </p>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p>{{ $user->alamat_pencari_kerja ?? '-' }}</p>
                            <h6 class="fw-bold mb-1">Akun Linked.In</h6>
                            @if($user->linkedin)
                            <a href="{{ $user->linkedin }}" target="_blank" class="d-block mb-4 text-primary">
                                {{ $user->linkedin }}
                            </a>
                            @else
                            <p>-</p>
                            @endif
                            <h6 class="fw-bold mb-1">Pendidikan Terakhir</h6>
                            <p>{{ $user->pendidikan_terakhir ?? '-' }}</p>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-4">{{ $user->email_pencari_kerja }}</p>
                            <h6 class="fw-bold mb-1">No.Telp</h6>
                            <p>{{ $user->no_telp_pencari_kerja ?? '-' }}</p>
                            <h6 class="fw-bold mb-1">Curriculum Vitae (CV)</h6>
                            @if($user->cv)
                            <button type="button" class="btn btn-outline-primary btn-sm mb-4"
                                data-bs-toggle="modal" data-bs-target="#modalCV">
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
                                            <iframe src="{{ asset('storage/'.$user->cv) }}"
                                                    width="100%" height="600px" style="border:none;">
                                            </iframe>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <script>
        setTimeout(() => {
            const alert = document.getElementById('autoAlert');
            if(alert){
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
        </script>

        <div class="content-backdrop fade"></div>
    </div>
</x-pencari_kerja.layout>