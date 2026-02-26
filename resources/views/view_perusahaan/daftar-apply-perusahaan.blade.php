<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card pb-3 ">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="mb-0 fw-bold">DAFTAR APPLY</h5>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Download
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">EXCL</a></li>
                        </ul>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table mb-0" id="table-apply">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($data_apply->tanggal_apply)->format('d-m-Y') }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja }}</td>
                                    <td>{{ $data_apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}</td>
                                    <td>{{ $data_apply->loker->perusahaanMitra->nama_perusahaan }}</td>
                                    <td>{{ $data_apply->loker->jabatan }}</td>
                                    <td>
                                        @if ($data_apply->status == 'pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                        @elseif ($data_apply->status == 'interview')
                                            <span class="badge bg-label-info me-1">Interview</span>
                                        @elseif ($data_apply->status == 'diterima')
                                            <span class="badge bg-label-success me-1">Diterima</span>
                                        @elseif ($data_apply->status == 'ditolak')
                                            <span class="badge bg-label-danger me-1">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i
                                                    class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('perusahaan.apply.profile-pelamar', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-user-circle me-2"></i>Profile Pelamar</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('perusahaan.detail-apply', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-show  me-2"></i>Detail Apply</a>
                                                <button type="button"
                                                    class="dropdown-item btn-update-status"
                                                    data-id="{{ $data_apply->id }}"
                                                    data-maps="{{ $data_apply->loker->perusahaanMitra->google_maps }}"
                                                    data-telp="{{ $data_apply->loker->perusahaanMitra->no_telp_perusahaan }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenter"><i class="icon-base bx bx-edit-alt me-2 "></i>Update Status</button>
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

        <!-- Modal Update Status -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="POST" action="{{ route('perusahaan.apply.update-status', 0) }}" id="formUpdateStatus">
                        @csrf

                        <input type="hidden" name="id_apply" id="apply_id">

                        <div class="modal-body">

                            <div class="col-12 mb-3">
                                <div class="alert alert-info mb-0">
                                    <strong>Catatan:</strong><br>
                                    Update status akan secara otomatis mengirimkan notifikasi melalui email kepada
                                    pelamar.
                                    Pastikan pesan yang Anda tulis di bawah ini sudah sesuai sebelum melakukan update
                                    status.
                                </div>
                            </div>

                            {{-- STATUS --}}
                            <div class="mb-3">
                                <label class="form-label">Pilih Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status"
                                    id="statusSelect">
                                    <option value="">Pilih Status</option>
                                    <option value="interview">Interview</option>
                                    <option value="ditolak">Tidak Diterima</option>
                                    <option value="diterima">Diterima</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PESAN (SELALU ADA) --}}
                            <div class="mb-3">
                                <label class="form-label">Pesan ke Pelamar</label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan"
                                    rows="3"
                                    placeholder="Tuliskan pesan yang akan dikirim ke pelamar">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ================= INTERVIEW ================= --}}
                            <div id="interviewFields" style="display:none;">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Interview</label>
                                        <input type="date" name="tanggal_interview" class="form-control"
                                            min="{{ date('Y-m-d') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Waktu Interview</label>
                                        <input type="time" name="waktu_interview" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Link Google Maps Lokasi Interview</label>
                                        <input type="text" name="google_maps" id="googleMapsInput" class="form-control"
                                            placeholder="https://maps.google.com/...">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">No. Telepon yang Dapat Dihubungi</label>
                                        <input type="text" name="no_telp" id="noTelpInput" class="form-control"
                                            placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>

                            </div>

                            {{-- ================= DITERIMA ================= --}}
                            <div id="acceptedFields" style="display:none;">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Berkunjung ke Kantor</label>
                                        <input type="date" name="tanggal_kunjungan" class="form-control"
                                            min="{{ date('Y-m-d') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Jam Berkunjung</label>
                                        <input type="time" name="jam_kunjungan" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Link Google Maps Kantor</label>
                                        <input type="text" name="google_maps" id="googleMapsInputAccepted" class="form-control"
                                            placeholder="https://maps.google.com/...">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">No. Telepon yang Dapat Dihubungi</label>
                                        <input type="text" name="no_telp" id="noTelpInputAccepted" class="form-control"
                                            placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Update Status
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const buttons = document.querySelectorAll('.btn-update-status');
                const applyIdInput = document.getElementById('apply_id');
                const statusSelect = document.getElementById('statusSelect');
                const interviewFields = document.getElementById('interviewFields');
                const acceptedFields = document.getElementById('acceptedFields');

                function toggleFields() {
                    interviewFields.style.display = 'none';
                    acceptedFields.style.display = 'none';

                    if (statusSelect.value === 'interview') {
                        interviewFields.style.display = 'block';
                    }

                    if (statusSelect.value === 'diterima') {
                        acceptedFields.style.display = 'block';
                    }
                    // ditolak → hanya pesan
                }

                statusSelect.addEventListener('change', toggleFields);

                const googleMapsInputInterview = document.getElementById('googleMapsInput');
                const noTelpInputInterview = document.getElementById('noTelpInput');
                const googleMapsInputAccepted = document.getElementById('googleMapsInputAccepted');
                const noTelpInputAccepted = document.getElementById('noTelpInputAccepted');

                buttons.forEach(btn => {
                    btn.addEventListener('click', function () {

                        applyIdInput.value = this.dataset.id;

                        const maps = this.dataset.maps ?? '';
                        const telp = this.dataset.telp ?? '';

                        googleMapsInputInterview.value = maps;
                        noTelpInputInterview.value = telp;

                        googleMapsInputAccepted.value = maps;
                        noTelpInputAccepted.value = telp;

                        statusSelect.value = '';
                        toggleFields();
                    });
                });

            });
        </script>
    @endpush
</x-admin_perusahaan.layout>