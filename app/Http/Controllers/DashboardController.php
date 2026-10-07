<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalLaki      = Mahasiswa::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Mahasiswa::where('jenis_kelamin', 'Perempuan')->count();
        $totalProdi     = Prodi::count();

        // Ambil data Mahasiswa Terbaru
        $mahasiswaTerbaru = Mahasiswa::with('prodi')->latest()->take(5)->get();

        // --- BAGIAN DATA GRAFIK ---
        $prodis = Prodi::withCount('mahasiswas')->get();
        
        $chartLabels = $prodis->pluck('nama_prodi');
        $chartData   = $prodis->pluck('mahasiswas_count');

        return view('dashboard', compact(
            'totalMahasiswa',
            'totalLaki',
            'totalPerempuan',
            'totalProdi',
            'mahasiswaTerbaru',
            'chartLabels',
            'chartData'
        ));
    }
}