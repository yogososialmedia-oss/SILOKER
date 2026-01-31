<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" placeholder="Tambahkan nama perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Tambahkan jabatan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="Tambahkan email perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No.Telp</label>
                                    <input type="text" class="form-control" placeholder="Tambahkan nomor telepon perusahaan">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo Perusahaan</label>
                                    <input type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Poster Loker</label>
                                    <input type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="defaultSelect" class="form-label">Model Kerja</label>
                                    <select id="defaultSelect" class="form-select">
                                        <option>Pilih model kerja</option>
                                        <option value="1">Work From Office</option>
                                        <option value="2">Work From Home</option>
                                        <option value="3">Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="defaultSelect" class="form-label">Tipe loker</label>
                                    <select id="defaultSelect" class="form-select">
                                        <option>Pilih tipe loker</option>
                                        <option value="1">Job Opportunity</option>
                                        <option value="2">Internship</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="defaultSelect" class="form-label">Minimal Pendidikan</label>
                                    <select id="defaultSelect" class="form-select">
                                        <option>Pilih Minimal Pendidikan</option>
                                        <option value="1">Minimal Pendidikan SMA/ Sederajat</option>
                                        <option value="2">Minimal Pendidikan D1</option>
                                        <option value="3">Minimal Pendidikan D2</option>
                                        <option value="4">Minimal Pendidikan D3</option>
                                        <option value="5">Minimal Pendidikan S1</option>
                                        <option value="6">Minimal Pendidikan S2</option>
                                        <option value="7">Minimal Pendidikan S3</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-12 mb-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">Example
                                        textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="col-mb text-end">
                                    <button type="button" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- / Content -->

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
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</x-admin_perusahaan.layout>