<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilDesaRequest;
use App\Http\Requests\UpdateProfilDesaRequest;
use App\Models\ProfilDesa;
use App\Models\StrukturPemerintahan;
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

    // User Public
    public function profil_desa()
    {
        $module = 'Profil Desa';
        $data = ProfilDesa::first();
        if (!$data) {
            return redirect()->route('home')->with('error', 'Profil Desa tidak ditemukan');
        }
        $peta = [
            'nama' => 'Desa Puncak',
            'latitude' => -5.26369,
            'longitude' => 120.12606
        ];
        $struktur_desa = StrukturPemerintahan::all();
        return view('landing.profildesa', compact('module', 'data', 'peta', 'struktur_desa'));
    }

    public function geojson()
    {
        $geojson = [
            "type" => "FeatureCollection",
            "features" => [
                [
                    "type" => "Feature",
                    "properties" => ["name" => "Desa Puncak"],
                    "geometry" => [
                        "type" => "Polygon",
                        "coordinates" => [[
                            [120.209266, -5.212003],
                            [120.212266, -5.212003],
                            [120.212266, -5.209003],
                            [120.209266, -5.209003],
                            [120.209266, -5.212003]
                        ]]
                    ]
                ]
            ]
        ];

        return response()->json($geojson);
    }
}
