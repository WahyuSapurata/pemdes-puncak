<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAPBDSRequest;
use App\Http\Requests\UpdateAPBDSRequest;
use App\Models\APBDS;

class APBDSController extends BaseController
{
    public function index()
    {
        $module = 'APBDS';
        return view('admin.apbds.index', compact('module'));
    }

    public function get($params)
    {
        $data = APBDS::where('tahun', $params)->get();
        return $this->sendResponse($data, 'Get data success');
    }

    public function store(StoreAPBDSRequest $storeAPBDSRequest)
    {
        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $storeAPBDSRequest->jumlah);
        try {
            $data = new APBDS();
            $data->tahun = $storeAPBDSRequest->tahun;
            $data->jenis = $storeAPBDSRequest->jenis;
            $data->sumber = $storeAPBDSRequest->sumber;
            $data->uraian = $storeAPBDSRequest->uraian;
            $data->jumlah = $numericValue;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add apbds success');
    }

    public function show($params)
    {
        $data = array();
        try {
            $data = APBDS::where('uuid', $params)->first();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Show data success');
    }

    public function update(StoreAPBDSRequest $storeAPBDSRequest, $params)
    {
        $data = APBDS::where('uuid', $params)->first();

        $numericValue = (int) str_replace(['Rp', ',', ' '], '', $storeAPBDSRequest->jumlah);

        try {
            $data->tahun = $storeAPBDSRequest->tahun;
            $data->jenis = $storeAPBDSRequest->jenis;
            $data->sumber = $storeAPBDSRequest->sumber;
            $data->uraian = $storeAPBDSRequest->uraian;
            $data->jumlah = $numericValue;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update apbds success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = APBDS::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete APBDS success');
    }
}
