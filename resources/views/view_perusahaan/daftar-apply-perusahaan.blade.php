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
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($apply as $data_apply)
                                <tr>
                                    <td>{{ $data_apply->tanggal_apply }}</td>
                                    <td>{{ $data_apply->pencariKerja->nim }}</td>
                                    <td>{{ $data_apply->pencariKerja->nama_pencari_kerja }}</td>
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
                                                <a class="dropdown-item" href="{{ route('perusahaan.detail-apply', $data_apply->id) }}"><i
                                                        class="icon-base bx bx-show  me-2"></i>Detail Apply</a>
                                                <button type="button"
                                                    class="dropdown-item btn-update-status"
                                                    data-id="{{ $data_apply->id }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenter"><i
                                                    class="icon-base bx bx-edit-alt me-2 "></i>Update Status</button>
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
                        <h5 class="modal-title fw-bold" id="modalCenterTitle">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('perusahaan.apply.update-status', 0) }}" id="formUpdateStatus">
                        @csrf
                        <input type="hidden" name="id_apply" id="apply_id" value="{{ old('id_apply') }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-6">
                                    <label class="form-label">Pilih status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="interview" {{ old('status') == 'interview' ? 'selected' : '' }}>Interview</option>
                                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Tidak Diterima</option>
                                        <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="alert alert-info" role="alert">
                                Form dibawah diperuntukan untuk mengirim email secara otomatis, terkait update status
                                pencari kerja.
                            </div>

                            <div class="col mb-6">
                                <label class="form-label">Tambahkan pesan</label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="3">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-6 extra-form" id="interviewFields">
                                <div class="col mb-1">
                                    <label class="form-label">Tanggal Interview</label>
                                    <input type="date" name="tanggal_interview" 
                                        class="form-control @error('tanggal_interview') is-invalid @enderror"
                                        value="{{ old('tanggal_interview') }}" min="{{ date('Y-m-d') }}">
                                    @error('tanggal_interview')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label">Waktu Interview</label>
                                    <input type="time" name="waktu_interview" 
                                        class="form-control @error('waktu_interview') is-invalid @enderror"
                                        value="{{ old('waktu_interview') }}">
                                    @error('waktu_interview')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-6 extra-form">
                                <div class="col mb-1">
                                    <label class="form-label">No.Telp</label>
                                    <input type="text" name="no_telp_perusahaan"
                                        class="form-control @error('no_telp_perusahaan') is-invalid @enderror"
                                        value="{{ old('no_telp_perusahaan', Auth::guard('perusahaanmitra')->user()->no_telp_perusahaan) }}">
                                    @error('no_telp_perusahaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col mb-1">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat_perusahaan"
                                        class="form-control @error('alamat_perusahaan') is-invalid @enderror"
                                        value="{{ old('alamat_perusahaan', Auth::guard('perusahaanmitra')->user()->alamat_perusahaan) }}">
                                    @error('alamat_perusahaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Status</button>
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
        const statusSelect = document.querySelector('#modalCenter select[name="status"]');
        const interviewFields = document.getElementById('interviewFields');

        // Fungsi untuk tampilkan/sembunyikan tanggal & waktu
        function toggleInterviewFields() {
            if(statusSelect.value === 'interview') {
                interviewFields.style.display = 'flex'; // row g-6
            } else {
                interviewFields.style.display = 'none';
            }
        }

        // Set event listener untuk select status
        statusSelect.addEventListener('change', toggleInterviewFields);

        // Saat tombol update diklik, set apply id
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                applyIdInput.value = id;

                // reset status select ke old value jika ada
                setTimeout(() => toggleInterviewFields(), 0);
            });
        });

        // Jika ada old input (validasi gagal), tetap buka modal
        @if($errors->any())
            var myModal = new bootstrap.Modal(document.getElementById('modalCenter'));
            myModal.show();
            toggleInterviewFields(); // tampilkan sesuai old status
        @endif

        // Inisialisasi awal
        toggleInterviewFields();
    });
    </script>
    @endpush
</x-admin_perusahaan.layout>