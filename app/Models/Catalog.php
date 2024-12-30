<?php

namespace App\Models;

use App\Models\Lemari;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'nama_alat',
        'lemari_id',
        'lokasi_laci',
        'status',
        'kondisi_alat',
        'img_alat',
        'jumlah',
    ];

    public function lemari()
    {
        return $this->belongsTo(Lemari::class, 'lemari_id');
    }
}
