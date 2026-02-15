<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">REGISTRASI PERUSAHAAN</h5>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('perusahaan.registrasi') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- NAMA PERUSAHAAN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="NamaPerusahaan" value="{{ old('NamaPerusahaan') }}"
                                            class="form-control @error('NamaPerusahaan') is-invalid @enderror"
                                            placeholder="Tambahakan nama perusahaan">
                                        @error('NamaPerusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NPWP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No NPWP</label>
                                        <input type="text" name="NoNpwp" value="{{ old('NoNpwp') }}"
                                            class="form-control @error('NoNpwp') is-invalid @enderror"
                                            placeholder="Tambahkan nomor NPWP">
                                        @error('NoNpwp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NO TELP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No Telp</label>
                                        <input type="text" name="NoTelp" value="{{ old('NoTelp') }}"
                                            class="form-control @error('NoTelp') is-invalid @enderror"
                                            placeholder="Tambahkan nomor telepon perusahaan">
                                        @error('NoTelp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PROVINSI --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <select id="provinsi" name="Provinsi"
                                            class="form-select @error('Provinsi') is-invalid @enderror">
                                            <option value="">Pilih Provinsi</option>
                                        </select>

                                        @error('Provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- KABUPATEN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <select id="kabupaten" name="Kabupaten"
                                            class="form-select @error('Kabupaten') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kabupaten</option>
                                        </select>

                                        @error('Kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- KECAMATAN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select id="kecamatan" name="Kecamatan"
                                            class="form-select @error('Kecamatan') is-invalid @enderror" disabled>
                                            <option value="">Pilih Kecamatan</option>
                                        </select>

                                        @error('Kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- ALAMAT --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" name="Alamat" value="{{ old('Alamat') }}"
                                            class="form-control @error('Alamat') is-invalid @enderror"
                                            placeholder="Tambahkan alamat lengkap perusahaan">
                                        @error('Alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    {{-- GOOGLE MAPS --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Google Maps</label>
                                        <input type="text" name="GoogleMaps" value="{{ old('GoogleMaps') }}"
                                            class="form-control @error('GoogleMaps') is-invalid @enderror"
                                            placeholder="Tambahkan link google maps perusahaan">
                                        @error('GoogleMaps')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Logo --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Logo Perusahaan (Format: JPG / PNG · Maksimal
                                            2MB)</label>

                                        <input id="logoInput" name="logo" type="file"
                                            class="form-control file-input-unified"
                                            accept="image/png,image/jpg,image/jpeg">

                                        <small class="file-helper text-danger d-none" id="logoError">
                                            Ukuran file terlalu besar. Maksimal 2MB.
                                        </small>
                                    </div>



                                    {{-- TENTANG --}}
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Tentang Perusahaan</label>
                                        <textarea name="TentangPerusahaan" rows="4"
                                            class="form-control @error('TentangPerusahaan') is-invalid @enderror">{{ old('TentangPerusahaan') }}</textarea>
                                        @error('TentangPerusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="Email" value="{{ old('Email') }}"
                                            class="form-control @error('Email') is-invalid @enderror"
                                            placeholder="Tambahkan email perusahaan">
                                        @error('Email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PASSWORD --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="Password"
                                            class="form-control @error('Password') is-invalid @enderror"
                                            placeholder="Buat password minimal 8 karakter">
                                        @error('Password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- SUBMIT --}}
                                    <div class="col-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Registrasi
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
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
            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    // =====================
                    // ERROR FILE LOGO
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
                    const provinsiSelect = document.getElementById('provinsi');
                    const kabupatenSelect = document.getElementById('kabupaten');
                    const kecamatanSelect = document.getElementById('kecamatan');

                    if (!provinsiSelect || !kabupatenSelect || !kecamatanSelect) return;

                    // LOAD PROVINSI
                    fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                        .then(res => res.json())
                        .then(data => {
                            let option = '<option value="">Pilih Provinsi</option>';
                            data.forEach(item => {
                                option += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            provinsiSelect.innerHTML = option;
                        });

                    // LOAD KABUPATEN
                    provinsiSelect.addEventListener('change', function () {
                        const provinsiId = this.selectedOptions[0]?.dataset.id;

                        kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        kabupatenSelect.disabled = true;
                        kecamatanSelect.disabled = true;

                        if (!provinsiId) return;

                        fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${provinsiId}.json`)
                            .then(res => res.json())
                            .then(data => {
                                let option = '<option value="">Pilih Kabupaten</option>';
                                data.forEach(item => {
                                    option += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                                });
                                kabupatenSelect.innerHTML = option;
                                kabupatenSelect.disabled = false;
                            });
                    });

                    // LOAD KECAMATAN
                    kabupatenSelect.addEventListener('change', function () {
                        const kabupatenId = this.selectedOptions[0]?.dataset.id;

                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        kecamatanSelect.disabled = true;

                        if (!kabupatenId) return;

                        fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${kabupatenId}.json`)
                            .then(res => res.json())
                            .then(data => {
                                let option = '<option value="">Pilih Kecamatan</option>';
                                data.forEach(item => {
                                    option += `<option value="${item.name}">${item.name}</option>`;
                                });
                                kecamatanSelect.innerHTML = option;
                                kecamatanSelect.disabled = false;
                            });
                    });

                });
            </script>



    </div>

</x-pencari_kerja.layout>