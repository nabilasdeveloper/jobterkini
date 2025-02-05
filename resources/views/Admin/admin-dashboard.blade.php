<x-admin.admin-head></x-admin.admin-head>
<x-admin.admin-sidebar></x-admin.admin-sidebar>
<x-admin.admin-header></x-admin.admin-header>

<div class="container-fluid">
    <h1 class="title">Dashboard</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $admin->nama }}</span>
    </p>
    <div class="col-6">
        <div class="card bg-primary text-white overflow-hidden shadow-none">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                        <h5 class="fw-semibold mb-9 fs-5 text-white">Welcome, Super Admin!</h5>
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

<x-admin.admin-footer></x-admin.admin-footer>
