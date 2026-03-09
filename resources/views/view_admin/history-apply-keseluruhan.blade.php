<x-admin_perusahaan.layout>
    <!-- Wrapper utama konten halaman daftar apply -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3">
                <!-- Header Card Daftar Apply -->
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">DAFTAR APPLY</h5>
                    </div>

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
                                    <!-- Tanggal apply diformat -->
                                    <td>{{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}</td>
                                    <!-- Nama perusahaan -->
                                    <td>{{ $data_apply->loker->perusahaanMitra->nama_perusahaan ?? '-' }}</td>
                                    <!-- Jabatan yang dilamar -->
                                    <td>{{ $data_apply->loker->jabatan ?? '-' }}</td>
                                    <!-- NIM pelamar -->
                                    <td>{{ $data_apply->pencariKerja->nim }}</td>
                                    <!-- Nama pelamar -->
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja ?? '-' }}</td>
                                    <!-- No. Telp pelamar -->
                                    <td>{{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}</td>
                                    <!-- Email pelamar -->
                                    <td>{{ $data_apply->pencariKerja->email_pencari_kerja ?? '-' }}</td>
                                    <!-- Status apply dengan badge -->
                                    <td>
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
                                    <!-- Opsi dropdown untuk profile/detail apply -->
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Link ke profile pelamar -->
                                                <a class="dropdown-item" href="{{ route('admin.apply.profile', $data_apply->id) }}">
                                                    <i class="icon-base bx bx-user-circle me-2"></i> Profile Pelamar
                                                </a>
                                                <!-- Link ke detail apply -->
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