<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>


<div class="container-fluid">
    <h1 class="title">Detail Data Lowongan Perusahaan</h1>
    <p class="mb-5">
        Detail Lowongan
        <span class="text-secondary">Anda</span>
    </p>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
            <strong>Error - </strong> {{ session('error') }}
        </div>
    @endif

    <div class="mt-5">
        <div class="mb-4">
            <img src="{{ asset('storage/' . $lowongan->perusahaan->img_perusahaan) }}" alt="Profile Perusahaan"
                width="100" height="100" />
        </div>
    </div>
    {{-- Nama Lowongan --}}
    <div>
        <h2 class=""><strong>{{ $lowongan->nama_lowongan }}</strong></h2>
    </div>

    {{-- Nama Perusahaan --}}
    <div class="">
        <div class="d-flex align-items-center gap-5">
            <div class="d-flex align-items-center gap-2">
                <h4 class="text-muted">{{ $lowongan->perusahaan->nama_perusahaan }}</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                    class="bi bi-patch-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path
                        d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z" />
                </svg>
            </div>
        </div>
        <div class="d-flex align-items-center mb-3">
            <p class="text-muted fs-4">{{ $lowongan->jenjang_pendidikan_lowongan }} ‎ </p>
            <p class="text-muted fs-4"> ‎ {{ $lowongan->jurusan_pendidikan_lowongan }}</p>
        </div>
    </div>


    <div class="d-flex align-items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-3"
            viewBox="0 0 16 16">
            <path
                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
        {{ $lowongan->perusahaan->alamat_perusahaan }}
    </div>

    <div class="d-flex align-items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-3"
            viewBox="0 0 16 16">
            <path
                d="M6.5 0a.5.5 0 0 1 .5.5V1h2V.5a.5.5 0 0 1 1 0V1h1.5a.5.5 0 0 1 .5.5V3h-7V1.5a.5.5 0 0 1 .5-.5H6V.5a.5.5 0 0 1 .5-.5ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm3 1v9h10V5H3Z" />
        </svg>
        {{ $lowongan->kategori_lowongan }}
    </div>

    <div class="d-flex align-items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-3"
            viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-.5.5v4.707l3.146 3.147a.5.5 0 0 0 .708-.708l-3-3V4a.5.5 0 0 0-.5-.5Z" />
            <path d="M8 16a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1Z" />
        </svg>
        {{ $lowongan->waktu_bekerja }}
    </div>

    <div class="d-flex align-items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-3"
            viewBox="0 0 16 16">
            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
            <path
                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
        </svg>
        {{ $lowongan->gaji_perbulan }}
    </div>


    <div class="mb-5">
        <h5 class="text-muted fs-3">
            Di Posting
            {{ \Carbon\Carbon::parse($lowongan->created_at)->locale('id')->diffForHumans() }}
        </h5>
    </div>

    <div class="mb-4">
        <h5 class="text-muted">{!! $lowongan->persyaratan_lowongan !!}</h5>
    </div>

    <div class="mb-5">
        <h5 class="text-muted">{!! $lowongan->rincian_lowongan !!}</h5>
    </div>


    <form action="{{ route('perusahaan.kelolalowongan.ubahstatus', $lowongan->id) }}" method="POST" class="mt-5">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="status_lowongan" class="form-label">Ubah Status</label>
            <select name="status_lowongan" id="status_lowongan" class="form-select">
                <option value="Aktif" {{ $lowongan->status_lowongan == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ $lowongan->status_lowongan == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif
                </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

</div>

<script>
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
