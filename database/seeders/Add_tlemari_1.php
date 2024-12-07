<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Add_tlemari_1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tlemari')->truncate();
        
        DB::table('tlemari')->insert([
            'lemari_nama'   =>'Lemarin Alat Listrik',
            'lemari_unit'   =>'QC',
            'lemari_ip'     =>'192.10.16.121',
            'lemari_1'      =>'disable',
            'lemari_2'      =>'disable',
            'lemari_3'      =>'disable',
            'lemari_4'      =>'disable',
            'lemari_5'      =>'disable',
            'lemari_6'      =>'disable',
            'lemari_7'      =>'disable',
            'lemari_8'      =>'disable',
            'lemari_9'      =>'disable',
            'lemari_10'     =>'disable',
            'lemari_11'     =>'disable',
            'lemari_12'     =>'disable',
            'lemari_13'     =>'disable',
            'lemari_14'     =>'disable',
            'lemari_15'     =>'disable',
            'lemari_16'     =>'disable',
        ]);
    }
}