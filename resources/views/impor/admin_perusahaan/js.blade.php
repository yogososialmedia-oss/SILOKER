<script src="{{ asset('admin-perusahaan/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<script src="{{ asset('admin-perusahaan/assets/js/main.js') }}"></script>

<script src="{{ asset('admin-perusahaan/assets/js/dashboards-analytics.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{ asset('admin-perusahaan/assets/datatable/datatables.js') }}"></script>
<script src="{{ asset('admin-perusahaan/assets/datatable/datatable-init.js') }}"></script>

<script src="{{ asset('admin-perusahaan/assets/chartjs/chart.umd.min.js') }}"></script>

<script>
    // Grafik Loker
    const data = {
        labels: ['Open', 'Close'],
        datasets: [{
            label: 'Total',
            data: [50, 100],
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
    };

    new Chart(document.getElementById('grafik_loker'), config);

    // Grafik Interaksi
    const data2 = {
        labels: ['Tayangan', 'Apply'],
        datasets: [{
            label: 'Total',
            data: [50, 10],
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
            hoverOffset: 4
        }]
    };

    const config2 = {
        type: 'doughnut',
        data: data2,
    };

    new Chart(document.getElementById('grafik_interaksi'), config2);
</script>