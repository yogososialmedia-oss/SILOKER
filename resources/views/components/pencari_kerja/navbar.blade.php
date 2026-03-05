<nav class="navbar navbar-expand-lg fixed-top navbar-beranda navbar-dark">
    <div class="container-fluid px-4">
        <!-- BRAND -->
        <span class="navbar-brand fw-bold brand-text-beranda">
            Career Center<span class="dot-beranda hero-exclamation">.</span>
        </span>

        <!-- BURGER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- COLLAPSE -->
        <div class="collapse navbar-collapse" id="navbar-ex-7">
            <!-- MENU KIRI -->
            <div class="navbar-nav ms-4 menu-beranda">
                <a class="nav-link" href="{{ route('pencarikerja.beranda') }}#home">Home</a>
                <a class="nav-link" href="{{ route('pencarikerja.beranda') }}#about">About</a>
                <a class="nav-link {{ request()->routeIs('pencarikerja.loker.*') || request()->routeIs('tampilan-loker-pencari-kerja') ? 'active text-white' : '' }}" href="{{ route('pencarikerja.loker.index') }}">
                    Loker
                </a>
            </div>

            <!-- MENU KANAN -->
            <div class="navbar-nav ms-auto align-items-lg-center menu-kanan">
                <!-- JIKA BELUM LOGIN -->
                @if (!Auth::guard('pencarikerja')->check())
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle login-link-beranda" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-beranda">
                            <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin</a></li>
                            <li><a class="dropdown-item" href="{{ route('perusahaan.login') }}">Perusahaan</a></li>
                            <li><a class="dropdown-item" href="{{ route('pencarikerja.login') }}">Pencari Kerja</a></li>
                        </ul>
                    </div>
                @endif

                <!-- PROFILE -->
                @if (Auth::guard('pencarikerja')->user())
                    <a class="nav-link profile-link-beranda ms-lg-3 {{ request()->routeIs('pencarikerja.profile', 'pencarikerja.history-apply', 'pencarikerja.profile.edit') ? 'active' : '' }}" href="{{ route('pencarikerja.profile') }}">
                        <i class="bx bx-user"></i> Profile
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>