<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenyaluranBansosRequest;
use App\Http\Requests\UpdatePenyaluranBansosRequest;
use App\Models\PenyaluranBansos;

class PenyaluranBansosController extends BaseController
{
    public function store(StorePenyaluranBansosRequest $storePenyaluranBansosRequest)
    {
        try {
            $data = new PenyaluranBansos();
            $data->uuid_penerima = $storePenyaluranBansosRequest->uuid_penerima;
            $data->termin = $storePenyaluranBansosRequest->termin;
            $data->tanggal_penyaluran = $storePenyaluranBansosRequest->tanggal_penyaluran;
            $data->keterangan = $storePenyaluranBansosRequest->keterangan;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add bansos success');
    }
}
