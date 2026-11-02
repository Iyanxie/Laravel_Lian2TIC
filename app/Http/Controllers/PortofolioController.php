<?php
namespace App\Http\Controllers;

use App\Models\Portofolio_1200;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    // 1. Menampilkan Semua Riwayat Inputan di Dashboard Admin Volt
    public function index()
    {
        $data['dataPortofolio'] = Portofolio_1200::all();
        return view('admin.portofolio.index', $data);
    }

    // 2. Menampilkan Form Halaman Pembuatan CV Baru
    public function create()
    {
        return view('admin.portofolio.create');
    }

    // 3. Memproses Data Input & Menyimpan ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'     => 'required',
            'email'            => 'required|email',
            'telepon'          => 'required',
            'alamat'           => 'required',
            'tentang_saya'     => 'required',
            'nama_proyek'      => 'required',
            'teknologi'        => 'required',
            'deskripsi_proyek' => 'required',
            'foto_profil'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Logika include/exclude gambar berdasarkan pilihan select form
        $fotoPath = null;
        if ($request->hasFile('foto_profil') && $request->input('include_foto') === 'yes') {
            $fotoPath = $request->file('foto_profil')->store('uploads/cv', 'public');
        }

        Portofolio_1200::create([
            'nama_lengkap'     => $request->nama_lengkap,
            'email'            => $request->email,
            'telepon'          => $request->telepon,
            'alamat'           => $request->alamat,
            'tentang_saya'     => $request->tentang_saya,
            'nama_proyek'      => $request->nama_proyek,
            'teknologi'        => $request->teknologi,
            'deskripsi_proyek' => $request->deskripsi_proyek,
            'tautan_proyek'    => $request->tautan_proyek,
            'foto_profil'      => $fotoPath,
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Data CV Berhasil Ditambahkan!');
    }

    // 4. Halaman Cetak CV Output Akhir
    public function show($id)
    {
        $cv = Portofolio_1200::findOrFail($id);
        return view('admin.portofolio.show', compact('cv'));
    }
    public function edit($id)
    {
        $portofolio = Portofolio_1200::findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

// Memproses simpan perubahan data ke database
    public function update(Request $request, $id)
    {
        $portofolio = Portofolio_1200::findOrFail($id);

        $request->validate([
            'nama_lengkap'     => 'required',
            'email'            => 'required|email',
            'telepon'          => 'required',
            'alamat'           => 'required',
            'tentang_saya'     => 'required',
            'nama_proyek'      => 'required',
            'teknologi'        => 'required',
            'deskripsi_proyek' => 'required',
        ]);

        // Penanganan update foto profil include/exclude
        $fotoPath = $portofolio->foto_profil;
        if ($request->input('include_foto') === 'no') {
            $fotoPath = null;
        } elseif ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('uploads/cv', 'public');
        }

        $portofolio->update([
            'nama_lengkap'     => $request->nama_lengkap,
            'email'            => $request->email,
            'telepon'          => $request->telepon,
            'alamat'           => $request->alamat,
            'tentang_saya'     => $request->tentang_saya,
            'nama_proyek'      => $request->nama_proyek,
            'teknologi'        => $request->teknologi,
            'deskripsi_proyek' => $request->deskripsi_proyek,
            'tautan_proyek'    => $request->tautan_proyek,
            'foto_profil'      => $fotoPath,
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Data Portofolio Berhasil Diperbarui!');
    }
    
    public function destroy($id)
    {
        $portofolio = Portofolio_1200::findOrFail($id);

        // Opsional: Hapus file foto dari storage jika ada
        if ($portofolio->foto_profil && \Storage::disk('public')->exists($portofolio->foto_profil)) {
            \Storage::disk('public')->delete($portofolio->foto_profil);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Data Portofolio Berhasil Dihapus!');
    }
}
