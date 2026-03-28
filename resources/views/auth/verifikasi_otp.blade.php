<x-pencari_kerja.layout>

<div class="login-page-wrapper">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic">
            <div>
                <div class="card px-sm-6 px-0">
                    <div class="card-body">

                        <div class="app-brand justify-content-center mb-6">
                            <span class="app-brand-text demo text-heading fw-bold">
                                VERIFIKASI OTP
                            </span>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/verifikasi-otp') }}" method="POST">
                            @csrf

                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <input type="hidden" name="role" value="{{ session('role') }}">

                            <div class="mb-6">
                                <label class="form-label">Masukkan OTP</label>
                                <input type="text" name="otp" class="form-control" required>
                            </div>

                            <button class="btn btn-primary w-100">Verifikasi</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-pencari_kerja.layout>