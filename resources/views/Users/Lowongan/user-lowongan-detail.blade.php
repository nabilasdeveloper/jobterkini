<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JobTerkini.co - Perusahaan</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<style>
    /* Job Card Capek Bikin Ini Doang */
    .job-card {
        border: 2px solid #e8eef7;
        border-radius: 12px;
        padding: 1.5rem;
        position: relative;
        transition: all 0.2s ease;
    }

    .job-card:hover {
        border-color: #0055ff;
    }

    .perusahaan-logo {
        width: 100px;
        height: auto;
        margin-bottom: 1.25rem;
    }

    .job-title {
        color: black;
        font-size: 1.25rem;
        font-weight: 600;
        text-decoration: none;
        display: block;
    }

    .job-title:hover {
        text-decoration: underline;
        color: #6200ee;
    }

    .perusahaan-name {
        color: #878787;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .location {
        font-size: 0.8rem;
        color: #878787;
        margin-bottom: 0.5rem;
    }

    .salary {
        font-size: 0.8rem;
        color: #878787;
        margin-bottom: 0.5rem;
    }

    .category {
        font-size: 0.8rem;
        color: #878787;
        margin-bottom: 1rem;
    }

    .meta-info {
        color: #666;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .expiring-soon {
        color: #dc3545;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .bookmark-btn {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: none;
        border: none;
        color: #666;
        font-size: 1.25rem;
        padding: 0;
    }

    .bookmark-btn:hover {
        color: #0055ff;
    }
