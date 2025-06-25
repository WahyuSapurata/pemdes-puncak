<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSdgsKeluargaRequest;
use App\Http\Requests\UpdateSdgsKeluargaRequest;
use App\Models\Penduduk;
use App\Models\SdgsKeluarga;
use Illuminate\Support\Facades\DB;

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

    public function sdgs()
    {
        $module = 'SDGs';
        $tahun = now()->format('Y');

        // Ambil semua data sdgs berdasarkan tahun
        $dataList = SdgsKeluarga::where('tahun', $tahun)
            ->get();

        if ($dataList->isEmpty()) {
            return view('sdgs.publik', [
                'sdgsNilai' => [],
                'skor_sdgs' => 0,
                'tahun' => $tahun
            ]);
        }

        // Daftar indikator SDGs
        $indikator = [
            ['judul' => 'Desa Tanpa Kemiskinan', 'field' => 'miskin', 'icon' => 'sdgs-1.webp'],
            ['judul' => 'Desa Tanpa Kelaparan', 'field' => 'akses_pangan', 'icon' => 'sdgs-2.webp'],
            ['judul' => 'Desa Sehat dan Sejahtera', 'field' => 'bpjs', 'icon' => 'sdgs-3.webp'],
            ['judul' => 'Pendidikan Berkualitas', 'field' => 'pendidikan_terakhir', 'icon' => 'sdgs-4.webp'],
            ['judul' => 'Keterlibatan Perempuan Desa', 'field' => 'perempuan_bekerja', 'icon' => 'sdgs-5.webp'],
            ['judul' => 'Akses Air Bersih & Sanitasi', 'field' => 'akses_air_bersih', 'icon' => 'sdgs-6.webp'],
            ['judul' => 'Energi Bersih & Terbarukan', 'field' => 'listrik', 'icon' => 'sdgs-7.webp'],
            ['judul' => 'Pekerjaan Layak', 'field' => 'pekerjaan_layak', 'icon' => 'sdgs-8.webp'],
            ['judul' => 'Akses Internet', 'field' => 'akses_internet', 'icon' => 'sdgs-9.webp'],
            ['judul' => 'Desa Tanpa Kesejangan', 'field' => 'disabilitas', 'icon' => 'sdgs-10.webp'],
            ['judul' => 'Rumah Layak', 'field' => 'rumah_layak', 'icon' => 'sdgs-11.webp'],
            ['judul' => 'Pengelolaan Sampah', 'field' => 'pengelolaan_sampah', 'icon' => 'sdgs-12.webp'],
            ['judul' => 'Terdampak Bencana', 'field' => 'terdampak_bencana', 'icon' => 'sdgs-13.webp'],
            ['judul' => 'Pelestari Lingkungan', 'field' => 'pelestari_lingkungan', 'icon' => 'sdgs-14.webp'],
            ['judul' => 'Ikut Musyawarah', 'field' => 'ikut_musyawarah', 'icon' => 'sdgs-15.webp'],
            ['judul' => 'Ikut Organisasi', 'field' => 'ikut_organisasi', 'icon' => 'sdgs-16.webp'],
        ];

        $sdgsNilai = [];
        $totalAll = 0;
        $totalIndikator = 0;

        foreach ($indikator as $item) {
            $field = $item['field'];
            $sum = 0;
            $count = $dataList->count();

            if ($field === 'pendidikan_terakhir') {
                foreach ($dataList as $row) {
                    $pendidikan = strtolower($row->$field ?? '');
                    $nilai = match ($pendidikan) {
                        's1' => 80,
                        'd3' => 70,
                        'sma' => 60,
                        'smp' => 50,
                        'sd' => 40,
                        default => 30,
                    };
                    $sum += $nilai;
                }
            } else {
                $sum = $dataList->sum($field) * 100;
            }

            $nilaiRata = $count > 0 ? $sum / $count : 0;

            $sdgsNilai[] = [
                'judul' => $item['judul'],
                'icon' => $item['icon'],
                'nilai' => round($nilaiRata, 2),
            ];

            $totalAll += $nilaiRata;
            $totalIndikator++;
        }

        $skor_sdgs = $totalIndikator > 0 ? round($totalAll / $totalIndikator, 2) : 0;
        return view('landing.sdgs', compact('module', 'sdgsNilai', 'skor_sdgs'));
    }
}
