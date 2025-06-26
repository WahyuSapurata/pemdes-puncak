<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SuratPengajuan extends Model
{
    use HasFactory;

    protected $table = 'surat_pengajuans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penduduk',
        'nomor',
        'jenis_surat',
        'keterangan',
        'file_ktp',
        'status',
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
