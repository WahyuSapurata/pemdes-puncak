<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerimaBansosRequest;
use App\Http\Requests\UpdatePenerimaBansosRequest;
use App\Models\Penduduk;
use App\Models\PenerimaBansos;
use App\Models\PenyaluranBansos;

class PenerimaBansosController extends BaseController
{
    public function index()
    {
        $module = 'Penerima Bansos';
        return view('admin.bansos.index', compact('module'));
    }

    public function get()
    {
        $data = PenerimaBansos::all();
        $data->map(function ($item) {
            $penduduk = Penduduk::where('uuid', $item->uuid_penduduk)->first();
            $item->nik = $penduduk ? $penduduk->nik : '-';
            $item->nama = $penduduk ? $penduduk->nama : '-';
            $item->alamat = $penduduk ? $penduduk->alamat : '-';

            $item->penyaluran = PenyaluranBansos::where('uuid_penerima', $item->uuid)->count();

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StorePenerimaBansosRequest $storePenerimaBansosRequest)
    {
        try {
            $data = new PenerimaBansos();
            $data->uuid_penduduk = $storePenerimaBansosRequest->uuid_penduduk;
            $data->jenis_bansos = $storePenerimaBansosRequest->jenis_bansos;
            $data->tahun = $storePenerimaBansosRequest->tahun;
            $data->jumlah_termin = $storePenerimaBansosRequest->jumlah_termin;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add bansos success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = PenerimaBansos::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StorePenerimaBansosRequest $storePenerimaBansosRequest, $params)
    {
        $data = PenerimaBansos::where('uuid', $params)->first();

        try {
            $data->uuid_penduduk = $storePenerimaBansosRequest->uuid_penduduk;
            $data->jenis_bansos = $storePenerimaBansosRequest->jenis_bansos;
            $data->tahun = $storePenerimaBansosRequest->tahun;
            $data->jumlah_termin = $storePenerimaBansosRequest->jumlah_termin;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update bansos success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = PenerimaBansos::where('uuid', $params)->first();
            $data->delete();

            $data_penyaluran = PenyaluranBansos::where('uuid_penerima', $params)->get();
            if ($data_penyaluran) {
                $data_penyaluran->delete();
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete PenerimaBansos success');
    }
}
