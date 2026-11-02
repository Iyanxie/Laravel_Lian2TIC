<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt - Edit Portofolio & CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card border-0 shadow p-4 p-lg-5 w-100" style="max-width: 850px; background-color: #ffffff;">
            <div class="text-center mb-4">
                <h2 class="h3 fw-extrabold text-gray-800">Form Edit Biodata & Portofolio</h2>
                <p class="text-muted small">Perbarui data CV yang telah diinputkan sebelumnya</p>
            </div>

            <form action="{{ route('portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Bagian A: Biodata Pribadi -->
                <div class="mb-4">
                    <h5 class="h6 text-gray-600 text-uppercase border-bottom pb-2 fw-bold">A. Biodata Pribadi</h5>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control border-gray-300" value="{{ $portofolio->nama_lengkap }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Email</label>
                        <input type="email" name="email" class="form-control border-gray-300" value="{{ $portofolio->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Nomor Telepon</label>
                        <input type="text" name="telepon" class="form-control border-gray-300" value="{{ $portofolio->telepon }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control border-gray-300" value="{{ $portofolio->alamat }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Tentang Saya</label>
                    <textarea name="tentang_saya" class="form-control border-gray-300" rows="3" required>{{ $portofolio->tentang_saya }}</textarea>
                </div>

                <div class="row align-items-end mb-4">
                    <div class="col-md-7 mb-3 mb-md-0">
                        <label class="form-label fw-semibold text-gray-700">Ganti Foto Profil (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="foto_profil" class="form-control border-gray-300">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold text-gray-700">Opsi Foto (Include/Exclude)</label>
                        <select name="include_foto" class="form-select border-gray-300">
                            <option value="yes" {{ $portofolio->foto_profil ? 'selected' : '' }}>Sertakan Foto (Include)</option>
                            <option value="no" {{ !$portofolio->foto_profil ? 'selected' : '' }}>Sembunyikan Foto (Exclude)</option>
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
                        <input type="text" name="nama_proyek" class="form-control border-gray-300" value="{{ $portofolio->nama_proyek }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-gray-700">Teknologi yang Digunakan</label>
                        <input type="text" name="teknologi" class="form-control border-gray-300" value="{{ $portofolio->teknologi }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-gray-700">Deskripsi Jalannya Proyek</label>
                    <textarea name="deskripsi_proyek" class="form-control border-gray-300" rows="3" required>{{ $portofolio->deskripsi_proyek }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-gray-700">Tautan / Link Proyek Live</label>
                    <input type="url" name="tautan_proyek" class="form-control border-gray-300" value="{{ $portofolio->tautan_proyek }}">
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('portofolio.index') }}" class="btn btn-outline-gray-600">Batal</a>
                    <button type="submit" class="btn btn-gray-800 px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
