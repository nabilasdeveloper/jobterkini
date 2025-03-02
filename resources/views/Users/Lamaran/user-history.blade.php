<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Lamaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-light: #dbeafe;
            --primary-dark: #1e40af;
            --secondary-color: #f97316;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --neutral-50: #f9fafb;
            --neutral-100: #f3f4f6;
            --neutral-200: #e5e7eb;
            --neutral-300: #d1d5db;
            --neutral-500: #6b7280;
            --neutral-700: #374151;
            --neutral-800: #1f2937;
            --neutral-900: #111827;
        }
        
        * {
            font-family: "Poppins", sans-serif;
        }
        
        body {
            background-color: var(--neutral-50);
            color: var(--neutral-800);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 4rem 2rem;
            border-radius: 0 0 30px 30px;
            text-align: center;
            position: relative;
            margin-bottom: 2rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .hero-title {
            color: white;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 10;
        }
        
        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 10;
        }
        
        .decoration-shape {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            transform: rotate(45deg);
            z-index: 1;
        }
        
        .decoration-circle {
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 180px;
            height: 180px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
        }
        
        .filter-container {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }
        
        .filter-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--neutral-800);
        }
        
        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 500;
            background-color: var(--neutral-100);
            color: var(--neutral-700);
            border: none;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
        }
        
        .filter-btn:hover {
            background-color: var(--neutral-200);
        }
        
        .filter-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .application-container {
            margin-bottom: 3rem;
        }
        
        .application-card {
            background-color: white;
            border-radius: 15px;
            border: none;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 1.5rem;
        }
        
        .application-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-company-logo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        
        .card-job-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--neutral-800);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }
        
        .card-company-name {
            font-size: 0.95rem;
            color: var(--neutral-500);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .card-date {
            font-size: 0.85rem;
            color: var(--neutral-500);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }
        
        .status-approved {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }
        
        .status-rejected {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }
        
        .status-interviewing {
            background-color: rgba(249, 115, 22, 0.1);
            color: var(--secondary-color);
        }
        
        .card-footer {
            background-color: transparent;
            border-top: 1px solid var(--neutral-100);
            padding: 1rem 1.5rem;
        }
        
        .btn-view {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }
        
        .btn-view:hover {
            color: var(--primary-dark);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }
        
        .empty-icon {
            font-size: 3.5rem;
            color: var(--neutral-300);
            margin-bottom: 1.5rem;
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--neutral-800);
            margin-bottom: 1rem;
        }
        
        .empty-text {
            color: var(--neutral-500);
            max-width: 500px;
            margin: 0 auto 1.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .toast-container {
            z-index: 1050;
        }
        
        .toast {
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        
        .text-bg-danger {
            background-color: var(--danger-color) !important;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-section {
                padding: 3rem 1rem;
            }
        }
    </style>
</head>
<body>
    <x-user.user-header></x-user.user-header>
    
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="decoration-shape"></div>
        <h1 class="hero-title">Riwayat Lamaran Anda</h1>
        <p class="hero-subtitle">Pantau status lamaran pekerjaan yang telah Anda ajukan</p>
        <div class="decoration-circle"></div>
    </div>
    
    <div class="container">
        <!-- Filters -->
        <div class="filter-container">
            <h5 class="filter-title">Filter berdasarkan waktu</h5>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="today">Hari Ini</button>
                <button class="filter-btn" data-filter="yesterday">Kemarin</button>
                <button class="filter-btn" data-filter="week">1 Minggu Terakhir</button>
                <button class="filter-btn" data-filter="month">1 Bulan Terakhir</button>
            </div>
        </div>
        
        @if ($lamaran->isEmpty())
            <!-- Empty State -->
            <div class="empty-state">
                <i class="bi bi-clipboard-x empty-icon"></i>
                <h3 class="empty-title">Belum Ada Lamaran</h3>
                <p class="empty-text">Anda belum pernah mengajukan lamaran pekerjaan. Telusuri lowongan yang tersedia dan mulai melamar pekerjaan yang sesuai dengan kualifikasi Anda.</p>
                <a href="{{ route('job-listings') }}" class="btn btn-primary">
                    <i class="bi bi-search me-2"></i>Telusuri Lowongan
                </a>
            </div>
        @else
            <!-- Application Cards -->
            <div class="application-container">
                <div class="row" id="application-list">
                    @foreach ($lamaran as $item)
                        <div class="col-lg-4 col-md-6 mb-4" data-date="{{ $item->created_at }}">
                            <div class="application-card">
                                <div class="card-body p-4">
                                    <!-- Add company logo if available -->
                                    @if (isset($item->lowongan->perusahaan->img_perusahaan))
                                        <img src="{{ asset('storage/' . $item->lowongan->perusahaan->img_perusahaan) }}" class="card-company-logo" alt="Company Logo">
                                    @else
                                        <div class="card-company-logo d-flex align-items-center justify-content-center bg-primary-light">
                                            <i class="bi bi-building text-primary"></i>
                                        </div>
                                    @endif
                                    
                                    <h3 class="card-job-title">{{ $item->lowongan->nama_lowongan }}</h3>
                                    
                                    <div class="card-company-name">
                                        <i class="bi bi-building me-1"></i>
                                        {{ $item->lowongan->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                                    </div>
                                    
                                    <div class="card-date">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        Dilamar pada: {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                    </div>
                                    
                                    <!-- Status can be changed based on actual status from database -->
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <span class="status-badge status-pending">Diproses</span>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <a href="{{ route('lowongan-detail', $item->lowongan->id) }}" class="btn-view">
                                        <i class="bi bi-eye"></i> Lihat Detail Lowongan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    
    <!-- Toast Notifications -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="error" class="toast align-items-center text-bg-danger border-0 p-2 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex align-items-center">
                <div class="p-2">
                    <i class="bi bi-exclamation-circle-fill fs-5"></i>
                </div>
                <div class="toast-body">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toast initialization
            @if (session('error'))
                let toastEl = document.getElementById("error");
                let toast = new bootstrap.Toast(toastEl);
                toast.show();
            @endif
            
            // Date filtering functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            const applicationItems = document.querySelectorAll('#application-list > div');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    // Show or hide application items based on filter
                    applicationItems.forEach(item => {
                        const dateStr = item.getAttribute('data-date');
                        const applicationDate = new Date(dateStr);
                        const currentDate = new Date();
                        
                        // Reset the hours, minutes, seconds and milliseconds for comparing dates
                        currentDate.setHours(0, 0, 0, 0);
                        
                        // Calculate yesterday
                        const yesterday = new Date(currentDate);
                        yesterday.setDate(currentDate.getDate() - 1);
                        
                        // Calculate one week ago
                        const oneWeekAgo = new Date(currentDate);
                        oneWeekAgo.setDate(currentDate.getDate() - 7);
                        
                        // Calculate one month ago
                        const oneMonthAgo = new Date(currentDate);
                        oneMonthAgo.setMonth(currentDate.getMonth() - 1);
                        
                        let visible = false;
                        
                        switch(filterValue) {
                            case 'all':
                                visible = true;
                                break;
                            case 'today':
                                // Application date is today
                                visible = applicationDate.toDateString() === currentDate.toDateString();
                                break;
                            case 'yesterday':
                                // Application date is yesterday
                                visible = applicationDate.toDateString() === yesterday.toDateString();
                                break;
                            case 'week':
                                // Application date is within the last week
                                visible = applicationDate >= oneWeekAgo;
                                break;
                            case 'month':
                                // Application date is within the last month
                                visible = applicationDate >= oneMonthAgo;
                                break;
                        }
                        
                        if (visible) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Check if no applications are visible after filtering
                    checkEmptyResults();
                });
            });
            
            // Function to check if no applications are visible after filtering
            function checkEmptyResults() {
                let visibleItems = 0;
                
                applicationItems.forEach(item => {
                    if (item.style.display !== 'none') {
                        visibleItems++;
                    }
                });
                
                const applicationList = document.getElementById('application-list');
                const emptyResultMessage = document.getElementById('empty-results-message');
                
                if (visibleItems === 0 && !emptyResultMessage) {
                    // Create empty results message
                    const emptyMessage = document.createElement('div');
                    emptyMessage.id = 'empty-results-message';
                    emptyMessage.className = 'col-12 text-center py-5';
                    emptyMessage.innerHTML = `
                        <i class="bi bi-search fs-1 text-muted mb-3"></i>
                        <h4>Tidak ada lamaran dalam periode ini</h4>
                        <p class="text-muted">Silakan pilih filter lain untuk melihat lamaran Anda.</p>
                    `;
                    
                    applicationList.appendChild(emptyMessage);
                } else if (visibleItems > 0 && emptyResultMessage) {
                    // Remove empty results message
                    emptyResultMessage.remove();
                }
            }
        });
    </script>
</body>
</html>