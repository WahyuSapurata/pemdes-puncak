<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class RiwayatPenduduk extends Model
{
    use HasFactory;

    protected $table = 'riwayat_penduduks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penduduk',
        'jenis_peristiwa',
        'tanggal_peristiwa',
        'keterangan',
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
