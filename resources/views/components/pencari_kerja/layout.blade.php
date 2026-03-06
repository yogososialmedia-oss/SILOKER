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
    <!-- ================= NAVBAR ================= -->
    <x-pencari_kerja.navbar></x-pencari_kerja.navbar>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="container mt-5 pt-4">
        {{ $slot }}
    </div>

    <!-- ================= LAYOUT OVERLAY ================= -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- ================= INCLUDE JS ================= -->
    @include('impor.admin_perusahaan.js')
    @stack('scripts')
</body>

</html>