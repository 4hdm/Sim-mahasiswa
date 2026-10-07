<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * =========================================================
     * INDEX (DAFTAR MAHASISWA)
     * =========================================================
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI INPUT
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'search'   => ['nullable', 'string', 'max:255'],
            'prodi_id' => ['nullable', 'integer', 'exists:prodis,id'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | QUERY MAHASISWA
        |--------------------------------------------------------------------------
        */
        $query = Mahasiswa::with('prodi');

        /*
        |--------------------------------------------------------------------------
        | SEARCH NIM / NAMA
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('nim', 'like', '%' . $search . '%')
                  ->orWhere('nama', 'like', '%' . $search . '%');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER PROGRAM STUDI
        |--------------------------------------------------------------------------
        */
        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->input('prodi_id'));
        }

        /*
        |--------------------------------------------------------------------------
        | PAGINATION (10 DATA PER HALAMAN)
        |--------------------------------------------------------------------------
        */
        $mahasiswas = $query->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | DATA PROGRAM STUDI
        |--------------------------------------------------------------------------
        */
        $prodis = Prodi::query()
            ->orderBy('nama_prodi', 'asc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view('mahasiswa.index', compact('mahasiswas', 'prodis'));
    }

    /**
     * =========================================================
     * FORM TAMBAH MAHASISWA
     * =========================================================
     */
    public function create()
    {
        $prodis = Prodi::query()
            ->orderBy('nama_prodi', 'asc')
            ->get();

        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * =========================================================
     * SIMPAN MAHASISWA BARU
     * =========================================================
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'nim'           => ['required', 'string', 'max:30', 'unique:mahasiswas,nim'],
            'nama'          => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat'        => ['nullable', 'string'],
            'telepon'       => ['nullable', 'string', 'max:20'],
            'email'         => ['nullable', 'email', 'max:255'],
            'prodi_id'      => ['required', 'integer', 'exists:prodis,id'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN & REDIRECT
        |--------------------------------------------------------------------------
        */
        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * =========================================================
     * DETAIL MAHASISWA
     * =========================================================
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('prodi');

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * =========================================================
     * FORM EDIT MAHASISWA
     * =========================================================
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::query()
            ->orderBy('nama_prodi', 'asc')
            ->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * =========================================================
     * UPDATE MAHASISWA
     * =========================================================
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'nim'           => ['required', 'string', 'max:30', Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa->id)],
            'nama'          => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat'        => ['nullable', 'string'],
            'telepon'       => ['nullable', 'string', 'max:20'],
            'email'         => ['nullable', 'email', 'max:255'],
            'prodi_id'      => ['required', 'integer', 'exists:prodis,id'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE & REDIRECT
        |--------------------------------------------------------------------------
        */
        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * =========================================================
     * HAPUS MAHASISWA
     * =========================================================
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    /**
     * =========================================================
     * PRINT PDF
     * =========================================================
     *
     * PDF mengikuti:
     * - Search
     * - Filter Program Studi
     * (Tanpa pagination)
     */
    public function pdf(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | QUERY DASAR
        |--------------------------------------------------------------------------
        */
        $query = Mahasiswa::with('prodi');

        /*
        |--------------------------------------------------------------------------
        | SEARCH & FILTER
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('nim', 'like', '%' . $search . '%')
                  ->orWhere('nama', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->input('prodi_id'));
        }

        $mahasiswas = $query->latest()->get();

        /*
        |--------------------------------------------------------------------------
        | NAMA PROGRAM STUDI
        |--------------------------------------------------------------------------
        */
        $namaProdi = 'Semua Program Studi';
        if ($request->filled('prodi_id')) {
            $prodi = Prodi::find($request->input('prodi_id'));
            if ($prodi) {
                $namaProdi = $prodi->nama_prodi;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | GENERATE & STREAM PDF
        |--------------------------------------------------------------------------
        */
        $pdf = Pdf::loadView('mahasiswa.pdf', [
            'mahasiswas' => $mahasiswas,
            'namaProdi'  => $namaProdi,
            'search'     => $request->input('search'),
        ]);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('data-mahasiswa.pdf');
    }
}