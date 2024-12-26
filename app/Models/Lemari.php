<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{

    protected $fillable = [
        'nama_lemari',
        'lokasi_unit',
        'ip_control',
        'laci_1',
        'laci_2',
        'laci_3',
        'laci_4',
        'laci_5',
        'laci_6',
        'laci_7',
        'laci_8',
    ];
}
