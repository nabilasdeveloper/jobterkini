<x-user.user-head></x-user.user-head>

<style>
    * {
        font-family: "Poppins", serif;
    }
</style>

<body class="bg-muted">
    <x-user.user-header></x-user.user-header>

    <div class="container my-5">
        <form action="{{ route('user-update') }}" method="POST" enctype="multipart/form-data">
            <div class="">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <!-- Preview foto profil -->
                        <img id="profile-preview"
                            src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/images/profile/user-1.jpg') }}"
                            alt="Foto Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                        <div class="mt-4">
                            <label for="foto" class="text-primary" style="cursor: pointer;">
                                <i class="bi bi-camera me-2"></i>Ganti Foto
                            </label>
                            <input type="file" id="foto" name="foto" class="d-none"
                                onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-5">
                    <div class="card-body">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" id="nama" name="nama" class="form-control"
                                value="{{ $user->nama }}" required>
                            <label for="nama" class="form-label">Nama Anda</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required>{{ $user->deskripsi }}</textarea>
                            <label for="deskripsi" class="form-label">Biodata Anda</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea id="alamat" name="alamat" class="form-control" rows="3" required>{{ $user->alamat }}</textarea>
                            <label for="alamat" class="form-label">Alamat Anda</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email" class="form-control"
                            value="{{ $user->email }}" readonly>
                            <label for="email" class="form-label">Email Anda</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>


<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('profile-preview');

        reader.onload = function() {
            preview.src = reader.result;
        };

        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("successToast");
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    @endif
    @if (session('warning'))
        document.addEventListener("DOMContentLoaded", function() {
            let toastEl = document.getElementById("warning");
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
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="warning" class="toast align-items-center text-bg-warning border-0 p-2 shadow-lg" role="alert"
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
                <strong>Warning!</strong> {{ session('warning') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
