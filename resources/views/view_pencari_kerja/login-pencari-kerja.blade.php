<x-pencarikerja.layout>
    <!-- LOGIN PAGE WRAPPER -->
    <div class="login-page-wrapper">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic">
                <div>
                    <!-- LOGIN CARD -->
                    <div class="card px-sm-6 px-0">
                        <div class="card-body">
                            <!-- BRAND -->
                            <div class="app-brand justify-content-center mb-6">
                                <a class="app-brand-text demo text-heading fw-bold"> PENCARI KERJA </a>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- FORM -->
                            <form id="formAuthentication" class="mb-6" action="{{ route('pencarikerja.login.post') }}" method="POST">
                                @csrf

                                <!-- EMAIL -->
                                <div class="mb-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email-username" placeholder="Masukan alamat email" autofocus />
                                </div>

                                <!-- PASSWORD -->
                                <div class="mb-6 form-password-toggle">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" placeholder="••••••••••••" />
                                        <span class="input-group-text cursor-pointer">
                                            <i class="icon-base bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>

                                @error('email-username')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <!-- BUTTON -->
                                <div class="mb-6">
                                    <button class="btn btn-primary w-100" type="submit"> Login </button>
                                </div>
                            </form>

                            <!-- REGISTER -->
                            <p class="text-center">
                                <span>New on our platform?</span><br>
                                <a class="btn btn-outline-primary mt-2" href="{{ route('pencarikerja.register') }}"> Create an account </a>
                            </p>
                        </div>
                    </div>
                    <!-- /LOGIN CARD -->
                </div>
            </div>
        </div>
    </div>
    <!-- /LOGIN PAGE WRAPPER -->

    <!-- FOOTER -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex justify-content-between py-4">
                ©2026 Yogo & Wahyu
            </div>
        </div>
    </footer>
</x-pencarikerja.layout>