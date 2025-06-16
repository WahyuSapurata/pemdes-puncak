<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Penduduk;

class PendudukController extends BaseController
{
    public function index()
    {
        $module = 'Penduduk';
        return view('admin.penduduk.index', compact('module'));
    }

    public function get()
    {
        $data = Penduduk::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StorePendudukRequest $storePendudukRequest)
    {
        try {
            $data = new Penduduk();
            $data->nik = $storePendudukRequest->nik;
            $data->kk = $storePendudukRequest->kk;
            $data->nama = $storePendudukRequest->nama;
            $data->jenis_kelamin = $storePendudukRequest->jenis_kelamin;
            $data->tempat_lahir = $storePendudukRequest->tempat_lahir;
            $data->tanggal_lahir = $storePendudukRequest->tanggal_lahir;
            $data->agama = $storePendudukRequest->agama;
            $data->status_perkawinan = $storePendudukRequest->status_perkawinan;
            $data->pekerjaan = $storePendudukRequest->pekerjaan;
            $data->alamat = $storePendudukRequest->alamat;
            $data->dusun = $storePendudukRequest->dusun;
            $data->rt = $storePendudukRequest->rt;
            $data->rw = $storePendudukRequest->rw;
            $data->kewarganegaraan = $storePendudukRequest->kewarganegaraan;
            $data->pendidikan_terakhir = $storePendudukRequest->pendidikan_terakhir;
            $data->golongan_darah = $storePendudukRequest->golongan_darah;
            $data->status_dalam_keluarga = $storePendudukRequest->status_dalam_keluarga;
            $data->ayah = $storePendudukRequest->ayah;
            $data->ibu = $storePendudukRequest->ibu;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add penduduk success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = Penduduk::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StorePendudukRequest $storePendudukRequest, $params)
    {
        $data = Penduduk::where('uuid', $params)->first();

        try {
            $data->nik = $storePendudukRequest->nik;
            $data->kk = $storePendudukRequest->kk;
            $data->nama = $storePendudukRequest->nama;
            $data->jenis_kelamin = $storePendudukRequest->jenis_kelamin;
            $data->tempat_lahir = $storePendudukRequest->tempat_lahir;
            $data->tanggal_lahir = $storePendudukRequest->tanggal_lahir;
            $data->agama = $storePendudukRequest->agama;
            $data->status_perkawinan = $storePendudukRequest->status_perkawinan;
            $data->pekerjaan = $storePendudukRequest->pekerjaan;
            $data->alamat = $storePendudukRequest->alamat;
            $data->dusun = $storePendudukRequest->dusun;
            $data->rt = $storePendudukRequest->rt;
            $data->rw = $storePendudukRequest->rw;
            $data->kewarganegaraan = $storePendudukRequest->kewarganegaraan;
            $data->pendidikan_terakhir = $storePendudukRequest->pendidikan_terakhir;
            $data->golongan_darah = $storePendudukRequest->golongan_darah;
            $data->status_dalam_keluarga = $storePendudukRequest->status_dalam_keluarga;
            $data->ayah = $storePendudukRequest->ayah;
            $data->ibu = $storePendudukRequest->ibu;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update penduduk success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Penduduk::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Penduduk success');
    }
}
