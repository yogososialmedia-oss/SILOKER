<!-- ================= LIBRARY JAVASCRIPT ================= -->
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- MAIN JS UNTUK LOGIKA TEMPLATE -->
<script src="{{ asset('admin-perusahaan/assets/js/main.js') }}"></script>

<!-- DASHBOARD ANALYTICS -->
<script src="{{ asset('admin-perusahaan/assets/js/dashboards-analytics.js') }}"></script>

<!-- GITHUB BUTTONS -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- DATATABLES -->
<script src="{{ asset('admin-perusahaan/assets/datatable/datatables.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/datatable/datatable-init.js') }}"></script>

<!-- CHART.JS -->
<script src="{{ asset('admin-perusahaan/assets/chartjs/chart.umd.min.js') }}"></script>

<script>
    // ================= GRAFIK LOKER =================
    const data = {
        labels: ['Open', 'Close'], // Label status loker
        datasets: [{
            label: 'Total',
            data: [50, 100], // Data jumlah loker
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'], // Warna chart
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut', // Tipe chart
        data: data,
    };

    // Render grafik loker di canvas dengan id 'grafik_loker'
    new Chart(document.getElementById('grafik_loker'), config);

    // ================= GRAFIK INTERAKSI =================
    const data2 = {
        labels: ['Tayangan', 'Apply'], // Label interaksi
        datasets: [{
            label: 'Total',
            data: [50, 10], // Data jumlah tayangan dan apply
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'], // Warna chart
            hoverOffset: 4
        }]
    };

    const config2 = {
        type: 'doughnut', // Tipe chart
        data: data2,
    };

    // Render grafik interaksi di canvas dengan id 'grafik_interaksi'
    new Chart(document.getElementById('grafik_interaksi'), config2);
</script>