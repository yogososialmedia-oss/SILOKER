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
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>{{ $data_apply->tanggal_apply }}</td>
                                    <td>{{ $data_apply->pencariKerja->nim }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja }}</td>
                                    <td>{{ $data_apply->loker->perusahaanMitra->nama_perusahaan }}</td>
                                    <td>{{ $data_apply->loker->jabatan }}</td>
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
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i
                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('perusahaan.apply.profile-pelamar', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-user-circle me-2"></i>Profile Pelamar</a>
                                                <a class="dropdown-item" href="{{ route('perusahaan.detail-apply', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-edit-alt me-2"></i>Detail Apply</a>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modalCenter" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-show me-2 "></i>Update Status</button>
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
                        <h5 class="modal-title fw-bold" id="modalCenterTitle">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-6">
                                <label for="exampleFormControlSelect1" class="form-label">Pilih status</label>
                                <select class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Pilih Status</option>
                                    <option value="1">Interview</option>
                                    <option value="2">Tidak Diterima</option>
                                    <option value="3">Diterima</option>
                                </select>
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            Form dibawah diperuntukan untuk mengirim email secara otomatis, terkait update status
                            pencari kerja.
                        </div>
                        <div class="col mb-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Tambahkan pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="row g-6 extra-form">
                            <div class="col mb-1">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" />
                            </div>
                            <div class="col mb-1">
                                <label class="form-label">Waktu</label>
                                <input type="time" class="form-control" />
                            </div>
                        </div>

                        <div class="row g-6 extra-form">
                            <div class="col mb-1">
                                <label class="form-label">No.Telp</label>
                                <input type="text" class="form-control" placeholder="Tambahkan nomor telepon" />
                            </div>
                            <div class="col mb-1">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" placeholder="Tambahkan alamat" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
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

    @push('scripts')
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