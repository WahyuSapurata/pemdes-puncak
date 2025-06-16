<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $table = 'profil_desas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'sejarah',
        'visi',
        'misi',
        'wilayah',
        'struktur_organisasi',
    ];

    protected $casts = [
        'misi' => 'array',
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
