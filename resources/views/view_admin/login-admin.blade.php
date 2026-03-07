<x-pencari_kerja.layout>

    <!-- Wrapper halaman login admin -->
    <div class="login-page-wrapper">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic">
                <div>
                    <!-- Card login -->
                    <div class="card px-sm-6 px-0">
                        <div class="card-body">

                            <!-- Brand / Judul halaman -->
                            <div class="app-brand justify-content-center mb-6">
                                <a class="app-brand-text demo text-heading fw-bold">
                                    ADMIN
                                </a>
                            </div>

                            <!-- Alert sukses login atau aksi lain -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Form login admin -->
                            <form class="mb-6" action="{{ route('admin.login.post') }}" method="POST">
                                @csrf

                                <!-- Input email/username -->
                                <div class="mb-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email-username" placeholder="Masukan alamat email" autofocus />
                                </div>

                                <!-- Input password dengan toggle show/hide -->
                                <div class="mb-6 form-password-toggle">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" placeholder="••••••••••••" />
                                        <span class="input-group-text cursor-pointer">
                                            <i class="icon-base bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Error message untuk email -->
                                @error('email-username')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <!-- Tombol login -->
                                <div class="mb-6">
                                    <button class="btn btn-primary w-100" type="submit">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Footer halaman login -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex justify-content-between py-4">
                ©2026 Yogo & Wahyu
            </div>
        </div>
    </footer>

</x-pencari_kerja.layout>