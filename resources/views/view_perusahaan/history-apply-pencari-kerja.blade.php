<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                
                {{-- ================= PROFIL HEADER TERPISAH ================= --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        
                        {{-- BACKGROUND IMAGE --}}
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top" style="height:280px; object-fit:cover;">
                        
                        {{-- FOTO & NAMA PELAMAR --}}
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $apply->pencariKerja->foto_pencari_kerja 
                                ? asset('storage/profile/' . $apply->pencariKerja->foto_pencari_kerja) 
                                : asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">

                            <h4 class="fw-bold mb-0 text-white">
                                {{ $apply->pencariKerja->nama_pencari_kerja }}
                            </h4>

                            <p>{{ $apply->pencariKerja->nim }}</p>
                        </div>
                    </div>
                </div>

                {{-- ================= NAVBAR PROFIL TERPISAH ================= --}}
                <div class="col-12 mb-5">
                    <div class="bg-white p-4 shadow-sm rounded-4">
                        <nav class="navbar navbar-expand-lg py-1">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-pelamar">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbar-pelamar">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        {{-- TAB TENTANG SAYA --}}
                                        <li class="nav-item">
                                            <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.profile-pelamar', $apply->id) ? 'active' : ''}}"
                                               href="{{ route('perusahaan.apply.profile-pelamar', $apply->id) }}">
                                                Tentang Saya
                                            </a>
                                        </li>
                                        {{-- TAB HISTORY APPLY --}}
                                        <li class="nav-item">
                                            <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.history', $apply->id) ? 'active' : ''}}"
                                               href="{{ route('perusahaan.apply.history', $apply->id) }}">
                                                History Apply
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                {{-- ================= TABLE HISTORY APPLY ================= --}}
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
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
                                        @forelse($history as $item)
                                            <tr>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td style="max-width: 160px;">
                                                    <span class="d-inline-block text-truncate w-100"
                                                        style="max-width: 160px;"
                                                        title="{{ $item->loker->perusahaanMitra->nama_perusahaan }}">
                                                        {{ $item->loker->perusahaanMitra->nama_perusahaan ?? '-' }}
                                                    </span>
                                                </td>
                                                <td style="max-width: 180px;">
                                                    <span class="d-inline-block text-truncate w-100"
                                                        style="max-width: 180px;"
                                                        title="{{ $item->loker->jabatan }}">
                                                        {{ $item->loker->jabatan ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>{{ $item->loker->tipe_loker ?? '-' }}</td>
                                                <td>
                                                    @if($item->status == 'pending')
                                                        <span class="badge bg-label-warning me-1">Pending</span>
                                                    @elseif($item->status == 'interview')
                                                        <span class="badge bg-label-info me-1">Interview</span>
                                                    @elseif($item->status == 'diterima')
                                                        <span class="badge bg-label-success me-1">Diterima</span>
                                                    @elseif($item->status == 'ditolak')
                                                        <span class="badge bg-label-danger me-1">Tidak Diterima</span>
                                                    @else
                                                        <span class="badge bg-label-secondary">-</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->loker->perusahaanMitra->no_telp_perusahaan ?? '-' }}</td>
                                                <td style="max-width: 180px;">
                                                    <span class="d-inline-block text-truncate w-100"
                                                        style="max-width: 180px;"
                                                        title="{{ $item->loker->perusahaanMitra->email_perusahaan }}">
                                                        {{ $item->loker->perusahaanMitra->email_perusahaan ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('perusahaan.profile.lihat', $item->loker->perusahaanMitra->id) }}">
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>