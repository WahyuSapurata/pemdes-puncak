<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KegiatanController extends BaseController
{
    public function index()
    {
        $module = 'Kegiatan';
        return view('admin.kegiatan.index', compact('module'));
    }

    public function get()
    {
        $data = Kegiatan::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Kegiatan';
        return view('admin.kegiatan.tambah', compact('module'));
    }

    public function store(StoreKegiatanRequest $storeKegiatanRequest)
    {
        $newBanner = '';
        if ($storeKegiatanRequest->file('banner')) {
            $extension = $storeKegiatanRequest->file('banner')->extension();
            $newBanner = 'banner' . '-' . now()->timestamp . '.' . $extension;
            $storeKegiatanRequest->file('banner')->storeAs('public/kegiatan', $newBanner);
        }

        try {
            $data = new Kegiatan();
            $data->nama_kegiatan = $storeKegiatanRequest->nama_kegiatan;
            $data->slug = Str::slug($storeKegiatanRequest->nama_kegiatan);
            $data->deskripsi = $storeKegiatanRequest->deskripsi;
            $data->lokasi = $storeKegiatanRequest->lokasi;
            $data->tanggal = $storeKegiatanRequest->tanggal;
            $data->waktu = $storeKegiatanRequest->waktu;
            $data->banner = $newBanner;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add kegiatan success');
    }

    public function edit($params)
    {
        $module = 'Edit Kegiatan';
        $data = Kegiatan::where('uuid', $params)->first();
        return view('admin.kegiatan.edit', compact('module', 'data'));
    }

    public function update(UpdateKegiatanRequest $updateKegiatanRequest, $params)
    {
        $data = Kegiatan::where('uuid', $params)->first();

        $oldBannerPath = public_path('/public/kegiatan/' . $data->banner);

        $newBanner = '';
        if ($updateKegiatanRequest->file('banner')) {
            $extension = $updateKegiatanRequest->file('banner')->extension();
            $newBanner = 'banner' . '-' . now()->timestamp . '.' . $extension;
            $updateKegiatanRequest->file('banner')->storeAs('public/kegiatan', $newBanner);

            // Hapus foto lama jika ada
            if (File::exists($oldBannerPath)) {
                File::delete($oldBannerPath);
            }
        }

        try {
            $data->nama_kegiatan = $updateKegiatanRequest->nama_kegiatan;
            $data->slug = Str::slug($updateKegiatanRequest->nama_kegiatan);
            $data->deskripsi = $updateKegiatanRequest->deskripsi;
            $data->lokasi = $updateKegiatanRequest->lokasi;
            $data->tanggal = $updateKegiatanRequest->tanggal;
            $data->waktu = $updateKegiatanRequest->waktu;
            $data->banner = $updateKegiatanRequest->file('banner') ? $newBanner : $data->banner;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update kegiatan success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Kegiatan::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldBannerPath = public_path('/public/kegiatan/' . $data->banner);
            // Hapus foto lama jika ada
            if (File::exists($oldBannerPath)) {
                File::delete($oldBannerPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Kegiatan success');
    }

    public function kegiatan()
    {
        $module = 'Kegiatan';
        $kegiatan = Kegiatan::latest()->paginate(9);
        return view('landing.kegiatan', compact('module', 'kegiatan'));
    }

    public function detail($params)
    {
        $data = Kegiatan::where('slug', $params)->first();
        $module = $data->nama_kegiatan;
        $kegiatan = Kegiatan::latest()->take(4)->get();
        return view('landing.detail.kegiatan', compact('module', 'data', 'kegiatan'));
    }
}
