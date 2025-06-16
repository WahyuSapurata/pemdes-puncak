<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'nama_kegiatan',
        'slug',
        'deskripsi',
        'lokasi',
        'tanggal',
        'waktu',
        'banner',
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
