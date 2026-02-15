<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
                            style="height:280px; object-fit:cover;">
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ asset('admin-perusahaan/assets/img/avatars/default_profile_pencari_kerja.jpg') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">
                            <h4 class="fw-bold mb-0 text-white">wqr</h4>
                            <p>220030087</p>
                        </div>
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.profile-pelamar', $apply->id) ? 'active' : '' }}"
                                                    href="{{ route('perusahaan.apply.profile-pelamar', $apply->id) }}">
                                                    Tentang Saya
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.apply.history', $apply->id) ? 'active' : '' }}"
                                                    href="{{ route('perusahaan.apply.history', $apply->id) }}">
                                                    History Apply
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0" id="daftar-loker-perusahaan">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
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
                                            <td>11/01/2026</td>
                                            <td>Cititex</td>
                                            <td>Admin</td>
                                            <td>Job Opportunity</td>
                                            <td>
                                                <span class="badge bg-label-warning me-1">Pending</span>
                                                <span class="badge bg-label-info me-1">Interview</span>
                                                <span class="badge bg-label-danger me-1">Tidak Diterima</span>
                                                <span class="badge bg-label-success me-1">Diterima</span>
                                            </td>
                                            <td>081237654376</td>
                                            <td>cititex@gmail.com</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown"><i
                                                            class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('perusahaan.profile') }}"><i
                                                                class="icon-base bx bx-user-circle me-2"></i>Profile
                                                            Perusahaan</a>
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