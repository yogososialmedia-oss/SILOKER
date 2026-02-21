<h3>Update Status Lamaran</h3>

<p>Halo {{ $apply->pencariKerja->nama_pencari_kerja }},</p>

<p>Status lamaran Anda telah diperbarui menjadi:</p>

<h4>{{ strtoupper($apply->status) }}</h4>

@if($apply->pesan)
<p><strong>Pesan dari Perusahaan:</strong></p>
<p>{{ $apply->pesan }}</p>
@endif

@if($apply->status == 'interview')
<p><strong>Detail Interview:</strong></p>
<p>Tanggal: {{ $apply->tanggal_interview }}</p>
<p>Waktu: {{ $apply->waktu_interview }}</p>
<p>Alamat: {{ $apply->alamat_perusahaan }}</p>
<p>No Telp: {{ $apply->no_telp_perusahaan }}</p>
@endif

<p>Terima kasih.</p>