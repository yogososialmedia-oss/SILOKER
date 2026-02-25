<h3>Update Status Lamaran</h3>

<p>Halo {{ $apply->pencariKerja->nama_pencari_kerja }},</p>

<p>Status lamaran Anda telah diperbarui menjadi:</p>

<h4 style="color:#0d6efd;">{{ strtoupper($apply->status) }}</h4>

@if($apply->pesan)
<p><strong>Pesan dari Perusahaan:</strong></p>
<p>{{ $apply->pesan }}</p>
@endif


{{-- ================= INTERVIEW ================= --}}
@if($apply->status == 'interview')

<hr>

<p><strong>Detail Interview:</strong></p>

<p>Tanggal: {{ $apply->tanggal_interview ?? '-' }}</p>
<p>Waktu: {{ $apply->waktu_interview ?? '-' }}</p>

@if($apply->google_maps)
<p>Lokasi: 
    <a href="{{ $apply->google_maps }}" target="_blank">
        Lihat di Google Maps
    </a>
</p>
@endif

<p>No Telp: {{ $apply->no_telp ?? '-' }}</p>

@endif


{{-- ================= DITERIMA ================= --}}
@if($apply->status == 'diterima')

<hr>

<p><strong>Informasi Kehadiran:</strong></p>

<p>Tanggal: {{ $apply->tanggal_kunjungan ?? '-' }}</p>
<p>Jam: {{ $apply->jam_kunjungan ?? '-' }}</p>

@if($apply->google_maps)
<p>Lokasi Kantor: 
    <a href="{{ $apply->google_maps }}" target="_blank">
        Lihat di Google Maps
    </a>
</p>
@endif

<p>No Telp: {{ $apply->no_telp ?? '-' }}</p>

@endif


<p>Terima kasih.</p>