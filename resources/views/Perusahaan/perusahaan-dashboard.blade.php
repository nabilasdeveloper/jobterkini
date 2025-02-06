<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<div class="container-fluid">
    <h1 class="title">Dashboard</h1>
    <p class="mb-5">
        Selamat datang,
        <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
    </p>
    <div class="col-md-6">
        <div class="card bg-primary text-white overflow-hidden shadow-none">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                        <h5 class="fw-semibold mb-9 fs-5 text-white">Welcome, {{ $perusahaan->nama_perusahaan }}!</h5>
                        <p class="mb-9 opacity-75">
                            Selamat datang di website <u>JobTerkini.co</u>
                        </p>
                    </div>
                    <div class="col-sm-5">
                        <div class="position-relative">
                            <img src="{{ asset('assets/images/backgrounds/rocket.png') }}" alt="modernize-img"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">
                    Data Lowongan Pekerjaan
                </h5>
                <p class="mb-0"><span class="h2 text-secondary">20</span></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">
                    Data Pendaftar Lowongan
                </h5>
                <p class="mb-0"><span class="h2 text-secondary">16</span></p>
            </div>
        </div>
    </div>
</div>
<x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>
