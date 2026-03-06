<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session('success'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card pb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">VERIFIKASI PERUSAHAAN</h5>
                    </div>

                    <div class="btn-group">
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
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                                <th>No NPWP</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($status_akun as $akun)
                                <tr>
                                    <td>{{ $akun->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $akun->nama_perusahaan }}</td>
                                    <td>{{ $akun->email_perusahaan }}</td>
                                    <td>{{ $akun->no_npwp }}</td>
                                    <td>
                                        @php
                                            $status = strtolower($akun->status_akun);
                                        @endphp

                                        @if($status == 'pending')
                                            <span class="badge bg-label-warning me-1">Pending</span>
                                        @elseif($status == 'verifikasi_gagal')
                                            <span class="badge bg-label-danger me-1">Verifikasi Gagal</span>
                                        @elseif($status == 'terverifikasi')
                                            <span class="badge bg-label-success me-1">Terverifikasi</span>
                                        @else
                                            <span class="badge bg-label-secondary me-1">
                                                {{ ucfirst($akun->status_akun) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.detail-verifikasi-perusahaan', $akun->id) }}">
                                                    <i class="icon-base bx bx-show me-2"></i> Detail Registrasi
                                                </a>
                                                <button type="button" class="dropdown-item btn-update-status" data-id="{{ $akun->id }}" data-bs-toggle="modal" data-bs-target="#modalCenter">
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
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('admin.update-status-perusahaan') }}">
                        @csrf
                        <input type="hidden" name="id" id="perusahaan_id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Pilih status</label>
                                <select class="form-select" name="Status" id="statusSelect" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="terverifikasi">Terverifikasi</option>
                                    <option value="verifikasi_gagal">Verifikasi Gagal</option>
                                </select>
                            </div>
                            <div class="alert alert-warning d-none" id="alertPesan">
                                Silahkan tuliskan alasan verifikasi secara lengkap dan jelas. Informasi ini akan membantu perusahaan memahami kesalahan dan melakukan perbaikan.
                            </div>
                            <div class="mb-3 d-none" id="formPesan">
                                <label class="form-label text-danger">Tambahkan pesan (Wajib jika gagal)</label>
                                <textarea class="form-control" name="Pesan" id="pesanField" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Script untuk ID Perusahaan di Modal
                    const buttons = document.querySelectorAll('.btn-update-status');
                    buttons.forEach(button => {
                        button.addEventListener('click', function() {
                            const id = this.dataset.id;
                            document.getElementById('perusahaan_id').value = id;
                        });
                    });

                    // Script Auto Hide Alert
                    const alertBox = document.getElementById("successAlert");
                    if (alertBox) {
                        setTimeout(function() {
                            alertBox.classList.remove("show");
                            alertBox.classList.add("fade");
                            setTimeout(() => { alertBox.remove(); }, 500);
                        }, 3000);
                    }

                    // Script Logic Form Pesan Gagal
                    const statusSelect = document.getElementById('statusSelect');
                    const formPesan = document.getElementById('formPesan');
                    const pesanField = document.getElementById('pesanField');
                    const alertPesan = document.getElementById('alertPesan');

                    statusSelect.addEventListener('change', function() {
                        if (this.value === 'verifikasi_gagal') {
                            formPesan.classList.remove('d-none');
                            alertPesan.classList.remove('d-none');
                            pesanField.setAttribute('required', 'required');
                        } else {
                            formPesan.classList.add('d-none');
                            alertPesan.classList.add('d-none');
                            pesanField.removeAttribute('required');
                            pesanField.value = '';
                        }
                    });
                });
            </script>
        @endpush
    </div>
    </x-admin_perusahaan.layout>