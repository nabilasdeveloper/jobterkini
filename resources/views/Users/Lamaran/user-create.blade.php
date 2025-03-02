<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Lamaran Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #e11d48;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #1e293b;
        }

        .app-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .application-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .page-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .company-logo {
            height: 40px;
            margin-right: 1rem;
        }

        .job-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .instruction-text {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .form-section {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .form-label {
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .required-indicator {
            color: var(--accent-color);
            font-weight: 600;
        }

        .form-control {
            border: 1px solid #cbd5e1;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .file-upload-wrapper {
            position: relative;
            margin-top: 0.5rem;
        }

        .file-upload-info {
            display: block;
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-outline-secondary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #f1f5f9;
            color: #475569;
        }

        .application-progress {
            display: flex;
            margin-bottom: 2rem;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            padding: 1rem 0.5rem;
            position: relative;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 40px;
            right: -50%;
            width: 100%;
            height: 2px;
            background-color: var(--border-color);
            z-index: 1;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e2e8f0;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .active-step .step-number {
            background-color: var(--primary-color);
            color: white;
        }

        .completed-step .step-number {
            background-color: #10b981;
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .active-step .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }
    </style>
</head>

<body>
    <x-user.user-header></x-user.user-header>

    <div class="app-container">
        <div class="application-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title">Formulir Lamaran Kerja</h1>
                <div class="d-flex align-items-center">
                    <img src="https://placeholder.pics/svg/120x40/DEDEDE/555555/company%20logo" alt="Company Logo"
                        class="company-logo">
                </div>
            </div>

            <h2 class="job-title">{{ $lowongan->nama_lowongan }}</h2>
            <p class="instruction-text">
                <i class="bi bi-info-circle-fill me-2 text-primary"></i>
                Silakan lengkapi formulir lamaran di bawah ini. Pastikan dokumen yang diunggah sesuai dengan ketentuan.
            </p>

            <div class="application-progress">
                <div class="progress-step active-step">
                    <div class="step-number">1</div>
                    <div class="step-label">Dokumen Lamaran</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">2</div>
                    <div class="step-label">Review</div>
                </div>
                <div class="progress-step">
                    <div class="step-number">3</div>
                    <div class="step-label">Selesai</div>
                </div>
            </div>

            <form action="{{ route('user-lamaran-store', $lowongan->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <!-- Surat Lamaran -->
                <div class="form-section">
                    <label for="surat_lamaran" class="form-label">
                        <i class="bi bi-file-earmark-text me-2"></i>Surat Lamaran
                        <span class="required-indicator">*</span>
                    </label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="surat_lamaran" id="surat_lamaran"
                            class="form-control @error('surat_lamaran') is-invalid @enderror" required>
                        <span class="file-upload-info">Format yang diterima: PDF, DOC, DOCX (Maks. 5MB)</span>
                        @error('surat_lamaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- CV -->
                <div class="form-section">
                    <label for="cv" class="form-label">
                        <i class="bi bi-file-person me-2"></i>Curriculum Vitae
                        <span class="required-indicator">*</span>
                    </label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="cv" id="cv"
                            class="form-control @error('cv') is-invalid @enderror" required>
                        <span class="file-upload-info">Format yang diterima: PDF, DOC, DOCX (Maks. 5MB)</span>
                        @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Dokumen Lainnya -->
                <div class="form-section">
                    <label for="dokumen_lainnya" class="form-label">
                        <i class="bi bi-file-earmark-plus me-2"></i>Dokumen Pendukung
                    </label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="dokumen_lainnya" id="dokumen_lainnya"
                            class="form-control @error('dokumen_lainnya') is-invalid @enderror">
                        <span class="file-upload-info">Sertifikat, portofolio, atau dokumen pendukung lainnya (Opsional,
                            Maks. 10MB)</span>
                        @error('dokumen_lainnya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('lowongan-detail', $lowongan->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Kirim Lamaran
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center text-muted small">
            <p>© 2025 Sistem Rekrutmen | Semua informasi akan dijaga kerahasiaannya</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple file upload preview
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2);
                    const fileInfo = this.nextElementSibling;
                    if (fileInfo) {
                        const originalText = fileInfo.getAttribute('data-original-text') || fileInfo
                            .textContent;
                        if (!fileInfo.getAttribute('data-original-text')) {
                            fileInfo.setAttribute('data-original-text', originalText);
                        }
                        fileInfo.innerHTML =
                            `<strong>${this.files[0].name}</strong> (${fileSize} MB)<br>${originalText}`;
                    }
                }
            });
        });

        @if (session('error'))
            document.addEventListener("DOMContentLoaded", function() {
                let toastEl = document.getElementById("error");
                let toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        @endif
    </script>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="errpr" class="toast align-items-center text-bg-danger border-0 p-2 shadow-lg" role="alert"
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
</body>

</html>
