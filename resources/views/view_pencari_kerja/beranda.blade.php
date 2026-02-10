<x-pencari_kerja.layout>
    <!-- ================= HOME ================= -->
    <section id="home" class="home-beranda">
        <div class="container-fluid px-0">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 home-text-beranda ">
                        <h1>
                            FIND YOUR<br>
                            DREAM JOB<span class="tanda-seru-color">!</span>
                        </h1>
                        <p>
                            Temukan peluang karier terbaik sesuai dengan keahlian dan passionmu, jelajahi berbagai
                            lowongan pekerjaan dan raih masa depan yang lebih cerah.
                        </p>
                    </div>

                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('admin-perusahaan/assets/img/avatars/beranda1.png') }}"
                            class="img-fluid hero-image-beranda">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ================= LOKER ================= -->
    <section class="loker-beranda">
        <div class="container">

            <h3 class="text-center mb-5 fw-bold" style="color: #3f75c7">
                INFORMASI LOWONGAN KERJA
            </h3>


            <div class="row g-4">

                <!-- CARD -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100 loker-card-beranda position-relative">
                        <a href="{{ route('tampilan-loker-perusahaan') }}" class="stretched-link"></a>
                        <div class="card-body position-relative">
                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                    style="width:60px; height:60px;" class="img-fluid rounded" alt="">
                                <div class="flex-grow-1">

                                    <h6 class="mb-1 d-flex align-items-center gap-2">
                                        <a href="{{ route('index-perusahaan') }}"
                                            class="fw-bold text-dark text-decoration-none position-relative z-3">
                                            DEYSTORY
                                        </a>
                                        <a href="{{ route('index-perusahaan') }}"
                                            class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-3"
                                            style="width:16px; height:16px; font-size:10px; line-height:1;">i</a>
                                    </h6>

                                    <p class="mb-1 small">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3 position-relative">
                                Administrasi
                                <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-primary position-absolute"
                                    style="top:10px; left:200px;">
                                    Open
                                </a>
                                <a href="{{ route('loker', ['id' => 1]) }}" class="badge bg-danger position-absolute"
                                    style="top:10px; left:200px;">
                                    Close
                                </a>
                            </h5>

                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('loker') }}" class="btn btn-outline-info px-4">
                    Selanjutnya
                </a>
            </div>

        </div>
    </section>

    <!-- ================= FOOTER / ABOUT ================= -->
    <section id="about" class="footer-beranda">
        <div class="container-fluid px-0">
            <div class="container">
                <div class="row align-items-center">

                    <!-- TEXT -->
                    <div class="col-lg-6 footer-text-beranda">
                        <h1 class="fw-bold">CAREER CENTER</h1>
                        <p>
                            Career Center ITB STIKOM Bali merupakan website yang didedikasikan
                            untuk membantu mahasiswa maupun alumni menemukan pekerjaan impian.
                        </p>
                    </div>


                    <!-- AVATAR / IMAGE -->
                    <div class="col-lg-6 order-2 order-lg-2 text-center mt-4 mt-lg-0">
                        <img src="{{ asset('admin-perusahaan/assets/img/avatars/beranda2.png') }}"
                            class="img-fluid footer-image-beranda">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div class="footer-container d-flex justify-content-between py-4">
                ©2026 Yogo & Wahyu
            </div>
        </div>
    </footer>

    {{-- JS SCROLL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuLinks = document.querySelectorAll('.menu-beranda .nav-link');
            const sections = document.querySelectorAll('section');
            const offset = 70;

            // ===== Klik menu #section =====
            menuLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href.includes('#')) {
                        const parts = href.split('#');
                        const targetId = parts[1];
                        const targetSection = document.getElementById(targetId);
                        if (targetSection) {
                            e.preventDefault();
                            window.scrollTo({
                                top: targetSection.offsetTop - offset,
                                behavior: 'smooth'
                            });
                            // set active saat klik
                            menuLinks.forEach(l => l.classList.remove('active'));
                            this.classList.add('active');
                            // update URL fragment tanpa reload
                            history.pushState(null, null, `#${targetId}`);
                        }
                    }
                });
            });

            // ===== Scrollspy =====
            window.addEventListener('scroll', function () {
                let scrollPos = window.scrollY + offset + 1;
                sections.forEach(section => {
                    const top = section.offsetTop;
                    const bottom = top + section.offsetHeight;
                    const id = section.getAttribute('id');
                    if (scrollPos >= top && scrollPos < bottom) {
                        menuLinks.forEach(link => link.classList.remove('active'));
                        const activeLink = document.querySelector(`.menu-beranda a[href$="#${id}"]`);
                        if (activeLink) activeLink.classList.add('active');
                    }
                });
            });

            // ===== Cek URL saat halaman load =====
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash; // #home atau #about
            menuLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href.includes(currentHash) && currentHash) {
                    link.classList.add('active');
                } else if (!href.includes('#') && href === currentPath) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });

    </script>
</x-pencari_kerja.layout>