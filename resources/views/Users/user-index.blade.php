<x-user.user-head></x-user.user-head>

<body>
    <x-user.user-header></x-user.user-header>
    <div class="hero-section">
        <div class="decoration-shape"></div>
        <h1 class="hero-title">Temukan perusahaan yang tepat untuk Anda</h1>
        <p class="hero-subtitle">Semua yang perlu diketahui tentang perusahaan, di satu tempat</p>
        <a href="{{ route('user-perusahaan-search') }}" style="text-decoration: none;">
            <div class="search-container">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari perusahaan">
            </div>
        </a>
        <div class="decoration-circle"></div>
    </div>
    <div class="container py-5">
        <h1 class="section-title">Temukan perusahaan Anda berikutnya</h1>
        <p class="section-subtitle">Jelajahi profil perusahaan untuk menemukan tempat kerja yang tepat bagi Anda.
            Pelajari tentang pekerjaan, ulasan, budaya perusahaan, keuntungan, tunjangan.</p>

        <div class="scroll-container">
            <div class="d-flex gap-2">
                <!-- Lazada Card -->
                @foreach ($perusahaan as $item)
                    <a href="{{ route('user-perusahaan-detail', $item->id) }}" style="text-decoration: none">
                        <div style="min-width: 300px; cursor: pointer;">
                            <div class="company-card">
                                <img src="{{ asset('storage/' . $item->img_perusahaan) }}" alt="Lazada Logo"
                                    class="company-logo">
                                <h3 class="company-name">{{ $item->nama_perusahaan }}</h3>
                                <a class="job-count text-muted"
                                    style="text-decoration: none">{{ $item->lowongan_count }} Pekerjaan</a>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div style="background-color: #0a1b3f">

        <div class="container py-5">
            <h2 class="text-white">Temukan lowongan pekerjaan Anda</h2>
            <p class="text-info">Jelajahi lowongan yang anda inginkan</p>

            <a href="{{ route('user-lowongan-search') }}">
                <div action="" method="GET" class="search-container mb-5 d-flex gap-3">
                    <div class="position-relative flex-grow-1">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" name="keyword" class="search-input" placeholder="Masukkan kata kunci">
                    </div>
                    <button type="submit" class="btn btn-primary search-button">Cari</button>
                </div>
            </a>

            @foreach ($lowongan->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $lowongan)
                        <div class="col-md-4 mb-3">
                            <div class="job-card">
                                <img src="{{ asset('storage/' . $lowongan->perusahaan->img_perusahaan) }}"
                                    alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="perusahaan-logo">

                                <form action="{{ route('bookmarks-store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                                    <button type="submit" class="bookmark-btn text-white">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </form>

                                <a href="{{ route('lowongan-detail', $lowongan->id) }}"
                                    class="job-title">{{ $lowongan->nama_lowongan }}</a>
                                <div class="perusahaan-name">{{ $lowongan->perusahaan->nama_perusahaan }}</div>

                                <div class="location">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    {{ $lowongan->perusahaan->alamat_perusahaan }}
                                </div>

                                <div class="salary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                        <path
                                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                                    </svg>
                                    {{ $lowongan->gaji_perbulan }}
                                </div>

                                <div class="category">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="me-3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0a.5.5 0 0 1 .5.5V1h2V.5a.5.5 0 0 1 1 0V1h1.5a.5.5 0 0 1 .5.5V3h-7V1.5a.5.5 0 0 1 .5-.5H6V.5a.5.5 0 0 1 .5-.5ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm3 1v9h10V5H3Z" />
                                    </svg>
                                    {{ $lowongan->kategori_lowongan }}
                                </div>

                                <div class="meta-info">
                                    <span>{{ $lowongan->created_at->diffForHumans() }}</span>
                                    @if ($lowongan->expired_at && $lowongan->expired_at->isToday())
                                        <div class="expiring-soon">
                                            <i class="bi bi-hourglass-split"></i>
                                            Expiring soon
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                let toastEl = document.getElementById("successToast");
                let toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        @endif
        @if (session('warning'))
            document.addEventListener("DOMContentLoaded", function() {
                let toastEl = document.getElementById("warning");
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
        <div id="warning" class="toast align-items-center text-bg-warning border-0 p-2 shadow-lg" role="alert"
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
                    <strong>Warning!</strong> {{ session('warning') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
</body>

</html>
