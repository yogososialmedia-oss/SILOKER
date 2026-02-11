<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">
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
                            <table class="table mb-0" id="daftar-loker-perusahaan">
                                <thead>
                                    <tr>
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
                                    <tr>
                                        <td>Cititex</td>
                                        <td>Admin</td>
                                        <td>Job Opportunity</td>
                                        <td>
                                            <span class="badge bg-label-info me-1">Open</span>
                                        </td>
                                        <td>098754345678</td>
                                        <td>cititex@gmail.com</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.loker.tampilan') }}"><i
                                                            class="icon-base bx bx-show me-2"></i>Tampilan Loker</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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