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
                  <input name="NamaPerusahaan" class="form-control" placeholder="Tambahkan nama perusahaan">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Alamat</label>
                  <input name="Alamat" class="form-control" placeholder="Tambahkan jabatan">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email</label>
                  <input name="Email" class="form-control" placeholder="Tambahkan email perusahaan">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">No.Telp</label>
                  <input name="NoTelp" class="form-control" placeholder="Tambahkan nomor perusahaan">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Logo Perusahaan</label>
                  <input name="LogoPerusahaan" type="file" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Banner Perusahaan</label>
                  <input name="BannerPerusahaan" type="file" class="form-control">
                  <div class="form-text"></div>
                </div>
                <div class="col-md-12 mb-4">
                  <label for="exampleFormControlTextarea1" class="form-label">Tentang Perusahaan</label>
                  <textarea name="TentangPerusahaan" id="exampleFormControlTextarea1" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-mb text-end">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-admin_perusahaan.layout>