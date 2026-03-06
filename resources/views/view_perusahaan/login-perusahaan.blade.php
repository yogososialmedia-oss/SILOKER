<x-pencari_kerja.layout>

    <div class="login-page-wrapper">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic">
                <div>
                    <div class="card px-sm-6 px-0">
                        <div class="card-body">

                            <div class="app-brand justify-content-center mb-6">
                                <a class="app-brand-text demo text-heading fw-bold">
                                    PERUSAHAAN
                                </a>
                            </div>

                            {{-- Notifikasi Sukses --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form id="formAuthentication" class="mb-6" action="{{ route('perusahaan.login.post') }}" method="POST">
                                @csrf

                                <div class="mb-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email-username" placeholder="Masukan alamat email" autofocus />
                                </div>

                                <div class="mb-6 form-password-toggle">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" placeholder="••••••••••••" />
                                        <span class="input-group-text cursor-pointer">
                                            <i class="icon-base bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Notifikasi Error Login --}}
                                @if($errors->has('email-username'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        {{ $errors->first('email-username') }}
                                    </div>
                                @endif

                                <div class="mb-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <button class="btn btn-primary w-100" type="submit">
                                        Login
                                    </button>
                                </div>
                            </form>

                            <p class="text-center">
                                <span>New on our platform?</span><br>
                                <a class="btn btn-outline-primary mt-2" href="{{ route('perusahaan.registrasi') }}">
                                    Create an account
                                </a>
                            </p>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex justify-content-between py-4">
                <div>©2026 Yogo & Wahyu</div>
            </div>
        </div>
    </footer>

</x-pencari_kerja.layout>