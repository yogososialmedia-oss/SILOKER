<!doctype html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="{{ url('/admin_perusahaan/assets/') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Career Center</title>

    <meta name="description" content="" />
    
    @include('impor.admin_perusahaan.css')



</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout container -->
            <x-admin_perusahaan.sidebar>
                
            </x-admin_perusahaan.sidebar>
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme fixed-top"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" >
                                        <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                {{ $slot }}
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('impor.admin_perusahaan.js')

@stack('scripts')
</body>


</html>