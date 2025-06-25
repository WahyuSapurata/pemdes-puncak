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

    public function bansos()
    {
        $module = 'Bansos';
        $bansos = PenerimaBansos::selectRaw('
            SUM(CASE WHEN jenis_bansos = "BLT" THEN 1 ELSE 0 END) AS BLT,
            SUM(CASE WHEN jenis_bansos = "PKH" THEN 1 ELSE 0 END) AS PKH,
            SUM(CASE WHEN jenis_bansos = "BPNT" THEN 1 ELSE 0 END) AS BPNT
        ')->first();
        return view('landing.bansos', compact('module', 'bansos'));
    }

    public function getPenerima($params)
    {
        $penduduk = Penduduk::where('nik', $params)->first();

        if (!$penduduk) {
            return response()->json(['data' => []]);
        }

        $bansos = PenerimaBansos::where('uuid_penduduk', $penduduk->uuid)->get();

        // Tambahkan data penduduk ke hasil bansos
        $data = $bansos->map(function ($item) use ($penduduk) {
            return [
                'nama' => $penduduk->nama,
                'nik' => $penduduk->nik,
                'alamat' => $penduduk->alamat,
                'jenis_bansos' => $item->jenis_bansos,
                'tahun' => $item->tahun,
            ];
        });

        return $this->sendResponse($data, 'Get data succes');
    }
}
