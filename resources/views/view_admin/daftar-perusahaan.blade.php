<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">DAFTAR PERUSAHAAN</h5>
                    </div>

                    <form action="{{ route('admin.perusahaan.export') }}" method="GET">
                        <div class="d-flex align-items-center gap-2">
                            <select name="tahun" class="form-select form-select-sm" style="width: 160px;">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunList as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-success btn-sm px-3">
                                Download
                            </button>
                        </div>
                    </form>
                </div>

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
                                    <td>{{ $perusahaan->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                                    <td>{{ $perusahaan->email_perusahaan }}</td>
                                    <td>{{ $perusahaan->no_npwp }}</td>
                                    <td>
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
                                    <td>
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