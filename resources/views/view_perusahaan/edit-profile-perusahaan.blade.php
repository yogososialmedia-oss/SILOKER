<x-admin_perusahaan.layout>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('perusahaan.profile.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
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
                <div class="col-md-6 mb-4">
                  <label for="defaultSelect" class="form-label">Provinsi</label>
                  <select name="Provinsi" id="defaultSelect" class="form-select">
                    <option>Pilih provinsi</option>
                    <option value="Bali">Bali</option>
                    <option value="Banda Aceh">Banda Aceh</option>
                    <option value="Medan">Medan</option>
                  </select>
                </div>
                <div class="col-md-6 mb-4">
                  <label for="defaultSelect" class="form-label">Kabupaten</label>
                  <select name="Kabupaten" id="defaultSelect" class="form-select">
                    <option>Pilih kabupaten</option>
                    <option value="Tabanan">Tabanan</option>
                    <option value="Buleleng">Buleleng</option>
                    <option value="Badung">Badung</option>
                  </select>
                </div>
                <div class="col-md-6 mb-4">
                  <label for="defaultSelect" class="form-label">Kecamatan</label>
                  <select name="Kecamatan" id="defaultSelect" class="form-select">
                    <option>Pilih kecamatan</option>
                    <option value="Tabanan">Kediri</option>
                    <option value="Buleleng">Kerambitan</option>
                    <option value="Badung">Selemadeg</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Alamat</label>
                  <input name="Alamat" type="text" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Google Maps</label>
                  <input name="GoogleMaps" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Logo</label>
                  <input name="logo" type="file" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-4 mb-3">
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
                  <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-admin_perusahaan.layout>