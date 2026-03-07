<!doctype html>
<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="{{ url('/admin_perusahaan/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <!-- ================= META TAGS ================= -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Career Center</title>
    <meta name="description" content="" /> 
    
    <!-- ================= INCLUDE CSS ================= -->
    @include('impor.admin_perusahaan.css')
</head>

<body>
    <!-- ================= LAYOUT WRAPPER ================= -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <!-- ================= SIDEBAR MENU ================= -->
            <x-admin_perusahaan.sidebar></x-admin_perusahaan.sidebar>

            <!-- ================= PAGE CONTENT ================= -->
            <div class="layout-page">
                
                <!-- ================= TOP NAVBAR ================= -->
                <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center fixed-top navbar-blue-custom" id="layout-navbar">
                    
                    <!-- Toggle menu untuk mobile -->
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <!-- Navbar kanan -->
                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <!-- Form logout -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="icon-base bx bx-power-off icon-md me-3"></i>
                                        <span>Log Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- ================= SLOT CONTENT ================= -->
                {{ $slot }}

            </div> <!-- End layout-page -->
        </div> <!-- End layout-container -->

        <!-- Overlay untuk toggle menu -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div> <!-- End layout-wrapper -->

    <!-- ================= INCLUDE JS ================= -->
    @include('impor.admin_perusahaan.js')
    @stack('scripjs')
    @stack('scripts')
</body>

</html>