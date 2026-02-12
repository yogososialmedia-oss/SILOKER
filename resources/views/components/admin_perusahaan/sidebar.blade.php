<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index-perusahaan.html" class="app-brand-link custom-brand-link">
            <span class="custom-brand-text">Career Center
                <span class="dot-beranda hero-exclamation">.</span>
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Basic">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{javascript:void(0);}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div class="text-truncate" data-i18n="Dashboards">Perusahaan</div>
            </a>
            <ul class="menu-sub">
                <a href="{{ route('admin.verifikasi-perusahaan') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Basic">Verifikasi Perusahaan</div>
                </a>
                <a href="{{ route('admin.daftar-perusahaan') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Analytics">Daftar Perusahaan</div>
                </a>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="{{ route('admin.daftar-loker') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-truncate" data-i18n="Analytics">Daftar Loker</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{ route('perusahaan.profile') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div class="text-truncate" data-i18n="Basic">Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-truncate" data-i18n="Dashboards">Loker</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('perusahaan.loker') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Daftar Loker</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('perusahaan.loker.create') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Input Loker</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ route('perusahaan.apply') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div class="text-truncate" data-i18n="Basic">History Apply</div>
            </a>
        </li>
    </ul>
</aside>