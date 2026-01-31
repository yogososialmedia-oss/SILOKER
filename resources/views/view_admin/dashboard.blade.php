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
                        <tr>
                        <th scope="row">1</th>
                        <td>Cititex</td>
                        <td>Admin</td>
                        <td>Job Opportunity</td>
                        <td>082348945873</td>
                        <td>cititex@gmail.com</td>
                        <td>100</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Warga Lokal</td>
                        <td>Operational</td>
                        <td>Job Opportunity</td>
                        <td>0825678092</td>
                        <td>wargalokal@gmail.com</td>
                        <td>70</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Cak Iwan</td>
                        <td>Back End Developer</td>
                        <td>Job Opportunity</td>
                        <td>081468759032</td>
                        <td>cakiwan@gmail.com</td>
                        <td>50</td>
                        <td>10</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin_perusahaan.layout>
