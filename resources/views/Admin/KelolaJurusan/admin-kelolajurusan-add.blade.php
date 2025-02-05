<x-admin.admin-head></x-admin.admin-head>
<x-admin.admin-sidebar></x-admin.admin-sidebar>
<x-admin.admin-header></x-admin.admin-header>

<style>
    button,
    input[type="submit"],
    input[type="reset"] {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }
</style>

<div class="container-fluid">
    <h1 class="title">Kelola Data Lowongan Perusahaan</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $admin->nama }}</span>
    </p>
    <div class="">
        <form action="{{ route('admin.kelolajurusan.adds') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Jurusan<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror"
                    name="nama_jurusan" value="{{ old('nama_jurusan') }}" required>
                @error('nama_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>


<x-admin.admin-footer></x-admin.admin-footer>
