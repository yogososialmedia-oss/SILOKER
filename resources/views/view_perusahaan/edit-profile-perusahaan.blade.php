<x-admin_perusahaan.layout>
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
                  <input name="NamaPerusahaan" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">No NPWP</label>
                  <input name="NoNpwp" class="form-control">
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
                  <label class="form-label">Provinsi</label>
                  <input name="Provinsi" type="text" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Kabupaten</label>
                  <input name="Kabupaten" type="text" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Kecamatan</label>
                  <input name="Kecamatan" type="text" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Google Maps</label>
                  <input name="GoogleMaps" class="form-control">
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
                  <label for="exampleFormControlTextarea1" class="form-label">Tentang
                    Perusahaan</label>
                  <textarea name="TentangPerusahaan" class="form-control" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
                </div>
                <div class="col-mb text-end">
                  <button type="submit" class="btn btn-primary">Registrasi</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-admin_perusahaan.layout>