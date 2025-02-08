<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<div class="container-fluid">
    <h1 class="title">Kelola Data Pendaftar Lowongan</h1>
    <p class="mb-5">
        Selamat datang kembali,
        <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
    </p>
    <h2 class="mb-4">Pelamar untuk: {{ $lowongan->nama_lowongan }}</h2>

    @if ($pelamarList->isEmpty())
        <div class="alert alert-warning">Belum ada pelamar untuk lowongan ini.</div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Pelamar</th>
                                <th>Surat Lamaran</th>
                                <th>CV</th>
                                <th>Dokumen Lainnya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamarList as $pelamar)
                                <tr>
                                    <td>{{ $pelamar->users->nama }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $pelamar->surat_lamaran) }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-search me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                            Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset('storage/' . $pelamar->cv) }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-search me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                            Lihat
                                        </a>
                                    </td>
                                    <td>
                                        @if ($pelamar->dokumen_lainnya)
                                            <a href="{{ asset('storage/' . $pelamar->dokumen_lainnya) }}"
                                                target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" class="bi bi-search me-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                </svg>
                                                Lihat
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $pelamar->status == 'Diterima' ? 'success' : ($pelamar->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                            {{ $pelamar->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('perusahaan.kelolapelamar.update', $pelamar->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select d-inline-block w-auto">
                                                <option value="Diproses"
                                                    {{ $pelamar->status == 'Diproses' ? 'selected' : '' }}>
                                                    Diproses</option>
                                                <option value="Diterima"
                                                    {{ $pelamar->status == 'Diterima' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="Ditolak"
                                                    {{ $pelamar->status == 'Ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <a href="{{ route('perusahaan.kelolapelamar') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

<x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>