<x-pencari_kerja.layout>
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


    <!-- ================= LOKER ================= -->
    <section class="loker-beranda">
        <div class="container">

            <h3 class="text-center mb-5 fw-bold" style="color: #3f75c7">
                INFORMASI LOWONGAN KERJA
            </h3>
            <div class="row g-4">

                <!-- CARD -->
                @forelse($lokers as $loker)
                <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                    <div class="card h-100 loker-card-beranda position-relative">

                        <a href="{{ route('pencarikerja.loker.show', $loker->id) }}" 
                            class="stretched-link"></a>

                        <div class="card-body position-relative">

                            {{-- TANGGAL --}}
                            <p class="text-end fs-9 mb-2">
                                {{ $loker->tanggal_mulai_loker->format('d M Y') }}
                                -
                                {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
                            </p>

                            {{-- HEADER PERUSAHAAN --}}
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="{{ $loker->perusahaanMitra->logo_url }}"
                                    style="width:60px; height:60px; object-fit:cover;"
                                    class="rounded shadow-sm">

                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">
                                        {{ $loker->perusahaanMitra->nama_perusahaan }}
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
                                <h5 class="mb-0">
                                    {{ $loker->jabatan }}
                                </h5>

                                <div class="ms-auto pe-4">
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
                </div>
                @empty
                <div class="text-center">
                        <p class="text-muted">Belum ada lowongan tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('pencarikerja.loker.index') }}" class="btn btn-outline-primary px-4">
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
                    <div class="col-12 col-lg-6 footer-text-beranda">
                        <h1 class="fw-bold footer-title">CAREER CENTER</h1>

                        <p class="footer-desc">
                            Career Center ITB STIKOM Bali merupakan sebuah platform digital yang didedikasikan
                            untuk membantu mahasiswa aktif maupun alumni ITB STIKOM Bali dalam menemukan dan
                            mengembangkan peluang karier yang sesuai dengan minat, bakat, dan kompetensi mereka.
                        </p>

                        <p class="footer-desc">
                            Selain sebagai media pencarian kerja, Career Center ITB STIKOM Bali juga berperan
                            sebagai jembatan penghubung antara dunia pendidikan dan dunia industri, guna
                            meningkatkan kesiapan lulusan dalam menghadapi persaingan dunia kerja.
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