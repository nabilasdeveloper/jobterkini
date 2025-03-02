<x-user.user-head></x-user.user-head>

<body>
    <x-user.user-header></x-user.user-header>
    <div class="hero-section">
        <div class="decoration-shape"></div>
        <h1 class="hero-title">Temukan lowongan yang tepat untuk Anda</h1>
        <p class="hero-subtitle">Semua yang perlu diketahui tentang perusahaan, di satu tempat</p>

        <div class="search-container position-relative">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-input form-control" id="searchLowongan" placeholder="Cari lowongan...">

            <!-- Hasil pencarian -->
            <div id="search-results" class="list-group position-absolute w-100 mt-1"
                style="z-index: 1000; display: none;"></div>
        </div>
        <div class="decoration-circle"></div>
    </div>

    <!-- Daftar Perusahaan -->
    <div class="container">
        <div class="mt-4" id="company-list">
            <h3 class="mb-5">Daftar Lowongan</h3>
            <div class="row" id="companyContainer">
                <!-- Data perusahaan akan dimuat di sini melalui AJAX -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#searchLowongan').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) { // Hanya mencari jika lebih dari 2 karakter
                    $.ajax({
                        url: "{{ route('user-lowongan-searchs') }}",
                        type: "GET",
                        data: {
                            q: query
                        },
                        success: function(data) {
                            let resultBox = $('#search-results');
                            resultBox.empty();
                            if (data.length > 0) {
                                data.forEach(lowongan => {
                                    resultBox.append(
                                        `<a href="/job-terkini/lowongan/${lowongan.id}" class="list-group-item list-group-item-action">
                                            <strong>${lowongan.nama_lowongan}</strong><br>
                                            <small>${lowongan.perusahaan.nama_perusahaan}</small><br>
                                            <small>${lowongan.gaji_perbulan}</small>
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
                    url: "{{ route('user-lowongan-searchs') }}",
                    type: "GET",
                    success: function(data) {
                        let container = $('#companyContainer');
                        container.empty();
                        data.forEach(lowongan => {
                            container.append(`
                                <div class="col-md-4 mb-3">
                                    <div class="job-card">
                                        <img src="/storage/${lowongan.perusahaan.img_perusahaan}" 
                                            alt="${lowongan.perusahaan.nama_perusahaan}" 
                                            class="perusahaan-logo">

                                        <button class="bookmark-btn">
                                            <i class="bi bi-bookmark"></i>
                                        </button>

                                        <a href="/job-terkini/lowongan/${lowongan.id}" class="job-title">
                                            ${lowongan.nama_lowongan}
                                        </a>

                                        <div class="perusahaan-name">${lowongan.perusahaan.nama_perusahaan}</div>

                                        <div class="location">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                                                fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg>
                                            ${lowongan.perusahaan.alamat_perusahaan}
                                        </div>

                                        <div class="salary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                                                fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                                            </svg>
                                            ${lowongan.gaji_perbulan}
                                        </div>

                                        <div class="category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" 
                                                fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                                <path d="M6.5 0a.5.5 0 0 1 .5.5V1h2V.5a.5.5 0 0 1 1 0V1h1.5a.5.5 0 0 1 .5.5V3h-7V1.5a.5.5 0 0 1 .5-.5H6V.5a.5.5 0 0 1 .5-.5ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm3 1v9h10V5H3Z" />
                                            </svg>
                                            ${lowongan.kategori_lowongan}
                                        </div>

                                        <div class="meta-info">
                                            <span>${lowongan.created_at}</span>
                                            ${lowongan.expired_at && isToday(lowongan.expired_at) ? `
                                                    <div class="expiring-soon">
                                                        <i class="bi bi-hourglass-split"></i>
                                                        Expiring soon
                                                    </div>
                                                ` : ''}
                                        </div>
                                    </div>
                                </div>
    `);
                        });

                        // Fungsi untuk mengecek apakah tanggal expired adalah hari ini
                        function isToday(dateString) {
                            const date = new Date(dateString);
                            const today = new Date();
                            return date.toDateString() === today.toDateString();
                        }

                    }
                });
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
