<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PenyaluranBansos extends Model
{
    use HasFactory;

    protected $table = 'penyaluran_bansos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_penerima',
        'termin',
        'tanggal_penyaluran',
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
