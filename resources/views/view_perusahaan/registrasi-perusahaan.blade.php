<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="fw-bold mb-4 text-uppercase">
                            Registrasi Perusahaan
                        </h4>

                        <form action="{{ route('perusahaan.registrasi') }}" method="POST" enctype="multipart/form-data">
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
                                    <select name="Provinsi" class="form-select @error('Provinsi') is-invalid @enderror">
                                        <option value="">Pilih Provinsi</option>
                                        <option value="Bali" {{ old('Provinsi') == 'Bali' ? 'selected' : '' }}>Bali
                                        </option>
                                        <option value="Banda Aceh" {{ old('Provinsi') == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh</option>
                                        <option value="Medan" {{ old('Provinsi') == 'Medan' ? 'selected' : '' }}>Medan
                                        </option>
                                    </select>
                                    @error('Provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- KABUPATEN --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <select name="Kabupaten"
                                        class="form-select @error('Kabupaten') is-invalid @enderror">
                                        <option value="">Pilih Kabupaten</option>
                                        <option value="Tabanan" {{ old('Kabupaten') == 'Tabanan' ? 'selected' : '' }}>
                                            Tabanan</option>
                                        <option value="Buleleng" {{ old('Kabupaten') == 'Buleleng' ? 'selected' : '' }}>
                                            Buleleng</option>
                                        <option value="Badung" {{ old('Kabupaten') == 'Badung' ? 'selected' : '' }}>Badung
                                        </option>
                                    </select>
                                    @error('Kabupaten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- KECAMATAN --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <select name="Kecamatan"
                                        class="form-select @error('Kecamatan') is-invalid @enderror">
                                        <option value="">Pilih Kecamatan</option>
                                        <option value="Kediri" {{ old('Kecamatan') == 'Kediri' ? 'selected' : '' }}>Kediri
                                        </option>
                                        <option value="Kerambitan" {{ old('Kecamatan') == 'Kerambitan' ? 'selected' : '' }}>Kerambitan</option>
                                        <option value="Selemadeg" {{ old('Kecamatan') == 'Selemadeg' ? 'selected' : '' }}>
                                            Selemadeg</option>
                                    </select>
                                    @error('Kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- ALAMAT --}}
                                <div class="col-md-6 mb-3">
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

                                {{-- LOGO --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo Perusahaan</label>
                                    <input type="file" name="Logo" class="form-control">
                                </div>

                                {{-- BANNER --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Banner Perusahaan</label>
                                    <input type="file" name="BannerPerusahaan" class="form-control">
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
    </div>

</x-pencari_kerja.layout>
