<x-user.user-head></x-user.user-head>

<body>
    <x-user.user-header></x-user.user-header>
    <div class="hero-section">
        <div class="decoration-shape"></div>
        <h1 class="hero-title">Temukan perusahaan yang tepat untuk Anda</h1>
        <p class="hero-subtitle">Semua yang perlu diketahui tentang perusahaan, di satu tempat</p>
        <div class="decoration-circle"></div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($bookmarks as $bookmark)
                <div class="col-md-4 mb-3">
                    <div class="job-card">
                        <img src="{{ asset('storage/' . $bookmark->lowongan->perusahaan->img_perusahaan) }}"
                            alt="{{ $bookmark->lowongan->perusahaan->nama_perusahaan }}" class="perusahaan-logo">

                        <a href="{{ route('lowongan-detail', $bookmark->lowongan->id) }}"
                            class="job-title2">{{ $bookmark->lowongan->nama_lowongan }}</a>
                        <div class="perusahaan-name2">{{ $bookmark->lowongan->perusahaan->nama_perusahaan }}</div>

                        <div class="location2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="me-3" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            {{ $bookmark->lowongan->perusahaan->alamat_perusahaan }}
                        </div>

                        <div class="salary2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="me-3" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                <path
                                    d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                            </svg>
                            {{ $bookmark->lowongan->gaji_perbulan }}
                        </div>

                        <div class="category2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="me-3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 0a.5.5 0 0 1 .5.5V1h2V.5a.5.5 0 0 1 1 0V1h1.5a.5.5 0 0 1 .5.5V3h-7V1.5a.5.5 0 0 1 .5-.5H6V.5a.5.5 0 0 1 .5-.5ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm3 1v9h10V5H3Z" />
                            </svg>
                            {{ $bookmark->lowongan->kategori_lowongan }}
                        </div>

                        <div class="meta-info2">
                            <span>{{ $bookmark->lowongan->created_at->diffForHumans() }}</span>
                            @if ($bookmark->lowongan->expired_at && $lowongan->expired_at->isToday())
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
