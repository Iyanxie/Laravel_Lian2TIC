<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt - Input Portofolio & CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card border-0 shadow p-4 p-lg-5 w-100" style="max-width: 850px; background-color: #ffffff;">
            <div class="text-center mb-4">
                <h2 class="h3 fw-extrabold text-gray-800">Form Input Biodata & Portofolio CV</h2>
                <p class="text-muted small">Isi data di bawah ini untuk mencetak dokumen CV otomatis</p>
            </div>

            <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Bagian A: Biodata Pribadi -->
                <div class="mb-4">
                    <h5 class="h6 text-gray-600 text-uppercase border-bottom pb-2 fw-bold">A. Biodata Pribadi</h5>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control border-gray-300" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Email</label>
                        <input type="email" name="email" class="form-control border-gray-300" placeholder="name@company.com" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Nomor Telepon</label>
                        <input type="text" name="telepon" class="form-control border-gray-300" placeholder="Contoh: 0812345678" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control border-gray-300" placeholder="Nama jalan, Kota, Provinsi" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Tentang Saya</label>
                    <textarea name="tentang_saya" class="form-control border-gray-300" rows="3" placeholder="Ceritakan singkat tentang keahlian profil diri kamu..." required></textarea>
                </div>

                <div class="row align-items-end mb-4">
                    <div class="col-md-7 mb-3 mb-md-0">
                        <label class="form-label fw-semibold text-gray-700">Pilih Foto Profil</label>
                        <input type="file" name="foto_profil" class="form-control border-gray-300">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold text-gray-700">Opsi Foto (Include/Exclude)</label>
                        <select name="include_foto" class="form-select border-gray-300">
                            <option value="yes">Sertakan Foto (Include)</option>
                            <option value="no">Sembunyikan Foto (Exclude)</option>
                        </select>
                    </div>
                </div>

                <!-- Bagian B: Data Portofolio Proyek -->
                <div class="mb-4 mt-4">
                    <h5 class="h6 text-gray-600 text-uppercase border-bottom pb-2 fw-bold">B. Data Portofolio Proyek</h5>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control border-gray-300" placeholder="E.g. Aplikasi E-Commerce" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Teknologi yang Digunakan</label>
                        <input type="text" name="teknologi" class="form-control border-gray-300" placeholder="E.g. Laravel 11, Bootstrap 5, MySQL" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Deskripsi Jalannya Proyek</label>
                    <textarea name="deskripsi_proyek" class="form-control border-gray-300" rows="3" placeholder="Jelaskan fitur atau peran kamu dalam proyek tersebut..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-gray-700">Tautan / Link Proyek Live (Opsional)</label>
                    <input type="url" name="tautan_proyek" class="form-control border-gray-300" placeholder="https://github.com">
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('portofolio.index') }}" class="btn btn-outline-gray-600">
                        Kembali ke Dashboard
                    </a>
                    <button type="submit" class="btn btn-gray-800 px-4">
                        Simpan Data & Cetak CV
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
