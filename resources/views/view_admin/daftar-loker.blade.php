<x-admin_perusahaan.layout>

    <!-- ================= CONTENT WRAPPER ================= -->
    <div class="content-wrapper">

        <!-- ================= CONTENT ================= -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-12 mb-5">

                    <!-- ================= CARD DAFTAR LOKER ================= -->
                    <div class="card pb-3">

                        <!-- ================= CARD HEADER ================= -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                                <h5 class="mb-0 fw-bold">DAFTAR LOKER</h5>

                                <!-- ================= FILTER + EXPORT ================= -->
                                <form action="{{ route('admin.loker.export') }}" method="GET">
                                    <div class="d-flex align-items-center gap-2">

                                        <select
                                            name="tahun"
                                            class="form-select form-select-sm"
                                            style="width: 160px;"
                                        >
                                            <option value="">Semua Tahun</option>

                                            @foreach($tahunList as $tahun)
                                                <option
                                                    value="{{ $tahun }}"
                                                    {{ request('tahun') == $tahun ? 'selected' : '' }}
                                                >
                                                    {{ $tahun }}
                                                </option>
                                            @endforeach

                                        </select>

                                        <button
                                            type="submit"
                                            class="btn btn-success btn-sm px-3"
                                        >
                                            Download
                                        </button>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- ================= END CARD HEADER ================= -->


                        <!-- ================= TABLE ================= -->
                        <div class="table-responsive">

                            <table class="table mb-0" id="daftar-loker-perusahaan">

                                <!-- TABLE HEAD -->
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

                                <!-- TABLE BODY -->
                                <tbody>

                                    @foreach ($daftarLoker as $loker)
                                    <tr>

                                        <!-- Nama Perusahaan -->
                                        <td>
                                            {{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}
                                        </td>

                                        <!-- Jabatan -->
                                        <td>{{ $loker->jabatan }}</td>

                                        <!-- Tipe Loker -->
                                        <td>{{ $loker->tipe_loker }}</td>

                                        <!-- Status Loker -->
                                        <td>

                                            @php
                                                $isOpen = now()->between(
                                                    \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->startOfDay(),
                                                    \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->endOfDay()
                                                );
                                            @endphp

                                            @if ($isOpen)
                                                <span class="badge bg-label-info">Open</span>
                                            @else
                                                <span class="badge bg-label-warning">Closed</span>
                                            @endif

                                        </td>

                                        <!-- Kontak -->
                                        <td>{{ $loker->no_telp_perusahaan }}</td>
                                        <td>{{ $loker->email_perusahaan }}</td>

                                        <!-- Opsi -->
                                        <td>
                                            <div class="dropdown">

                                                <button
                                                    type="button"
                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"
                                                >
                                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a
                                                        class="dropdown-item"
                                                        href="{{ route('admin.loker.tampilan', $loker->id) }}"
                                                    >
                                                        <i class="icon-base bx bx-show me-2"></i>
                                                        Tampilan Loker
                                                    </a>
                                                </div>

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                        <!-- ================= END TABLE ================= -->

                    </div>
                    <!-- ================= END CARD ================= -->

                </div>
            </div>

        </div>
        <!-- ================= END CONTENT ================= -->


        <!-- ================= FOOTER ================= -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">

                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">

                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>

                </div>

            </div>
        </footer>
        <!-- ================= END FOOTER ================= -->


        <div class="content-backdrop fade"></div>

    </div>
    <!-- ================= END CONTENT WRAPPER ================= -->

</x-admin_perusahaan.layout>