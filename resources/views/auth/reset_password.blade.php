<x-pencari_kerja.layout>

<div class="login-page-wrapper">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic">
            <div>
                <div class="card px-sm-6 px-0">
                    <div class="card-body">

                        <div class="app-brand justify-content-center mb-6">
                            <span class="app-brand-text demo text-heading fw-bold">
                                RESET PASSWORD
                            </span>
                        </div>

                        <form action="{{ url('/reset-password') }}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-6">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button class="btn btn-warning w-100">Reset Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-pencari_kerja.layout>