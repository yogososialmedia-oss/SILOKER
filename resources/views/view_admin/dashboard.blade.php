<x-admin_perusahaan.layout>
    <!-- Wrapper utama konten halaman dashboard admin perusahaan -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-4 order-1">
                
                <!-- Row untuk card statistik utama -->
                <div class="row mb-4">
                    <!-- Card TOTAL LOWONGAN -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">TOTAL LOWONGAN</h6>
                                    <h3 class="fw-bold mb-0">{{ $totalLowongan }}</h3>
                                </div>
                                <div class="bg-primary text-white rounded p-3">
                                    <i class="bx bx-briefcase fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card LOWONGAN TER-APPLY -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">LOWONGAN TER-APPLY</h6>
                                    <h3 class="fw-bold mb-0">{{ $totalLowonganTerapply }}</h3>
                                </div>
                                <div class="bg-primary text-white rounded p-3">
                                    <i class="bx bx-user-check fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card APPLY DITERIMA -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">APPLY DITERIMA</h6>
                                    <h3 class="fw-bold mb-0">{{ $totalApplyDiterima }}</h3>
                                </div>
                                <div class="bg-primary text-white rounded p-3">
                                    <i class="bx bx-check-circle fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card TOTAL PERUSAHAAN -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">TOTAL PERUSAHAAN</h6>
                                    <h3 class="fw-bold mb-0">{{ $totalPerusahaan }}</h3>
                                </div>
                                <div class="bg-primary text-white rounded p-3">
                                    <i class="bx bx-buildings fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row untuk grafik -->
                <div class="row">
                    <!-- Grafik JUMLAH LOWONGAN -->
                    <div class="col-lg-6 col-md-12 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">JUMLAH LOWONGAN</h5>
                                <!-- Div untuk render chart ApexCharts jumlah loker -->
                                <div id="grafik_loker"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik JUMLAH INTERAKSI -->
                    <div class="col-lg-6 col-md-12 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">JUMLAH INTERAKSI</h5>
                                <!-- Div untuk render chart ApexCharts jumlah interaksi (tayangan & apply) -->
                                <div id="grafik_interaksi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Tabel LOWONGAN TERPOPULER -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title fw-bold mb-0">LOWONGAN TERPOPULER</h5>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Upload</th>
                            <th>Nama Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Tipe</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>No.Telp</th>
                            <th>Email</th>
                            <th>Tayangan</th>
                            <th>Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokerTerbaru as $index => $loker)
                            <tr>
                                <!-- Index urutan -->
                                <th>{{ $index + 1 }}</th>
                                <!-- Tanggal upload loker -->
                                <td>{{ \Carbon\Carbon::parse($loker->created_at)->format('d-m-Y') }}</td>
                                <!-- Nama perusahaan mitra -->
                                <td>{{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}</td>
                                <!-- Jabatan yang dibuka -->
                                <td>{{ $loker->jabatan }}</td>
                                <!-- Tipe lowongan (Full-time/Part-time/Magang) -->
                                <td>{{ $loker->tipe_loker }}</td>
                                <!-- Tanggal mulai loker -->
                                <td>{{ \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->format('d-m-Y') }}</td>
                                <!-- Tanggal berakhir loker -->
                                <td>{{ \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->format('d-m-Y') }}</td>
                                <!-- Kontak perusahaan -->
                                <td>{{ $loker->no_telp_perusahaan }}</td>
                                <td>{{ $loker->email_perusahaan }}</td>
                                <!-- Jumlah tayangan loker -->
                                <td>{{ $loker->tayangan ?? 0 }}</td>
                                <!-- Jumlah apply loker -->
                                <td>{{ $loker->apply_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Library ApexCharts untuk membuat grafik -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // === GRAFIK JUMLAH LOWONGAN ===
            var optionsLoker = {
                series: [{{ $totalOpen ?? 0 }}, {{ $totalClose ?? 0 }}], // Data Open & Close
                chart: { type: 'donut', height: 550 },
                labels: ['Open', 'Close'],
                colors: ['#3B82C4', '#F4C542'],
                legend: { position: 'top', fontSize: '14px' },
                dataLabels: { enabled: false },
                states: { hover: { filter: { type: 'none' } }, active: { filter: { type: 'none' } } },
                tooltip: {
                    // Custom tooltip untuk donut chart
                    custom: function({ series, seriesIndex, w }) {
                        var label = w.globals.labels[seriesIndex];
                        var value = series[seriesIndex];
                        var bgColor = (seriesIndex === 0) ? '#F4C542' : '#3B82C4';

                        return `
                            <div style="background:${bgColor}; color:white; padding:8px 12px; border-radius:6px; font-size:14px;">
                                ${label}: <strong>${value}</strong>
                            </div>
                        `;
                    }
                },
                plotOptions: { pie: { donut: { size: '50%' } } }
            };
            var chartLoker = new ApexCharts(document.querySelector("#grafik_loker"), optionsLoker);
            chartLoker.render();

            // === GRAFIK JUMLAH INTERAKSI ===
            var optionsInteraksi = {
                series: [{{ $totalTayangan ?? 0 }}, {{ $totalApply ?? 0 }}], // Data Tayangan & Apply
                chart: { type: 'donut', height: 550 },
                labels: ['Tayangan', 'Apply'],
                colors: ['#3B82C4', '#F4C542'],
                legend: { position: 'top', fontSize: '14px' },
                dataLabels: { enabled: false },
                states: { hover: { filter: { type: 'none' } }, active: { filter: { type: 'none' } } },
                tooltip: {
                    custom: function({ series, seriesIndex, w }) {
                        var label = w.globals.labels[seriesIndex];
                        var value = series[seriesIndex];
                        var bgColor = (seriesIndex === 0) ? '#F4C542' : '#3B82C4';

                        return `
                            <div style="background:${bgColor}; color:white; padding:8px 12px; border-radius:6px; font-size:14px;">
                                ${label}: <strong>${value}</strong>
                            </div>
                        `;
                    }
                },
                plotOptions: { pie: { donut: { size: '50%' } } }
            };
            var chartInteraksi = new ApexCharts(document.querySelector("#grafik_interaksi"), optionsInteraksi);
            chartInteraksi.render();
        });
    </script>
</x-admin_perusahaan.layout>