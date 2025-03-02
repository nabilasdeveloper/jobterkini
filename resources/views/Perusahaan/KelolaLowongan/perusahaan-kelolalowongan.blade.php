<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

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

<body class="">
    <div class="container-fluid">
        <h1 class="title">Kelola Data Lowongan Perusahaan</h1>
        <p class="mb-5">
            Selamat datang kembali,
            <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
        </p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="">

                {{-- untuk cek jika ada error pada data atau logika --}}
                {{-- @dd(Auth::guard('perusahaan')->user()); --}}

                @if (Auth::guard('perusahaan')->check() &&
                        Auth::guard('perusahaan')->user()->contact_perusahaan &&
                        Auth::guard('perusahaan')->user()->deskripsi_perusahaan &&
                        Auth::guard('perusahaan')->user()->alamat_perusahaan &&
                        Auth::guard('perusahaan')->user()->website_perusahaan &&
                        Auth::guard('perusahaan')->user()->img_perusahaan)
                    <a href="{{ route('perusahaan.kelolalowongan.add') }}" class="btn btn-primary my-3">
                        Tambah Data Lowongan Anda
                    </a>
                @else
                    <a href="#" class="btn btn-primary my-3" data-bs-toggle="modal"
                        data-bs-target="#modal-warning">
                        Tambah Data Lowongan Anda
                    </a>
                @endif
            </div>
            <div class="">
                <form action="" class="">
                    <input type="text" class="form-control py-1 px-2">
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Nama Lowongan</th>
                                <th scope="col">Penutupan Lowongan</th>
                                <th scope="col">Status Lowongan</th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowongan as $lowongan)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $lowongan->nama_lowongan }}</td>
                                    <td>{{ $lowongan->penutupan_lowongan }}</td>
                                    <td>{{ $lowongan->status_lowongan }}</td>
                                    <td>
                                        <a href="{{ route('perusahaan.kelolalowongan.detail', $lowongan->id) }}"
                                            class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                <path d="M21 21l-6 -6" />
                                            </svg>
                                            <p>Detail</p>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('perusahaan.kelolalowongan.edit', $lowongan->id) }}"
                                            class="d-flex text-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            <p>Edit</p>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="text-danger d-flex"
                                            onclick="confirmDelete({{ $lowongan->id }})"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>Hapus</button>

                                        <form id="delete-form-{{ $lowongan->id }}"
                                            action="{{ route('perusahaan.kelolalowongan.destroy', $lowongan->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Peringatan --}}
    <div class="modal modal-blur fade" id="modal-warning" tabindex="-1" aria-labelledby="modal-warning-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="modal-warning-label">Peringatan!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="text-danger">*</span> Anda harus melengkapi profil perusahaan terlebih dahulu sebelum
                    menambah lowongan.
                </div>
                <div class="modal-footer">
                    <a href="{{ route('perusahaan.profile') }}" class="btn btn-primary">Lengkapi Profil</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

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
