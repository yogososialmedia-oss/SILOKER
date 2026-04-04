<x-pencari_kerja.layout>
    <!-- Wrapper utama halaman profil pengguna -->
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                {{-- CARD HEADER PROFILE USER --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- BACKGROUND IMAGE CARD -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top" style="height:280px; object-fit:cover;">

                        <!-- FOTO & NAMA USER DIATAS CARD -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $user->foto_pencari_kerja
                                ? asset('storage/profile/' . $user->foto_pencari_kerja)
                                : asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}" 
                                class="rounded-circle mb-2" style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">

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

                                            {{-- BURGER MENU UNTUK MOBILE --}}
                                            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfileUser">
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

                                                {{-- BUTTON ACTION --}}
                                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-end">
                                                    <li class="nav-item me-2 mb-2">
                                                        <a href="{{ route('pencarikerja.profile.edit') }}" class="btn btn-sm btn-warning">
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
                    

                {{-- Table History Apply --}}
                <div class="col-12 mb-5">
                    <!-- Card untuk tabel history apply -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Cek apakah ada data history apply -->
                                @if($historyApplies->isEmpty())
                                    <p class="text-muted mt-3">Belum ada history apply</p>
                                @else
                                    <table class="table mb-0" id="daftar-loker-perusahaan">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Jabatan</th>
                                                <th>Tipe</th>
                                                <th>Status</th>
                                                <th>No.Telp</th>
                                                <th>Email</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($historyApplies as $apply)
                                                <tr>
                                                    <td>{{ $apply->tanggal_apply ? $apply->tanggal_apply->format('d/m/Y') : '-' }}</td>

                                                    {{-- NAMA PERUSAHAAN --}}
                                                    <td style="max-width: 160px;">
                                                        <span class="d-inline-block text-truncate w-100"
                                                            style="max-width: 160px;"
                                                            title="{{ $apply->perusahaanMitra->nama_perusahaan }}">
                                                            {{ $apply->perusahaanMitra->nama_perusahaan ?? '-' }}
                                                        </span>
                                                    </td>

                                                    {{-- JABATAN --}}
                                                    <td style="max-width: 180px;">
                                                        <span class="d-inline-block text-truncate w-100"
                                                            style="max-width: 180px;"
                                                            title="{{ $apply->loker->jabatan }}">
                                                            {{ $apply->loker->jabatan ?? '-' }}
                                                        </span>
                                                    </td>

                                                    {{-- TIPE --}}
                                                    <td>{{ $apply->loker->tipe_loker ?? '-' }}</td>

                                                    {{-- STATUS --}}
                                                    <td>
                                                        @if($apply->status == 'pending')
                                                            <span class="badge bg-label-warning me-1">Pending</span>
                                                        @elseif($apply->status == 'interview')
                                                            <span class="badge bg-label-info me-1">Interview</span>
                                                        @elseif($apply->status == 'diterima')
                                                            <span class="badge bg-label-success me-1">Diterima</span>
                                                        @elseif($apply->status == 'ditolak')
                                                            <span class="badge bg-label-danger me-1">Tidak Diterima</span>
                                                        @else
                                                            <span class="badge bg-label-secondary">-</span>
                                                        @endif
                                                    </td>

                                                    {{-- NO TELP --}}
                                                    <td>{{ $apply->perusahaanMitra->no_telp_perusahaan ?? '-' }}</td>

                                                    {{-- EMAIL --}}
                                                    <td style="max-width: 180px;">
                                                        <span class="d-inline-block text-truncate w-100"
                                                            style="max-width: 180px;"
                                                            title="{{ $apply->perusahaanMitra->email_perusahaan }}">
                                                            {{ $apply->perusahaanMitra->email_perusahaan ?? '-' }}
                                                        </span>
                                                    </td>

                                                    {{-- OPSI --}}
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                href="{{ route('pencarikerja.profile.perusahaan', $apply->perusahaanMitra->id) }}">
                                                                    <i class="icon-base bx bx-user-circle me-2"></i> Profile Perusahaan
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center text-muted">
                                                        Belum ada history apply
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <!-- Backdrop untuk efek fade -->
        <div class="content-backdrop fade"></div>
    </div>
</x-pencari_kerja.layout>