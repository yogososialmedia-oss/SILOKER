<x-admin_perusahaan.layout>
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">

        {{-- NOTIFIKASI --}}
        @if (session('success'))
          <div class="col-12">
            <div id="autoAlert" class="alert alert-success alert-dismissible fade show mb-4" role="alert">
              {{ session('success') }}
            </div>
          </div>
        @endif
        @if(session('error'))
          <div class="col-12">
            <div id="autoAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
          </div>
        @endif
              

        {{-- CARD THUMBNAIL / HEADER --}}
        <div class="col-12 mb-4">
          <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
            <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png') }}"
              class="card-img-top"
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

              @php
                  $statusClass = [
                      'pending' => 'text-warning',
                      'terverifikasi' => 'text-white',
                      'verifikasi_gagal' => 'text-danger'
                  ];

                  $statusText = [
                      'pending' => 'Verifikasi Dalam Proses',
                      'terverifikasi' => 'Terverifikasi',
                      'verifikasi_gagal' => 'Verifikasi Gagal'
                  ];
              @endphp

              @if($info_perusahaan->status_akun == 'verifikasi_gagal')
                  <button 
                      class="btn p-0 border-0 bg-transparent {{ $statusClass[$info_perusahaan->status_akun] }}"
                      data-bs-toggle="modal"
                      data-bs-target="#modalStatus">
                      {{ $statusText[$info_perusahaan->status_akun] }}
                      <i class="bx bx-error-circle"></i>
                  </button>
              @else
                  <p class="{{ $statusClass[$info_perusahaan->status_akun] ?? 'text-secondary' }} mb-0">
                      {{ $statusText[$info_perusahaan->status_akun] ?? '-' }}
                  </p>
              @endif
            </div>
          </div>
        </div>

        {{-- CARD NAVBAR PROFILE --}}
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

        {{-- CARD DETAIL PROFIL --}}
        <div class="col-12 mb-5">
          <div class="card shadow-sm rounded-4 p-4">
            <h6 class="fw-bold mb-2">Tentang Perusahaan</h6>
            <p class="mb-3 text-muted">{{ $info_perusahaan->tentang_perusahaan ?? '-' }}</p>
            
            <h6 class="fw-bold mb-2">Alamat</h6>
            <p class="mb-2">
                {{-- Alamat lengkap --}}
                {{ $info_perusahaan->alamat_perusahaan ?? '-' }}
            </p>
            @if($info_perusahaan->kecamatan || $info_perusahaan->kabupaten || $info_perusahaan->provinsi)
            <p class="mb-2">
                @php
                    $parts = array_filter([
                        $info_perusahaan->kecamatan,
                        $info_perusahaan->kabupaten,
                        $info_perusahaan->provinsi
                    ]);
                    echo implode(', ', $parts);
                @endphp
            </p>
            @endif

            {{-- Google Maps --}}
            @if(!empty($info_perusahaan->google_maps))
            <a href="{{ $info_perusahaan->google_maps }}" target="_blank" class="d-flex align-items-center gap-1 mb-3">
                <i class="bx bx-current-location"></i>
                <span>View on Google Maps</span>
            </a>
            @endif

            <h6 class="fw-bold mb-2">Email</h6>
            <p>{{ $info_perusahaan->email_perusahaan ?? '-' }}</p>

            <h6 class="fw-bold mb-2">No. Telp</h6>
            <p>{{ $info_perusahaan->no_telp_perusahaan ?? '-' }}</p>
          </div>
        </div>
      </div>

      @if($info_perusahaan->status_akun == 'verifikasi_gagal')
        <div class="modal fade" id="modalStatus" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
              <div class="modal-header">
                <h5 class="modal-title text-danger">
                  Keterangan Verifikasi Gagal
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                {{ $info_perusahaan->deskripsi_status ?? 'Tidak ada keterangan dari admin.' }}
              </div>
              <div class="modal-footer">
                @if (Auth::guard('perusahaanmitra')->user())
                  <a href="{{ route('perusahaan.profile.edit') }}" class="btn btn-warning">
                    Perbaiki Profile
                  </a>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Tutup
                </button>
              </div>
            </div>
          </div>
        </div>
        @endif
    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
          <div class="mb-2 mb-md-0">©2026 Yogo & Wahyu</div>
        </div>
      </div>
    </footer>

    <script>
      setTimeout(() => {
        const alert = document.getElementById('autoAlert');
        if (alert) {
          alert.classList.remove('show');
          alert.classList.add('fade');
          setTimeout(() => alert.remove(), 300);
        }
      }, 3000);
    </script>

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</x-admin_perusahaan.layout>