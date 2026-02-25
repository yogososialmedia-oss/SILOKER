<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">REGISTRASI PENCARI KERJA</h5>
                            </div>
                        </div>


                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('pencarikerja.register.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- NAMA --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input name="nama_pencari_kerja" value="{{ old('nama_pencari_kerja') }}"
                                            class="form-control @error('nama_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan nama lengkap anda">
                                        @error('nama_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- NIM --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIM (jika mahasiswa STIKOM)</label>
                                        <input name="nim" value="{{ old('nim') }}" class="form-control"
                                            placeholder="Tambahkan NIM ">
                                    </div>

                                    {{-- NO TELP --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No Telepon</label>
                                        <input name="no_telp_pencari_kerja" value="{{ old('no_telp_pencari_kerja') }}"
                                            class="form-control @error('no_telp_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan nomor telepon">
                                        @error('no_telp_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ALAMAT --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat_pencari_kerja" value="{{ old('alamat_pencari_kerja') }}"
                                            class="form-control @error('alamat_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan alamat lengkap">
                                        @error('alamat_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PENDIDIKAN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pendidikan Terakhir</label>
                                        <select name="pendidikan_terakhir" class="form-select @error('pendidikan_terakhir') is-invalid @enderror">
                                            @error('pendidikan_terakhir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <option value="">Pilih Pendidikan</option>
                                            @foreach (['Pendidikan Terakhir SMA/sederajat', 'Pendidikan Terakhir D1', 'Pendidikan Terakhir D2', 'Pendidikan Terakhir D3', 'Pendidikan Terakhir S1', 'Pendidikan Terakhir S2', 'Pendidikan Terakhir S3'] as $p)
                                                <option value="{{ $p }}" {{ old('pendidikan_terakhir') == $p ? 'selected' : '' }}>{{ $p }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- LINKEDIN --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Linked.In</label>
                                        <input name="linkedin" value="{{ old('linkedin') }}" class="form-control"
                                            placeholder="Tambahkan link profile Linked.In">
                                    </div>

                                    {{-- CV --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Upload CV (Format: PDF · Maksimal 2MB)
                                        </label>

                                        <input id="cvInput" name="cv" type="file"
                                            class="form-control file-input-unified" accept="application/pdf">

                                        <small class="file-helper text-danger d-none" id="cvError">
                                            Ukuran file terlalu besar. Maksimal 2MB.
                                        </small>
                                    </div>


                                    {{-- FOTO --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Foto Profile (Format: JPG / PNG · Maksimal 2MB)
                                        </label>

                                        <input id="fotoProfileInput" name="foto_pencari_kerja" type="file"
                                            class="form-control file-input-unified"
                                            accept="image/png,image/jpg,image/jpeg">

                                        <small class="file-helper text-danger d-none" id="fotoProfileError">
                                            Ukuran file terlalu besar. Maksimal 2MB.
                                        </small>
                                    </div>

                                    {{-- DESKRIPSI --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Tentang Saya</label>
                                        <textarea name="deskripsi_diri" class="form-control"
                                            rows="3">{{ old('deskripsi_diri') }}</textarea>
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email_pencari_kerja"
                                            value="{{ old('email_pencari_kerja') }}"
                                            class="form-control @error('email_pencari_kerja') is-invalid @enderror"
                                            placeholder="Tambahkan email anda">
                                        @error('email_pencari_kerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- PASSWORD --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Password</label>


                                        <input type="password" id="password" name="password_pencari_kerja"
                                            class="form-control @error('password_pencari_kerja') is-invalid @enderror"
                                            placeholder="Buat password">


                                        @error('password_pencari_kerja')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <!-- CHECKBOX TOGGLE -->
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="showPassword">
                                            <label class="form-check-label" for="showPassword">
                                                Tampilkan password
                                            </label>
                                        </div>


                                        <ul class="list-unstyled mt-2 small" id="passwordRules">
                                            <li id="rule-length" class="text-muted">Minimal 8 karakter</li>
                                            <li id="rule-upper" class="text-muted">Mengandung huruf besar</li>
                                            <li id="rule-lower" class="text-muted">Mengandung huruf kecil</li>
                                            <li id="rule-number" class="text-muted">Mengandung angka</li>
                                            <li id="rule-symbol" class="text-muted">Mengandung simbol</li>
                                        </ul>
                                    </div>


                                    {{-- SUBMIT --}}
                                    <div class="col-12 text-end mt-3">
                                        <button type="submit" class="btn btn-primary">
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
            document.getElementById('fotoProfileInput').addEventListener('change', function () {
                const file = this.files[0];
                const maxSize = 2 * 1024 * 1024;
                const error = document.getElementById('fotoProfileError');

                if (!file) return;

                if (file.size > maxSize) {
                    error.classList.remove('d-none');
                    this.value = '';
                } else {
                    error.classList.add('d-none');
                }
            });
        </script>

        <script>
            document.getElementById('cvInput').addEventListener('change', function () {
                const file = this.files[0];
                const maxSize = 2 * 1024 * 1024;
                const error = document.getElementById('cvError');

                if (!file) return;

                if (file.size > maxSize) {
                    error.classList.remove('d-none');
                    this.value = '';
                    return;
                }

                // validasi format PDF
                if (file.type !== 'application/pdf') {
                    error.textContent = 'CV harus berformat PDF';
                    error.classList.remove('d-none');
                    this.value = '';
                    return;
                }

                error.classList.add('d-none');
            });
        </script>
        <script>
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
        </script>
        <script>
            const passwordInput = document.getElementById('password');

            const checkbox = document.getElementById('showPassword');
            if (checkbox) {
                checkbox.addEventListener('change', function () {
                    passwordInput.type = this.checked ? 'text' : 'password';
                });
            }

            const toggle = document.getElementById('togglePassword');
            if (toggle) {
                toggle.addEventListener('click', function () {
                    const icon = this.querySelector('i');
                    const isPassword = passwordInput.type === 'password';

                    passwordInput.type = isPassword ? 'text' : 'password';
                    icon.classList.toggle('bx-hide', !isPassword);
                    icon.classList.toggle('bx-show', isPassword);
                });
            }
        </script>



    </div>

</x-pencari_kerja.layout>