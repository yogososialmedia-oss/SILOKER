<!doctype html>

<html lang="en" class="layout-wide customizer-hide" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Perusahaan</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin-perusahaan/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin-perusahaan/assets/vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('admin-perusahaan/assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin-perusahaan/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet"
        href="{{ asset('admin-perusahaan/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin-perusahaan/assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{ asset('admin-perusahaan/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('admin-perusahaan/assets/js/config.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <span class="app-brand-text demo menu-text fw-bold text-white me-5">
                Career Center
            </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-ex-7">
                <div class="navbar-nav me-auto ms-4">
                    <a class="nav-item nav-link active" href="javascript:void(0)">Home</a>
                    <a class="nav-item nav-link" href="javascript:void(0)">About</a>
                    <a class="nav-item nav-link" href="javascript:void(0)">Loker</a>
                </div>
                <div class="navbar-nav ms-lg-auto" id="navbar-ex-15">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                data-trigger="hover">Login</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Admin</a>
                                <a class="dropdown-item" href="javascript:void(0)">Perusahaan</a>
                                <a class="dropdown-item" href="javascript:void(0)">Pencari Kerja</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i
                                    class="icon-base navbar-icon bx bx-user"></i>
                                Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y mt-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('perusahaan.registrasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input name="NamaPerusahaan" class="form-control"
                                        placeholder="Tambahkan nama perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No NPWP</label>
                                    <input name="NoNpwp" class="form-control" placeholder="Tambahkan nomor NPWP">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No.Telp</label>
                                    <input name="NoTelp" class="form-control"
                                        placeholder="Tambahkan nomor telepon perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="defaultSelect" class="form-label">Provinsi</label>
                                    <select name="Provinsi" id="defaultSelect" class="form-select">
                                        <option>Pilih provinsi</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Banda Aceh">Banda Aceh</option>
                                        <option value="Medan">Medan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="defaultSelect" class="form-label">Kabupaten</label>
                                    <select name="Kabupaten" id="defaultSelect" class="form-select">
                                        <option>Pilih kabupaten</option>
                                        <option value="Tabanan">Tabanan</option>
                                        <option value="Buleleng">Buleleng</option>
                                        <option value="Badung">Badung</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="defaultSelect" class="form-label">Kecamatan</label>
                                    <select name="Kecamatan" id="defaultSelect" class="form-select">
                                        <option>Pilih kecamatan</option>
                                        <option value="Tabanan">Kediri</option>
                                        <option value="Buleleng">Kerambitan</option>
                                        <option value="Badung">Selemadeg</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input name="Alamat" type="text" class="form-control" placeholder="Tambahkan alamat detail perusahaan seperti nama Jalan atau lainya">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Google Maps</label>
                                    <input name="GoogleMaps" class="form-control" placeholder="Tambahkan link google maps lokasi perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo</label>
                                    <input name="logo" type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Banner</label>
                                    <input name="banner" type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tentang
                                        Perusahaan</label>
                                    <textarea name="TentangPerusahaan" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input name="Email" class="form-control"
                                        placeholder="Tambahkan alamat email perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input name="Password" class="form-control"
                                        placeholder="Buat password">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-mb text-end">
                                    <button type="submit" class="btn btn-primary">Registrasi</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- / Content -->
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
    <!-- Core JS -->

    <script src="{{ asset('admin-perusahaan/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{ asset('admin-perusahaan/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('admin-perusahaan/assets/vendor/js/bootstrap.js')}}"></script>

    <script src="{{ asset('admin-perusahaan/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('admin-perusahaan/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->

    <script src="{{ asset('admin-perusahaan/assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>