</style>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan - {{ $lowongan->nama_lowongan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --dark-text: #1e293b;
            --muted-text: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: var(--dark-text);
        }

        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.12);
        }

        .company-card {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
        }

        .company-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            position: relative;
        }

        .company-logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
            border-radius: 8px;
            background-color: white;
            padding: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .job-detail-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 0.25rem;
        }

        .company-name {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-card {
            background-color: white;
            border-radius: 12px;
            padding: 1.25rem;
            position: relative;
            border: 1px solid var(--border-color);
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .job-card .job-title {
            color: var(--primary-color);
            font-size: 1.1rem;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .job-card .job-title:hover {
            color: var(--primary-hover);
        }

        .job-card .perusahaan-name {
            font-weight: 500;
            color: var(--dark-text);
            margin-bottom: 0.75rem;
        }

        .bookmark-btn {
            position: absolute;
            right: 1rem;
            top: 1rem;
            background: none;
            border: none;
            color: var(--secondary-color);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .bookmark-btn:hover {
            color: var(--primary-color);
        }

        .job-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            color: var(--secondary-color);
            font-size: 0.95rem;
        }

        .job-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: var(--muted-text);
        }

        .expiring-soon {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 500;
        }

        .detail-section {
            margin-bottom: 2rem;
        }

        .detail-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--dark-text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .apply-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
            width: 100%;
            text-align: center;
            margin-top: 1rem;
        }

        .apply-btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .education-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .edu-tag {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .verified-badge {
            color: var(--success-color);
            display: inline-flex;
            align-items: center;
        }

        .job-alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .time-posted {
            color: var(--secondary-color);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rich-content ul {
            padding-left: 1.25rem;
        }

        .rich-content ul li {
            margin-bottom: 0.5rem;
        }

        .related-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }
    </style>
</head>

<body>
    <x-user.user-header></x-user.user-header>

    <div class="main-container">
        <!-- Notifications -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Gagal!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Left Column - Main Job Detail -->
            <div class="col-lg-8 order-2 order-lg-1">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="job-detail-header">
                            <img src="{{ asset('storage/' . $lowongan->perusahaan->img_perusahaan) }}"
                                alt="{{ $lowongan->perusahaan->nama_perusahaan }}" class="company-logo">
                            <div>
                                <h1 class="job-title">{{ $lowongan->nama_lowongan }}</h1>
                                <div class="company-name">
                                    {{ $lowongan->perusahaan->nama_perusahaan }}
                                    <span class="verified-badge">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="education-tags">
                            <div class="edu-tag">
                                <i class="bi bi-mortarboard me-1"></i>
                                {{ $lowongan->jenjang_pendidikan_lowongan }}
                            </div>
                            <div class="edu-tag">
                                <i class="bi bi-journal-text me-1"></i>
                                {{ $lowongan->jurusan_pendidikan_lowongan }}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="job-info-item">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $lowongan->perusahaan->alamat_perusahaan }}
                                </div>
                                <div class="job-info-item">
                                    <i class="bi bi-briefcase me-2"></i>
                                    {{ $lowongan->kategori_lowongan }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="job-info-item">
                                    <i class="bi bi-clock me-2"></i>
                                    {{ $lowongan->waktu_bekerja }}
                                </div>
                                <div class="job-info-item">
                                    <i class="bi bi-currency-dollar me-2"></i>
                                    {{ $lowongan->gaji_perbulan }}
                                </div>
                            </div>
                        </div>

                        <div class="time-posted">
                            <i class="bi bi-calendar-check"></i>
                            Diposting {{ \Carbon\Carbon::parse($lowongan->created_at)->locale('id')->diffForHumans() }}
                        </div>

                        <div class="detail-section">
                            <h2 class="detail-section-title">
                                <i class="bi bi-list-check text-primary me-2"></i>
                                Persyaratan
                            </h2>
                            <div class="rich-content">
                                {!! $lowongan->persyaratan_lowongan !!}
                            </div>
                        </div>

                        <div class="detail-section">
                            <h2 class="detail-section-title">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Rincian Pekerjaan
                            </h2>
                            <div class="rich-content">
                                {!! $lowongan->rincian_lowongan !!}
                            </div>
                        </div>

                        @if (!$sudahMelamar)
                            <a href="{{ route('user-lamaran-create', $lowongan->id) }}" class="apply-btn btn">
                                <i class="bi bi-send me-2"></i>
                                Kirim Lamaran Sekarang
                            </a>
                        @else
                            <div class="alert alert-warning job-alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-info-circle-fill me-2"></i>
                                    <span>Anda sudah melamar di lowongan ini.</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Related Jobs -->
            <div class="col-lg-4 order-1 order-lg-2">
                <div class="card mb-4">
                    <div class="company-header">
                        <h3 class="m-0">Lowongan Lainnya</h3>
                        <p class="mb-0 mt-2 opacity-75">dari {{ $lowongan->perusahaan->nama_perusahaan }}</p>
                    </div>
                    <div class="card-body p-3">
                        @forelse ($lowonganLain as $item)
                            <div class="job-card">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('storage/' . $item->perusahaan->img_perusahaan) }}"
                                        alt="{{ $item->perusahaan->nama_perusahaan }}" class="me-2"
                                        style="width: 32px; height: 32px; object-fit: cover; border-radius: 4px;">
                                    <span class="perusahaan-name">{{ $item->perusahaan->nama_perusahaan }}</span>
                                    <button class="bookmark-btn ms-auto">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </div>

                                <a href="{{ route('lowongan-detail', $item->id) }}" class="job-title">
                                    {{ $item->nama_lowongan }}
                                </a>

                                <div class="job-info-item">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $item->perusahaan->alamat_perusahaan }}
                                </div>

                                <div class="job-info-item">
                                    <i class="bi bi-currency-dollar me-2"></i>
                                    {{ $item->gaji_perbulan }}
                                </div>

                                <div class="job-info-item">
                                    <i class="bi bi-briefcase me-2"></i>
                                    {{ $item->kategori_lowongan }}
                                </div>

                                <div class="job-meta">
                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                    @if ($item->expired_at && $item->expired_at->isToday())
                                        <div class="expiring-soon">
                                            <i class="bi bi-hourglass-split"></i>
                                            Segera berakhir
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info job-alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Tidak ada lowongan lain dari perusahaan ini.
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3">Tentang Perusahaan</h4>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('storage/' . $lowongan->perusahaan->img_perusahaan) }}"
                                alt="{{ $lowongan->perusahaan->nama_perusahaan }}"
                                style="width: 48px; height: 48px; object-fit: cover; border-radius: 6px;"
                                class="me-3">
                            <div>
                                <h5 class="mb-0">{{ $lowongan->perusahaan->nama_perusahaan }}</h5>
                                <span class="text-muted small">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    {{ $lowongan->perusahaan->alamat_perusahaan }}
                                </span>
                            </div>
                        </div>

                        <div class="company-stats mb-3">
                            <div class="row g-2 text-center">
                                <div class="col-4">
                                    <div class="p-2 border rounded">
                                        <div class="fw-bold text-primary">{{ count($lowonganLain) + 1 }}</div>
                                        <div class="small text-muted">Lowongan</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded">
                                        <div class="fw-bold text-primary">4.8</div>
                                        <div class="small text-muted">Rating</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded">
                                        <div class="fw-bold text-primary">100+</div>
                                        <div class="small text-muted">Karyawan</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-outline-primary btn-sm w-100">
                            <i class="bi bi-building me-1"></i>
                            Lihat Profil Perusahaan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Bookmark functionality
        document.querySelectorAll('.bookmark-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('bi-bookmark')) {
                    icon.classList.remove('bi-bookmark');
                    icon.classList.add('bi-bookmark-fill');
                    icon.style.color = '#2563eb';
                } else {
                    icon.classList.remove('bi-bookmark-fill');
                    icon.classList.add('bi-bookmark');
                    icon.style.color = '';
                }
            });
        });
    </script>
</body>

</html>

</html>
