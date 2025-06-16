<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSdgsKeluargaRequest;
use App\Http\Requests\UpdateSdgsKeluargaRequest;
use App\Models\Penduduk;
use App\Models\SdgsKeluarga;

class SdgsKeluargaController extends BaseController
{
    public function index()
    {
        $module = 'SDGs';
        return view('admin.sdgs.index', compact('module'));
    }

    public function get()
    {
        $data = SdgsKeluarga::all();
        $data->map(function ($item) {
            $penduduk = Penduduk::where('uuid', $item->uuid_penduduk)->first();
            $item->nik = $penduduk ? $penduduk->nik : '-';
            $item->nama = $penduduk ? $penduduk->nama : '-';
            $item->kk = $penduduk ? $penduduk->kk : '-';

            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreSdgsKeluargaRequest $storeSdgsKeluargaRequest)
    {
        try {
            $data = new SdgsKeluarga();
            $data->uuid_penduduk = $storeSdgsKeluargaRequest->uuid_penduduk;
            $data->miskin = $storeSdgsKeluargaRequest->miskin;
            $data->akses_pangan = $storeSdgsKeluargaRequest->akses_pangan;
            $data->bpjs = $storeSdgsKeluargaRequest->bpjs;
            $data->difabel = $storeSdgsKeluargaRequest->difabel;
            $data->pendidikan_terakhir = $storeSdgsKeluargaRequest->pendidikan_terakhir;
            $data->perempuan_bekerja = $storeSdgsKeluargaRequest->perempuan_bekerja;
            $data->akses_air_bersih = $storeSdgsKeluargaRequest->akses_air_bersih;
            $data->listrik = $storeSdgsKeluargaRequest->listrik;
            $data->pekerjaan_layak = $storeSdgsKeluargaRequest->pekerjaan_layak;
            $data->akses_internet = $storeSdgsKeluargaRequest->akses_internet;
            $data->disabilitas = $storeSdgsKeluargaRequest->disabilitas;
            $data->rumah_layak = $storeSdgsKeluargaRequest->rumah_layak;
            $data->pengelolaan_sampah = $storeSdgsKeluargaRequest->pengelolaan_sampah;
            $data->terdampak_bencana = $storeSdgsKeluargaRequest->terdampak_bencana;
            $data->pelestari_lingkungan = $storeSdgsKeluargaRequest->pelestari_lingkungan;
            $data->ikut_musyawarah = $storeSdgsKeluargaRequest->ikut_musyawarah;
            $data->ikut_organisasi = $storeSdgsKeluargaRequest->ikut_organisasi;
            $data->tahun = $storeSdgsKeluargaRequest->tahun;
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
            $data = SdgsKeluarga::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreSdgsKeluargaRequest $storeSdgsKeluargaRequest, $params)
    {
        $data = SdgsKeluarga::where('uuid', $params)->first();

        try {
            $data->uuid_penduduk = $storeSdgsKeluargaRequest->uuid_penduduk;
            $data->miskin = $storeSdgsKeluargaRequest->miskin;
            $data->akses_pangan = $storeSdgsKeluargaRequest->akses_pangan;
            $data->bpjs = $storeSdgsKeluargaRequest->bpjs;
            $data->difabel = $storeSdgsKeluargaRequest->difabel;
            $data->pendidikan_terakhir = $storeSdgsKeluargaRequest->pendidikan_terakhir;
            $data->perempuan_bekerja = $storeSdgsKeluargaRequest->perempuan_bekerja;
            $data->akses_air_bersih = $storeSdgsKeluargaRequest->akses_air_bersih;
            $data->listrik = $storeSdgsKeluargaRequest->listrik;
            $data->pekerjaan_layak = $storeSdgsKeluargaRequest->pekerjaan_layak;
            $data->akses_internet = $storeSdgsKeluargaRequest->akses_internet;
            $data->disabilitas = $storeSdgsKeluargaRequest->disabilitas;
            $data->rumah_layak = $storeSdgsKeluargaRequest->rumah_layak;
            $data->pengelolaan_sampah = $storeSdgsKeluargaRequest->pengelolaan_sampah;
            $data->terdampak_bencana = $storeSdgsKeluargaRequest->terdampak_bencana;
            $data->pelestari_lingkungan = $storeSdgsKeluargaRequest->pelestari_lingkungan;
            $data->ikut_musyawarah = $storeSdgsKeluargaRequest->ikut_musyawarah;
            $data->ikut_organisasi = $storeSdgsKeluargaRequest->ikut_organisasi;
            $data->tahun = $storeSdgsKeluargaRequest->tahun;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update sdgs success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = SdgsKeluarga::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete sdgs success');
    }
}
