<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Penduduk;
use App\Models\SuratPengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends BaseController
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login.login-akun');
    }

    public function dashboard_admin()
    {
        $module = 'Dashboard';
        $pengajuan_surat = SuratPengajuan::where('status', 'proses')->count();
        $penduduk = Penduduk::all();
        return view('dashboard.admin', compact('module', 'pengajuan_surat', 'penduduk'));
    }
}
