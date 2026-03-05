<x-pencari_kerja.layout>
    <!-- ================= SLIDER LOKER OPEN ================= -->
    <section class="py-5">
    <div class="container-fluid">

        <h3 class="text-center mb-5 fw-bold text-primary">
            LOWONGAN TERBUKA
        </h3>

        @if($lokers->count())

        <div id="lokerCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">

                @foreach($lokers->chunk(4) as $chunkIndex => $chunk)
<div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">

    <div class="container">
        <div class="row justify-content-center">

            @foreach($chunk as $loker)
            <div class="col-md-6 mb-4"> {{-- 2 kolom --}}
                
                <a href="{{ route('pencarikerja.loker.show', $loker->id) }}"
                   class="text-decoration-none">

                    <div class="card h-100 loker-card-beranda position-relative">

    {{-- LINK --}}
    <a href="{{ route('pencarikerja.loker.show', $loker->id) }}"
        class="stretched-link"></a>

    <div class="card-body position-relative">

        {{-- TANGGAL --}}
        <p class="text-end fs-9 mb-2">
            {{ $loker->tanggal_mulai_loker->format('d M Y') }}
            -
            {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
        </p>

        {{-- HEADER --}}
        <div class="d-flex align-items-start gap-3 mb-3">
            <img src="{{ $loker->perusahaanMitra->logo_url ?? asset('default.png') }}"
                style="width:60px; height:60px; object-fit:cover;"
                class="rounded shadow-sm" alt="">

            <div class="flex-grow-1">
                <h6 class="mb-1 fw-bold d-flex align-items-center gap-2">

                    {{-- Nama Perusahaan --}}
                    <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                        class="text-dark text-decoration-none position-relative z-3">
                        {{ $loker->perusahaanMitra->nama_perusahaan }}
                    </a>

                    {{-- Icon Info --}}
                    <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                        class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5"
                        style="width:16px; height:16px; font-size:10px;">
                        i
                    </a>

                </h6>

                <p class="mb-1 small">
                    {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                </p>

                <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                    <i class="bx bx-location-plus"></i>
                    <span>{{ $loker->kabupaten }}</span>
                </p>
            </div>
        </div>

        {{-- JABATAN + STATUS --}}
        <div class="d-flex align-items-center mb-3">
            <h5 class="mb-0 text-dark">
                {{ $loker->jabatan }}
            </h5>

            <div class="ms-auto pe-3">
                @if(now()->between($loker->tanggal_mulai_loker, $loker->tanggal_berakhir_loker))
                    <span class="badge bg-primary fs-6 px-3 py-2">
                        Open
                    </span>
                @else
                    <span class="badge bg-danger fs-6 px-3 py-2">
                        Close
                    </span>
                @endif
            </div>
        </div>

        {{-- DETAIL --}}
        <p class="d-flex align-items-start gap-2 mb-1">
            <i class="bx bx-buildings"></i>
            <span>{{ $loker->model_kerja }}</span>
        </p>

        <p class="d-flex align-items-start gap-2 mb-1">
            <i class="bx bx-book-reader"></i>
            <span>{{ $loker->minimal_pendidikan }}</span>
        </p>

    </div>
</div>

                </a>

            </div>
            @endforeach

        </div>
    </div>

</div>
@endforeach

            </div>

            <!-- Tombol -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#lokerCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#lokerCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
            </button>

        </div>

        @else
            <div class="text-center">
                <p class="text-muted">Belum ada lowongan terbuka.</p>
            </div>
        @endif

    </div>
</section>
    <!-- ================= HOME ================= -->
    <section id="home" class="home-beranda">
        <div class="container-fluid px-0">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 home-text-beranda">
                        <h1>
                            FIND YOUR<br>
                            DREAM JOB<span class="tanda-seru-color">!</span>
                        </h1>
                        <p class="home-desc">
                            Temukan peluang karier terbaik yang selaras dengan keahlian, minat, dan passionmu.
                            Jelajahi berbagai lowongan pekerjaan dari perusahaan terpercaya, kembangkan potensi
                            diri, serta raih masa depan yang lebih cerah dan berkelanjutan melalui langkah karier
                            yang tepat.
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



    <!-- ================= FOOTER / ABOUT ================= -->
<section id="about" class="about-career pt-12">
    <div class="container">

        <!-- ===== CAREER CENTER ===== -->
        <div class="career-center-box mb-5 pb-4 border-bottom border-primary text-center">

    <h3 class="fw-bold mb-4">
        CAREER CENTER
    </h3>

    <div class="mx-auto" style="max-width: 850px;">
        <p class="mb-3">
            Career Center ITB STIKOM Bali merupakan sebuah platform digital yang didedikasikan
            untuk membantu mahasiswa aktif maupun alumni ITB STIKOM Bali dalam menemukan dan
            mengembangkan peluang karier yang sesuai dengan minat, bakat, dan kompetensi mereka.
        </p>

        <p class="mb-6">
            Selain sebagai media pencarian kerja, Career Center ITB STIKOM Bali juga berperan
            sebagai jembatan penghubung antara dunia pendidikan dan dunia industri, guna
            meningkatkan kesiapan lulusan dalam menghadapi persaingan dunia kerja.
        </p>
    </div>

</div>
        <div class="row">

            <!-- KOLOM 1 -->
            <div class="col-lg-4 mb-4">
                <h4 class="fw-bold mb-3">Alamat Kampus</h4>

                <p><strong>Kampus Renon:</strong><br>
                Jl. Raya Puputan No. 86 Renon – Denpasar<br>
                Telp: (0361) 244445</p>

                <p><strong>Kampus Jimbaran:</strong><br>
                Jl. Raya Kampus Udayana Jimbaran Bali<br>
                Telp: (0361) 8953537</p>

                <p><strong>Kampus Abiansemal:</strong><br>
                Jl. Janger Dauh Yeh Cani, Badung, Bali<br>
                Telp: 0856-3700-803</p>
            </div>

            <!-- KOLOM 2 -->
            <div class="col-lg-4 mb-4">
                <h4>ITB STIKOM Bali Grup</h4>
                <ul>
                    <li>Universitas Teknologi Bandung</li>
                    <li>Politeknik Nasional Denpasar</li>
                    <li>Politeknik Ganesha Guru</li>
                    <li>Bisma Informatika</li>
                    <li>Lembaga Pendidikan Bali Asia</li>
                    <li>SMK TI Bali Global</li>
                    <li>BPRS Fajar Sejahtera</li>
                </ul>
            </div>

            <!-- KOLOM 3 -->
            <div class="col-lg-4 mb-4">
                <h4>Bergabunglah Bersama Kami</h4>

                <div class="social-icons">
                    <a href="https://siap.stikom-bali.ac.id/" target="_blank">
                        <i class="bx bx-globe"></i> www.siap.stikom-bali.ac.id
                    </a><br>

                    <a href="https://www.instagram.com/stikombali?igsh=MTNpdHJ2NGxhNDJoZg==" target="_blank">
                        <i class="bx bxl-instagram"></i> @stikombali
                    </a><br>

                    <a href="https://www.facebook.com/share/1Hby2Pu5Tj/" target="_blank">
                        <i class="bx bxl-facebook"></i> stikombali
                    </a><br>

                    <a href="https://www.tiktok.com/@itbstikombali?_r=1&_t=ZS-94QVKmVLzxE" target="_blank">
                        <i class="bx bxl-tiktok"></i> itbstikombali
                    </a><br>

                    <a href="https://youtube.com/@stikomerstv8537?si=uRr7WbTrd8GHJetD" target="_blank">
                        <i class="bx bxl-youtube"></i> stikomerstv
                    </a>
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