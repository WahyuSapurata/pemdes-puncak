<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratPengajuanRequest;
use App\Http\Requests\UpdateSuratPengajuanRequest;
use App\Models\Penduduk;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuratPengajuanController extends BaseController
{
    public function index()
    {
        $module = 'Surat Pengaduan';
        return view('admin.surataduan.index', compact('module'));
    }

    public function get()
    {
        $data = SuratPengajuan::latest()->get();
        $data->map(function ($item) {
            $penduduk = Penduduk::where('uuid', $item->uuid_penduduk)->first();
            $item->nik = $penduduk->nik;
            $item->nama = $penduduk->nama;

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = SuratPengajuan::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(Request $request, $params)
    {
        $data = SuratPengajuan::where('uuid', $params)->first();

        try {
            $data->status = $request->status;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update data success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = SuratPengajuan::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldFileKtpPath = public_path('/public/pengajuan/' . $data->file_ktp);
            // Hapus foto lama jika ada
            if (File::exists($oldFileKtpPath)) {
                File::delete($oldFileKtpPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Kegiatan success');
    }

    public function store(StoreSuratPengajuanRequest $storeSuratPengajuanRequest)
    {
        $nikPenduduk = Penduduk::where('nik', $storeSuratPengajuanRequest->nik)->first();
        if (!$nikPenduduk) {
            return $this->sendError('NIK tidak ditemukan di database penduduk.', [], 400);
        }

        $newFileKtp = '';
        if ($storeSuratPengajuanRequest->file('file_ktp')) {
            $extension = $storeSuratPengajuanRequest->file('file_ktp')->extension();
            $newFileKtp = 'file_ktp' . '-' . now()->timestamp . '.' . $extension;
            $storeSuratPengajuanRequest->file('file_ktp')->storeAs('public/pengajuan', $newFileKtp);
        }

        try {
            $data = new SuratPengajuan();
            $data->uuid_penduduk = $nikPenduduk->uuid;
            $data->nomor = $storeSuratPengajuanRequest->nomor;
            $data->jenis_surat = $storeSuratPengajuanRequest->jenis_surat;
            $data->keterangan = $storeSuratPengajuanRequest->keterangan;
            $data->file_ktp = $newFileKtp;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Proses pengajuan surat sedang di proses');
    }

    public function getDataPenduduk()
    {
        $data = Penduduk::select('uuid', 'nik')->get();
        return $this->sendResponse($data, 'Get data penduduk success');
    }
}
