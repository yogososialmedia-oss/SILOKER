<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            {{-- ================= CARD DAFTAR APPLY ================= --}}
            <div class="card pb-3">

                {{-- HEADER CARD --}}
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <!-- Judul -->
                        <h5 class="mb-0 fw-bold">DAFTAR APPLY</h5>

                        <!-- Form filter & download -->
                        <form action="{{ route('perusahaan.apply.export') }}" method="GET">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <!-- Dropdown tahun -->
                                <select name="tahun" class="form-select form-select-sm" style="width:160px;">
                                    <option value="">Semua Tahun</option>
                                    @foreach($tahunList as $tahun)
                                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                            {{ $tahun }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Tombol download -->
                                <button type="submit" class="btn btn-success btn-sm px-3">
                                    Download
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- TABLE APPLY --}}
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    {{-- DATA APPLY --}}
                                    <td>{{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}</td>
                                    <td>{{ $data_apply->loker->perusahaanMitra->nama_perusahaan ?? '-' }}</td>
                                    <td>{{ $data_apply->loker->jabatan ?? '-' }}</td>
                                    <td>{{ $data_apply->pencariKerja->nim }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja ?? '-' }}</td>
                                    <td>{{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}</td>
                                    <td>{{ $data_apply->pencariKerja->email_pencari_kerja ?? '-' }}</td>

                                    {{-- STATUS APPLY --}}
                                    <td>
                                        @switch($data_apply->status)
                                            @case('pending')
                                                <span class="badge bg-label-warning">Pending</span>
                                                @break
                                            @case('interview')
                                                <span class="badge bg-label-info">Interview</span>
                                                @break
                                            @case('ditolak')
                                                <span class="badge bg-label-danger">Tidak Diterima</span>
                                                @break
                                            @case('diterima')
                                                <span class="badge bg-label-success">Diterima</span>
                                                @break
                                        @endswitch
                                    </td>

                                    {{-- DROPDOWN OPSI --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>

                                            <div class="dropdown-menu">
                                                {{-- LINK PROFILE PELAMAR --}}
                                                <a class="dropdown-item" href="{{ route('perusahaan.apply.profile-pelamar', $data_apply->id) }}">
                                                    <i class="icon-base bx bx-user-circle me-2"></i> Profile Pelamar
                                                </a>

                                                {{-- LINK DETAIL APPLY --}}
                                                <a class="dropdown-item" href="{{ route('perusahaan.detail-apply', $data_apply->id) }}">
                                                    <i class="icon-base bx bx-show me-2"></i> Detail Apply
                                                </a>

                                                {{-- BUTTON UPDATE STATUS --}}
                                                <button type="button" class="dropdown-item btn-update-status" 
                                                    data-id="{{ $data_apply->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalCenter">
                                                    <i class="icon-base bx bx-edit-alt me-2"></i> Update Status
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ================= MODAL UPDATE STATUS ================= --}}
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    {{-- FORM MODAL --}}
                    <form method="POST" action="{{ route('perusahaan.apply.update-status') }}" id="formUpdateStatus">
                        @csrf
                        <input type="hidden" name="id_apply" id="apply_id" value="{{ old('id_apply') }}">

                        <div class="modal-body">
                            {{-- ALERT INFO --}}
                            <div class="col-12 mb-3">
                                <div class="alert alert-info mb-0">
                                    <strong>Catatan:</strong><br>
                                    Update status akan secara otomatis mengirimkan notifikasi melalui email kepada pelamar.
                                </div>
                            </div>

                            {{-- STATUS SELECT --}}
                            <div class="mb-3">
                                <label class="form-label">Pilih Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="statusSelect">
                                    <option value="">Pilih Status</option>
                                    <option value="interview" {{ old('status')=='interview'?'selected':'' }}>Interview</option>
                                    <option value="ditolak" {{ old('status')=='ditolak'?'selected':'' }}>Tidak Diterima</option>
                                    <option value="diterima" {{ old('status')=='diterima'?'selected':'' }}>Diterima</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PESAN --}}
                            <div class="mb-3">
                                <label class="form-label">Pesan ke Pelamar *</label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="3">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- INTERVIEW FIELDS --}}
                            <div id="interviewFields" style="display:none;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Interview *</label>
                                        <input type="date" name="tanggal_interview"
                                            class="form-control @error('tanggal_interview') is-invalid @enderror"
                                            value="{{ old('tanggal_interview') }}"
                                            min="{{ date('Y-m-d') }}">
                                            @error('tanggal_interview')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Waktu Interview *</label>
                                        <input type="time" name="waktu_interview" 
                                            class="form-control @error('waktu_interview') is-invalid @enderror"
                                            value="{{ old('waktu_interview') }}">
                                        @error('waktu_interview')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Link Google Maps Lokasi Interview *</label>
                                        <input type="text" name="google_maps_interview" 
                                            id="googleMapsInput"
                                            class="form-control @error('google_maps') is-invalid @enderror"
                                            value="{{ old('google_maps_interview') }}"
                                            placeholder="Contoh: https://maps.google.com/...">

                                        @error('google_maps')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">No. Telepon yang Dapat Dihubungi *</label>
                                        <input type="text" name="no_telp_interview"
                                            id="noTelpInput"
                                            class="form-control @error('no_telp') is-invalid @enderror"
                                            value="{{ old('no_telp_interview') }}"
                                            placeholder="Contoh: 081234567890">

                                        @error('no_telp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- DITERIMA FIELDS --}}
                            <div id="acceptedFields" style="display:none;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Berkunjung *</label>
                                        <input type="date" name="tanggal_kunjungan"
                                            class="form-control @error('tanggal_kunjungan') is-invalid @enderror"
                                            value="{{ old('tanggal_kunjungan') }}"
                                            min="{{ date('Y-m-d') }}">
                                        @error('tanggal_kunjungan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jam Berkunjung *</label>
                                        <input type="time" name="jam_kunjungan"
                                            class="form-control @error('jam_kunjungan') is-invalid @enderror"
                                            value="{{ old('jam_kunjungan') }}">
                                        @error('jam_kunjungan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Link Google Maps Kantor *</label>
                                        <input type="text" name="google_maps_diterima"
                                            id="googleMapsInputAccepted"
                                            class="form-control @error('google_maps') is-invalid @enderror"
                                            value="{{ old('google_maps_diterima') }}"
                                            placeholder="Contoh: https://maps.google.com/...">

                                        @error('google_maps')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">No. Telepon yang Dapat Dihubungi *</label>
                                        <input type="text" name="no_telp_diterima"
                                            id="noTelpInputAccepted"
                                            class="form-control @error('no_telp') is-invalid @enderror"
                                            value="{{ old('no_telp_diterima') }}"
                                            placeholder="Contoh: 081234567890">

                                        @error('no_telp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- FOOTER MODAL --}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- FOOTER PAGE --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex justify-content-between py-4 flex-md-row flex-column">
                    <div>©2026 Yogo & Wahyu</div>
                </div>
            </div>
        </footer>

        {{-- BACKDROP --}}
        <div class="content-backdrop fade"></div>
    </div>

    {{-- ================= SCRIPT MODAL ================= --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // BUTTON UPDATE STATUS
                const buttons = document.querySelectorAll('.btn-update-status');

                // INPUT HIDDEN ID APPLY
                const applyIdInput = document.getElementById('apply_id');

                // STATUS SELECT & FIELDS
                const statusSelect = document.getElementById('statusSelect');
                const interviewFields = document.getElementById('interviewFields');
                const acceptedFields = document.getElementById('acceptedFields');

                // INPUTS GOOGLE MAPS & TELEPON
                const googleMapsInputInterview = document.getElementById('googleMapsInput');
                const noTelpInputInterview = document.getElementById('noTelpInput');
                const googleMapsInputAccepted = document.getElementById('googleMapsInputAccepted');
                const noTelpInputAccepted = document.getElementById('noTelpInputAccepted');

                // FUNCTION TOGGLE FIELDS BASED ON STATUS
                function toggleFields() {
                    if (statusSelect.value === 'interview') {
                        interviewFields.style.display = 'block';
                        acceptedFields.style.display = 'none';

                        // kosongkan field diterima
                        document.querySelector('input[name="tanggal_kunjungan"]').value = '';
                        document.querySelector('input[name="jam_kunjungan"]').value = '';
                        googleMapsInputAccepted.value = '';
                        noTelpInputAccepted.value = '';
                    } 
                    else if (statusSelect.value === 'diterima') {
                        interviewFields.style.display = 'none';
                        acceptedFields.style.display = 'block';

                        // kosongkan field interview
                        document.querySelector('input[name="tanggal_interview"]').value = '';
                        document.querySelector('input[name="waktu_interview"]').value = '';
                        googleMapsInputInterview.value = '';
                        noTelpInputInterview.value = '';
                    } 
                    else {
                        interviewFields.style.display = 'none';
                        acceptedFields.style.display = 'none';

                        // kosongkan semua field tambahan
                        document.querySelector('input[name="tanggal_interview"]').value = '';
                        document.querySelector('input[name="waktu_interview"]').value = '';
                        document.querySelector('input[name="tanggal_kunjungan"]').value = '';
                        document.querySelector('input[name="jam_kunjungan"]').value = '';
                        googleMapsInputInterview.value = '';
                        noTelpInputInterview.value = '';
                        googleMapsInputAccepted.value = '';
                        noTelpInputAccepted.value = '';
                    }
                }

                // CHANGE EVENT STATUS
                statusSelect.addEventListener('change', toggleFields);

                // CLICK EVENT BUTTONS
                buttons.forEach(btn => {
                    btn.addEventListener('click', function () {
                        applyIdInput.value = this.dataset.id;

                        // Kosongkan field manual setiap buka modal
                        googleMapsInputInterview.value = '';
                        noTelpInputInterview.value = '';
                        googleMapsInputAccepted.value = '';
                        noTelpInputAccepted.value = '';

                        // Reset status jika bukan reopen karena error validasi
                        if (!"{{ old('status') }}") {
                            statusSelect.value = '';
                            interviewFields.style.display = 'none';
                            acceptedFields.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    @if ($errors->any())
        <script>
        document.addEventListener("DOMContentLoaded", function () {

            var modal = new bootstrap.Modal(document.getElementById('modalCenter'));
            modal.show();

            document.getElementById('apply_id').value = "{{ old('id_apply') }}";

            const status = "{{ old('status') }}";

            const interviewFields = document.getElementById('interviewFields');
            const acceptedFields = document.getElementById('acceptedFields');

            if(status === 'interview'){
                interviewFields.style.display = 'block';
            }

            if(status === 'diterima'){
                acceptedFields.style.display = 'block';
            }

        });
        </script>
    @endif
    @endpush
</x-admin_perusahaan.layout>