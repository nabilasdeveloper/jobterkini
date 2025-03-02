<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perusahaan->nama_perusahaan }} - Company Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #f3f4f6;
            --accent-color: #ffb400;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-primary);
            background-color: #fafafa;
            line-height: 1.6;
        }

        .company-header {
            padding: 2.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            background-color: white;
        }

        .company-logo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .company-name {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .rating {
            color: var(--accent-color);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .rating a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .rating a:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 6px;
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .main-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .nav-tabs {
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 2rem;
        }

        .nav-tabs .nav-link {
            color: var(--text-secondary);
            font-weight: 600;
            padding: 1rem 1.5rem;
            border: none;
            position: relative;
            background: transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background: transparent;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 3px 3px 0 0;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            border-left: 4px solid var(--primary-color);
            padding-left: 1rem;
        }

        .company-info-table th {
            width: 30%;
            color: var(--text-secondary);
            font-weight: 600;
            padding: 0.75rem 0;
        }

        .company-info-table td {
            padding: 0.75rem 0;
        }

        .company-info-table a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .company-info-table a:hover {
            text-decoration: underline;
        }

        .company-description {
            line-height: 1.75;
            color: var(--text-secondary);
        }

        .job-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1.5rem;
            height: 100%;
            transition: all 0.2s ease-in-out;
            background-color: white;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-color: #d1d5db;
        }

        .job-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
        }

        .job-title:hover {
            color: var(--primary-color);
        }

        .job-info {
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .job-info i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        .badge-custom {
            background-color: var(--secondary-color);
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .no-jobs {
            text-align: center;
            padding: 3rem 0;
            color: var(--text-secondary);
            background-color: #f9fafb;
            border-radius: 8px;
        }

        .no-jobs i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #d1d5db;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <!-- Company Header -->
        <div class="company-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $perusahaan->img_perusahaan) }}" class="company-logo"
                            alt="{{ $perusahaan->nama_perusahaan }} Logo">
                        <div class="ms-4">
                            <h1 class="company-name">{{ $perusahaan->nama_perusahaan }}</h1>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="ms-2">4.3</span> <span class="text-secondary">(berdasarkan <a
                                        href="#">126 ulasan</a>)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Tulis Ulasan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="main-container">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="companyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tentang-tab" data-bs-toggle="tab" data-bs-target="#tentang"
                            type="button" role="tab" aria-controls="tentang" aria-selected="true">
                            <i class="bi bi-building me-2"></i>Tentang
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="tab" data-bs-target="#pekerjaan"
                            type="button" role="tab" aria-controls="pekerjaan" aria-selected="false">
                            <i class="bi bi-briefcase me-2"></i>Lowongan Pekerjaan
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="companyTabsContent">
                    <!-- Tentang Tab -->
                    <div class="tab-pane fade show active" id="tentang" role="tabpanel" aria-labelledby="tentang-tab">
                        <h2 class="section-title">Sekilas tentang perusahaan</h2>

                        <table class="table table-borderless company-info-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="bi bi-globe me-2"></i>Situs web</th>
                                    <td><a href="{{ $perusahaan->website_perusahaan }}"
                                            target="_blank">{{ $perusahaan->website_perusahaan }}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="bi bi-diagram-3 me-2"></i>Industri</th>
                                    <td>{{ $perusahaan->jenis_industri_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="bi bi-people me-2"></i>Ukuran perusahaan</th>
                                    <td>{{ $perusahaan->ukuran_perusahaan }} Pekerja</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="bi bi-geo-alt me-2"></i>Lokasi utama</th>
                                    <td>{{ $perusahaan->alamat_perusahaan }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-5">
                            <h2 class="section-title">Deskripsi Perusahaan</h2>
                            <div class="company-description">
                                {!! $perusahaan->deskripsi_perusahaan !!}
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan Tab -->
                    <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
                        <h2 class="section-title">Lowongan Pekerjaan Tersedia</h2>

                        @if ($perusahaan->lowongan->count() > 0)
                            <div class="row g-4">
                                @foreach ($perusahaan->lowongan as $lowongan)
                                    <div class="col-md-4">
                                        <div class="job-card">
                                            <a href="{{ route('lowongan-detail', $lowongan->id) }}" class="job-title">
                                                {{ $lowongan->nama_lowongan }}
                                            </a>
                                            <div class="job-info">
                                                <i class="bi bi-geo-alt"></i>
                                                <span>{{ $perusahaan->alamat_perusahaan }}</span>
                                            </div>
                                            <div class="job-info">
                                                <i class="bi bi-cash-stack"></i>
                                                <span>{{ $lowongan->gaji_perbulan }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <span class="badge-custom">Full Time</span>
                                                <span class="badge-custom">On-site</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="no-jobs">
                                <i class="bi bi-search"></i>
                                <h4>Belum ada lowongan tersedia</h4>
                                <p>Saat ini belum ada lowongan yang dibuka oleh perusahaan ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
