<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Penduduk;
use App\Models\RiwayatPenduduk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    // User Publik
    public function penduduk()
    {
        $module = 'Penduduk';
        $data = Penduduk::all();
        $penduduk = Penduduk::selectRaw('
            SUM(CASE WHEN jenis_kelamin = "L" THEN 1 ELSE 0 END) AS laki_laki,
            SUM(CASE WHEN jenis_kelamin = "P" THEN 1 ELSE 0 END) AS perempuan,
            SUM(CASE WHEN status_dalam_keluarga = "kepala Keluarga" THEN 1 ELSE 0 END) AS kepala_keluarga,
            COUNT(*) AS total
        ')->first();

        $riwayat = RiwayatPenduduk::selectRaw('
            SUM(CASE WHEN jenis_peristiwa = "lahir" THEN 1 ELSE 0 END) AS lahir,
            SUM(CASE WHEN jenis_peristiwa = "meninggal" THEN 1 ELSE 0 END) AS meninggal,
            SUM(CASE WHEN jenis_peristiwa = "pindah" THEN 1 ELSE 0 END) AS pindah,
            SUM(CASE WHEN jenis_peristiwa = "masuk" THEN 1 ELSE 0 END) AS masuk
        ')->first();
        return view('landing.penduduk', compact('module', 'data', 'penduduk', 'riwayat'));
    }

    public function getChartDataUmur()
    {
        $ranges = [
            '0-4' => [0, 4],
            '5-9' => [5, 9],
            '10-14' => [10, 14],
            '15-19' => [15, 19],
            '20-24' => [20, 24],
            '25-29' => [25, 29],
            '30-34' => [30, 34],
            '35-39' => [35, 39],
            '40-44' => [40, 44],
            '45-49' => [45, 49],
            '50-54' => [50, 54],
            '55-59' => [55, 59],
            '60-64' => [60, 64],
            '65-69' => [65, 69],
            '70-74' => [70, 74],
            '75-79' => [75, 79],
            '80-84' => [80, 84],
            '85+'  => [85, 200],
        ];

        $penduduks = Penduduk::select('jenis_kelamin', 'tanggal_lahir')->get()->map(function ($item) {
            try {
                $item->umur = Carbon::createFromFormat('d-m-Y', $item->tanggal_lahir)->age;
            } catch (\Exception $e) {
                $item->umur = null;
            }
            return $item;
        });

        $data = [];
        foreach ($ranges as $label => [$min, $max]) {
            $data[] = [
                'range' => $label,
                'Laki-Laki' => $penduduks->where('jenis_kelamin', 'L')->whereBetween('umur', [$min, $max])->count(),
                'Perempuan' => $penduduks->where('jenis_kelamin', 'P')->whereBetween('umur', [$min, $max])->count(),
            ];
        }

        return response()->json($data);
    }

    public function getChartDataDusun()
    {
        $data = DB::table('penduduks')
            ->select('dusun', DB::raw('count(*) as total'))
            ->groupBy('dusun')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($data);
    }

    public function getChartDataPendidikan()
    {
        $data = DB::table('penduduks')
            ->select('pendidikan_terakhir', DB::raw('count(*) as total'))
            ->groupBy('pendidikan_terakhir')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($data);
    }

    public function getChartDataPekerjaan()
    {
        $data = DB::table('penduduks')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($data);
    }

    public function getChartDataWajibPilih()
    {
        // Ambil batas wajib pilih: usia minimal 17 tahun dari hari ini
        $tanggalBatas = \Carbon\Carbon::now()->subYears(17)->format('Y-m-d');

        $data = DB::table('penduduks')
            ->selectRaw("YEAR(STR_TO_DATE(tanggal_lahir, '%d-%m-%Y')) as tahun_lahir, COUNT(*) as total")
            ->whereRaw("STR_TO_DATE(tanggal_lahir, '%d-%m-%Y') <= ?", [$tanggalBatas])
            ->groupBy(DB::raw("YEAR(STR_TO_DATE(tanggal_lahir, '%d-%m-%Y'))"))
            ->orderBy('tahun_lahir', 'asc')
            ->get();

        return response()->json($data);
    }

    public function getChartDataPerkawinan()
    {
        $data = DB::table('penduduks')
            ->select('status_perkawinan', DB::raw('count(*) as total'))
            ->groupBy('status_perkawinan')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($data);
    }

    public function getChartDataAgama()
    {
        $data = DB::table('penduduks')
            ->select('agama', DB::raw('count(*) as total'))
            ->groupBy('agama')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($data);
    }
}
