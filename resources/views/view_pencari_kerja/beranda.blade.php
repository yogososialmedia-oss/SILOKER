<x-pencari_kerja.layout>\
    <!-- HERO SECTION -->
    <div class="collapse navbar-collapse" id="navbarBeranda">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Loker</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
        </ul>
    </div>
    </div>
    </nav>

    <!-- ================= HERO ================= -->
    <section class="hero-beranda">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 hero-text-beranda">
                    <h1>FIND YOUR<br>DREAM JOB<span class="text-warning">!</span></h1>
                    <p>
                        Temukan peluang karier terbaik sesuai dengan keahlian dan passionmu.
                        Jelajahi berbagai lowongan pekerjaan dan raih masa depan yang lebih cerah.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/beranda1.png') }}" class="img-fluid hero-image-beranda" alt="Hero">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= INFORMASI LOKER ================= -->
    <section class="loker-beranda">
        <div class="container">
            <h3 class="text-center mb-5 fw-bold">Informasi Lowongan Kerja</h3>

            <div class="row g-4">
                <!-- CARD -->
                <div class="col-md-4">
                    <div class="card loker-card-beranda">
                        <div class="card-body">
                            <h6 class="fw-bold">PT. Contoh Perusahaan</h6>
                            <p class="mb-1">Graphic Designer</p>
                            <span class="badge bg-warning text-dark mb-2">Job Opportunity</span>
                            <div class="loker-info-beranda">
                                <small>Minimal Pendidikan S1</small><br>
                                <small>Work From Office</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- duplikasi card UI -->
                <div class="col-md-4">
                    <div class="card loker-card-beranda">
                        <div class="card-body">
                            <h6 class="fw-bold">PT. Contoh Perusahaan</h6>
                            <p class="mb-1">Business Development</p>
                            <span class="badge bg-warning text-dark mb-2">Internship</span>
                            <div class="loker-info-beranda">
                                <small>Minimal Pendidikan S1</small><br>
                                <small>Hybrid</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card loker-card-beranda">
                        <div class="card-body">
                            <h6 class="fw-bold">PT. Contoh Perusahaan</h6>
                            <p class="mb-1">Digital Marketing</p>
                            <span class="badge bg-warning text-dark mb-2">Job Opportunity</span>
                            <div class="loker-info-beranda">
                                <small>Minimal Pendidikan S1</small><br>
                                <small>Work From Home</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-outline-primary px-4">Selanjutnya</button>
            </div>
        </div>
    </section>
    <!-- FOOTER / ABOUT -->
    <section class="footer-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 text-white">
                    <h2 class="fw-bold">CAREER CENTER<span class="text-warning">.</span></h2>
                    <p>
                        Career Center ITB STIKOM Bali merupakan website yang didedikasikan
                        untuk membantu mahasiswa maupun alumni ITB STIKOM Bali menemukan
                        pekerjaan impian mereka.
                    </p>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/career-man.png') }}" class="img-fluid footer-img">
                </div>

            </div>
        </div>
    </section>
</x-pencari_kerja.layout>