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
                  @error('NamaPerusahaan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- NPWP --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">No NPWP</label>
                  <input name="NoNpwp" class="form-control"
                    value="{{ old('NoNpwp', $info_perusahaan->no_npwp ?? '') }}">
                  @error('NoNpwp')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email</label>
                  <input name="Email" class="form-control"
                    value="{{ old('Email', $info_perusahaan->email_perusahaan ?? '') }}">
                  @error('Email')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- No Telp --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">No. Telp</label>
                  <input name="NoTelp" class="form-control"
                    value="{{ old('NoTelp', $info_perusahaan->no_telp_perusahaan ?? '') }}">
                  @error('NoTelp')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- Provinsi --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Provinsi</label>
                  <select id="provinsi" name="Provinsi" class="form-select">
                    <option value="">Pilih provinsi</option>
                  </select>
                </div>

                {{-- Kabupaten --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Kabupaten</label>
                  <select id="kabupaten" name="Kabupaten" class="form-select" disabled>
                    <option value="">Pilih kabupaten</option>
                  </select>

                </div>

                {{-- Kecamatan --}}
                <div class="col-md-6 mb-4">
                  <label class="form-label">Kecamatan</label>
                  <select id="kecamatan" name="Kecamatan" class="form-select" disabled>
                    <option value="">Pilih kecamatan</option>
                  </select>

                </div>

                {{-- Alamat --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Alamat</label>
                  <input name="Alamat" class="form-control"
                    value="{{ old('Alamat', $info_perusahaan->alamat_perusahaan ?? '') }}">
                  @error('Alamat')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- Google Maps --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Google Maps</label>
                  <input name="GoogleMaps" class="form-control"
                    value="{{ old('GoogleMaps', $info_perusahaan->google_maps ?? '') }}">
                  @error('GoogleMaps')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                {{-- Logo --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Logo Perusahaan (Format: JPG / PNG · Maksimal 2MB)</label>

                  <input id="logoInput" name="logo" type="file" class="form-control file-input-unified"
                    accept="image/png,image/jpg,image/jpeg">

                  <small class="file-helper text-danger d-none" id="logoError">
                    Ukuran file terlalu besar. Maksimal 2MB.
                  </small>
                </div>

                {{-- Tentang Perusahaan --}}
                <div class="col-12 mb-4">
                  <label class="form-label">Tentang Perusahaan</label>
                  <textarea name="TentangPerusahaan" class="form-control"
                    rows="4">{{ old('TentangPerusahaan', $info_perusahaan->tentang_perusahaan ?? '') }}</textarea>
                  @error('TentangPerusahaan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
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


    @push('scripts')
      <script>
        document.addEventListener('DOMContentLoaded', function () {

          // =====================
          // VALIDASI LOGO
          // =====================
          const logoInput = document.getElementById('logoInput');
          const logoError = document.getElementById('logoError');

          if (logoInput) {
            logoInput.addEventListener('change', function () {
              const file = this.files[0];
              const maxSize = 2 * 1024 * 1024;

              if (!file) return;

              if (file.size > maxSize) {
                logoError.classList.remove('d-none');
                this.value = '';
              } else {
                logoError.classList.add('d-none');
              }
            });
          }

          // =====================
          // WILAYAH INDONESIA API
          // =====================
          const provinsi = document.getElementById('provinsi');
          const kabupaten = document.getElementById('kabupaten');
          const kecamatan = document.getElementById('kecamatan');

          // VALUE LAMA (EDIT PROFILE)
          const oldProvinsi = "{{ old('Provinsi', $info_perusahaan->provinsi ?? '') }}";
          const oldKabupaten = "{{ old('Kabupaten', $info_perusahaan->kabupaten ?? '') }}";
          const oldKecamatan = "{{ old('Kecamatan', $info_perusahaan->kecamatan ?? '') }}";

          // LOAD PROVINSI
          fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
            .then(res => res.json())
            .then(data => {
              let opt = '<option value="">Pilih provinsi</option>';
              data.forEach(item => {
                opt += `<option value="${item.name}" data-id="${item.id}" ${item.name === oldProvinsi ? 'selected' : ''}>${item.name}</option>`;
              });
              provinsi.innerHTML = opt;

              if (oldProvinsi) {
                provinsi.dispatchEvent(new Event('change'));
              }
            });

          // LOAD KABUPATEN
          provinsi.addEventListener('change', function () {
            const provId = this.selectedOptions[0]?.dataset.id;

            kabupaten.innerHTML = '<option value="">Pilih kabupaten</option>';
            kecamatan.innerHTML = '<option value="">Pilih kecamatan</option>';
            kabupaten.disabled = true;
            kecamatan.disabled = true;

            if (!provId) return;

            fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${provId}.json`)
              .then(res => res.json())
              .then(data => {
                let opt = '<option value="">Pilih kabupaten</option>';
                data.forEach(item => {
                  opt += `<option value="${item.name}" data-id="${item.id}" ${item.name === oldKabupaten ? 'selected' : ''}>${item.name}</option>`;
                });
                kabupaten.innerHTML = opt;
                kabupaten.disabled = false;

                if (oldKabupaten) {
                  kabupaten.dispatchEvent(new Event('change'));
                }
              });
          });

          // LOAD KECAMATAN
          kabupaten.addEventListener('change', function () {
            const kabId = this.selectedOptions[0]?.dataset.id;

            kecamatan.innerHTML = '<option value="">Pilih kecamatan</option>';
            kecamatan.disabled = true;

            if (!kabId) return;

            fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${kabId}.json`)
              .then(res => res.json())
              .then(data => {
                let opt = '<option value="">Pilih kecamatan</option>';
                data.forEach(item => {
                  opt += `<option value="${item.name}" ${item.name === oldKecamatan ? 'selected' : ''}>${item.name}</option>`;
                });
                kecamatan.innerHTML = opt;
                kecamatan.disabled = false;
              });
          });

        });
      </script>
    @endpush


  </div>
</x-admin_perusahaan.layout>