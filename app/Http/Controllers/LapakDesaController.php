<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLapakDesaRequest;
use App\Http\Requests\UpdateLapakDesaRequest;
use App\Models\LapakDesa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class LapakDesaController extends BaseController
{
    public function index()
    {
        $module = 'Lapak Desa';
        return view('admin.lapakdesa.index', compact('module'));
    }

    public function get()
    {
        $data = LapakDesa::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Lapak Desa';
        return view('admin.lapakdesa.tambah', compact('module'));
    }

    public function store(StoreLapakDesaRequest $storeLapakDesaRequest)
    {
        $newGambar = '';
        if ($storeLapakDesaRequest->file('gambar_produk')) {
            $extension = $storeLapakDesaRequest->file('gambar_produk')->extension();
            $newGambar = 'gambar_produk' . '-' . now()->timestamp . '.' . $extension;
            $storeLapakDesaRequest->file('gambar_produk')->storeAs('public/lapakdesa', $newGambar);
        }

        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $storeLapakDesaRequest->harga_produk);

        try {
            $data = new LapakDesa();
            $data->nama_produk = $storeLapakDesaRequest->nama_produk;
            $data->slug = Str::slug($storeLapakDesaRequest->nama_produk);
            $data->deskripsi_produk = $storeLapakDesaRequest->deskripsi_produk;
            $data->harga_produk = $numericValue;
            $data->kategori_produk = $storeLapakDesaRequest->kategori_produk;
            $data->nama_penjual = $storeLapakDesaRequest->nama_penjual;
            $data->kontak_penjual = $storeLapakDesaRequest->kontak_penjual;
            $data->gambar_produk = $newGambar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add lapak desa success');
    }

    public function edit($params)
    {
        $module = 'Edit Lapak Desa';
        $data = LapakDesa::where('uuid', $params)->first();
        return view('admin.lapakdesa.edit', compact('module', 'data'));
    }

    public function update(UpdateLapakDesaRequest $updateLapakDesaRequest, $params)
    {
        $data = LapakDesa::where('uuid', $params)->first();

        $oldGambarPath = public_path('/public/lapakdesa/' . $data->gambar_produk);

        $newGambar = '';
        if ($updateLapakDesaRequest->file('gambar_produk')) {
            $extension = $updateLapakDesaRequest->file('gambar_produk')->extension();
            $newGambar = 'gambar_produk' . '-' . now()->timestamp . '.' . $extension;
            $updateLapakDesaRequest->file('gambar_produk')->storeAs('public/lapakdesa', $newGambar);

            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
        }

        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $updateLapakDesaRequest->harga_produk);

        try {
            $data->nama_produk = $updateLapakDesaRequest->nama_produk;
            $data->slug = Str::slug($updateLapakDesaRequest->nama_produk);
            $data->deskripsi_produk = $updateLapakDesaRequest->deskripsi_produk;
            $data->harga_produk = $numericValue;
            $data->kategori_produk = $updateLapakDesaRequest->kategori_produk;
            $data->nama_penjual = $updateLapakDesaRequest->nama_penjual;
            $data->kontak_penjual = $updateLapakDesaRequest->kontak_penjual;
            $data->gambar_produk = $updateLapakDesaRequest->file('gambar_produk') ? $newGambar : $data->gambar_produk;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update lapak desa success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = LapakDesa::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldGambarPath = public_path('/public/lapakdesa/' . $data->gambar_produk);
            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete lapak desa success');
    }

    public function lapakdesa()
    {
        $module = 'Lapak Desa';
        $data = LapakDesa::latest()->get();
        return view('landing.lapakdesa', compact('module', 'data'));
    }

    public function detail($params)
    {
        $data = LapakDesa::where('slug', $params)->first();
        $module = $data->nama_produk;
        return view('landing.detail.lapakdesa', compact('module', 'data'));
    }
}
