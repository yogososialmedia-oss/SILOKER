<x-admin_perusahaan.layout>
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-12 mb-5">
          <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
            <!-- Thumbnail / Banner -->
            <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
              style="height:280px; object-fit:cover;">

            <!-- Overlay Logo & Nama -->
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}" class="rounded-circle mb-2"
                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">

              <h4 class="fw-bold mb-0 text-white">
                {{ $info_perusahaan->nama_perusahaan ?? '-' }}
              </h4>

              @if ($info_perusahaan->status_verifikasi === 'pending')
                <p class="text-warning mb-0">Verifikasi Dalam Proses</p>

              @elseif ($info_perusahaan->status_verifikasi === 'rejected')
                <p class="text-danger mb-0">Verifikasi Gagal</p>

              @elseif ($info_perusahaan->status_verifikasi === 'approved')
                <p class="text-primary mb-0">Terverifikasi</p>
              @endif
            </div>

            <div class="bg-white p-4">
              <nav class="navbar navbar-expand-lg py-1">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbar-ex-15">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                      {{-- Tentang --}}
                      @if (Auth::guard('perusahaanmitra')->user())
                        <li class="nav-item">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.profile') ? 'active' : '' }}"
                            href="{{ route('perusahaan.profile') }}">
                            Tentang Perusahaan
                          </a>
                        </li>
                      @elseif (Auth::guard('admin')->user())
                        <li class="nav-item">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('admin.profile-perusahaan') ? 'active' : '' }}"
                            href="{{ route('admin.profile-perusahaan', $info_perusahaan->id) }}">
                            Tentang Perusahaan
                          </a>
                        </li>
                      @endif

                      {{-- Menu kedua --}}
                      @if (Auth::guard('perusahaanmitra')->user())
                        <li class="nav-item">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.loker.profile') ? 'active' : '' }}"
                            href="{{ route('perusahaan.loker.profile') }}">
                            Lowongan Kerja
                          </a>
                        </li>
                      @elseif (Auth::guard('admin')->user())
                        <li class="nav-item">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('admin.lowongan-kerja-perusahaan') ? 'active' : '' }}"
                            href="{{ route('admin.lowongan-kerja-perusahaan', $info_perusahaan->id) }}">
                            Lowongan Kerja
                          </a>
                        </li>
                      @endif

                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                      @if (Auth::guard('perusahaanmitra')->user())
                        <li class="nav-item me-2">
                          <a href="{{ route('perusahaan.profile.edit') }}" class="btn btn-sm btn-warning">
                            Edit Profile
                          </a>
                        </li>
                      @endif

                      {{-- LOGOUT --}}
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger">
                            Logout
                          </button>
                        </form>
                      </li>
                    </ul>

                  </div>
              </nav>
            </div>

          </div>
        </div>
        {{-- DETAIL PERUSAHAAN --}}
        {{-- Card Loker --}}
        @if (Auth::guard('perusahaanmitra')->user())
          <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
            <div class="card h-100 loker-card-beranda position-relative">
              <a href="{{ route('perusahaan.loker.tampilan') }}" class="stretched-link"></a>
              <div class="card-body position-relative">
                <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>
                <div class="d-flex align-items-start gap-3 mb-3">
                  <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}" style="width:60px; height:60px;"
                    class="img-fluid rounded" alt="">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 d-flex align-items-center gap-2">
                      <a href="{{ route('perusahaan.loker.tampilan') }}"
                        class="fw-bold text-dark text-decoration-none position-relative z-3">
                        DEYSTORY
                      </a>
                      <a href="{{ route('perusahaan.loker.tampilan') }}"
                        class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-3"
                        style="width:16px; height:16px; font-size:10px; line-height:1;">i</a>
                    </h6>
                    <p class="mb-1 small">Job Opportunity</p>
                    <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                      <i class="bx bx-location-plus"></i>
                      <span>Jakarta</span>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-9">
                    <h5 class="mb-3 position-relative">Administrasi</h5>
                  </div>
                  <div class="col-3">
                    <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-primary position-relative ">
                      Open
                    </a>
                    <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-danger position-relative ">
                      Close
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <p class="d-flex align-items-start gap-2 mb-1">
                      <i class="bx bx-buildings"></i>
                      <span>Work From Office</span>
                    </p>
                  </div>
                  <div class=" col-md-12 ">
                    <p class="d-flex align-items-start gap-2 mb-1">
                      <i class="bx bx-book-reader"></i>
                      <span>Minimal Pendidikan S1</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @elseif (Auth::guard('admin')->user())
          <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
            <div class="card h-100 loker-card-beranda position-relative">
              <a href="{{ route('admin.tampilan-loker', $info_perusahaan->id) }}" class="stretched-link"></a>
              <div class="card-body position-relative">
                <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>
                <div class="d-flex align-items-start gap-3 mb-3">
                  <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}" style="width:60px; height:60px;"
                    class="img-fluid rounded" alt="">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 d-flex align-items-center gap-2">
                      <a href="{{ route('admin.tampilan-loker', $info_perusahaan->id) }}"
                        class="fw-bold text-dark text-decoration-none position-relative z-3">
                        DEYSTORY
                      </a>
                      <a href="{{ route('admin.tampilan-loker', $info_perusahaan->id) }}"
                        class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-3"
                        style="width:16px; height:16px; font-size:10px; line-height:1;">i</a>
                    </h6>
                    <p class="mb-1 small">Job Opportunity</p>
                    <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                      <i class="bx bx-location-plus"></i>
                      <span>Jakarta</span>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-9">
                    <h5 class="mb-3 position-relative">Administrasi</h5>
                  </div>
                  <div class="col-3">
                    <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-primary position-relative ">
                      Open
                    </a>
                    <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-danger position-relative ">
                      Close
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 ">
                    <p class="d-flex align-items-start gap-2 mb-1">
                      <i class="bx bx-buildings"></i>
                      <span>Work From Office</span>
                    </p>
                  </div>
                  <div class=" col-md-12 ">
                    <p class="d-flex align-items-start gap-2 mb-1">
                      <i class="bx bx-book-reader"></i>
                      <span>Minimal Pendidikan S1</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
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
</x-admin_perusahaan.layout>