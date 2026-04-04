<x-admin_perusahaan.layout>
    <!-- Wrapper utama konten halaman admin perusahaan -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Card utama berisi daftar perusahaan mitra -->
            <div class="card pb-3">
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                        <h5 class="mb-0 fw-bold">DAFTAR PERUSAHAAN</h5>

                    <!-- Form untuk export/download daftar perusahaan berdasarkan tahun -->
                    <form action="{{ route('admin.perusahaan.export') }}" method="GET">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <!-- Dropdown tahun untuk filter export -->
                            <select name="tahun" class="form-select form-select-sm" style="width: 160px;">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunList as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Tombol submit untuk download -->
                            <button type="submit" class="btn btn-success btn-sm px-3">
                                Download
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tabel responsive daftar perusahaan -->
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>No NPWP</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($perusahaanMitra as $perusahaan)
                                <tr>
                                    {{-- TANGGAL --}}
                                    <td style="width: 110px;">
                                        {{ $perusahaan->created_at->format('d/m/Y') }}
                                    </td>

                                    {{-- NAMA PERUSAHAAN --}}
                                    <td style="max-width: 200px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                            title="{{ $perusahaan->nama_perusahaan }}">
                                            {{ $perusahaan->nama_perusahaan }}
                                        </span>
                                    </td>

                                    {{-- EMAIL --}}
                                    <td style="max-width: 220px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 220px;"
                                            title="{{ $perusahaan->email_perusahaan }}">
                                            {{ $perusahaan->email_perusahaan }}
                                        </span>
                                    </td>

                                    {{-- NPWP --}}
                                    <td style="max-width: 180px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 180px;"
                                            title="{{ $perusahaan->no_npwp }}">
                                            {{ $perusahaan->no_npwp }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td style="width: 140px;">
                                        @php
                                            $status = strtolower($perusahaan->status_akun);
                                        @endphp

                                        @if ($status == 'pending')
                                            <span class="badge bg-label-warning">Pending</span>
                                        @elseif ($status == 'terverifikasi')
                                            <span class="badge bg-label-success">Terverifikasi</span>
                                        @elseif ($status == 'verifikasi_gagal')
                                            <span class="badge bg-label-danger">Verifikasi Gagal</span>
                                        @else
                                            <span class="badge bg-label-secondary">
                                                {{ ucfirst($perusahaan->status_akun) }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- OPSI --}}
                                    <td style="width: 80px;">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.profile-perusahaan', $perusahaan->id) }}">
                                                    <i class="icon-base bx bx-user-circle me-2"></i> Profile Perusahaan
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer halaman -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <!-- Backdrop untuk efek blur/fade -->
        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>