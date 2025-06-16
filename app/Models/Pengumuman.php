<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'judul',
        'isi',
        'tanggal_mulai',
        'tanggal_selesai',
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
