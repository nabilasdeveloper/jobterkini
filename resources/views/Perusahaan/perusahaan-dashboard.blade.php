<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="container-fluid">
    <h1 class="title">Dashboard</h1>
    <p class="mb-5">
        Selamat datang,
        <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
    </p>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Statistik Status Lamaran</h5>
                        </div>
                    </div>
                    <div id="pieChart" class=""></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white overflow-hidden shadow-none">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-6">
                            <h5 class="fw-semibold mb-9 fs-5 text-white">Welcome, {{ $perusahaan->nama_perusahaan }}!
                            </h5>
                            <p class="mb-9 opacity-75">
                                Selamat datang di website <u>JobTerkini.co</u>
                            </p>
                        </div>
                        <div class="col-sm-5">
                            <div class="position-relative">
                                <img src="{{ asset('assets/images/backgrounds/rocket.png') }}" alt="modernize-img"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            series: {!! json_encode(array_values($statusLamaran)) !!}, // Data jumlah status lamaran
            chart: {
                type: 'pie',
                height: 150
            },
            labels: {!! json_encode(array_keys($statusLamaran)) !!}, // Label status lamaran
            colors: ['#1E90FF', '#00BFFF', '#FF8C00'], // Warna untuk status (Hijau, Kuning, Merah)
            dataLabels: {
                enabled: false // Nonaktifkan persentase di pie chart
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart"), options);
        chart.render();
    });

    // Toast Notifikasi
    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("successToast");
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    @endif
    @if (session('error'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("errorToast");
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    @endif
</script>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-bg-success border-0 p-2 shadow-lg" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex align-items-center">
            <!-- Tambahkan Ikon di Sini -->
            <div class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM12.354 5.646a.5.5 0 0 0-.708 0L7 10.293 4.854 8.146a.5.5 0 1 0-.708.708l2.5 2.5a.5.5 0 0 0 .708 0l5-5a.5.5 0 0 0 0-.708z" />
                </svg>
            </div>
            <div class="toast-body">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="errorToast" class="toast align-items-center text-bg-danger border-0 p-2 shadow-lg" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex align-items-center">
            <!-- Tambahkan Ikon di Sini -->
            <div class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM12.354 5.646a.5.5 0 0 0-.708 0L7 10.293 4.854 8.146a.5.5 0 1 0-.708.708l2.5 2.5a.5.5 0 0 0 .708 0l5-5a.5.5 0 0 0 0-.708z" />
                </svg>
            </div>
            <div class="toast-body">
                <strong>Error!</strong> {{ session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>



<x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>
