<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SdgsKeluarga extends Model
{
    use HasFactory;

    protected $table = 'sdgs_keluargas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penduduk',
        'miskin',
        'akses_pangan',
        'bpjs',
        'difabel',
        'pendidikan_terakhir',
        'perempuan_bekerja',
        'akses_air_bersih',
        'listrik',
        'pekerjaan_layak',
        'akses_internet',
        'disabilitas',
        'rumah_layak',
        'pengelolaan_sampah',
        'terdampak_bencana',
        'pelestari_lingkungan',
        'ikut_musyawarah',
        'ikut_organisasi',
        'tahun',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
