<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input name="NamaPerusahaan" class="form-control" placeholder="">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No NPWP</label>
                                        <input name="NoNpwp" class="form-control" placeholder="">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="Email" class="form-control" placeholder="">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="NoTelp" class="form-control" placeholder="">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <input name="Provinsi" type="text" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <input name="Kabupaten" type="text" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <input name="Kecamatan" type="text" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Banner</label>
                                        <input name="banner" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col mb-6">
                                        <label for="exampleFormControlTextarea1" class="form-label">Tentang Perusahaan
                                            Perusahaan</label>
                                        <textarea name="TentangPerusahaan"class="form-control" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>
                                </form>
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
</x-pencari_kerja.layout>