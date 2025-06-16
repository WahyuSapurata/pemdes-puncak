<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilDesaRequest;
use App\Http\Requests\UpdateProfilDesaRequest;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\File;

class ProfilDesaController extends BaseController
{
    public function index()
    {
        $module = 'Profil Desa';
        return view('admin.profildesa.index', compact('module'));
    }

    public function get()
    {
        $data = ProfilDesa::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Profil Desa';
        return view('admin.profildesa.tambah', compact('module'));
    }

    public function store(StoreProfilDesaRequest $storeProfilDesaRequest)
    {
        $newStruktur = '';
        if ($storeProfilDesaRequest->file('struktur_organisasi')) {
            $extension = $storeProfilDesaRequest->file('struktur_organisasi')->extension();
            $newStruktur = 'struktur_organisasi' . '-' . now()->timestamp . '.' . $extension;
            $storeProfilDesaRequest->file('struktur_organisasi')->storeAs('public/profildesa', $newStruktur);
        }

        try {
            $data = new ProfilDesa();
            $data->sejarah = $storeProfilDesaRequest->sejarah;
            $data->visi = $storeProfilDesaRequest->visi;
            $data->misi = $storeProfilDesaRequest->input('misi');
            $data->wilayah = $storeProfilDesaRequest->wilayah;
            $data->struktur_organisasi = $newStruktur;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add profil desa success');
    }

    public function edit($params)
    {
        $module = 'Edit Profil Desa';
        $data = ProfilDesa::where('uuid', $params)->first();
        return view('admin.profildesa.edit', compact('module', 'data'));
    }

    public function update(UpdateProfilDesaRequest $updateProfilDesaRequest, $params)
    {
        $data = ProfilDesa::where('uuid', $params)->first();

        $oldStrukturPath = public_path('/public/profildesa/' . $data->struktur_organisasi);

        $newStruktur = '';
        if ($updateProfilDesaRequest->file('struktur_organisasi')) {
            $extension = $updateProfilDesaRequest->file('struktur_organisasi')->extension();
            $newStruktur = 'struktur_organisasi' . '-' . now()->timestamp . '.' . $extension;
            $updateProfilDesaRequest->file('struktur_organisasi')->storeAs('public/profildesa', $newStruktur);

            // Hapus foto lama jika ada
            if (File::exists($oldStrukturPath)) {
                File::delete($oldStrukturPath);
            }
        }

        try {
            $data->sejarah = $updateProfilDesaRequest->sejarah;
            $data->visi = $updateProfilDesaRequest->visi;
            $data->misi = $updateProfilDesaRequest->input('misi');
            $data->wilayah = $updateProfilDesaRequest->wilayah;
            $data->struktur_organisasi = $updateProfilDesaRequest->file('struktur_organisasi') ? $newStruktur : $data->struktur_organisasi;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update profildesa success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = ProfilDesa::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldStrukturPath = public_path('/public/profildesa/' . $data->struktur_organisasi);
            // Hapus foto lama jika ada
            if (File::exists($oldStrukturPath)) {
                File::delete($oldStrukturPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Profil Desa success');
    }
}
