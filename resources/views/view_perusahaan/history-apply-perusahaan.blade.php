<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="mb-0 fw-bold">HISTORY APPLY</h5>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Download
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">PDF</a></li>
                            <li><a class="dropdown-item" href="#">EXCEL</a></li>
                        </ul>
                    </div>

                </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>
                                        {{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ $data_apply->loker->perusahaanMitra->nama_perusahaan ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $data_apply->loker->jabatan ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $data_apply->pencariKerja->nim }}
                                    </td>

                                    <td>
                                        {{ $data_apply->pencariKerja->nama_pencari_kerja ?? '-' }}
                                    </td>


                                    <td>
                                        {{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $data_apply->pencariKerja->email_pencari_kerja ?? '-' }}
                                    </td>

                                    <td>
                                        @switch($data_apply->status)
                                            @case('pending')
                                                <span class="badge bg-label-warning">Pending</span>
                                                @break

                                            @case('interview')
                                                <span class="badge bg-label-info">Interview</span>
                                                @break

                                            @case('tidak diterima')
                                                <span class="badge bg-label-danger">Tidak Diterima</span>
                                                @break

                                            @case('diterima')
                                                <span class="badge bg-label-success">Diterima</span>
                                                @break

                                            @default
                                                <span class="badge bg-label-secondary">-</span>
                                        @endswitch
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
                <div class="footer-container d-flex justify-content-between py-4 flex-md-row flex-column">
                    <div>
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>
