<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3 ">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="mb-0 fw-bold">Daftar Loker</h5>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Download
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">EXCL</a></li>
                        </ul>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>No.Telp</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>{{ $data_apply->tanggal_apply }}</td>
                                    <td>{{ $data_apply->pencariKerja->nim }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja }}</td>
                                    <td>{{ $data_apply->perusahaanMitra->nama_perusahaan }}</td>
                                    <td>{{ $data_apply->loker->jabatan }}</td>
                                    <td>{{ $data_apply->pencariKerja->no_telp_pencari_kerja}}</td>
                                    <td>{{ $data_apply->pencariKerja->email_pencari_kerja }}</td>
                                    <td>
                                        @if ($data_apply->status == 'pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                        @elseif ($data_apply->status == 'interview')
                                            <span class="badge bg-label-info me-1">Interview</span>
                                        @elseif ($data_apply->status == 'tidak diterima')
                                            <span class="badge bg-label-danger me-1">Tidak Diterima</span>
                                        @elseif ($data_apply->status == 'diterima')
                                            <span class="badge bg-label-success me-1">Diterima</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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