<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Pendaftar Lowongan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light-bg: #f9fafb;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-bg);
            color: #334155;
        }

        .page-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }

        .welcome-text {
            margin-bottom: 2rem;
            color: #64748b;
        }

        .company-name {
            font-weight: 600;
            color: var(--primary);
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #334155;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .dashboard-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: var(--card-shadow);
            border: none;
            overflow: hidden;
        }

        .table-custom {
            margin-bottom: 0;
        }

        .table-custom th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-custom td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
        }

        .applicant-name {
            font-weight: 600;
            color: var(--primary);
            text-decoration: none;
        }

        .applicant-name:hover {
            text-decoration: underline;
            color: var(--primary-dark);
        }

        .document-link {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            background-color: #f1f5f9;
            border-radius: 0.375rem;
            color: #475569;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .document-link:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .document-link i {
            margin-right: 0.5rem;
        }

        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-badge.processing {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-badge.accepted {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-badge.rejected {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .status-form {
            display: flex;
            gap: 0.5rem;
        }

        .status-select {
            padding: 0.375rem 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            color: #475569;
            background-color: white;
            min-width: 120px;
        }

        .save-btn {
            padding: 0.375rem 0.75rem;
            background-color: var(--success);
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .save-btn:hover {
            background-color: #059669;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            margin-top: 1.5rem;
        }

        .back-btn:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .back-btn i {
            margin-right: 0.5rem;
        }

        .empty-state {
            padding: 3rem;
            text-align: center;
            background-color: #fffbeb;
            border-radius: 0.75rem;
            color: #92400e;
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #f59e0b;
        }

        .empty-state-text {
            font-size: 1.125rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .table-responsive {
                border-radius: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
    <x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
    <x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

    <div class="container-fluid">
        <h1 class="page-title">Kelola Data Pendaftar Lowongan</h1>
        <p class="welcome-text">
            Selamat datang kembali, <span class="company-name">{{ $perusahaan->nama_perusahaan }}</span>
        </p>

        <h2 class="job-title">{{ $lowongan->nama_lowongan }}</h2>

        @if ($pelamarList->isEmpty())
            <div class="empty-state">
                <i class="fas fa-search"></i>
                <p class="empty-state-text">Belum ada pelamar untuk lowongan ini.</p>
            </div>
        @else
            <div class="dashboard-card">
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>Nama Pelamar</th>
                                <th>Surat Lamaran</th>
                                <th>CV</th>
                                <th>Dokumen Lainnya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamarList as $pelamar)
                                <tr>
                                    <td>
                                        <a href="{{ route('perusahaan.kelolapelamar.user.detail', $pelamar->users->id) }}"
                                            class="applicant-name">
                                            {{ $pelamar->users->nama }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset('storage/' . $pelamar->surat_lamaran) }}" target="_blank"
                                            class="document-link">
                                            <i class="fas fa-file-alt"></i> Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset('storage/' . $pelamar->cv) }}" target="_blank"
                                            class="document-link">
                                            <i class="fas fa-file-alt"></i> Lihat
                                        </a>
                                    </td>
                                    <td>
                                        @if ($pelamar->dokumen_lainnya)
                                            <a href="{{ asset('storage/' . $pelamar->dokumen_lainnya) }}"
                                                target="_blank" class="document-link">
                                                <i class="fas fa-file-alt"></i> Lihat
                                            </a>
                                        @else
                                            <span class="status-badge"
                                                style="background-color: #e2e8f0; color: #64748b">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="status-badge 
                      {{ $pelamar->status == 'Diterima' ? 'accepted' : ($pelamar->status == 'Ditolak' ? 'rejected' : 'processing') }}">
                                            {{ $pelamar->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('perusahaan.kelolapelamar.update', $pelamar->id) }}"
                                            method="POST" class="status-form">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="status-select">
                                                <option value="Diproses"
                                                    {{ $pelamar->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                                </option>
                                                <option value="Diterima"
                                                    {{ $pelamar->status == 'Diterima' ? 'selected' : '' }}>Diterima
                                                </option>
                                                <option value="Ditolak"
                                                    {{ $pelamar->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                                </option>
                                            </select>
                                            <button type="submit" class="save-btn">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <a href="{{ route('perusahaan.kelolapelamar') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
