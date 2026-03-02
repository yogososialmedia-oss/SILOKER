<h3>PEMBERITAHUAN PEMBARUAN STATUS LAMARAN</h3>

<p>Yth. {{ $apply->pencariKerja->nama_pencari_kerja }},</p>

<p>
Dengan hormat, <br>
Kami menginformasikan bahwa status lamaran pekerjaan yang telah Anda ajukan 
telah diperbarui dengan rincian sebagai berikut:
</p>

<h4 style="color:#0d6efd; text-transform:uppercase;">
    {{ $apply->status }}
</h4>

@if($apply->pesan)
<hr>
<p><strong>Pesan dari Perusahaan:</strong></p>
<p style="text-align:justify;">
    {{ $apply->pesan }}
</p>
@endif


{{-- ================= INTERVIEW ================= --}}
@if($apply->status == 'interview')

<hr>

<p><strong>Detail Undangan Interview:</strong></p>

<p>Tanggal : {{ $apply->tanggal_interview ?? '-' }}</p>
<p>Waktu   : {{ $apply->waktu_interview ?? '-' }}</p>

@if($apply->google_maps)
<p>
Lokasi  : 
<a href="{{ $apply->google_maps }}" target="_blank">
    Lihat Lokasi pada Google Maps
</a>
</p>
@endif

<p>No. Telepon : {{ $apply->no_telp ?? '-' }}</p>

<p>
Dimohon untuk hadir tepat waktu sesuai jadwal yang telah ditentukan. 
Apabila berhalangan, silakan menghubungi pihak perusahaan melalui kontak di atas.
</p>

@endif


{{-- ================= DITERIMA ================= --}}
@if($apply->status == 'diterima')

<hr>

<p><strong>Informasi Kehadiran / Onboarding:</strong></p>

<p>Tanggal : {{ $apply->tanggal_kunjungan ?? '-' }}</p>
<p>Waktu   : {{ $apply->jam_kunjungan ?? '-' }}</p>

@if($apply->google_maps)
<p>
Lokasi Kantor :
<a href="{{ $apply->google_maps }}" target="_blank">
    Lihat Lokasi pada Google Maps
</a>
</p>
@endif

<p>No. Telepon : {{ $apply->no_telp ?? '-' }}</p>

<p>
Kami mengucapkan selamat atas diterimanya Anda pada posisi yang dilamar. 
Mohon untuk hadir sesuai jadwal yang telah ditentukan guna proses administrasi 
dan pengarahan lebih lanjut.
</p>

@endif


<hr>

<p>
Demikian pemberitahuan ini kami sampaikan. 
Atas perhatian dan kerja sama Anda, kami ucapkan terima kasih.
</p>

<p>Hormat kami,</p>
<p><strong>Tim Rekrutmen</strong></p>