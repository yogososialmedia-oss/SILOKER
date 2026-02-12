<!doctype html>

<html lang="en" class="layout-wide customizer-hide" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Pencari Kerja</title>

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
    <nav class="navbar navbar-expand-lg fixed-top navbar-beranda navbar-dark">
        <div class="container-fluid px-4">

            <!-- BRAND -->
            <span class="navbar-brand fw-bold brand-text-beranda">
                Career Center<span class="dot-beranda hero-exclamation">.</span>
            </span>

            <!-- BURGER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- COLLAPSE -->
            <div class="collapse navbar-collapse" id="navbar-ex-7">

                <!-- MENU KIRI -->
                <div class="navbar-nav ms-4 menu-beranda">
                    <!-- Contoh jika route beranda namanya 'beranda' -->
                    <a class="nav-link" href="{{ route('beranda') }}#home">Home</a>
                    <a class="nav-link" href="{{ route('beranda') }}#about">About</a>
                    <a class="nav-link" href="{{ route('loker') }}">Loker</a>
                </div>

                <!-- MENU KANAN -->
                <div class="navbar-nav ms-auto align-items-lg-center menu-kanan">

                    <!-- LOGIN DROPDOWN -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle login-link-beranda" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-beranda">
                            <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin</a></li>
                            <li><a class="dropdown-item" href="{{ route('perusahaan.login') }}">Perusahaan</a></li>
                            <li><a class="dropdown-item" href="{{ route('pencarikerja.login') }}">Pencari Kerja</a></li>
                        </ul>
                    </div>

                    <!-- PROFILE -->
                    @if ((Auth::guard('pencarikerja')->user()))
                    <a class="nav-link profile-link-beranda ms-lg-3" href="{{ route('profile-pencari-kerja') }}">
                        <i class="bx bx-user"></i> Profile
                    </a>
                    @endif

                </div>
            </div>
        </div>
    </nav>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div>
                <!-- Register -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <div class="app-brand justify-content-center mb-6">
                            <a class="app-brand-text demo text-heading fw-bold">Login Pencari Kerja</a>
                        </div>

                        <form id="formAuthentication" class="mb-6" action="" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email-username"
                                    placeholder="Enter your email" autofocus />
                            </div>
                            <div class="mb-6 form-password-toggle ">
                                <label class="form-label " for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base bx bx-hide"></i></span>
                                </div>
                            </div>
                            @if($errors->has('email-username'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->first('email-username') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            <div class="mb-8">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('pencarikerja.register') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <!-- FOOTER -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex justify-content-between py-4">
                ©2026 Yogo & Wahyu
            </div>
        </div>
    </footer>

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