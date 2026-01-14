<x-admin-perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3 ">
                <div class="card-header d-flex justify-content-end">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Download
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>01/02/2026</td>
                            <td>220030087</td>
                            <td>I Made Yogo Sujanardhana</td>
                            <td>Cititex</td>
                            <td>Admin</td>
                            <td><span class="badge bg-label-info me-1">Diterima</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i
                                            class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href=""><i
                                                class="icon-base bx bx-edit-alt me-2"></i>Detail Apply</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="icon-base bx bx-show me-2"></i>Update Status</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tbody>
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
</x-admin-perusahaan.layout>