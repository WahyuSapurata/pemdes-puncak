<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengumumanRequest;
use App\Http\Requests\UpdatePengumumanRequest;
use App\Models\Pengumuman;

class PengumumanController extends BaseController
{
    public function index()
    {
        $module = 'Pengumuman';
        return view('admin.pengumuman.index', compact('module'));
    }

    public function get()
    {
        $data = Pengumuman::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Pengumuman';
        return view('admin.pengumuman.tambah', compact('module'));
    }

    public function store(StorePengumumanRequest $storePengumumanRequest)
    {
        try {
            $data = new Pengumuman();
            $data->judul = $storePengumumanRequest->judul;
            $data->isi = $storePengumumanRequest->isi;
            $data->tanggal_mulai = $storePengumumanRequest->tanggal_mulai;
            $data->tanggal_selesai = $storePengumumanRequest->tanggal_selesai;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add pengumuman success');
    }

    public function edit($params)
    {
        $module = 'Edit Pengumuman';
        $data = Pengumuman::where('uuid', $params)->first();
        return view('admin.pengumuman.edit', compact('module', 'data'));
    }

    public function update(StorePengumumanRequest $storePengumumanRequest, $params)
    {
        $data = Pengumuman::where('uuid', $params)->first();

        try {
            $data->judul = $storePengumumanRequest->judul;
            $data->isi = $storePengumumanRequest->isi;
            $data->tanggal_mulai = $storePengumumanRequest->tanggal_mulai;
            $data->tanggal_selesai = $storePengumumanRequest->tanggal_selesai;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update pengumuman success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Pengumuman::where('uuid', $params)->first();
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Pengumuman success');
    }

    public function update_tombol($params)
    {
        $data = Pengumuman::where('uuid', $params)->first();
        try {
            if ($data->status == 'aktif') {
                $data->status = 'nonaktif';
            } elseif ($data->status == 'nonaktif') {
                $data->status = 'aktif';
            }
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update pengumuman success');
    }
}
