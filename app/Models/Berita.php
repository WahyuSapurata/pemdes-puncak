<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_user',
        'judul',
        'slug',
        'isi',
        'gambar',
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
