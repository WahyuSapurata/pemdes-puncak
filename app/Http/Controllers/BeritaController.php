<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends BaseController
{
    public function index()
    {
        $module = 'Berita';
        return view('admin.berita.index', compact('module'));
    }

    public function get()
    {
        $data = Berita::all();
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Berita';
        return view('admin.berita.tambah', compact('module'));
    }

    public function store(StoreBeritaRequest $storeBeritaRequest)
    {
        $newGambar = '';
        if ($storeBeritaRequest->file('gambar')) {
            $extension = $storeBeritaRequest->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $storeBeritaRequest->file('gambar')->storeAs('public/berita', $newGambar);
        }

        try {
            $data = new Berita();
            $data->uuid_user = auth()->user()->uuid;
            $data->judul = $storeBeritaRequest->judul;
            $data->slug = Str::slug($storeBeritaRequest->judul);
            $data->isi = $storeBeritaRequest->isi;
            $data->gambar = $newGambar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add berita success');
    }

    public function edit($params)
    {
        $module = 'Edit Berita';
        $data = Berita::where('uuid', $params)->first();
        return view('admin.berita.edit', compact('module', 'data'));
    }

    public function update(UpdateBeritaRequest $updateBeritaRequest, $params)
    {
        $data = Berita::where('uuid', $params)->first();

        $oldGambarPath = public_path('/public/berita/' . $data->gambar);

        $newGambar = '';
        if ($updateBeritaRequest->file('gambar')) {
            $extension = $updateBeritaRequest->file('gambar')->extension();
            $newGambar = 'gambar' . '-' . now()->timestamp . '.' . $extension;
            $updateBeritaRequest->file('gambar')->storeAs('public/berita', $newGambar);

            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
        }

        try {
            $data->uuid_user = auth()->user()->uuid;
            $data->judul = $updateBeritaRequest->judul;
            $data->slug = Str::slug($updateBeritaRequest->judul);
            $data->isi = $updateBeritaRequest->isi;
            $data->gambar = $updateBeritaRequest->file('gambar') ? $newGambar : $data->gambar;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update berita success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Berita::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldGambarPath = public_path('/public/berita/' . $data->gambar);
            // Hapus foto lama jika ada
            if (File::exists($oldGambarPath)) {
                File::delete($oldGambarPath);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Berita success');
    }

    public function berita(Request $request)
    {
        $module = 'Berita';
        $query = Berita::query();

        // Jika ada pencarian keyword
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where('judul', 'like', '%' . $keyword . '%')
                ->orWhere('isi', 'like', '%' . $keyword . '%');
        }

        $berita = $query->latest()->paginate(4);
        $berita->appends(['keyword' => $request->keyword]); // agar query ?keyword tetap ada di pagination

        // Tambahkan nama penulis (lebih efisien kalau pakai relasi eager loading)
        foreach ($berita as $item) {
            $item->oleh = User::where('uuid', $item->uuid_user)->first()->nama ?? '-';
        }

        // Berita terkini (tidak dipengaruhi keyword)
        $beritaTerkini = Berita::latest()->take(2)->get();

        return view('landing.berita', compact('module', 'berita', 'beritaTerkini'));
    }

    public function detail($params)
    {
        $data = Berita::where('slug', $params)->first();
        $data->oleh = User::where('uuid', $data->uuid_user)->first()->nama;
        $module = $data->judul;

        $beritaTerkini = Berita::latest()
            ->take(2)
            ->get();
        return view('landing.detail.berita', compact('module', 'data', 'beritaTerkini'));
    }
}
