<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelamar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #818cf8;
            --primary-dark: #4338ca;
            --secondary: #64748b;
            --success: #10b981;
            --light-bg: #f8fafc;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --heading-color: #1e293b;
            --text-color: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
        }

        .container-fluid {
            padding: 2rem;
        }

        /* Main Card */
        .profile-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        /* Card Header */
        .profile-header {
            background-color: var(--primary);
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-title {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: white;
        }

        .back-button i {
            margin-right: 0.5rem;
        }

        /* Tabs */
        .profile-tabs {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            background-color: #f1f5f9;
            padding: 0 1rem;
        }

        .tab-button {
            padding: 1rem 1.5rem;
            font-weight: 600;
            background: transparent;
            border: none;
            color: var(--text-muted);
            position: relative;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .tab-button:hover {
            color: var(--primary);
        }

        .tab-button.active {
            color: var(--primary);
        }

        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary);
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .tab-button i {
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        /* Tab Content */
        .tab-content {
            display: none;
            padding: 2rem;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Profile Section */
        .profile-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .profile-section {
                flex-direction: row;
            }
        }

        /* Profile Image */
        .profile-image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        @media (min-width: 768px) {
            .profile-image-container {
                width: 25%;
            }
        }

        .profile-avatar {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 4px solid white;
            background-color: white;
        }

        .avatar-placeholder {
            width: 180px;
            height: 180px;
            background-color: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 4px solid white;
        }

        .avatar-letter {
            font-size: 4rem;
            color: var(--primary);
            font-weight: 700;
        }

        /* Profile Info */
        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 700;
            color: var(--heading-color);
            margin-top: 0;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-light);
            display: inline-block;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .info-item {
            background-color: #f8fafc;
            padding: 1.25rem;
            border-radius: 0.75rem;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .info-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
            border-color: var(--primary-light);
        }

        .info-label {
            display: block;
            color: var(--text-muted);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .info-value {
            color: var(--heading-color);
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Section titles */
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--heading-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-light);
            display: inline-block;
        }

        /* Cards for education and experience */
        .card-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .card-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .card-item {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .card-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
            border-color: var(--primary-light);
        }

        .card-header-flex {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        @media (min-width: 640px) {
            .card-header-flex {
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-start;
            }
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
        }

        .card-subtitle {
            color: var(--text-muted);
            margin-top: 0.25rem;
            font-size: 0.875rem;
        }

        .card-badge {
            display: inline-flex;
            align-items: center;
            background-color: #ede9fe;
            color: var(--primary-dark);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .card-badge i {
            margin-right: 0.5rem;
        }

        .card-content {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Empty states */
        .empty-message {
            background-color: #f1f5f9;
            padding: 2.5rem;
            border-radius: 0.75rem;
            text-align: center;
            color: var(--text-muted);
            border: 1px dashed #cbd5e1;
        }

        .empty-message i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #cbd5e1;
        }

        .empty-text {
            font-size: 1.125rem;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
    <x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
    <x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

    <div class="container-fluid">
        <div class="profile-card">
            <!-- Header -->
            <div class="profile-header">
                <h1 class="profile-title">Detail Pelamar</h1>
                <a href="{{ route('perusahaan.kelolapelamar') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Navigation Tabs -->
            <div class="profile-tabs">
                <button class="tab-button active" data-tab="profile">
                    <i class="fas fa-user"></i> Profil
                </button>
                <button class="tab-button" data-tab="education">
                    <i class="fas fa-graduation-cap"></i> Pendidikan
                </button>
                <button class="tab-button" data-tab="experience">
                    <i class="fas fa-briefcase"></i> Pengalaman
                </button>
            </div>

            <!-- Profile Tab Content -->
            <div id="profile" class="tab-content active">
                <div class="profile-section">
                    <!-- Profile Image -->
                    <div class="profile-image-container">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->nama }}"
                                class="profile-avatar">
                        @else
                            <div class="avatar-placeholder">
                                <span class="avatar-letter">{{ substr($user->nama, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- User Info -->
                    <div class="profile-info">
                        <h2 class="profile-name">{{ $user->nama }}</h2>

                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-quote-left"></i> Deskripsi Diri
                                </span>
                                <div class="info-value">{{ $user->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                            </div>

                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-map-marker-alt"></i> Alamat
                                </span>
                                <div class="info-value">{{ $user->alamat ?? 'Tidak ada alamat' }}</div>
                            </div>

                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-phone"></i> Kontak
                                </span>
                                <div class="info-value">{{ $user->contact ?? 'Tidak ada kontak' }}</div>
                            </div>

                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-envelope"></i> Email
                                </span>
                                <div class="info-value">{{ $user->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education Tab Content -->
            <div id="education" class="tab-content">
                <h3 class="section-title">Riwayat Pendidikan</h3>

                @if ($user->pendidikan && count($user->pendidikan) > 0)
                    <div class="card-list">
                        @foreach ($user->pendidikan as $pendidikan)
                            <div class="card-item">
                                <div class="card-header-flex">
                                    <div>
                                        <h4 class="card-title">{{ $pendidikan->pendidikan_terakhir }}</h4>
                                        <p class="card-subtitle">{{ $pendidikan->universitas }}</p>
                                    </div>
                                    <div>
                                        <span class="card-badge">
                                            <i class="fas fa-calendar-alt"></i> Lulus {{ $pendidikan->tahun_lulus }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-message">
                        <i class="fas fa-book"></i>
                        <p class="empty-text">Tidak ada data pendidikan</p>
                    </div>
                @endif
            </div>

            <!-- Experience Tab Content -->
            <div id="experience" class="tab-content">
                <h3 class="section-title">Pengalaman Kerja</h3>

                @if ($user->pengalaman && count($user->pengalaman) > 0)
                    <div class="card-list">
                        @foreach ($user->pengalaman as $pengalaman)
                            <div class="card-item">
                                <div class="card-header-flex">
                                    <div>
                                        <h4 class="card-title">{{ $pengalaman->perusahaan }}</h4>
                                        <p class="card-subtitle">Bidang: {{ $pengalaman->bidang }}</p>
                                    </div>
                                    <div>
                                        <span class="card-badge">
                                            <i class="fas fa-calendar-day"></i>
                                            {{ $pengalaman->tahun_mulai }} -
                                            {{ $pengalaman->tahun_selesai ?? 'Sekarang' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p>{{ $pengalaman->deskripsi_pekerjaan }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-message">
                        <i class="fas fa-briefcase"></i>
                        <p class="empty-text">Tidak ada data pengalaman kerja</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
</body>

</html>
