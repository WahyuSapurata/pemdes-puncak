<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKontakKamiRequest;
use App\Http\Requests\UpdateKontakKamiRequest;
use App\Models\KontakKami;
use Illuminate\Http\Request;

class KontakKamiController extends BaseController
{
    public function index()
    {
        $module = 'Aduan';
        return view('admin.aduan.index', compact('module'));
    }

    public function get()
    {
        $data = KontakKami::latest()->get();
        return $this->sendResponse($data, 'Get data success');
    }

    public function kontak()
    {
        $module = 'Hubungi Kami';
        return view('landing.hubungikami', compact('module'));
    }

    public function add(Request $request)
    {
        try {
            $data = new KontakKami();
            $data->nama = $request->nama;
            $data->email = $request->email;
            $data->nomor = $request->nomor;
            $data->pesan = $request->pesan;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }

        return redirect()->route('hubungi-kami')->with('success', 'Pesan berhasil di kirim');
    }
}
