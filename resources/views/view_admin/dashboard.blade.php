<x-admin_perusahaan.layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Lowongan</h5>
                                <canvas id="grafik_loker"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Interaksi</h5>
                                <canvas id="grafik_interaksi"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"></div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Tipe</th>
                            <th>No.WA</th>
                            <th>Email</th>
                            <th>Tayangan</th>
                            <th>Apply</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($lokerTerbaru as $index => $loker)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $loker->nama_perusahaan }}</td>
                            <td>{{ $loker->jabatan }}</td>
                            <td>{{ $loker->tipe }}</td>
                            <td>{{ $loker->no_telp_perusahaan }}</td>
                            <td>{{ $loker->email_perusahaan }}</td>
                            <td>{{ $loker->tayangan ?? 0 }}</td>
                            <td>{{ $loker->apply ?? 0 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripjs')
<script>
    const ctx = document.getElementById('grafik_loker');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($lokerPerBulan as $data)
                    "Bulan {{ $data->bulan }}",
                @endforeach
            ],
            datasets: [{
                label: 'Jumlah Loker',
                data: [
                    @foreach ($lokerPerBulan as $data)
                        {{ $data->total }},
                    @endforeach
                ],
                borderWidth: 1
            }]
        }
    });
</script>
@endpush

</x-admin_perusahaan.layout>
