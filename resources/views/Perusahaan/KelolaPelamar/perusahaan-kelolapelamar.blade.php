<x-perusahaan.perusahaan-head></x-perusahaan.perusahaan-head>
<x-perusahaan.perusahaan-sidebar></x-perusahaan.perusahaan-sidebar>
<x-perusahaan.perusahaan-header></x-perusahaan.perusahaan-header>

<body>
    <div class="container-fluid">
        <h1 class="title">Kelola Data Pendaftar Lowongan</h1>
        <p class="mb-5">
            Selamat datang kembali,
            <span class="text-secondary">{{ $perusahaan->nama_perusahaan }}</span>
        </p>
        @if ($lowonganList->isEmpty())
            <div class="alert alert-info">Anda belum memiliki lowongan yang aktif.</div>
        @else
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Lowongan</th>
                                    <th>Jumlah Pelamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowonganList as $lowongan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lowongan->nama_lowongan }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $lowongan->pelamar->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('perusahaan.kelolapelamar.detail', $lowongan->id) }}" class="btn btn-sm btn-info" >
                                                Lihat Pelamar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

</body>
<x-perusahaan.perusahaan-footer></x-perusahaan.perusahaan-footer>
