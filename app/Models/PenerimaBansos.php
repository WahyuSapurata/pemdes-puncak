<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PenerimaBansos extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penduduk',
        'jenis_bansos',
        'tahun',
        'jumlah_termin',
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
