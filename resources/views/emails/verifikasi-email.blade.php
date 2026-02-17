<h2>Halo, {{ $user->nama_perusahaan ?? $user->nama_pencari_kerja }}</h2>
<p>Silahkan klik link berikut untuk memverifikasi email:</p>
<a href="{{ route('verifikasi.email', ['type' => $type, 'token' => $token]) }}">
    Verifikasi Email
</a>