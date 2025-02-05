<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<div class="container-fluid">
    <h1 class="title">Profile Anda</h1>
    <div class="d-flex justify-content-between">
        <p>
            <span class="text-danger">* </span> Harap isi data <span class="text-primary">Perusahaan</span> dengan benar,
            Jika
            tidak sesuai dengan ketentuan akan terkena banned oleh <span class="text-danger">Admin!</span>
        </p>
        <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#modal-warning"><svg
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-alert-square-rounded">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                <path d="M12 8v4" />
                <path d="M12 16h.01" />
            </svg> Logout</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
            <strong>Success - </strong> {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form class="d-flex gap-4" method="POST" action="{{ route('perusahaan.updateProfile') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card col-4">
            <div class="card-body">
                <h3 class="card-title fw-semibold mb-5">Foto Profile Perusahaan</h3>

                <div class="mb-5 text-center">
                    <img src="{{ $perusahaan->img_perusahaan ? asset('storage/' . $perusahaan->img_perusahaan) : asset('assets/images/profile/user-1.jpg') }}"
                        alt="Profile Perusahaan" width="200" height="200" class="rounded-circle" />
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" name="img_perusahaan">
                </div>

            </div>
        </div>

        <div class="card col-8">
            <div class="card-body">
                <h3 class="card-title fw-semibold mb-5">{{ $perusahaan->nama_perusahaan }}</h3>

                <div class="mb-3">
                    <label class="form-label required">Nama Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" class="form-control" value="{{ $perusahaan->nama_perusahaan }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Email Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="email" class="form-control" value="{{ $perusahaan->email_perusahaan }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Contact Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" class="form-control" name="contact_perusahaan"
                            value="{{ old('contact_perusahaan', $perusahaan->contact_perusahaan) }}"
                            placeholder="Masukkan Contact Perusahaan">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Alamat Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <textarea class="form-control" name="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan">{{ old('alamat_perusahaan', $perusahaan->alamat_perusahaan) }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Deskripsi Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <textarea class="form-control" id="deskripsiperusahaan" name="deskripsi_perusahaan"
                            placeholder="Masukkan Deskripsi Perusahaan">{{ old('deskripsi_perusahaan', $perusahaan->deskripsi_perusahaan) }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Industri Perusahaan <span class="text-danger">*</span></label>
                    <select class="form-control industri @error('jenis_industri_perusahaan') is-invalid @enderror"
                        name="jenis_industri_perusahaan[]" multiple="multiple" id="industri" required>
                        <option value="Teknologi" {{ old('jenis_industri_perusahaan', $perusahaan->jenis_industri_perusahaan) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                        <option value="Keuangan" {{ old('jenis_industri_perusahaan', $perusahaan->jenis_industri_perusahaan) == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                        <option value="Marketing {{ old('jenis_industri_perusahaan', $perusahaan->jenis_industri_perusahaan) == 'Marketing' ? 'selected' : '' }}">Marketing</option>
                    </select>
                    @error('jenis_industri_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Ukuran Perusahaan <span class="text-danger">*</span></label>
                    <select class="form-select @error('ukuran_perusahaan') is-invalid @enderror"
                        name="ukuran_perusahaan" required>
                        <option value="">-- Pilih Ukursan Perusahaan --</option>
                        <option value="1 - 100"
                            {{ old('ukuran_perusahaan', $perusahaan->ukuran_perusahaan) == '1 - 100' ? 'selected' : '' }}>
                            1 - 100</option>
                        <option value="100 - 1000" {{ old('ukuran_perusahaan', $perusahaan->ukuran_perusahaan) == '100 - 1000' ? 'selected' : '' }}>100 - 1000
                        </option>
                        <option value="1000 - 2500" {{ old('ukuran_perusahaan', $perusahaan->ukuran_perusahaan) == '1000 - 2500' ? 'selected' : ''  }}>1000 - 2500
                        </option>
                        <option value="2500+" {{ old('ukuran_perusahaan', $perusahaan->ukuran_perusahaan) == '2500+' ? 'selected' : '' }}>2500+
                        </option>
                    </select>
                    @error('ukuran_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label required">Website Perusahaan <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" class="form-control" name="website_perusahaan"
                            value="{{ old('website_perusahaan', $perusahaan->website_perusahaan) }}"
                            placeholder="Masukkan Website Perusahaan">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>


<div class="modal modal-blur fade" id="modal-warning" tabindex="-1" aria-labelledby="modal-warning-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="modal-warning-label">Anda yakin akan Logout?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form action="{{ route('perusahaan.logout') }}" method="POST" class="">
                    @csrf
                    <button class="btn btn-danger mx-3 mt-2 d-block" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsiperusahaan'))
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

    // Select2 TESTTINGGGGG
    $(document).ready(function() {
        $('.industri').select2({
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
