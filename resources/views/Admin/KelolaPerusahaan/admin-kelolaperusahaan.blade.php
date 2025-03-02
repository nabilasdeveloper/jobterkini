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
    <h1 class="title">Kelola Data Perusahaan</h1>
    <p>
        Selamat datang kembali,
        <span class="text-secondary">{{ $admin->nama }}</span>
    </p>
    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <a href="{{ route('admin.kelolaperusahaan.add') }}" class="btn btn-primary my-3">
                Tambah Data Perusahaan
            </a>
        </div>
        <div class="d-flex justify-content-between">
            <form method="GET" action="{{ route('admin.kelolaperusahaan') }}" class="d-flex">
                <input type="text" name="search" class="form-control py-1 px-2" placeholder="Cari Perusahaan..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ms-2">Cari</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Perusahaan</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataperusahaan as $perusahaan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <img src="{{ $perusahaan->img_perusahaan ? asset('storage/' . $perusahaan->img_perusahaan) : asset('assets/images/profile/user-1.jpg') }}"
                                    alt="Profile Perusahaan" width="40" height="40" class="rounded-sm" />
                            </td>
                            <td>{{ $perusahaan->nama_perusahaan }}</td>
                            <td>
                                @if ($perusahaan->status_verifikasi === 'Verified')
                                    <button class="btn btn-sm btn-success">
                                        {{ $perusahaan->status_verifikasi }}
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        {{ $perusahaan->status_verifikasi }}
                                    </button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.kelolaperusahaan.detail', $perusahaan->id) }}" class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                    <p>Detail</p>
                                </a>
                            </td>
                            <td>
                                <button class="text-danger d-flex" onclick="confirmDelete({{ $perusahaan->id }})"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>Hapus</button>

                                    <form id="delete-form-{{ $perusahaan->id }}"
                                        action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}" method="POST"
                                        style="display: none;">
                                        @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="mb-0">
                    Menampilkan {{ $dataperusahaan->firstItem() }} dari
                    {{ $dataperusahaan->total() }} data
                </p>
                <nav>
                    {{ $dataperusahaan->appends(['search' => request('search')])->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
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

<x-admin.admin-footer></x-admin.admin-footer>
