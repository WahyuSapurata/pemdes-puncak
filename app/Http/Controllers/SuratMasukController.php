<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\File;

class SuratMasukController extends BaseController
{
    public function index()
    {
        $module = 'Surat Masuk';
        return view('admin.suratmasuk.index', compact('module'));
    }

    public function get()
    {
        $data = SuratMasuk::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Surat Masuk';
        return view('admin.suratmasuk.tambah', compact('module'));
    }

    public function store(StoreSuratMasukRequest $storeSuratMasukRequest)
    {
        $newFileSurat = '';
        if ($storeSuratMasukRequest->file('file_surat')) {
            $extension = $storeSuratMasukRequest->file('file_surat')->extension();
            $newFileSurat = 'file_surat' . '-' . now()->timestamp . '.' . $extension;
            $storeSuratMasukRequest->file('file_surat')->storeAs('public/suratmasuk', $newFileSurat);
        }

        try {
            $data = new SuratMasuk();
            $data->nomor_surat = $storeSuratMasukRequest->nomor_surat;
            $data->pengirim = $storeSuratMasukRequest->pengirim;
            $data->perihal = $storeSuratMasukRequest->perihal;
            $data->tanggal_surat = $storeSuratMasukRequest->tanggal_surat;
            $data->tanggal_diterima = $storeSuratMasukRequest->tanggal_diterima;
            $data->file_surat = $newFileSurat;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add surat masuk success');
    }

    public function edit($params)
    {
        $module = 'Edit SuratMasuk';
        $data = SuratMasuk::where('uuid', $params)->first();
        return view('admin.suratmasuk.edit', compact('module', 'data'));
    }

    public function update(UpdateSuratMasukRequest $updateSuratMasukRequest, $params)
    {
        $data = SuratMasuk::where('uuid', $params)->first();

        $oldFileSuratPath = public_path('/public/suratmasuk/' . $data->file_surat);

        $newFileSurat = '';
        if ($updateSuratMasukRequest->file('file_surat')) {
            $extension = $updateSuratMasukRequest->file('file_surat')->extension();
            $newFileSurat = 'file_surat' . '-' . now()->timestamp . '.' . $extension;
            $updateSuratMasukRequest->file('file_surat')->storeAs('public/suratmasuk', $newFileSurat);

            // Hapus foto lama jika ada
            if (File::exists($oldFileSuratPath)) {
                File::delete($oldFileSuratPath);
            }
        }

        try {
            $data->nomor_surat = $updateSuratMasukRequest->nomor_surat;
            $data->pengirim = $updateSuratMasukRequest->pengirim;
            $data->perihal = $updateSuratMasukRequest->perihal;
            $data->tanggal_surat = $updateSuratMasukRequest->tanggal_surat;
            $data->tanggal_diterima = $updateSuratMasukRequest->tanggal_diterima;
            $data->file_surat = $updateSuratMasukRequest->file('file_surat') ? $newFileSurat : $data->file_surat;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update surat masuk success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = SuratMasuk::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFileSuratPath = public_path('/public/suratmasuk/' . $data->file_surat);
            // Hapus foto lama jika ada
            if (File::exists($oldFileSuratPath)) {
                File::delete($oldFileSuratPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete surat masuk success');
    }
}
