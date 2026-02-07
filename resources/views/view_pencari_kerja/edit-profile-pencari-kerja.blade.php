<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="container-xxl flex-grow-1 container-p-y mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama</label>
                                    <input name="NamaPencariKerja" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (jika mahasiswa stikom)</label>
                                    <input name="Nim" class="form-control"
                                        placeholder="Tambahkan NIM (jika mahasiswa stikom)">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input name="Email" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No.Telp</label>
                                    <input name="NoTelp" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input name="Alamat" type="text" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Linked.id</label>
                                    <input name="LinkedIn" class="form-control"
                                        placeholder="Tambahkan link profile linked.id anda">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Upload CV</label>
                                    <input name="UploadCv" type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Foto Profile</label>
                                    <input name="FotoProfile" type="file" class="form-control">
                                    <div class="form-text"></div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tentang Saya</label>
                                    <textarea name="TentangSaya" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                
                                <div class="col-mb text-end">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->

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
</x-pencari_kerja.layout>