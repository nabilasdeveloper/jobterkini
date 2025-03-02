<x-user.user-head></x-user.user-head>

<body>
    <x-user.user-header></x-user.user-header>
    <div class="hero-section">
        <div class="decoration-shape"></div>
        <h1 class="hero-title">Temukan perusahaan yang tepat untuk Anda</h1>
        <p class="hero-subtitle">Semua yang perlu diketahui tentang perusahaan, di satu tempat</p>

        <div class="search-container position-relative">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input form-control" id="searchPerusahaan" placeholder="Cari perusahaan...">

            <!-- Hasil pencarian -->
            <div id="search-results" class="list-group position-absolute w-100 mt-1"
                style="z-index: 1000; display: none;"></div>
        </div>
        <div class="decoration-circle"></div>
    </div>

    <!-- Daftar Perusahaan -->
    <div class="container">
        <div class="mt-4" id="company-list">
            <h3>Daftar Perusahaan</h3>
            <div class="row" id="companyContainer">
                <!-- Data perusahaan akan dimuat di sini melalui AJAX -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#searchPerusahaan').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) { // Hanya mencari jika lebih dari 2 karakter
                    $.ajax({
                        url: "{{ route('user-perusahaan-searchs') }}",
                        type: "GET",
                        data: {
                            q: query
                        },
                        success: function(data) {
                            let resultBox = $('#search-results');
                            resultBox.empty();
                            if (data.length > 0) {
                                data.forEach(perusahaan => {
                                    resultBox.append(
                                        `<a href="/job-terkini/list-perusahaan/${perusahaan.id}" class="list-group-item list-group-item-action">
                                            <strong>${perusahaan.nama_perusahaan}</strong><br>
                                            <small>${perusahaan.alamat_perusahaan}</small>
                                        </a>`
                                    );
                                });
                                resultBox.show();
                            } else {
                                resultBox.hide();
                            }
                        }
                    });
                } else {
                    $('#search-results').hide();
                }
            });

            // Hide dropdown jika klik di luar area search
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.search-container').length) {
                    $('#search-results').hide();
                }
            });

            // Memuat daftar perusahaan awal
            loadCompanies();

            function loadCompanies() {
                $.ajax({
                    url: "{{ route('user-perusahaan-searchs') }}",
                    type: "GET",
                    success: function(data) {
                        let container = $('#companyContainer');
                        container.empty();
                        data.forEach(perusahaan => {
                            container.append(
                                `
                                <div class="col-md-4 mb-3">
                                    <div class="company-card mb-3">
                                        <img src="/storage/${perusahaan.img_perusahaan}" alt="Lazada Logo"
                                            class="company-logo">
                                        <h3 class="company-name">${perusahaan.nama_perusahaan}</h3>
                                        <a class="job-count text-muted"
                                            style="text-decoration: none">${perusahaan.lowongan_count} Pekerjaan</a>
                                    </div>
                                </div>
                                `
                            );
                        });
                    }
                });
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
