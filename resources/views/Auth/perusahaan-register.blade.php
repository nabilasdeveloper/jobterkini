<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Perusahaan</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>
<style>
    .warna-bg {
        background-color: rgb(0, 0, 186);
    }
</style>

<body class="warna-bg">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="mb-5">
                                    <h1><strong>Job<span class="text-primary">Terkini.co</span></strong></h1>
                                    <h5><strong>Daftar sebagai</strong> <a href=""> Perusahaan</a></h5>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif

                                <form method="POST" action="{{ route('perusahaan.register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                        <input type="email" class="form-control" name="email_perusahaan" id="email_perusahaan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="file_verifikasi" class="form-label">Upload Dokumen Verifikasi</label>
                                        <input type="file" class="form-control" name="file_verifikasi" id="file_verifikasi" required>
                                        <small class="text-muted">Unggah dokumen yang membuktikan legalitas perusahaan.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                                </form>
                                <p class="text-center">Sudah punya akun? <a href="{{ route('perusahaan.login') }}">Login di sini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
