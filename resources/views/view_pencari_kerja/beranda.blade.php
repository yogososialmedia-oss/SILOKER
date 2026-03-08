<x-pencari_kerja.layout>
    <!-- Wrapper utama halaman beranda pencari kerja -->
    <div class="content-wrapper-user">
        <!-- Section carousel lowongan -->
        <section class="py-5">
            <div class="container-fluid">
                @if($lokers->count())
                    <!-- Carousel bootstrap untuk lowongan -->
                    <div id="lokerCarousel" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                            @foreach($lokers->chunk(4) as $chunkIndex => $chunk)
                                <!-- Item carousel (4 lowongan per slide) -->
                                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            @foreach($chunk as $loker)
                                                <div class="col-md-6 mb-4"> {{-- 2 kolom per row --}}
                                                    <!-- Card lowongan -->
                                                    <a href="{{ route('pencarikerja.loker.show', $loker->id) }}"
                                                        class="text-decoration-none">
                                                        <div class="card h-100 loker-card-beranda position-relative">
                                                            {{-- LINK STRETCHED agar card clickable --}}
                                                            <a href="{{ route('pencarikerja.loker.show', $loker->id) }}"
                                                                class="stretched-link"></a>

                                                            <div class="card-body position-relative">
                                                                {{-- Tanggal mulai & berakhir lowongan --}}
                                                                <p class="text-end fs-9 mb-2">
                                                                    {{ $loker->tanggal_mulai_loker->format('d M Y') }}
                                                                    -
                                                                    {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
                                                                </p>

                                                                {{-- Header card: logo + nama perusahaan --}}
                                                                <div class="d-flex align-items-start gap-3 mb-3">
                                                                    <img src="{{ $loker->perusahaanMitra->logo_url ?? asset('default.png') }}"
                                                                        style="width:60px; height:60px; object-fit:cover;"
                                                                        class="rounded shadow-sm" alt="">

                                                                    <div class="flex-grow-1">
                                                                        <h6 class="mb-1 fw-bold d-flex align-items-center gap-2">
                                                                            {{-- Nama Perusahaan --}}
                                                                            <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                                                                class="text-dark link-primary fw-bold position-relative z-3">
                                                                                {{ $loker->perusahaanMitra->nama_perusahaan }}
                                                                            </a>

                                                                            {{-- Icon Info --}}
                                                                            <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                                                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5"
                                                                                style="width:16px; height:16px; font-size:10px;">
                                                                                i
                                                                            </a>
                                                                        </h6>

                                                                        {{-- Tipe lowongan --}}
                                                                        <p class="mb-1 small">
                                                                            {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                                                                        </p>

                                                                        {{-- Lokasi --}}
                                                                        <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                                                            <i class="bx bx-location-plus"></i>
                                                                            <span>{{ $loker->kabupaten }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                {{-- Jabatan + Status lowongan --}}
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <h5 class="mb-0 text-dark">
                                                                        {{ $loker->jabatan }}
                                                                    </h5>

                                                                    <div class="ms-auto pe-3">
                                                                        @if($loker->status == 'open')
                                                                            <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                                                        @else
                                                                            <span class="badge bg-warning fs-6 px-3 py-2">Closed</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                {{-- Detail model kerja & pendidikan minimal --}}
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

                        <!-- Kontrol navigasi carousel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#lokerCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#lokerCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                        </button>
                    </div>
                @else
                    <!-- Pesan jika tidak ada lowongan -->
                    <div class="text-center">
                        <p class="text-muted">Belum ada lowongan terbuka.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Section Hero/Home -->
        <section id="home" class="home-beranda">
            <div class="container-fluid px-0">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Teks hero -->
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
                        <!-- Gambar hero -->
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('admin-perusahaan/assets/img/avatars/beranda1.png') }}"
                                class="img-fluid hero-image-beranda">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section About / Career Center -->
        <section id="about" class="about-career pt-12">
            <div class="container">
                <!-- Box deskripsi Career Center -->
                <div class="career-center-box mb-5 pb-4 border-bottom border-primary text-center">
                    <h3 class="fw-bold mb-4">CAREER CENTER</h3>
                    <div class="mx-auto text-justify" style="max-width: 850px;">
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

                <!-- Informasi kampus & kontak -->
                <div class="row">
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

                    <div class="col-lg-4 mb-4">
                        <h4 class="fw-bold mb-3">ITB STIKOM Bali Grup</h4>
                        <ul class="list-unstyled">
                            <li>Universitas Teknologi Bandung</li>
                            <li>Politeknik Nasional Denpasar</li>
                            <li>Politeknik Ganesha Guru</li>
                            <li>Bisma Informatika</li>
                            <li>Lembaga Pendidikan Bali Asia</li>
                            <li>SMK TI Bali Global</li>
                            <li>BPRS Fajar Sejahtera</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <h4 class="fw-bold mb-3">Bergabunglah Bersama Kami</h4>
                        <!-- Social media links -->
                        <div class="social-icons">
                            <a href="https://siap.stikom-bali.ac.id/" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bx-globe"></i> <span>www.siap.stikom-bali.ac.id</span>
                            </a>

                            <a href="https://www.instagram.com/stikombali" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bxl-instagram"></i> <span>@stikombali</span>
                            </a>

                            <a href="https://www.instagram.com/cdc.stikombali" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bxl-instagram"></i> <span>@cdc.stikombali</span>
                            </a>

                            <a href="https://www.facebook.com/share/1Hby2Pu5Tj/" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bxl-facebook"></i> <span>stikombali</span>
                            </a>

                            <a href="https://www.tiktok.com/@itbstikombali" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bxl-tiktok"></i> <span>itbstikombali</span>
                            </a>

                            <a href="https://youtube.com/@stikomerstv8537?si=r5_qAh3ytIgNuGBw" target="_blank"
                                class="d-flex align-items-center mb-2 text-decoration-none">
                                <i class="bx bxl-youtube"></i> <span>stikomerstv</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer utama -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex justify-content-between py-4">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </footer>
    </div>

    {{-- Script JS untuk scroll dan menu active --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuLinks = document.querySelectorAll('.menu-beranda .nav-link');
            const sections = document.querySelectorAll('section');
            const offset = 70;

            // ===== Klik menu untuk scroll ke section =====
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
                            menuLinks.forEach(l => l.classList.remove('active'));
                            this.classList.add('active');
                            history.pushState(null, null, `#${targetId}`);
                        }
                    }
                });
            });

            // ===== Scrollspy untuk highlight menu saat scroll =====
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

            // ===== Cek hash URL saat halaman load =====
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash;
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