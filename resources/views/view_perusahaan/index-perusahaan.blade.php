<x-admin-perusahaan.layout>
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-12 mb-5">
          <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
            <!-- Thumbnail / Banner -->
            <img src="../assets/img/backgrounds/back.png" class="card-img-top" style="height:280px; object-fit:cover;">

            <!-- Overlay Logo & Nama -->
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <img src="../assets/img/illustrations/girl-doing-yoga-light.png" class="rounded-circle mb-2"
                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">
              <h4 class="fw-bold mb-0 text-white">PT Ayam Betutu Bali</h4>
            </div>
            <div class="bg-white p-4">
              <nav class="navbar navbar-expand-lg py-1">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbar-ex-15">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="navbar-brand" href="index-perusahaan.html">Tentang
                          Perusahaan</a>
                      </li>
                      <li class="nav-item">
                        <a class="navbar-brand" href="loker-profile-perusahaan.blade.php">Lowongan
                          Kerja</a>
                      </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="navbar-brand" href="edit-profile-perusahaan.html">Edit Profile</a>
                      </li>
                    </ul>
                  </div>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-12 mb-5">
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
                    <table class="table mb-0" id="daftar-loker-perusahaan">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama Perusahaan</th>
                                <th>Jabatan</th>
                                <th>Tipe</th>
                                <th>Status</th>
                                <th>No.WA</th>
                                <th>Email</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>12/12/2025</td>
                                <td>Cititex</td>
                                <td>Admin</td>
                                <td>Job Opportunity</td>
                                <td><span class="badge bg-label-info me-1">Open</span></td>
                                <td>082348945873</td>
                                <td>cititex@gmail.com</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-edit-alt me-2"></i>Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-show me-2"></i>Lihat</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>12/11/2025</td>
                                <td>Warga Lokal</td>
                                <td>Operational</td>
                                <td>Job Opportunity</td>
                                <td><span class="badge bg-label-warning me-1">Close</span></td>
                                <td>0825678092</td>
                                <td>wargalokal@gmail.com</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-edit-alt me-2"></i>Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-show me-2"></i>Lihat</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    </div>

        </div>
        <div class="col-12 mb-5">
          <div class="card">
            <div class="bg-white p-4">
              <h6 class="fw-bold mb-2">Tentang Perusahaan</h6>
              <p class="mb-0 text-muted">
                PT. Intim Harmonis Foods Industri, better known as INAFOOD specializes in
                manufacturing biscuits and wafers. Our company started production in 1997
                with many various innovations and development intended to create superior
                quality products according to consumer choice. By holding one of the
                principles that quality is our customer satisfaction, INAFOOD is committed
                to quality products to be better known as multinational company
              </p>
              <br>
              <h6 class="fw-bold mb-2">Alamat</h6>
              <p>Jl.apokaden</p>
              <br>
              <h6 class="fw-bold mb-2">Email</h6>
              <p>betutu@gmail.com</p>
              <br>
              <h6 class="fw-bold mb-2">No.Telp</h6>
              <p>0897868365463</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
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