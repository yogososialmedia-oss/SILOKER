<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3 ">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="mb-0 fw-bold">DAFTAR APPLY</h5>
                    </div>

                    <a href="{{ route('admin.apply.export.excel') }}" class="btn btn-success">
                        Download Excel
                    </a>

                </div>
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja }}</td>
                                    <td>{{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}</td>
                                    <td>{{ $data_apply->loker->perusahaanMitra->nama_perusahaan }}</td>
                                    <td>{{ $data_apply->loker->jabatan }}</td>
                                    <td>
                                        @if ($data_apply->status == 'pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                        @elseif ($data_apply->status == 'interview')
                                            <span class="badge bg-label-info me-1">Interview</span>
                                        @elseif ($data_apply->status == 'diterima')
                                            <span class="badge bg-label-success me-1">Diterima</span>
                                        @elseif ($data_apply->status == 'ditolak')
                                            <span class="badge bg-label-danger me-1">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i
                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.apply.profile', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-user-circle me-2"></i>Profile Pelamar</a>
                                                <a class="dropdown-item" href="{{ route('admin.apply.detail', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-show  me-2"></i>Detail Apply</a>
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

        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>