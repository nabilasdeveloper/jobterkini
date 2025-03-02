<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - User</title>
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
                    <div class="col-md-8 col-lg-6 col-xxl-6">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="mb-5">
                                    <h1><strong>Job<span class="text-primary">Terkini.co</span></strong></h1>
                                    <h5 class=""><strong>Daftar sebagai</strong> <a href=""> User</a>
                                    </h5>
                                </div>

                                @if (session('success'))
                                    <p>{{ session('success') }}</p>
                                @endif

                                <form method="POST" action="{{ route('user-registerin') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                id="nama" aria-describedby="namaHelp" value="{{ old('nama') }}"
                                                autocomplete="off">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" aria-describedby="emailHelp" value="{{ old('email') }}"
                                                autocomplete="off">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Konfirmasi
                                            Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</button>
                                </form>
                                <p class="text-center">
                                    Sudah punya akun? <a href="{{ route('user-login') }}">Sign in</a>
                                </p>
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
