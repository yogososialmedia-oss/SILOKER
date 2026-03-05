<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    {{-- =====================================================
        BRAND / LOGO
    ===================================================== --}}
    <div class="app-brand demo">
        <a class="app-brand-link custom-brand-link">
            <span class="custom-brand-text">
                Career Center <span class="dot-beranda hero-exclamation">.</span>
            </span>
        </a>

        {{-- Toggle sidebar (mobile) --}}
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>


    {{-- =====================================================
        MENU SIDEBAR
    ===================================================== --}}
    <ul class="menu-inner py-1">


        {{-- =====================================================
            MENU ADMIN
        ===================================================== --}}
        @if(Auth::guard('admin')->check())

            {{-- Dashboard --}}
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-smile"></i>
                    <div>Dashboard</div>
                </a>
            </li>


            {{-- Perusahaan --}}
            <li class="menu-item
                {{ request()->routeIs([
                    'admin.verifikasi-perusahaan',
                    'admin.daftar-perusahaan',
                    'admin.profile-perusahaan',
                    'admin.detail-verifikasi-perusahaan',
                    'admin.lowongan-kerja-perusahaan'
                ]) ? 'active open' : '' }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-buildings"></i>
                    <div>Perusahaan</div>
                </a>

                <ul class="menu-sub">

                    {{-- Verifikasi Perusahaan --}}
                    <li class="menu-item
                        {{ request()->routeIs([
                            'admin.verifikasi-perusahaan',
                            'admin.detail-verifikasi-perusahaan'
                        ]) ? 'active' : '' }}">

                        <a href="{{ route('admin.verifikasi-perusahaan') }}" class="menu-link">
                            <div>Verifikasi Perusahaan</div>
                        </a>
                    </li>

                    {{-- Daftar Perusahaan --}}
                    <li class="menu-item
                        {{ request()->routeIs([
                            'admin.daftar-perusahaan',
                            'admin.profile-perusahaan',
                            'admin.lowongan-kerja-perusahaan'
                        ]) ? 'active' : '' }}">

                        <a href="{{ route('admin.daftar-perusahaan') }}" class="menu-link">
                            <div>Daftar Perusahaan</div>
                        </a>
                    </li>

                </ul>
            </li>


            {{-- Daftar Loker --}}
            <li class="menu-item
                {{ request()->routeIs([
                    'admin.daftar-loker',
                    'admin.loker.tampilan'
                ]) ? 'active' : '' }}">

                <a href="{{ route('admin.daftar-loker') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div>Daftar Loker</div>
                </a>
            </li>


            {{-- Daftar Apply --}}
            <li class="menu-item
                {{ request()->routeIs(
                    'admin.history-apply',
                    'admin.apply.profile',
                    'admin.apply.history',
                    'admin.apply.detail',
                    'admin.apply.loker'
                ) ? 'active' : '' }}">

                <a href="{{ route('admin.history-apply') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-pin"></i>
                    <div>Daftar Apply</div>
                </a>
            </li>

        @endif



        {{-- =====================================================
            MENU PERUSAHAAN MITRA
        ===================================================== --}}
        @if(Auth::guard('perusahaanmitra')->check())

            {{-- Profile --}}
            <li class="menu-item
                {{ request()->routeIs([
                    'perusahaan.profile',
                    'perusahaan.profile.edit',
                    'perusahaan.loker.profile'
                ]) ? 'active' : '' }}">

                <a href="{{ route('perusahaan.profile') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div>Profile</div>
                </a>
            </li>


            {{-- Loker --}}
            <li class="menu-item
                {{ request()->routeIs([
                    'perusahaan.loker',
                    'perusahaan.loker.edit',
                    'perusahaan.loker.create',
                    'perusahaan.loker.tampilan'
                ]) ? 'active open' : '' }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div>Loker</div>
                </a>

                <ul class="menu-sub">

                    {{-- Daftar Loker --}}
                    <li class="menu-item
                        {{ request()->routeIs([
                            'perusahaan.loker.tampilan',
                            'perusahaan.loker',
                            'perusahaan.loker.edit'
                        ]) ? 'active' : '' }}">

                        <a href="{{ route('perusahaan.loker') }}" class="menu-link">
                            <div>Daftar Loker</div>
                        </a>
                    </li>

                    {{-- Input Loker --}}
                    <li class="menu-item
                        {{ request()->routeIs('perusahaan.loker.create') ? 'active' : '' }}">

                        <a href="{{ route('perusahaan.loker.create') }}" class="menu-link">
                            <div>Input Loker</div>
                        </a>
                    </li>

                </ul>
            </li>


            {{-- Daftar Apply --}}
            <li class="menu-item
                {{ request()->routeIs(
                    'perusahaan.apply',
                    'perusahaan.apply.loker',
                    'perusahaan.apply.profile-pelamar',
                    'perusahaan.apply.history',
                    'perusahaan.detail-apply'
                ) ? 'active' : '' }}">

                <a href="{{ route('perusahaan.apply') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-pin"></i>
                    <div>Daftar Apply</div>
                </a>
            </li>

        @endif

    </ul>

</aside>