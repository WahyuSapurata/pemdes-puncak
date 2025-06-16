<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class LapakDesa extends Model
{
    use HasFactory;

    protected $table = 'lapak_desas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'nama_produk',
        'slug',
        'deskripsi_produk',
        'harga_produk',
        'gambar_produk',
        'kategori_produk',
        'nama_penjual',
        'kontak_penjual',
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
