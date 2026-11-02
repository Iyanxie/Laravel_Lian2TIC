<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CV - {{ $cv->nama_lengkap }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
        }
        .cv-container {
            max-width: 850px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        .cv-header {
            background-color: #1f2937; /* Gelap khas Volt */
            color: #ffffff;
            padding: 45px;
        }
        .section-divider {
            border-bottom: 2px solid #1f2937;
            color: #1f2937;
            font-weight: 800;
            margin-top: 30px;
            padding-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .profile-frame img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .badge-tech {
            font-size: 0.85rem;
            background-color: #f3f4f6;
            color: #1f2937;
            border: 1px solid #e5e7eb;
            padding: 6px 12px;
        }

        /* Aturan Khusus Saat Mencetak Dokumen */
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: #ffffff;
                padding: 0;
            }
            .cv-container {
                box-shadow: none;
                margin: 0;
                max-width: 100%;
                border-radius: 0;
            }
            .cv-header {
                background-color: #1f2937 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

    <!-- Tombol Navigasi & Cetak (Akan hilang saat di-print) -->
    <div class="container text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-gray-800 btn-lg px-5 shadow-sm">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://w3.org" style="width: 20px; height: 20px; display: inline-block; vertical-align: middle;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            Cetak CV / Simpan Ke PDF
        </button>
        <a href="{{ route('portofolio.index') }}" class="btn btn-outline-gray-600 btn-lg px-4 ms-2">
            Kembali ke Tabel
        </a>
    </div>

    <!-- Kotak Utama CV -->
    <div class="cv-container">
        <!-- Bagian Atas / Header CV -->
        <div class="cv-header">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-start">
                    <h1 class="display-5 fw-bold mb-2">{{ $cv->nama_lengkap }}</h1>
                    <p class="lead mb-0 text-gray-400 fw-normal">Web Developer / Software Engineer</p>
                </div>
                <div class="col-md-4 text-center text-md-end mt-4 mt-md-0">
                    @if($cv->foto_profil)
                        <div class="profile-frame">
                            <img src="{{ asset('storage/' . $cv->foto_profil) }}" alt="Foto Profil">
                        </div>
                    @else
                        <div class="badge bg-danger p-2 fs-7 fw-normal border border-light shadow-sm">Foto Profil Excluded</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bagian Konten / Body CV -->
        <div class="p-5 bg-white">
            <div class="row">
                <!-- Kolom Kiri: Kontak Informasi -->
                <div class="col-md-4 mb-4 mb-md-0 border-end border-gray-200">
                    <h5 class="section-divider h6 style" style="margin-top: 0;">Kontak Pribadi</h5>

                    <div class="mt-3">
                        <small class="text-muted d-block uppercase fw-bold">Email</small>
                        <span class="text-gray-800 fw-medium">{{ $cv->email }}</span>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted d-block uppercase fw-bold">Nomor Telepon</small>
                        <span class="text-gray-800 fw-medium">{{ $cv->telepon }}</span>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted d-block uppercase fw-bold">Alamat Rumah</small>
                        <span class="text-gray-800 fw-medium">{{ $cv->alamat }}</span>
                    </div>
                </div>

                <!-- Kolom Kanan: Detail Ringkasan & Proyek -->
                <div class="col-md-8 ps-md-4">
                    <h5 class="section-divider h6" style="margin-top: 0;">Tentang Saya</h5>
                    <p class="text-gray-700 mt-3" style="text-align: justify; white-space: pre-line; line-height: 1.6;">
                        {{ $cv->tentang_saya }}
                    </p>

                    <h5 class="section-divider h6">Riwayat Proyek & Portofolio</h5>
                    <div class="mt-3 card border border-gray-200 p-4 bg-gray-50 shadow-none">
                        <h4 class="h5 fw-bold text-gray-900 mb-1">{{ $cv->nama_proyek }}</h4>

                        <div class="my-2">
                            <span class="badge badge-tech rounded text-uppercase fw-semibold">{{ $cv->teknologi }}</span>
                        </div>

                        <p class="text-gray-600 mt-2 small" style="text-align: justify; line-height: 1.5;">
                            {{ $cv->deskripsi_proyek }}
                        </p>

                        @if($cv->tautan_proyek)
                            <div class="mt-3">
                                <a href="{{ $cv->tautan_proyek }}" target="_blank" class="text-sm fw-bold text-info text-decoration-none d-inline-flex align-items-center">
                                    🔗 Kunjungi Tautan Proyek Aktif
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
