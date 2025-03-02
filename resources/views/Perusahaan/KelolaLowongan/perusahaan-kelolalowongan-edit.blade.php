<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<div class="container-fluid">
    <h1 class="title">Kelola Data Lowongan Perusahaan</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
    </p>

    <form action="{{ route('perusahaan.kelolalowongan.update') }}" method="POST">
        @csrf
        <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">

        <div class="mb-3">
            <label for="nama_lowongan" class="form-label">Nama Lowongan</label>
            <input type="text" class="form-control" name="nama_lowongan" value="{{ $lowongan->nama_lowongan }}"
                required>
        </div>

        <div class="mb-3">
            <label for="jenjang_pendidikan_lowongan" class="form-label">Jenjang Pendidikan</label>
            <select class="form-select" name="jenjang_pendidikan_lowongan" required>
                <option value="">-- Pilih Jenjang Pendidikan --</option>
                <option value="Semua Jenjang Pendidikan"
                    {{ old('jenjang_pendidikan_lowongan', $lowongan->jenjang_pendidikan_lowongan) == 'Semua Jenjang Pendidikan' ? 'selected' : '' }}>
                    Semua Jenjang Pendidikan
                </option>
                <option value="S1"
                    {{ old('jenjang_pendidikan_lowongan', $lowongan->jenjang_pendidikan_lowongan) == 'S1' ? 'selected' : '' }}>
                    S1
                </option>
                <option value="D4"
                    {{ old('jenjang_pendidikan_lowongan', $lowongan->jenjang_pendidikan_lowongan) == 'D4' ? 'selected' : '' }}>
                    D4
                </option>
                <option value="D3"
                    {{ old('jenjang_pendidikan_lowongan', $lowongan->jenjang_pendidikan_lowongan) == 'D3' ? 'selected' : '' }}>
                    D3
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jurusan_pendidikan_lowongan" class="form-label">Jurusan Pendidikan</label>
            <input type="text" class="form-control" name="jurusan_pendidikan_lowongan"
                value="{{ $lowongan->jurusan_pendidikan_lowongan }}">
        </div>

        <div class="mb-3">
            <label for="persyaratan_lowongan" class="form-label">Persyaratan</label>
            <textarea class="form-control" id="persyaratanlowongan" name="persyaratan_lowongan">{{ $lowongan->persyaratan_lowongan }}</textarea>
        </div>


        <div class="mb-3">
            <label for="rincian_lowongan" class="form-label">Rincian Lowongan</label>
            <textarea class="form-control" id="rincianlowongan" name="rincian_lowongan" required>{{ $lowongan->rincian_lowongan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="penutupan_lowongan" class="form-label">Tanggal Penutupan</label>
            <input type="date" class="form-control" name="penutupan_lowongan"
                value="{{ $lowongan->penutupan_lowongan }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_lowongan" class="form-label">Kategori</label>
            <input type="text" class="form-control" name="kategori_lowongan"
                value="{{ $lowongan->kategori_lowongan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Bekerja <span class="text-danger">*</span></label>
            <select class="form-select @error('waktu_bekerja') is-invalid @enderror" name="waktu_bekerja" required>
                <option value="Full Time"
                    {{ old('waktu_bekerja', $lowongan->waktu_bekerja) == 'Full Time' ? 'selected' : '' }}>
                    Full Time
                </option>
                <option value="Harian"
                    {{ old('waktu_bekerja', $lowongan->waktu_bekerja) == 'Harian' ? 'selected' : '' }}>
                    Harian
                </option>
                <option value="Paruh Waktu"
                    {{ old('waktu_bekerja', $lowongan->waktu_bekerja) == 'Paruh Waktu' ? 'selected' : '' }}>
                    Paruh Waktu
                </option>
            </select>
            @error('waktu_bekerja')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Kisaran Gaji Perbulan <span class="text-danger">*</span></label>
            <select class="form-select @error('gaji_perbulan') is-invalid @enderror" name="gaji_perbulan" required>
                <option value="Rp. 1.000.000 - Rp. 5.000.000"
                    {{ old('gaji_perbulan', $lowongan->gaji_perbulan) == 'Rp. 1.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>
                    Rp. 1.000.000 - Rp. 5.000.000
                </option>
                <option value="Rp. 5.000.000 - Rp. 7.000.000"
                    {{ old('gaji_perbulan', $lowongan->gaji_perbulan) == 'Rp. 5.000.000 - Rp. 7.000.000' ? 'selected' : '' }}>
                    Rp. 5.000.000 - Rp. 7.000.000
                </option>
                <option value="Rp. 7.000.000 - Rp. 10.000.000"
                    {{ old('gaji_perbulan', $lowongan->gaji_perbulan) == 'Rp. 7.000.000 - Rp. 10.000.000' ? 'selected' : '' }}>
                    Rp. 7.000.000 - Rp. 10.000.000
                </option>
            </select>
            @error('gaji_perbulan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="status_lowongan" class="form-label">Status</label>
            <select class="form-select" name="status_lowongan" required>
                <option value="Aktif" {{ $lowongan->status_lowongan == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ $lowongan->status_lowongan == 'Non-Aktif' ? 'selected' : '' }}>Tidak
                    Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#persyaratanlowongan'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#rincianlowongan'))
        .catch(error => {
            console.error(error);
        });

    // Toast Notifikasi
    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("successToast");
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    @endif
</script>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-bg-success border-0 p-2 shadow-lg" role="alert"
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
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>
