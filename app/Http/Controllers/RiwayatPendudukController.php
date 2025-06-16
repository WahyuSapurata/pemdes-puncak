<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRiwayatPendudukRequest;
use App\Http\Requests\UpdateRiwayatPendudukRequest;
use App\Models\Penduduk;
use App\Models\RiwayatPenduduk;

class RiwayatPendudukController extends BaseController
{
    public function index()
    {
        $module = 'Riwayat Penduduk';
        return view('admin.riwayatpenduduk.index', compact('module'));
    }

    public function get()
    {
        $data = RiwayatPenduduk::all();
        $data->map(function ($item) {
            $penduduk = Penduduk::where('uuid', $item->uuid_penduduk)->first();
            $item->nik = $penduduk ? $penduduk->nik : '-';
            $item->nama = $penduduk ? $penduduk->nama : '-';

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreRiwayatPendudukRequest $storeRiwayatPendudukRequest)
    {
        try {
            $data = new RiwayatPenduduk();
            $data->uuid_penduduk = $storeRiwayatPendudukRequest->uuid_penduduk;
            $data->jenis_peristiwa = $storeRiwayatPendudukRequest->jenis_peristiwa;
            $data->tanggal_peristiwa = $storeRiwayatPendudukRequest->tanggal_peristiwa;
            $data->keterangan = $storeRiwayatPendudukRequest->keterangan;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add riwayat penduduk success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = RiwayatPenduduk::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreRiwayatPendudukRequest $storeRiwayatPendudukRequest, $params)
    {
        $data = RiwayatPenduduk::where('uuid', $params)->first();

        try {
            $data->uuid_penduduk = $storeRiwayatPendudukRequest->uuid_penduduk;
            $data->jenis_peristiwa = $storeRiwayatPendudukRequest->jenis_peristiwa;
            $data->tanggal_peristiwa = $storeRiwayatPendudukRequest->tanggal_peristiwa;
            $data->keterangan = $storeRiwayatPendudukRequest->keterangan;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update riwayat penduduk success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = RiwayatPenduduk::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete RiwayatPenduduk success');
    }
}
