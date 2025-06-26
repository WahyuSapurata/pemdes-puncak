<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratKeluarRequest;
use App\Http\Requests\UpdateSuratKeluarRequest;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\File;

class SuratKeluarController extends BaseController
{
    public function index()
    {
        $module = 'Surat Keluar';
        return view('admin.suratkeluar.index', compact('module'));
    }

    public function get()
    {
        $data = SuratKeluar::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Surat Keluar';
        return view('admin.suratkeluar.tambah', compact('module'));
    }

    public function store(StoreSuratKeluarRequest $storeSuratKeluarRequest)
    {
        $newFileSurat = '';
        if ($storeSuratKeluarRequest->file('file_surat')) {
            $extension = $storeSuratKeluarRequest->file('file_surat')->extension();
            $newFileSurat = 'file_surat' . '-' . now()->timestamp . '.' . $extension;
            $storeSuratKeluarRequest->file('file_surat')->storeAs('public/suratkeluar', $newFileSurat);
        }

        try {
            $data = new SuratKeluar();
            $data->nomor_surat = $storeSuratKeluarRequest->nomor_surat;
            $data->tanggal_surat = $storeSuratKeluarRequest->tanggal_surat;
            $data->tujuan = $storeSuratKeluarRequest->tujuan;
            $data->perihal = $storeSuratKeluarRequest->perihal;
            $data->isi_ringkas = $storeSuratKeluarRequest->isi_ringkas;
            $data->file_surat = $newFileSurat;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add surat masuk success');
    }

    public function edit($params)
    {
        $module = 'Edit SuratKeluar';
        $data = SuratKeluar::where('uuid', $params)->first();
        return view('admin.suratkeluar.edit', compact('module', 'data'));
    }

    public function update(UpdateSuratKeluarRequest $updateSuratKeluarRequest, $params)
    {
        $data = SuratKeluar::where('uuid', $params)->first();

        $oldFileSuratPath = public_path('/public/suratkeluar/' . $data->file_surat);

        $newFileSurat = '';
        if ($updateSuratKeluarRequest->file('file_surat')) {
            $extension = $updateSuratKeluarRequest->file('file_surat')->extension();
            $newFileSurat = 'file_surat' . '-' . now()->timestamp . '.' . $extension;
            $updateSuratKeluarRequest->file('file_surat')->storeAs('public/suratkeluar', $newFileSurat);

            // Hapus foto lama jika ada
            if (File::exists($oldFileSuratPath)) {
                File::delete($oldFileSuratPath);
            }
        }

        try {
            $data->nomor_surat = $updateSuratKeluarRequest->nomor_surat;
            $data->tanggal_surat = $updateSuratKeluarRequest->tanggal_surat;
            $data->tujuan = $updateSuratKeluarRequest->tujuan;
            $data->perihal = $updateSuratKeluarRequest->perihal;
            $data->isi_ringkas = $updateSuratKeluarRequest->isi_ringkas;
            $data->file_surat = $updateSuratKeluarRequest->file('file_surat') ? $newFileSurat : $data->file_surat;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update surat keluar success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = SuratKeluar::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFileSuratPath = public_path('/public/suratkeluar/' . $data->file_surat);
            // Hapus foto lama jika ada
            if (File::exists($oldFileSuratPath)) {
                File::delete($oldFileSuratPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete surat keluar success');
    }
}
