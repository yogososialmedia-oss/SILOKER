<h2>Halo, {{ $user->nama_perusahaan ?? $user->nama_pencari_kerja }}</h2>

<p>
    Terima kasih telah melakukan pendaftaran akun pada platform kami. 
    Untuk melanjutkan proses aktivasi dan memastikan bahwa alamat email yang Anda gunakan valid, 
    silakan lakukan verifikasi dengan mengklik tautan di bawah ini.
</p>

<p>
    Verifikasi email ini penting untuk mengamankan akun Anda serta memungkinkan Anda mengakses seluruh fitur yang tersedia pada sistem.
</p>

<p style="margin: 20px 0;">
    <a href="{{ route('verifikasi.email', ['type' => $type, 'token' => $token]) }}" 
       style="background-color:#0d6efd; color:#ffffff; padding:10px 18px; text-decoration:none; border-radius:5px;">
        Verifikasi Email
    </a>
</p>

<p>
    Jika Anda tidak merasa melakukan pendaftaran, Anda dapat mengabaikan email ini. 
    Tautan verifikasi ini bersifat rahasia dan tidak disarankan untuk dibagikan kepada pihak lain.
</p>

<p>
    Hormat kami,<br>
    Tim Support
</p>