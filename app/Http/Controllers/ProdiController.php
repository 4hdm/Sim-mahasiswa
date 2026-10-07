<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    /**
     * Menampilkan daftar program studi dengan fitur pencarian dan paginasi.
     */
    public function index(Request $request){
    // 1. Mengambil data Prodi sekaligus menghitung relasi jumlah mahasiswa ('mahasiswas')
    $query = Prodi::withCount('mahasiswas');

    // 2. Cek apakah ada input pencarian dari form
    if ($request->filled('search')) {
        $search = $request->search;

        // Melakukan pencarian berdasarkan kode_prodi, nama_prodi, ATAU fakultas
        $query->where(function ($q) use ($search) {
            $q->where('kode_prodi', 'like', "%{$search}%")
              ->orWhere('nama_prodi', 'like', "%{$search}%")
              ->orWhere('fakultas', 'like', "%{$search}%");
        });
    }

    // 3. Urutkan berdasarkan nama_prodi, bagi per 10 data per halaman, dan simpan query string pencarian
    $prodis = $query->orderBy('nama_prodi')
                    ->paginate(10)
                    ->withQueryString();

    // 4. Tampilkan view 'prodi.index' dengan membawa data $prodis
    return view('prodi.index', compact('prodis'));
}

    /**
     * Menampilkan form tambah program studi.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Menyimpan data program studi baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_prodi' => [
                'required',
                'string',
                'max:20',
                'unique:prodis,kode_prodi',
            ],
            'nama_prodi' => [
                'required',
                'string',
                'max:255',
            ],
            'fakultas' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        Prodi::create($validated);

        return redirect()
            ->route('prodi.index')
            ->with('success', 'Program studi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail program studi beserta daftar mahasiswa di dalamnya.
     */
    public function show(Prodi $prodi)
    {
        // Memuat relasi mahasiswas untuk menampilkan mahasiswa pada prodi ini
        $prodi->load('mahasiswas');

        return view('prodi.show', compact('prodi'));
    }

    /**
     * Menampilkan form edit program studi.
     */
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Memperbarui data program studi.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validated = $request->validate([
            'kode_prodi' => [
                'required',
                'string',
                'max:20',
                Rule::unique('prodis', 'kode_prodi')->ignore($prodi->id),
            ],
            'nama_prodi' => [
                'required',
                'string',
                'max:255',
            ],
            'fakultas' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $prodi->update($validated);

        return redirect()
            ->route('prodi.index')
            ->with('success', 'Program studi berhasil diperbarui.');
    }

    /**
     * Menghapus data program studi dari database.
     */
    public function destroy(Prodi $prodi)
    {
        // Validasi keutuhan data (Data Integrity Check):
        // Mencegah penghapusan jika prodi masih terikat dengan data mahasiswa
        if ($prodi->mahasiswas()->exists()) {
            return back()->with(
                'error',
                'Prodi tidak dapat dihapus karena masih digunakan mahasiswa.'
            );
        }

        $prodi->delete();

        return redirect()
            ->route('prodi.index')
            ->with('success', 'Program studi berhasil dihapus.');
    }
}