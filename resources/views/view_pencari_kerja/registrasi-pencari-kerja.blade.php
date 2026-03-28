<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    {{-- CARD REGISTRASI PENCARI KERJA --}}
                    <div class="card">
                        {{-- HEADER CARD --}}
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">REGISTRASI PENCARI KERJA</h5>
                            </div>
                        </div>

                        {{-- BODY CARD --}}
                        <div class="card-body">
                            {{-- ALERT SUCCESS --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            {{-- FORM REGISTRASI --}}
                            <form action="{{ route('pencarikerja.register.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    {{-- NAMA LENGKAP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap *</label>
                                        <input name="nama_pencari_kerja" value="{{ old('nama_pencari_kerja') }}" class="form-control @error('nama_pencari_kerja') is-invalid @enderror" placeholder="Tambahkan nama lengkap anda">
                                        @error('nama_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NIM --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa STIKOM)</label>

                                        <input 
                                            type="text"
                                            name="nim"
                                            value="{{ old('nim') }}"
                                            class="form-control @error('nim') is-invalid @enderror"
                                            placeholder="Tambahkan NIM (jika mahasiswa STIKOM)"
                                            maxlength="9"
                                            inputmode="numeric"
                                            pattern="[0-9]{9}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                        @error('nim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NO TELEPON --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nomor Telepon *</label>
                                        <input 
                                            type="text"
                                            name="no_telp_pencari_kerja"
                                            value="{{ old('no_telp_pencari_kerja') }}"
                                            class="form-control @error('no_telp_pencari_kerja') is-invalid @enderror"
                                            placeholder="Masukkan nomor telepon"
                                            maxlength="15"
                                            inputmode="numeric"
                                            pattern="[0-9]{10,15}"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                        @error('no_telp_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ALAMAT --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat *</label>
                                        <input name="alamat_pencari_kerja" value="{{ old('alamat_pencari_kerja') }}" class="form-control @error('alamat_pencari_kerja') is-invalid @enderror" placeholder="Tambahkan alamat lengkap">
                                        @error('alamat_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PENDIDIKAN TERAKHIR --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pendidikan Terakhir *</label>
                                        <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                                            <option value="">Pilih Pendidikan</option>
                                            @foreach (['Pendidikan Terakhir SMA/sederajat', 'Pendidikan Terakhir D1', 'Pendidikan Terakhir D2', 'Pendidikan Terakhir D3', 'Pendidikan Terakhir S1', 'Pendidikan Terakhir S2', 'Pendidikan Terakhir S3'] as $p)
                                                <option value="{{ $p }}" {{ old('pendidikan_terakhir') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                            @endforeach
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- LINKEDIN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.In</label>
                                        <input 
                                            name="linkedin"
                                            value="{{ old('linkedin') }}"
                                            class="form-control @error('linkedin') is-invalid @enderror"
                                            placeholder="Tambahkan link profile Linked.In">

                                        @error('linkedin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- UPLOAD CV --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload CV (Format: PDF · Maksimal 2MB)</label>
                                        <input id="cvInput" name="cv" type="file" class="form-control file-input-unified @error('cv') is-invalid @enderror" accept="application/pdf">
                                        <small class="file-helper text-danger d-none" id="cvError">Ukuran file terlalu besar. Maksimal 2MB.</small>
                                        @error('cv')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- FOTO PROFILE --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Foto Profile (Format: JPG / PNG · Maksimal 2MB)</label>
                                        <input id="fotoProfileInput" name="foto_pencari_kerja" type="file" class="form-control file-input-unified @error('foto_pencari_kerja') is-invalid @enderror" accept="image/png,image/jpg,image/jpeg">
                                        <small class="file-helper text-danger d-none" id="fotoProfileError">Ukuran file terlalu besar. Maksimal 2MB.</small>
                                        @error('foto_pencari_kerja')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- DESKRIPSI TENTANG DIRI --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Tentang Saya</label>
                                        <textarea name="deskripsi_diri" class="form-control" rows="3">{{ old('deskripsi_diri') }}</textarea>
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" name="email_pencari_kerja" value="{{ old('email_pencari_kerja') }}" class="form-control @error('email_pencari_kerja') is-invalid @enderror" placeholder="Tambahkan email anda">
                                        @error('email_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PASSWORD --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password *</label>
                                        <input type="password" id="password" name="password_pencari_kerja" class="form-control @error('password_pencari_kerja') is-invalid @enderror" placeholder="Buat password">
                                        @error('password_pencari_kerja')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                        {{-- CHECKBOX SHOW PASSWORD --}}
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="showPassword">
                                            <label class="form-check-label" for="showPassword">Tampilkan password</label>
                                        </div>

                                        {{-- PASSWORD RULES LIST --}}
                                        <ul class="list-unstyled mt-2 small" id="passwordRules">
                                            <li id="rule-length" class="text-muted">Minimal 8 karakter</li>
                                            <li id="rule-upper" class="text-muted">Mengandung huruf besar</li>
                                            <li id="rule-lower" class="text-muted">Mengandung huruf kecil</li>
                                            <li id="rule-number" class="text-muted">Mengandung angka</li>
                                            <li id="rule-symbol" class="text-muted">Mengandung simbol</li>
                                        </ul>
                                    </div>

                                    {{-- BUTTON SUBMIT --}}
                                    <div class="col-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary">Registrasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        {{-- SCRIPT VALIDASI & PASSWORD --}}
        <script>
            // VALIDASI UKURAN FOTO
            document.getElementById('fotoProfileInput').addEventListener('change', function () {
                const file = this.files[0];
                const maxSize = 2 * 1024 * 1024; // 2MB
                const error = document.getElementById('fotoProfileError');
                if (!file) return;
                if (file.size > maxSize) {
                    error.classList.remove('d-none');
                    this.value = '';
                } else {
                    error.classList.add('d-none');
                }
            });

            // VALIDASI UKURAN & FORMAT CV
            document.getElementById('cvInput').addEventListener('change', function () {
                const file = this.files[0];
                const maxSize = 2 * 1024 * 1024; // 2MB
                const error = document.getElementById('cvError');
                if (!file) return;
                if (file.size > maxSize) {
                    error.textContent = 'Ukuran file terlalu besar. Maksimal 2MB.';
                    error.classList.remove('d-none');
                    this.value = '';
                    return;
                }
                if (file.type !== 'application/pdf') {
                    error.textContent = 'CV harus berformat PDF';
                    error.classList.remove('d-none');
                    this.value = '';
                    return;
                }
                error.classList.add('d-none');
            });

            // PASSWORD VALIDATION RULES
            document.addEventListener('DOMContentLoaded', function () {
                const passwordInput = document.getElementById('password');
                if (!passwordInput) return;

                passwordInput.addEventListener('input', function () {
                    const value = this.value;
                    toggleRule('rule-length', value.length >= 8);
                    toggleRule('rule-upper', /[A-Z]/.test(value));
                    toggleRule('rule-lower', /[a-z]/.test(value));
                    toggleRule('rule-number', /[0-9]/.test(value));
                    toggleRule('rule-symbol', /[^A-Za-z0-9]/.test(value));
                });

                function toggleRule(id, isValid) {
                    const el = document.getElementById(id);
                    if (!el) return;
                    if (isValid) {
                        el.classList.remove('text-muted');
                        el.classList.add('text-success');
                        if (!el.textContent.startsWith('✔')) {
                            el.textContent = '✔ ' + el.textContent;
                        }
                    } else {
                        el.classList.remove('text-success');
                        el.classList.add('text-muted');
                        el.textContent = el.textContent.replace('✔ ', '');
                    }
                }
            });

            // TOGGLE SHOW PASSWORD
            const passwordInput = document.getElementById('password');
            const checkbox = document.getElementById('showPassword');
            if (checkbox) {
                checkbox.addEventListener('change', function () {
                    passwordInput.type = this.checked ? 'text' : 'password';
                });
            }
        </script>
    </div>
</x-pencari_kerja.layout>