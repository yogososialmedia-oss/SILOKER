<x-admin_perusahaan.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">JUMLAH LOWONGAN</h5>
                                <div id="grafik_loker"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold ">JUMLAH INTERAKSI</h5>
                                <div id="grafik_interaksi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title fw-bold ">LOWONGAN TERPOPULER</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Tipe</th>
                            <th>No.Telp</th>
                            <th>Email</th>
                            <th>Tayangan</th>
                            <th>Apply</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lokerTerbaru as $index => $loker)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}</td>
                                <td>{{ $loker->jabatan }}</td>
                                <td>{{ $loker->tipe_loker }}</td>
                                <td>{{ $loker->no_telp_perusahaan }}</td>
                                <td>{{ $loker->email_perusahaan }}</td>
                                <td>{{ $loker->tayangan ?? 0 }}</td>
                                <td>{{ $loker->apply_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {

        var optionsLoker = {
            series: [{{ $totalOpen ?? 0 }}, {{ $totalClose ?? 0 }}],
            chart: {
                type: 'donut',
                height: 550
            },
            labels: ['Open', 'Close'],
            colors: ['#3B82C4', '#F4C542'],
            legend: {
                position: 'top',
                fontSize: '14px'
            },
            dataLabels: {
                enabled: false 
            },
            states: {
                hover: { filter: { type: 'none' } },
                active: { filter: { type: 'none' } }
            },
            tooltip: {
                custom: function({ series, seriesIndex, w }) {
                    var label = w.globals.labels[seriesIndex];
                    var value = series[seriesIndex];

                    // Balik warna background
                    var bgColor = (seriesIndex === 0) ? '#F4C542' : '#3B82C4';

                    return `
                        <div style="
                            background:${bgColor};
                            color:white;
                            padding:8px 12px;
                            border-radius:6px;
                            font-size:14px;
                        ">
                            ${label}: <strong>${value}</strong>
                        </div>
                    `;
                }
            },
            plotOptions: {
                pie: {
                    donut: { size: '50%' }
                }
            }
        };

        var chartLoker = new ApexCharts(document.querySelector("#grafik_loker"), optionsLoker);
        chartLoker.render();


        var optionsInteraksi = {
            series: [{{ $totalTayangan ?? 0 }}, {{ $totalApply ?? 0 }}],
            chart: {
                type: 'donut',
                height: 550
            },
            labels: ['Tayangan', 'Apply'],
            colors: ['#3B82C4', '#F4C542'],
            legend: {
                position: 'top',
                fontSize: '14px'
            },
            dataLabels: {
                enabled: false
            },
            states: {
                hover: { filter: { type: 'none' } },
                active: { filter: { type: 'none' } }
            },
            tooltip: {
                custom: function({ series, seriesIndex, w }) {
                    var label = w.globals.labels[seriesIndex];
                    var value = series[seriesIndex];

                    var bgColor = (seriesIndex === 0) ? '#F4C542' : '#3B82C4';

                    return `
                        <div style="
                            background:${bgColor};
                            color:white;
                            padding:8px 12px;
                            border-radius:6px;
                            font-size:14px;
                        ">
                            ${label}: <strong>${value}</strong>
                        </div>
                    `;
                }
            },
            plotOptions: {
                pie: {
                    donut: { size: '50%' }
                }
            }
        };

        var chartInteraksi = new ApexCharts(document.querySelector("#grafik_interaksi"), optionsInteraksi);
        chartInteraksi.render();

    });
    </script>
</x-admin_perusahaan.layout>