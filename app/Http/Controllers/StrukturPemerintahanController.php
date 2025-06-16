<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStrukturPemerintahanRequest;
use App\Http\Requests\UpdateStrukturPemerintahanRequest;
use App\Models\StrukturPemerintahan;
use Illuminate\Support\Facades\File;

class StrukturPemerintahanController extends BaseController
{
    public function index()
    {
        $module = 'Struktur Desa';
        return view('admin.strukturdesa.index', compact('module'));
    }

    public function get()
    {
        $data = StrukturPemerintahan::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Struktur Desa';
        return view('admin.strukturdesa.tambah', compact('module'));
    }

    public function store(StoreStrukturPemerintahanRequest $storeStrukturPemerintahanRequest)
    {
        $newFoto = '';
        if ($storeStrukturPemerintahanRequest->file('foto')) {
            $extension = $storeStrukturPemerintahanRequest->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $storeStrukturPemerintahanRequest->file('foto')->storeAs('public/strukturdesa', $newFoto);
        }

        try {
            $data = new StrukturPemerintahan();
            $data->nama = $storeStrukturPemerintahanRequest->nama;
            $data->jabatan = $storeStrukturPemerintahanRequest->jabatan;
            $data->foto = $newFoto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add struktur desa success');
    }

    public function edit($params)
    {
        $module = 'Edit Struktur Desa';
        $data = StrukturPemerintahan::where('uuid', $params)->first();
        return view('admin.strukturdesa.edit', compact('module', 'data'));
    }

    public function update(UpdateStrukturPemerintahanRequest $updateStrukturPemerintahanRequest, $params)
    {
        $data = StrukturPemerintahan::where('uuid', $params)->first();

        $oldStrukturPath = public_path('/public/strukturdesa/' . $data->foto);

        $newFoto = '';
        if ($updateStrukturPemerintahanRequest->file('foto')) {
            $extension = $updateStrukturPemerintahanRequest->file('foto')->extension();
            $newFoto = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $updateStrukturPemerintahanRequest->file('foto')->storeAs('public/strukturdesa', $newFoto);

            // Hapus foto lama jika ada
            if (File::exists($oldStrukturPath)) {
                File::delete($oldStrukturPath);
            }
        }

        try {
            $data->nama = $updateStrukturPemerintahanRequest->nama;
            $data->jabatan = $updateStrukturPemerintahanRequest->jabatan;
            $data->foto = $updateStrukturPemerintahanRequest->file('foto') ? $newFoto : $data->foto;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update struktur desa success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = StrukturPemerintahan::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldStrukturPath = public_path('/public/strukturdesa/' . $data->foto);
            // Hapus foto lama jika ada
            if (File::exists($oldStrukturPath)) {
                File::delete($oldStrukturPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Struktur desa success');
    }
}
