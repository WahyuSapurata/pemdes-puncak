<?php

namespace App\Http\Controllers;

use App\Models\APBDS;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Penduduk;
use App\Models\StrukturPemerintahan;
use App\Models\User;
use Illuminate\Http\Request;

class Home extends BaseController
{
    public function index()
    {
        $module = 'Home';
        $struktu_desa = StrukturPemerintahan::all();
        $penduduk = Penduduk::selectRaw('
            SUM(CASE WHEN jenis_kelamin = "L" THEN 1 ELSE 0 END) AS laki_laki,
            SUM(CASE WHEN jenis_kelamin = "P" THEN 1 ELSE 0 END) AS perempuan,
            SUM(CASE WHEN status_dalam_keluarga = "kepala Keluarga" THEN 1 ELSE 0 END) AS kepala_keluarga,
            COUNT(*) AS total
        ')->first();

        $apbd = APBDS::where('tahun', now()->year)
            ->selectRaw('
                SUM(CASE WHEN jenis = "pendapatan" THEN jumlah ELSE 0 END) AS total_pendapatan,
                SUM(CASE WHEN jenis = "belanja" THEN jumlah ELSE 0 END) AS total_belanja
            ')
            ->first();
        $galeri = Galeri::all();
        $berita = Berita::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                $item->oleh = User::where('uuid', $item->uuid_user)->first()->nama;
                return $item;
            });
        return view('landing.home', compact('module', 'struktu_desa', 'penduduk', 'apbd', 'galeri', 'berita'));
    }
}
