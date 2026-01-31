<x-admin_perusahaan.layout>
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
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>No NPWP</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>01/02/26</td>
                                <td>Cititex</td>
                                <td>cititex@gmail.com</td>
                                <td>0847391</td>
                                <td><span class="badge bg-label-info me-1">Terverifikasi</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('detail-verifikasi-perusahaan') }}"><i
                                                    class="icon-base bx bx-edit-alt me-2"></i>Detail Verifikasi</a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-show me-2"></i>Update Status</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- / Content -->

        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-6">
                                <label for="exampleFormControlSelect1" class="form-label">Pilih status</label>
                                <select class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Pilih Status</option>
                                    <option value="1">Belum Terverifikasi</option>
                                    <option value="2">Terverifikasi</option>
                                    <option value="3">Verifikasi Gagal</option>
                                </select>
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            Form dibawah diperuntukan untuk mengirim email secara otomatis, terkait verifikasiperusahaan.
                        </div>
                        <div class="col mb-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Tambahkan pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Update Status</button>
                    </div>
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
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

    @push('scripjs')
        <script>
            document.getElementById('exampleFormControlSelect1').addEventListener('change', function () {
                const extraForms = document.querySelectorAll('.extra-form');
                const selectedValue = this.value;

                if (selectedValue == "2") { // Tidak Diterima
                    extraForms.forEach(el => el.style.display = 'none');
                } else {
                    extraForms.forEach(el => el.style.display = 'flex');
                }
            });
        </script>
    @endpush
</x-admin_perusahaan.layout>