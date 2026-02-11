<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3 ">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="mb-0 fw-bold">Daftar Perusahaan</h5>
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
                                    @if ($perusahaan->status_akun == 'pending')
                                        <span class="badge bg-label-warning">Belum Terverifikasi</span>
                                    @elseif ($perusahaan->status_akun == 'verified')
                                        <span class="badge bg-label-success">Terverifikasi</span>
                                    @elseif ($perusahaan->status_akun == 'rejected')
                                        <span class="badge bg-label-danger">Verifikasi Gagal</span>
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
                                <form method="POST">
                                    @csrf
                                    <label for="exampleFormControlSelect1" class="form-label">Pilih status</label>
                                    <select class="form-control" name="Status" id="exampleFormControlSelect1"
                                        aria-label="Default select example">
                                        <option selected>Pilih Status</option>
                                        <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                                        <option value="Terverifikasi">Terverifikasi</option>
                                        <option value="Verifikasi Gagal">Verifikasi Gagal</option>
                                    </select>
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            Form dibawah diperuntukan untuk mengirim email secara otomatis, terkait
                            verifikasi perusahaan.
                        </div>
                        <div class="col mb-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Tambahkan pesan</label>
                            <textarea class="form-control" name="Pesan" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Update Status</button>
                        </div>
                        </form>

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