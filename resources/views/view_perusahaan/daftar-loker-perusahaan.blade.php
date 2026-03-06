<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">

                    {{-- ALERT SUCCESS --}}
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card pb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">DAFTAR LOKER</h5>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <form action="{{ route('perusahaan.loker.export') }}" method="GET" class="d-flex align-items-center gap-2">
                                    <select name="tahun" class="form-select form-select-sm" style="width: 160px;">
                                        <option value="">Semua Tahun</option>
                                        @foreach($loker->pluck('tanggal_mulai_loker')->map(fn($t)=>\Carbon\Carbon::parse($t)->year)->unique()->sortDesc() as $tahun)
                                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                                {{ $tahun }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-success btn-sm px-3">
                                        Download
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0" id="daftar-loker-perusahaan">
                                <thead>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>No.Telp</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $perusahaan = auth()->guard('perusahaanmitra')->user();
                                    @endphp

                                    @foreach ($loker as $data_loker)
                                        <tr>
                                            <td>{{ $perusahaan->nama_perusahaan }}</td>
                                            <td>{{ $data_loker->jabatan }}</td>
                                            <td>{{ $data_loker->tipe_loker }}</td>
                                            <td>
                                                @if($data_loker->status == 'open')
                                                    <span class="badge bg-label-info">Open</span>
                                                @else
                                                    <span class="badge bg-label-warning">Closed</span>
                                                @endif
                                            </td>
                                            <td>{{ $perusahaan->no_telp_perusahaan }}</td>
                                            <td>{{ $perusahaan->email_perusahaan }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('perusahaan.loker.edit', $data_loker->id) }}">
                                                            <i class="icon-base bx bx-edit-alt me-2"></i>Edit
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('perusahaan.loker.tampilan', $data_loker->id) }}">
                                                            <i class="icon-base bx bx-show me-2"></i>Tampilan Loker
                                                        </a>
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
            </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
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
                const alert = document.getElementById('successAlert');
                if (alert) {
                    setTimeout(() => {
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                        setTimeout(() => alert.remove(), 300);
                    }, 3000);
                }
            });
        </script>
    @endpush
</x-admin_perusahaan.layout>