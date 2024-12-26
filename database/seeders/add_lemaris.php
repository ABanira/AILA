<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class add_lemaris extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lemaris')->insert([
            'nama_lemari' => 'Alat Listrik',
            'lokasi_unit' => 'Qc',
            'ip_control' => '192.10.1.16',
            'laci_1' => '1',
            'laci_2' => '1',
            'laci_3' => '1',
            'laci_4' => '1',
            'laci_5' => '0',
            'laci_6' => '0',
            'laci_7' => '0',
            'laci_8' => '0',
        ]);
    }
}
