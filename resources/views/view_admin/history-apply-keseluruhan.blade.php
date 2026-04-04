<x-admin_perusahaan.layout>
    <!-- Wrapper utama konten halaman daftar apply -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3">
                <!-- Header Card Daftar Apply -->
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <!-- Judul daftar apply -->
                        <h5 class="mb-0 fw-bold">DAFTAR APPLY</h5>

                        <!-- Form filter export berdasarkan tahun -->
                        <form action="{{ route('admin.apply.export.semua') }}" method="GET">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <!-- Dropdown tahun -->
                                <select name="tahun" class="form-select form-select-sm" style="width: 160px;">
                                    <option value="">Semua Tahun</option>
                                    @foreach($tahunList as $tahun)
                                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                            {{ $tahun }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Tombol download export -->
                                <button type="submit" class="btn btn-success btn-sm px-3">
                                    Download
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel daftar apply -->
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    {{-- TANGGAL --}}
                                    <td style="width: 110px;">
                                        {{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}
                                    </td>

                                    {{-- PERUSAHAAN --}}
                                    <td style="max-width: 180px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 180px;"
                                            title="{{ $data_apply->loker->perusahaanMitra->nama_perusahaan }}">
                                            {{ $data_apply->loker->perusahaanMitra->nama_perusahaan ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- JABATAN --}}
                                    <td style="max-width: 200px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                            title="{{ $data_apply->loker->jabatan }}">
                                            {{ $data_apply->loker->jabatan ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- NIM --}}
                                    <td style="width: 120px;">
                                        {{ $data_apply->pencariKerja->nim }}
                                    </td>

                                    {{-- NAMA --}}
                                    <td style="max-width: 160px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 160px;"
                                            title="{{ $data_apply->pencariKerja->nama_pencari_kerja }}">
                                            {{ $data_apply->pencariKerja->nama_pencari_kerja ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- NO TELP --}}
                                    <td style="max-width: 140px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 140px;"
                                            title="{{ $data_apply->pencariKerja->no_telp_pencari_kerja }}">
                                            {{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- EMAIL --}}
                                    <td style="max-width: 200px;">
                                        <span class="d-inline-block text-truncate" style="max-width: 200px;"
                                            title="{{ $data_apply->pencariKerja->email_pencari_kerja }}">
                                            {{ $data_apply->pencariKerja->email_pencari_kerja ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td style="width: 140px;">
                                        @switch($data_apply->status)
                                            @case('pending')
                                                <span class="badge bg-label-warning">Pending</span>
                                                @break
                                            @case('interview')
                                                <span class="badge bg-label-info">Interview</span>
                                                @break
                                            @case('ditolak')
                                                <span class="badge bg-label-danger">Tidak Diterima</span>
                                                @break
                                            @case('diterima')
                                                <span class="badge bg-label-success">Diterima</span>
                                                @break
                                        @endswitch
                                    </td>

                                    {{-- OPSI --}}
                                    <td style="width: 90px;">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.apply.profile', $data_apply->id) }}">
                                                    <i class="icon-base bx bx-user-circle me-2"></i> Profile Pelamar
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.apply.detail', $data_apply->id) }}">
                                                    <i class="icon-base bx bx-show me-2"></i> Detail Apply
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
                <div class="footer-container d-flex justify-content-between py-4 flex-md-row flex-column">
                    <div>
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <!-- Backdrop untuk efek overlay -->
        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>