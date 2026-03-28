<x-pencari_kerja.layout>

<div class="login-page-wrapper">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic">
            <div>
                <div class="card px-sm-6 px-0">
                    <div class="card-body">

                        <div class="app-brand justify-content-center mb-6">
                            <span class="app-brand-text demo text-heading fw-bold">
                                LUPA PASSWORD
                            </span>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/kirim-otp') }}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-6">
                                <label class="form-label">Login Sebagai</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="pencarikerja">Pencari Kerja</option>
                                    <option value="perusahaanmitra">Perusahaan</option>
                                </select>
                            </div>

                            <button class="btn btn-primary w-100">Kirim OTP</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-pencari_kerja.layout>