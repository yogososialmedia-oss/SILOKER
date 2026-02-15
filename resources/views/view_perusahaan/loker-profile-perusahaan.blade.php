<x-admin_perusahaan.layout>
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">

        <!-- Overlay Logo & Nama -->
        <div class="col-12 mb-4">
          <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
            <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
              style="height:280px; object-fit:cover;">

            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <img src="{{ $info_perusahaan->logo 
                ? asset('storage/logo_perusahaan/'.$info_perusahaan->logo) 
                : asset('admin-perusahaan/assets/img/avatars/default_profile_perusahaan.jpg') }}"
                class="rounded-circle mb-2"
                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">
              <h4 class="fw-bold mb-0 text-white">
                {{ $info_perusahaan->nama_perusahaan ?? '-' }}
              </h4>

              @if ($info_perusahaan->status_akun === 'pending')
                <p class="text-warning mb-0">Verifikasi Dalam Proses</p>
              @elseif ($info_perusahaan->status_akun === 'terverifikasi')
                <p class="text-white mb-0">Terverifikasi</p>
              @elseif ($info_perusahaan->status_akun === 'verifikasi_gagal')
                <p class="text-danger mb-0">Verifikasi Gagal</p>
              @endif
            </div>
          </div>
        </div>

        {{-- CARD NAVBAR --}}
        <div class="col-12 mb-5">
          <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
            <div class="bg-white p-4">
              <nav class="navbar navbar-expand-lg py-1">
                <div class="container-fluid">
                  <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-ex-15">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbar-ex-15">
                    <ul class="navbar-nav mb-2 mb-lg-0 text-end text-lg-start ms-auto ms-lg-0">

                      {{-- Tentang --}}
                      @if (Auth::guard('perusahaanmitra')->user())
                        <li class="nav-item mb-2">
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
                        <li class="nav-item mb-2">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.loker.profile') ? 'active' : '' }}"
                            href="{{ route('perusahaan.loker.profile') }}">
                            Lowongan Kerja
                          </a>
                        </li>
                      @elseif (Auth::guard('admin')->user())
                        <li class="nav-item mb-2">
                          <a class="navbar-brand nav-underline {{ request()->routeIs('admin.lowongan-kerja-perusahaan') ? 'active' : '' }}"
                            href="{{ route('admin.lowongan-kerja-perusahaan', $info_perusahaan->id) }}">
                            Lowongan Kerja
                          </a>
                        </li>
                      @endif

                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-end ">
                      @if (Auth::guard('perusahaanmitra')->user())
                        <li class="nav-item me-2">
                          <a href="{{ route('perusahaan.profile.edit') }}" class="btn btn-sm btn-warning">
                            Edit Profile
                          </a>
                        </li>
                      @endif
                    </ul>

                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>

        @foreach($loker as $item)
          <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
            <div class="card h-100 loker-card-beranda position-relative">

              {{-- LINK AREA --}}
              <a href="{{ route('perusahaan.loker.tampilan', $item->id) }}" 
                class="stretched-link"></a>

              <div class="card-body position-relative">

              {{-- Tanggal --}}
              <p class="text-end fs-9 mb-2">
                {{ \Carbon\Carbon::parse($item->tanggal_mulai_loker)->format('d M Y') }}
                -
                {{ \Carbon\Carbon::parse($item->tanggal_berakhir_loker)->format('d M Y') }}
              </p>

              <div class="d-flex align-items-start gap-3 mb-3">
                <img src="{{ $info_perusahaan->logo 
                  ? asset('storage/logo_perusahaan/'.$info_perusahaan->logo) 
                  : asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                  style="width:60px; height:60px; object-fit:cover;"
                  class="rounded shadow-sm" alt="">

                <div class="flex-grow-1">
                  <h6 class="mb-1 fw-bold">
                    {{ $info_perusahaan->nama_perusahaan }}
                  </h6>

                  <p class="mb-1 small">
                    {{ $item->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                  </p>

                  <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                    <i class="bx bx-location-plus"></i>
                    <span>{{ $item->kabupaten }}</span>
                  </p>
                </div>
              </div>

              <div class="d-flex align-items-center mb-3">
                <h5 class="mb-0">
                  {{ $item->jabatan }}
                </h5>

                <div class="ms-auto pe-5 me-2">
                  @if(now()->between($item->tanggal_mulai_loker, $item->tanggal_berakhir_loker))
                    <span class="badge bg-primary fs-6 px-3 py-2">
                  Open
              </span>
                  @else
                    <span class="badge bg-danger fs-6 px-3 py-2">
                  Close
              </span>
                  @endif
                </div>
              </div>

              <p class="d-flex align-items-start gap-2 mb-1">
                <i class="bx bx-buildings"></i>
                <span>{{ $item->model_kerja }}</span>
              </p>

              <p class="d-flex align-items-start gap-2 mb-1">
                <i class="bx bx-book-reader"></i>
                <span>{{ $item->minimal_pendidikan }}</span>
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

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

    <div class="content-backdrop fade"></div>
  </div>
</x-admin_perusahaan.layout>

