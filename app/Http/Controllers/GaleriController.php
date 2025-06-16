<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends BaseController
{
    public function index()
    {
        $module = 'Galeri';
        return view('admin.galeri.index', compact('module'));
    }

    public function get()
    {
        $data = Galeri::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Galeri';
        return view('admin.galeri.tambah', compact('module'));
    }

    public function store(StoreGaleriRequest $storeGaleriRequest)
    {
        $newGambar = '';
        if ($storeGaleriRequest->file('gambar')) {
            $extension = $storeGaleriRequest->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $storeGaleriRequest->file('gambar')->storeAs('public/galeri', $newGambar);
        }

        try {
            $data = new Galeri();
            $data->judul = $storeGaleriRequest->judul;
            $data->gambar = $newGambar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add galeri success');
    }

    public function edit($params)
    {
        $module = 'Edit Galeri';
        $data = Galeri::where('uuid', $params)->first();
        return view('admin.galeri.edit', compact('module', 'data'));
    }

    public function update(UpdateGaleriRequest $updateGaleriRequest, $params)
    {
        $data = Galeri::where('uuid', $params)->first();

        $oldGambarPath = public_path('/public/galeri/' . $data->gambar);

        $newGambar = '';
        if ($updateGaleriRequest->file('gambar')) {
            $extension = $updateGaleriRequest->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $updateGaleriRequest->file('gambar')->storeAs('public/galeri', $newGambar);

            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
        }

        try {
            $data->judul = $updateGaleriRequest->judul;
            $data->gambar = $updateGaleriRequest->file('gambar') ? $newGambar : $data->gambar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update galeri success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Galeri::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldGambarPath = public_path('/public/galeri/' . $data->gambar);
            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Galeri success');
    }
}
