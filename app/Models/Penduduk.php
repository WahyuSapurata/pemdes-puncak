<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'nik',
        'kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'dusun',
        'rt',
        'rw',
        'kewarganegaraan',
        'pendidikan_terakhir',
        'golongan_darah',
        'status_dalam_keluarga',
        'ayah',
        'ibu',
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
