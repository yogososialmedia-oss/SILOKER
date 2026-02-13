<x-admin_perusahaan.layout>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <h5 class="mb-0 fw-bold">EDIT PROFILE</h5>
              </div>
            </div>
            
          <div class="card-body">

            <form action="{{ route('perusahaan.profile.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row">

                {{-- Nama Perusahaan --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Nama Perusahaan</label>
                  <input name="NamaPerusahaan" class="form-control"
                    value="{{ old('NamaPerusahaan', $info_perusahaan->nama_perusahaan ?? '') }}">
                </div>

                {{-- NPWP --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">No NPWP</label>
                  <input name="NoNpwp" class="form-control"
                    value="{{ old('NoNpwp', $info_perusahaan->no_npwp ?? '') }}">
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email</label>
                  <input name="Email" class="form-control"
                    value="{{ old('Email', $info_perusahaan->email_perusahaan ?? '') }}">
                </div>

                {{-- No Telp --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">No. Telp</label>
                  <input name="NoTelp" class="form-control"
                    value="{{ old('NoTelp', $info_perusahaan->no_telp_perusahaan ?? '') }}">
                </div>

                {{-- Provinsi --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Provinsi</label>
                  <select name="Provinsi" class="form-select">
                    <option value="">Pilih provinsi</option>
                    @foreach (['Bali', 'Banda Aceh', 'Medan'] as $prov)
                      <option value="{{ $prov }}" {{ old('Provinsi', $info_perusahaan->provinsi ?? '') == $prov ? 'selected' : '' }}>
                        {{ $prov }}
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- Kabupaten --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Kabupaten</label>
                  <select name="Kabupaten" class="form-select">
                    <option value="">Pilih kabupaten</option>
                    @foreach (['Tabanan', 'Buleleng', 'Badung'] as $kab)
                      <option value="{{ $kab }}" {{ old('Kabupaten', $info_perusahaan->kabupaten ?? '') == $kab ? 'selected' : '' }}>
                        {{ $kab }}
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- Kecamatan --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Kecamatan</label>
                  <select name="Kecamatan" class="form-select">
                    <option value="">Pilih kecamatan</option>
                    @foreach (['Kediri', 'Kerambitan', 'Selemadeg'] as $kec)
                      <option value="{{ $kec }}" {{ old('Kecamatan', $info_perusahaan->kecamatan ?? '') == $kec ? 'selected' : '' }}>
                        {{ $kec }}
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- Alamat --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Alamat</label>
                  <input name="Alamat" class="form-control"
                    value="{{ old('Alamat', $info_perusahaan->alamat_perusahaan ?? '') }}">
                </div>

                {{-- Google Maps --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Google Maps</label>
                  <input name="GoogleMaps" class="form-control"
                    value="{{ old('GoogleMaps', $info_perusahaan->google_maps ?? '') }}">
                </div>

                {{-- Logo --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Logo</label>
                  <input id="logoInput" name="logo" type="file" class="form-control"
                    accept="image/png,image/jpg,image/jpeg">
                  <small class="text-muted">
                    Format: JPG/PNG · Maksimal 2MB
                  </small>
                </div>

                {{-- Tentang Perusahaan --}}
                <div class="col-12 mb-4">
                  <label class="form-label">Tentang Perusahaan</label>
                  <textarea name="TentangPerusahaan" class="form-control"
                    rows="4">{{ old('TentangPerusahaan', $info_perusahaan->tentang_perusahaan ?? '') }}</textarea>
                </div>

                {{-- Submit --}}
                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-warning">
                    Simpan Perubahan
                  </button>
                </div>

              </div>
            </form>
          </div>
        </div>
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
    <!-- / Footer -->

    <script>
      function validateFileSize(input, maxSizeMB) {
        const file = input.files[0];
        if (!file) return;

        const maxSize = maxSizeMB * 1080 * 1080;

        if (file.size > maxSize) {
          alert(`Ukuran file terlalu besar. Maksimal ${maxSizeMB}MB`);
          input.value = '';
        }
      }

      // LOGO max 2MB
      document.getElementById('logoInput').addEventListener('change', function () {
        validateFileSize(this, 2);
      });

    </script>

  </div>
</x-admin_perusahaan.layout>