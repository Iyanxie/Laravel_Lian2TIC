<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt - Daftar Portofolio & CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container py-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <h2 class="h4 fw-extrabold text-gray-800">Daftar Portofolio & Cetak CV (UTS)</h2>
                <p class="mb-0 text-muted">Kelola biodata, riwayat proyek aplikasi, dan cetak lembar CV Anda.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('portofolio.create') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center px-3 py-2 shadow-sm">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://w3.org" style="width: 20px; height: 20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Portofolio / Buat CV
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card card-body border-0 shadow table-wrapper table-responsive p-4 bg-white">
            <table class="table table-hover align-items-center shadow-none mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">No</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Nama Lengkap</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Email</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Nama Proyek</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Teknologi</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Opsi Gambar</th>
                        <th class="border-bottom border-gray-200 fs-6 fw-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataPortofolio as $key => $item)
                        <tr class="align-middle">
                            <td>{{ $key + 1 }}</td>
                            <td><span class="fw-bold text-gray-800">{{ $item->nama_lengkap }}</span></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nama_proyek }}</td>
                            <td><span
                                    class="badge bg-light text-gray-800 border border-gray-300 px-2.5 py-1.5">{{ $item->teknologi }}</span>
                            </td>
                            <td>
                                @if ($item->foto_profil)
                                    <span class="badge bg-success px-2.5 py-1.5">Included</span>
                                @else
                                    <span class="badge bg-danger px-2.5 py-1.5">Excluded</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('portofolio.show', $item->id) }}"
                                    class="btn btn-sm btn-secondary d-inline-flex align-items-center px-3 py-1.5 shadow-sm text-dark">
                                    <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://w3.org" style="width: 16px; height: 16px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                        </path>
                                    </svg>
                                    Cetak CV
                                </a>
                                <div class="btn-group">

                                    <!-- Tombol Edit Baru -->
                                    <a href="{{ route('portofolio.edit', $item->id) }}"
                                        class="btn btn-sm btn-info d-inline-flex align-items-center text-white rounded">
                                        Edit
                                    </a>
                                </div>
                                <form action="{{ route('portofolio.destroy', $item->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg class="icon icon-xs me-2" data-slot="icon" fill="none"
                                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                            </path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5 fs-6">Belum ada data portofolio yang
                                tersimpan. Klik tombol di kanan atas untuk membuat baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (untuk dismiss alert) -->
    <script src="https://jsdelivr.net"></script>
</body>

</html>
