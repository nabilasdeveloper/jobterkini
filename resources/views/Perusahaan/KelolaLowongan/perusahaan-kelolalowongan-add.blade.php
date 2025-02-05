<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<div class="container-fluid">
    <h1 class="title">Kelola Data Lowongan Perusahaan</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
    </p>
    <div class="">
        <form action="{{ route('perusahaan.kelolalowongan.adds') }}" method="POST">
            @csrf
            <input type="hidden" name="perusahaan_id" value="{{ auth('perusahaan')->user()->id }}">
            <div class="mb-3">
                <label class="form-label">Nama Lowongan Pekerjaan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_lowongan') is-invalid @enderror"
                    name="nama_lowongan" value="{{ old('nama_lowongan') }}" required>
                @error('nama_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Jenjang Pendidikan Lowongan <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenjang_pendidikan_lowongan') is-invalid @enderror"
                            name="jenjang_pendidikan_lowongan" required>
                            <option value="">-- Pilih Jenjang Pendidikan --</option>
                            <option value="Semua Jenjang Pendidikan"
                                {{ old('jenjang_pendidikan_lowongan') == 'Semua Jenjang Pendidikan' ? 'selected' : '' }}>
                                Semua Jenjang Pendidikan</option>
                            <option value="S1" {{ old('jenjang_pendidikan_lowongan') == 'S1' ? 'selected' : '' }}>S1
                            </option>
                            <option value="D4" {{ old('jenjang_pendidikan_lowongan') == 'D4' ? 'selected' : '' }}>D4
                            </option>
                            <option value="D3" {{ old('jenjang_pendidikan_lowongan') == 'D3' ? 'selected' : '' }}>D3
                            </option>
                        </select>
                        @error('jenjang_pendidikan_lowongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Jurusan Pendidikan Lowongan <span class="text-danger">*</span></label>
                        <select class="form-control jurusan @error('jurusan_pendidikan_lowongan') is-invalid @enderror"
                            name="jurusan_pendidikan_lowongan[]" multiple="multiple" id="jurusan" required>
                            @foreach ($jurusanList as $jurusan)
                                <option value="{{ $jurusan->nama_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('jurusan_pendidikan_lowongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Persyaratan Lowongan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('persyaratan_lowongan') is-invalid @enderror" name="persyaratan_lowongan"
                    id="persyaratanlowongan">{{ old('persyaratan_lowongan') }}</textarea>
                @error('persyaratan_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Rincian Lowongan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('rincian_lowongan') is-invalid @enderror" name="rincian_lowongan"
                    id="rincianlowongan">{{ old('rincian_lowongan') }}</textarea>
                @error('rincian_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Lowongan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('kategori_lowongan') is-invalid @enderror"
                    name="kategori_lowongan" placeholder="contoh: Keuangan" required>{{ old('kategori_lowongan') }}
                @error('kategori_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Waktu Bekerja <span class="text-danger">*</span></label>
                <select class="form-select @error('waktu_bekerja') is-invalid @enderror" name="waktu_bekerja" required>
                    <option value="Full Time" {{ old('waktu_bekerja') == 'Full Time' ? 'selected' : '' }}>
                        Full Time</option>
                    <option value="Harian" {{ old('waktu_bekerja') == 'Harian' ? 'selected' : '' }}>
                        Harian
                    </option>
                    <option value="Paruh Waktu" {{ old('waktu_bekerja') == 'Paruh Waktu' ? 'selected' : '' }}>
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
                        {{ old('gaji_perbulan') == 'Rp. 1.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>
                        Rp. 1.000.000 - Rp. 5.000.000</option>
                    <option value="Rp. 5.000.000 - Rp. 7.000.000"
                        {{ old('gaji_perbulan') == 'Rp. 5.000.000 - Rp. 7.000.000' ? 'selected' : '' }}>
                        Rp. 5.000.000 - Rp. 7.000.000
                    </option>
                    <option value="Rp. 7.000.000 - Rp. 10.000.000"
                        {{ old('gaji_perbulan') == 'Rp. 7.000.000 - Rp. 10.000.000' ? 'selected' : '' }}>
                        Rp. 7.000.000 - Rp. 10.000.000
                    </option>
                </select>
                @error('gaji_perbulan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Penutupan <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('penutupan_lowongan') is-invalid @enderror"
                            name="penutupan_lowongan" value="{{ old('penutupan_lowongan') }}" required>
                        @error('penutupan_lowongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Status Lowongan <span class="text-danger">*</span></label>
                        <select class="form-select @error('status_lowongan') is-invalid @enderror"
                            name="status_lowongan" required>
                            <option value="Aktif" {{ old('status_lowongan') == 'Aktif' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="Non-Aktif" {{ old('status_lowongan') == 'Non-Aktif' ? 'selected' : '' }}>
                                Non-Aktif
                            </option>
                        </select>
                        @error('status_lowongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("successToast");
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    @endif
</script>
<script>
    // Select2 TESTTINGGGGG
    $(document).ready(function() {
        $('.jurusan').select2({
            placeholder: "Pilih Jurusan",
            allowClear: true
        });
    });
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
