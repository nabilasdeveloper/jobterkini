<x-admin.admin-head></x-admin.admin-head>
<x-admin.admin-sidebar></x-admin.admin-sidebar>
<x-admin.admin-header></x-admin.admin-header>

<div class="container-fluid">
    <h1 class="title">Kelola Data Lowongan Perusahaan</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $admin->nama }}</span>
    </p>
    <div class="">
        <form action="{{ route('admin.kelolaperusahaan.adds') }}" method="POST">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                        name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                    @error('nama_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Perusahaan</label>
                    <input type="text" class="form-control @error('email_perusahaan') is-invalid @enderror"
                        name="email_perusahaan" value="{{ old('email_perusahaan') }}" required>
                    @error('email_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Perusahaan</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>

<x-admin.admin-footer></x-admin.admin-footer>
