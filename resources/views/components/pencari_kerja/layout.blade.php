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
    {{-- navbar --}}
    <x-pencari_kerja.navbar>
        
    </x-pencari_kerja.navbar>

    {{ $slot }}
    <!-- / Layout page -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    @include('impor.admin_perusahaan.js')
    @stack('scripjs')


</html>